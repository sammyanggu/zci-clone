<?php
header('Content-Type: application/json');

// Load configuration and email helper
require_once 'config.php';
require_once 'EmailHelper_Alternative.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Variables
    $name = trim($_POST['UserName'] ?? '');
    $email = trim($_POST['UserEmail'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Email address validation
    function is_email_valid($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $response = array(
            'success' => false,
            'message' => 'All fields are required.'
        );
    } elseif (!is_email_valid($email)) {
        $response = array(
            'success' => false,
            'message' => 'Invalid email address.'
        );
    } else {
        // Avoid Email Injection and Mail Form Script Hijacking
        $pattern = "/(content-type|bcc:|cc:|to:)/i";
        if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $message)) {
            $response = array(
                'success' => false,
                'message' => 'Invalid input detected.'
            );
        } else {
            try {
                // Prepare email to admin
                $adminHtmlBody = <<<EOD
<html>
<head>
  <style>
    body { font-family: 'Jost', Arial, sans-serif; color: #333; background-color: #f5f5f5; margin: 0; padding: 20px; }
    .container { max-width: 600px; margin: 0 auto; background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .logo-section { background-color: #f9f9f9; padding: 30px 20px; text-align: center; border-bottom: none; }
    .logo-section img { max-width: 150px; height: auto; border-radius: 50%; }
    .title-section { background-color: white; padding: 20px; text-align: center; border-bottom: 2px solid #007bff; }
    .content { padding: 30px 20px; }
    .field { margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
    .field:last-of-type { border-bottom: none; margin-bottom: 0; }
    .label { font-weight: 700; color: #007bff; display: block; margin-bottom: 5px; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; }
    .value { color: #333; font-size: 14px; line-height: 1.6; white-space: pre-wrap; word-wrap: break-word; }
    .value a { color: #007bff; text-decoration: none; }
    .value a:hover { text-decoration: underline; }
    .footer { background-color: #f9f9f9; padding: 20px; border-top: 1px solid #eee; text-align: center; font-size: 12px; color: #666; }
    .footer p { margin: 5px 0; }
  </style>
</head>
<body>
  <div class="container">
    <div class="logo-section" style="pointer-events: none !important;">
      <img src="cid:z_connect_logo" alt="Z-Connect Logo" role="img" aria-label="Z-Connect Logo" style="border: 0 !important; display: block !important; margin: 0 auto !important; padding: 0 !important; pointer-events: none !important; user-select: none !important; -webkit-user-select: none !important; -moz-user-select: none !important; ms-user-select: none !important; outline: none !important; cursor: default !important; max-width: 150px !important; height: auto !important; -webkit-touch-callout: none !important; -webkit-user-drag: none !important; position: relative !important; z-index: 0 !important;" onmousedown="return false" oncontextmenu="return false" />
    </div>
    <div class="title-section">
      <h3 style="margin: 0; color: #007bff; font-size: 24px; font-weight: 700; text-align: center;">New Contact Form Submission</h3>
    </div>
    <div class="content">
      <div class="field">
        <span class="label">Name</span>
        <div class="value">$name</div>
      </div>
      <div class="field">
        <span class="label">Email Address</span>
        <div class="value"><a href="mailto:$email">$email</a></div>
      </div>
      <div class="field">
        <span class="label">Subject</span>
        <div class="value">$subject</div>
      </div>
      <div class="field">
        <span class="label">Message</span>
        <div class="value">$message</div>
      </div>
    </div>
    <div class="footer">
      <p><strong>Message Submission Details</strong></p>
      <p>Submitted on: " . date('F j, Y \\a\\t g:i A') . "</p>
      <p style="color: #999; font-size: 11px; margin-top: 15px;">This is an automated email from Z-Connect contact form.</p>
    </div>
  </div>
</body>
</html>
EOD;

                // Initialize email helper (Alternative version for XAMPP compatibility)
                $emailHelper = new EmailHelperAlternative(
                    SMTP_HOST,
                    SMTP_PORT,
                    SMTP_SECURE,
                    GMAIL_EMAIL,
                    GMAIL_APP_PASSWORD,
                    GMAIL_EMAIL,
                    ADMIN_NAME
                );

                // Send to admin with inline logo image
                $logoPath = '../assets/images-zconnect/logo/z-connect-circle-logo.png';
                $adminResult = $emailHelper->sendWithInlineImage(
                    ADMIN_EMAIL,
                    ADMIN_NAME,
                    '[Z-Connect] New Contact: ' . $subject,
                    $adminHtmlBody,
                    $logoPath,
                    'z_connect_logo'
                );

                if ($adminResult['success']) {
                    // Send confirmation email to user with logo
                    $logoPath = '../assets/images-zconnect/logo/z-connect-circle-logo.png';
                    $confirmResult = $emailHelper->sendContactConfirmation($email, $name, $logoPath);
                    
                    $response = array(
                        'success' => true,
                        'message' => 'Thank you! Your message has been sent. You will receive a confirmation email shortly.'
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'message' => 'Server error: ' . $adminResult['message']
                    );
                }
            } catch (Exception $e) {
                $response = array(
                    'success' => false,
                    'message' => 'Error: ' . $e->getMessage()
                );
            }
        }
    }
} else {
    $response = array(
        'success' => false,
        'message' => 'Invalid request method.'
    );
}

echo json_encode($response);
?>



