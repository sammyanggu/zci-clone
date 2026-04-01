<?php
/**
 * Email Helper Class for sending emails via Gmail SMTP
 * Uses direct socket connection to Gmail SMTP server with proper authentication
 */

class EmailHelper {
    private $host;
    private $port;
    private $secure;
    private $email;
    private $password;
    private $fromEmail;
    private $fromName;
    private $socket;

    public function __construct($host, $port, $secure, $email, $password, $fromEmail, $fromName) {
        $this->host = $host;
        $this->port = $port;
        $this->secure = $secure;
        $this->email = $email;
        $this->password = $password;
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
        $this->socket = null;
    }

    /**
     * Send email via Gmail SMTP with proper authentication
     */
    public function send($toEmail, $toName, $subject, $htmlBody, $textBody = '') {
        try {
            // Connect to Gmail SMTP
            if (!$this->connect()) {
                return array(
                    'success' => false,
                    'message' => 'Failed to connect to Gmail SMTP server.'
                );
            }

            // Prepare email
            $this->sendCommand('AUTH LOGIN');
            if (!$this->getResponse('334')) {
                $this->disconnect();
                return array(
                    'success' => false,
                    'message' => 'Failed to authenticate with Gmail.'
                );
            }

            // Send base64 encoded email
            $this->sendCommand(base64_encode($this->email));
            if (!$this->getResponse('334')) {
                $this->disconnect();
                return array(
                    'success' => false,
                    'message' => 'Failed to provide email address.'
                );
            }

            // Send base64 encoded password
            $this->sendCommand(base64_encode($this->password));
            if (!$this->getResponse('235')) {
                $this->disconnect();
                return array(
                    'success' => false,
                    'message' => 'Authentication failed. Check your Gmail credentials and app password.'
                );
            }

            // Send FROM
            $this->sendCommand('MAIL FROM:<' . $this->fromEmail . '>');
            if (!$this->getResponse('250')) {
                $this->disconnect();
                return array(
                    'success' => false,
                    'message' => 'Failed to set sender email.'
                );
            }

            // Send TO
            $this->sendCommand('RCPT TO:<' . $toEmail . '>');
            if (!$this->getResponse('250')) {
                $this->disconnect();
                return array(
                    'success' => false,
                    'message' => 'Failed to set recipient email: ' . $toEmail
                );
            }

            // Send DATA
            $this->sendCommand('DATA');
            if (!$this->getResponse('354')) {
                $this->disconnect();
                return array(
                    'success' => false,
                    'message' => 'Failed to send email data.'
                );
            }

            // Prepare email headers and body
            $headers = "From: " . $this->sanitizeHeader($this->fromName) . " <" . $this->fromEmail . ">\r\n";
            $headers .= "To: " . $toName . " <" . $toEmail . ">\r\n";
            $headers .= "Subject: " . $this->sanitizeHeader($subject) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $headers .= "Content-Transfer-Encoding: 8bit\r\n";
            $headers .= "Reply-To: " . $this->fromEmail . "\r\n";
            $headers .= "Date: " . date('r') . "\r\n";

            $message = $headers . "\r\n" . $htmlBody;

            // Send email body (escape dots)
            $message = str_replace("\r\n.", "\r\n..", $message);
            $this->sendCommand($message . "\r\n.");

            if (!$this->getResponse('250')) {
                $this->disconnect();
                return array(
                    'success' => false,
                    'message' => 'Failed to send email message.'
                );
            }

            // Send QUIT
            $this->sendCommand('QUIT');
            $this->disconnect();

            return array(
                'success' => true,
                'message' => 'Email sent successfully!'
            );

        } catch (Exception $e) {
            $this->disconnect();
            return array(
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            );
        }
    }

