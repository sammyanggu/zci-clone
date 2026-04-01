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
    body { font-family: Arial, sans-serif; color: #333; }
    .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
    .header { background-color: #007bff; color: white; padding: 20px; border-radius: 8px 8px 0 0; }
    .content { padding: 20px; }
    .field { margin-bottom: 15px; }
    .label { font-weight: bold; color: #007bff; }
    .footer { background-color: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; text-align: center; font-size: 12px; color: #666; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>New Contact Form Submission</h2>
    </div>
    <div class="content">
      <div class="field">
        <span class="label">Name:</span> $name
      </div>
      <div class="field">
        <span class="label">Email:</span> <a href="mailto:$email">$email</a>
      </div>
      <div class="field">
        <span class="label">Subject:</span> $subject
      </div>
      <div class="field">
        <span class="label">Message:</span>
        <p>$message</p>
      </div>
    </div>
    <div class="footer">
      <p>This is an automated email from Z-Connect contact form.</p>
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

                // Send to admin
                $adminResult = $emailHelper->send(
                    ADMIN_EMAIL,
                    ADMIN_NAME,
                    '[Z-Connect] New Contact: ' . $subject,
                    $adminHtmlBody
                );

                if ($adminResult['success']) {
                    // Send confirmation email to user
                    $confirmResult = $emailHelper->sendContactConfirmation($email, $name);
                    
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


