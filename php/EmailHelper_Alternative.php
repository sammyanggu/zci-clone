<?php
/**
 * Alternative Email Helper - Designed for XAMPP Windows compatibility
 * Uses multiple fallback methods to send emails
 */

class EmailHelperAlternative {
    private $email;
    private $password;
    private $fromEmail;
    private $fromName;
    private $lastError = '';

    public function __construct($host, $port, $secure, $email, $password, $fromEmail, $fromName) {
        $this->email = $email;
        $this->password = $password;
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
    }

    /**
     * Send email - tries multiple methods
     */
    public function send($toEmail, $toName, $subject, $htmlBody, $textBody = '', $attachmentPath = null) {
        try {
            // Method 1: Direct socket connection (Windows compatible)
            if (function_exists('fsockopen')) {
                $result = $this->sendViaSocket($toEmail, $toName, $subject, $htmlBody, $attachmentPath);
                if ($result['success']) {
                    return $result;
                }
                $this->lastError = $result['message'];
            }

            // Method 2: Use PHP mail() with proper headers
            $result = $this->sendViaMail($toEmail, $toName, $subject, $htmlBody, $attachmentPath);
            if ($result['success']) {
                return $result;
            }
            $this->lastError = $result['message'];

            // Method 3: Queue email for backup
            return $this->queueEmail($toEmail, $toName, $subject, $htmlBody, $attachmentPath);

        } catch (Exception $e) {
            return array(
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            );
        }
    }

    /**
     * Send via socket connection (Windows-compatible fsockopen approach)
     */
    private function sendViaSocket($toEmail, $toName, $subject, $htmlBody, $attachmentPath = null) {
        try {
            $socket = @fsockopen('smtp.gmail.com', 587, $errno, $errstr, 10);
            
            if (!$socket) {
                return array(
                    'success' => false,
                    'message' => 'Cannot connect to Gmail SMTP port 587'
                );
            }

            // Read welcome
            $response = fgets($socket, 1024);
            if (strpos($response, '220') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'SMTP not ready');
            }

            // Send EHLO
            fwrite($socket, "EHLO localhost\r\n");
            $response = $this->readSmtpResponse($socket);

            // Send STARTTLS
            fwrite($socket, "STARTTLS\r\n");
            $response = fgets($socket, 1024);

            if (strpos($response, '220') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'STARTTLS unavailable');
            }

            // Enable TLS
            stream_context_set_option($socket, 'ssl', 'allow_self_signed', true);
            stream_context_set_option($socket, 'ssl', 'verify_peer', false);
            
            if (!@stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                fclose($socket);
                return array('success' => false, 'message' => 'TLS failed');
            }

            // EHLO after TLS
            fwrite($socket, "EHLO localhost\r\n");
            $response = $this->readSmtpResponse($socket);

            // Authenticate
            fwrite($socket, "AUTH LOGIN\r\n");
            $response = fgets($socket, 1024);