    /**
     * Connect to Gmail SMTP server
     */
    private function connect() {
        try {
            $this->socket = @fsockopen('tls://' . $this->host, $this->port, $errno, $errstr, 30);
            
            if (!$this->socket) {
                return false;
            }

            if (!$this->getResponse('220')) {
                return false;
            }

            // Send EHLO
            $this->sendCommand('EHLO localhost');
            if (!$this->getResponse('250')) {
                return false;
            }

            // Start TLS
            $this->sendCommand('STARTTLS');
            if (!$this->getResponse('220')) {
                return false;
            }

            // Enable crypto for TLS
            stream_context_set_option($this->socket, 'ssl', 'allow_self_signed', true);
            stream_context_set_option($this->socket, 'ssl', 'verify_peer', false);
            
            if (!@stream_socket_enable_crypto($this->socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
                return false;
            }

            // Send EHLO again after TLS
            $this->sendCommand('EHLO localhost');
            if (!$this->getResponse('250')) {
                return false;
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Send SMTP command
     */
    private function sendCommand($command) {
        if ($this->socket) {
            fwrite($this->socket, $command . "\r\n");
        }
    }

    /**
     * Get SMTP response
     */
    private function getResponse($expectedCode = '') {
        if (!$this->socket) {
            return false;
        }

        $response = '';
        while ($line = fgets($this->socket, 515)) {
            $response .= $line;
            if (substr($line, 3, 1) === ' ') {
                break;
            }
        }

        if (empty($expectedCode)) {
            return true;
        }

        return (strpos($response, $expectedCode) === 0);
    }

    /**
     * Disconnect from SMTP
     */
    private function disconnect() {
        if ($this->socket) {
            @fclose($this->socket);
            $this->socket = null;
        }
    }

    /**
     * Sanitize email headers to prevent injection
     */
    private function sanitizeHeader($header) {
        return str_replace(array("\r", "\n"), '', $header);
    }

    /**
     * Send contact form confirmation email to user
     */
    public function sendContactConfirmation($userEmail, $userName) {
        $subject = "Thank You for Contacting Z-Connect";
        
        $htmlBody = <<<EOD
<html>
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: 'Jost', sans-serif;
      color: #333;
      line-height: 1.6;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }
    .header {
      background-color: #0066cc;
      color: white;
      padding: 20px;
      border-radius: 8px 8px 0 0;
      text-align: center;
    }
    .content {
      padding: 20px;
      background-color: #ffffff;
    }
    .footer {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 0 0 8px 8px;
      text-align: center;
      font-size: 12px;
      color: #666;
      border-top: 1px solid #ddd;
    }
    .highlight {
      color: #0066cc;
      font-weight: bold;
    }
    p {
      margin: 10px 0;
    }
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
      <p>Thank you for contacting <span class="highlight">Z-Connect</span>! We have successfully received your message and truly appreciate you taking the time to reach out to us.</p>
      <p>Our dedicated team will carefully review your inquiry and get back to you as soon as possible, typically within <span class="highlight">24-48 hours</span>.</p>
      <p><strong>In the meantime, if you have any urgent questions:</strong></p>
      <p style="margin-left: 20px;">
        📞 Phone: +63 (0)2 8403 0774<br>
        📧 Email: web-sales@zconnect.ph
      </p>
      <p>We look forward to working with you!</p>
      <p style="margin-top: 30px;">
        Best regards,<br>
        <strong>Z-Connect Team</strong>
      </p>
    </div>
    <div class="footer">
      <p>© 2024 Z-Connect Inc. - Connecting Solutions</p>
      <p><a href="https://zconnect.ph" style="color: #0066cc; text-decoration: none;">https://zconnect.ph</a></p>
    </div>
  </div>
</body>
</html>
EOD;

        return $this->send($userEmail, $userName, $subject, $htmlBody);
    }

    /**
     * Send application confirmation email to user
     */
    public function sendApplicationConfirmation($userEmail, $userName, $position) {
        $subject = "Application Received - Z-Connect";
        
        $htmlBody = <<<EOD
<html>
<head>
  <meta charset="UTF-8">
  <style>
    body {
      font-family: 'Jost', sans-serif;
      color: #333;
      line-height: 1.6;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 8px;
    }
    .header {
      background-color: #28a745;
      color: white;
      padding: 20px;
      border-radius: 8px 8px 0 0;
      text-align: center;
    }
    .content {
      padding: 20px;
      background-color: #ffffff;
    }
    .footer {
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 0 0 8px 8px;
      text-align: center;
      font-size: 12px;
      color: #666;
      border-top: 1px solid #ddd;
    }
    .highlight {
      color: #28a745;
      font-weight: bold;
    }
    .step {
      margin: 15px 0;
      padding-left: 20px;
      border-left: 3px solid #28a745;
    }
    .step strong {
      color: #28a745;
    }
    p {
      margin: 10px 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>✓ Application Received!</h1>
      <p>Thank You for Your Interest in Z-Connect</p>
    </div>
    <div class="content">
      <p>Dear $userName,</p>
      <p>Thank you for applying for the <span class="highlight">$position</span> position at Z-Connect!</p>
      <p>We have successfully received your application and resume. Our recruitment team will carefully review your qualifications and experience.</p>
      
      <h3 style="color: #28a745; margin-top: 25px;">What Happens Next:</h3>
      
      <div class="step">
        <strong>📋 Initial Screening (3-5 business days)</strong>
        <p>Our HR team will review all applications and shortlist qualified candidates.</p>
      </div>
      
      <div class="step">
        <strong>💻 Technical Assessment</strong>
        <p>Selected candidates will be invited to complete a technical assessment relevant to the position.</p>
      </div>
      
      <div class="step">
        <strong>🤝 Interviews</strong>
        <p>Top candidates will be scheduled for interviews with our hiring team.</p>
      </div>
      
      <div class="step">
        <strong>✅ Offer & Onboarding</strong>
        <p>Successful candidates will receive an offer and begin their journey with Z-Connect.</p>
      </div>
      
      <p style="margin-top: 25px;">If you have any questions about your application status, please don't hesitate to contact us:</p>
      <p style="margin-left: 20px;">
        📞 Phone: +63 (0)2 8403 0774<br>
        📧 Email: web-sales@zconnect.ph
      </p>
      
      <p style="margin-top: 25px;">
        Best regards,<br>
        <strong>Z-Connect Recruitment Team</strong>
      </p>
    </div>
    <div class="footer">
      <p>© 2024 Z-Connect Inc. - Connecting Solutions</p>
      <p><a href="https://zconnect.ph" style="color: #28a745; text-decoration: none;">https://zconnect.ph</a></p>
    </div>
  </div>
</body>
</html>
EOD;

        return $this->send($userEmail, $userName, $subject, $htmlBody);
    }
}
?>