            if (strpos($response, '334') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'AUTH not available');
            }

            // Send email
            fwrite($socket, base64_encode($this->email) . "\r\n");
            $response = fgets($socket, 1024);
            if (strpos($response, '334') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'Email rejected');
            }

            // Send password
            fwrite($socket, base64_encode($this->password) . "\r\n");
            $response = fgets($socket, 1024);

            if (strpos($response, '235') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'Authentication failed');
            }

            // Send MAIL FROM
            fwrite($socket, "MAIL FROM:<" . $this->fromEmail . ">\r\n");
            $response = fgets($socket, 1024);
            if (strpos($response, '250') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'Sender rejected');
            }

            // Send RCPT TO
            fwrite($socket, "RCPT TO:<" . $toEmail . ">\r\n");
            $response = fgets($socket, 1024);
            if (strpos($response, '250') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'Recipient rejected');
            }

            // Send DATA
            fwrite($socket, "DATA\r\n");
            $response = fgets($socket, 1024);
            if (strpos($response, '354') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'DATA rejected');
            }

            // Build message with attachment support
            $boundary = '----' . md5(time());
            $headers = "From: " . $this->sanitizeHeader($this->fromName) . " <" . $this->fromEmail . ">\r\n";
            $headers .= "To: " . $toName . " <" . $toEmail . ">\r\n";
            $headers .= "Subject: " . $this->sanitizeHeader($subject) . "\r\n";
            $headers .= "Date: " . date('r') . "\r\n";
            
            if ($attachmentPath && file_exists($attachmentPath)) {
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";
                
                $message = $headers . "\r\n";
                $message .= "--" . $boundary . "\r\n";
                $message .= "Content-Type: text/html; charset=UTF-8\r\n";
                $message .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
                $message .= $htmlBody . "\r\n\r\n";
                
                // Add attachment
                $fileContent = file_get_contents($attachmentPath);
                $fileName = basename($attachmentPath);
                $encodedContent = chunk_split(base64_encode($fileContent));
                
                $message .= "--" . $boundary . "\r\n";
                $message .= "Content-Type: application/pdf; name=\"" . $fileName . "\"\r\n";
                $message .= "Content-Transfer-Encoding: base64\r\n";
                $message .= "Content-Disposition: attachment; filename=\"" . $fileName . "\"\r\n\r\n";
                $message .= $encodedContent . "\r\n";
                $message .= "--" . $boundary . "--\r\n";
            } else {
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $message = $headers . "\r\n" . $htmlBody;
            }
            
            $message = str_replace("\r\n.", "\r\n..", $message);

            // Send message
            fwrite($socket, $message . "\r\n.\r\n");
            $response = fgets($socket, 1024);

            if (strpos($response, '250') !== 0) {
                fclose($socket);
                return array('success' => false, 'message' => 'Message rejected');
            }

            // Quit
            fwrite($socket, "QUIT\r\n");
            fclose($socket);

            return array('success' => true, 'message' => 'Email sent via SMTP!');

        } catch (Exception $e) {
            return array('success' => false, 'message' => 'Socket error: ' . $e->getMessage());
        }
    }

    /**
     * Read multi-line SMTP response
     */
    private function readSmtpResponse($socket) {
        $response = '';
        while ($line = fgets($socket, 1024)) {
            $response .= $line;
            if (substr($line, 3, 1) === ' ') break;
        }
        return $response;
    }

    /**
     * Send via PHP mail()
     */
    private function sendViaMail($toEmail, $toName, $subject, $htmlBody, $attachmentPath = null) {
        try {
            $to = $toName . ' <' . $toEmail . '>';
            
            if ($attachmentPath && file_exists($attachmentPath)) {
                // Send with attachment
                $boundary = '----' . md5(time());
                
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";
                $headers .= "From: " . $this->fromName . " <" . $this->fromEmail . ">\r\n";
                $headers .= "Reply-To: " . $this->fromEmail . "\r\n";
                
                $subject = $this->sanitizeHeader($subject);
                
                $body = "--" . $boundary . "\r\n";
                $body .= "Content-Type: text/html; charset=UTF-8\r\n";
                $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
                $body .= $htmlBody . "\r\n\r\n";
                
                // Add attachment
                $fileContent = file_get_contents($attachmentPath);
                $fileName = basename($attachmentPath);
                $encodedContent = chunk_split(base64_encode($fileContent));
                
                $body .= "--" . $boundary . "\r\n";
                $body .= "Content-Type: application/pdf; name=\"" . $fileName . "\"\r\n";
                $body .= "Content-Transfer-Encoding: base64\r\n";
                $body .= "Content-Disposition: attachment; filename=\"" . $fileName . "\"\r\n\r\n";
                $body .= $encodedContent . "\r\n";
                $body .= "--" . $boundary . "--\r\n";
                
                $mailSent = @mail($to, $subject, $body, $headers);
            } else {
                // Send without attachment
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $headers .= "From: " . $this->fromName . " <" . $this->fromEmail . ">\r\n";
                $headers .= "Reply-To: " . $this->fromEmail . "\r\n";
                
                $subject = $this->sanitizeHeader($subject);
                
                $mailSent = @mail($to, $subject, $htmlBody, $headers);
            }

            if ($mailSent) {
                return array('success' => true, 'message' => 'Email sent!');
            }

            return array('success' => false, 'message' => 'PHP mail() failed');

        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    /**
     * Queue email to backup file
     */
    private function queueEmail($toEmail, $toName, $subject, $htmlBody, $attachmentPath = null) {
        try {
            $queueDir = realpath(dirname(__FILE__)) . '/../uploads/email-queue/';
            
            if (!is_dir($queueDir)) {
                @mkdir($queueDir, 0755, true);
            }

            if (!is_writable($queueDir)) {
                return array('success' => false, 'message' => 'Queue dir not writable');
            }

            $emailData = array(
                'to' => $toEmail,
                'toName' => $toName,
                'subject' => $subject,
                'body' => $htmlBody,
                'from' => $this->fromEmail,
                'attachment' => $attachmentPath ? basename($attachmentPath) : null,
                'timestamp' => date('Y-m-d H:i:s')
            );

            $filename = $queueDir . time() . '_' . md5($toEmail) . '.json';
            file_put_contents($filename, json_encode($emailData));

            return array('success' => true, 'message' => 'Email queued for processing');

        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }

    /**
     * Sanitize headers
     */
    private function sanitizeHeader($header) {
        return str_replace(array("\r", "\n"), '', $header);
    }

    /**
     * Send contact confirmation
     */
    public function sendContactConfirmation($userEmail, $userName) {
        $htmlBody = <<<EOD
<html>
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: 'Jost', sans-serif; color: #333; line-height: 1.6; }
    .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
    .header { background-color: #0066cc; color: white; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; }
    .content { padding: 20px; background-color: #ffffff; }
    .footer { background-color: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; text-align: center; font-size: 12px; color: #666; border-top: 1px solid #ddd; }
    .highlight { color: #0066cc; font-weight: bold; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Z-Connect</h1>
      <p>Thank You for Reaching Out!</p>
    </div>
    <div class="content">
      <p>Dear $userName,</p>
      <p>Thank you for contacting <span class="highlight">Z-Connect</span>! We have successfully received your message.</p>
      <p>Our team will review your inquiry and get back to you within <span class="highlight">24-48 hours</span>.</p>
      <p><strong>Questions?</strong><br>📞 +63 (0)2 8403 0774<br>📧 web-sales@zconnect.ph</p>
    </div>
    <div class="footer">
      <p>© 2024 Z-Connect</p>
    </div>
  </div>
</body>
</html>
EOD;
        return $this->send($userEmail, $userName, 'Thank You for Contacting Z-Connect', $htmlBody);
    }

    /**
     * Send application confirmation
     */
    public function sendApplicationConfirmation($userEmail, $userName, $position) {
        $htmlBody = <<<EOD
<html>
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: 'Jost', sans-serif; color: #333; line-height: 1.6; }
    .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
    .header { background-color: #28a745; color: white; padding: 20px; border-radius: 8px 8px 0 0; text-align: center; }
    .content { padding: 20px; background-color: #ffffff; }
    .footer { background-color: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; text-align: center; font-size: 12px; color: #666; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Z-Connect</h1>
      <p>Thank You for Applying!</p>
    </div>
    <div class="content">
      <p>Dear $userName,</p>
      <p>Thank you for applying for the <span style="color: #28a745; font-weight: bold;">$position</span> position!</p>
      <p>We have received your application and resume. Our HR team will review and contact you within the next week.</p>
      <p><strong>Questions?</strong><br>📞 +63 (0)2 8403 0774<br>📧 web-sales@zconnect.ph</p>
    </div>
    <div class="footer">
      <p>© 2024 Z-Connect</p>
    </div>
  </div>
</body>
</html>
EOD;
        return $this->send($userEmail, $userName, 'Application Received - ' . $position, $htmlBody);
    }
}
?>
