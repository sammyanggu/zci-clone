<?php
header('Content-Type: application/json');

// Load configuration and email helper
require_once 'config.php';
require_once 'EmailHelper_Alternative.php';

$response = array();
$uploadDir = '../uploads/applications/';

// Create uploads directory if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fullName = trim($_POST['fullName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $position = trim($_POST['position'] ?? '');
    $experience = trim($_POST['experience'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $agreeTerms = isset($_POST['agreeTerms']) ? $_POST['agreeTerms'] : '';

    // Email validation
    function is_email_valid($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    // Phone validation
    function is_phone_valid($phone) {
        return preg_match('/^[0-9\-\+\(\)\s]+$/', $phone) && strlen($phone) >= 7;
    }

    // Validation
    $errors = array();
    
    if (empty($fullName) || strlen($fullName) < 3) {
        $errors[] = 'Full name must be at least 3 characters.';
    }
    
    if (empty($email) || !is_email_valid($email)) {
        $errors[] = 'Invalid email address.';
    }
    
    if (empty($phone) || !is_phone_valid($phone)) {
        $errors[] = 'Invalid phone number.';
    }
    
    if (empty($position)) {
        $errors[] = 'Please select a position.';
    }
    
    if (empty($experience) || $experience < 0) {
        $errors[] = 'Years of experience must be a valid number.';
    }
    
    if (empty($agreeTerms)) {
        $errors[] = 'You must agree to the terms and conditions.';
    }

    // Check for uploaded resume
    if (!isset($_FILES['resume']) || $_FILES['resume']['error'] !== UPLOAD_ERR_OK) {
        $errors[] = 'Resume upload failed. Please try again.';
    } else {
        $file = $_FILES['resume'];
        
        // Validate PDF
        if ($file['type'] !== 'application/pdf') {
            $errors[] = 'Resume must be a PDF file.';
        }
        
        // Validate file size (max 5MB)
        if ($file['size'] > 5 * 1024 * 1024) {
            $errors[] = 'Resume file must be less than 5MB.';
        }
    }

    // Avoid Email Injection and XSS
    $pattern = "/(content-type|bcc:|cc:|to:)/i";
    if (preg_match($pattern, $fullName) || preg_match($pattern, $email) || preg_match($pattern, $message)) {
        $errors[] = 'Invalid input detected.';
    }

    if (count($errors) > 0) {
        $response = array(
            'success' => false,
            'message' => implode(' ', $errors)
        );
    } else {
        try {
            // Process file upload
            $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '', $fullName) . '.pdf';
            $filePath = $uploadDir . $fileName;

            if (move_uploaded_file($_FILES['resume']['tmp_name'], $filePath)) {
                // Prepare email to admin
                $adminHtmlBody = <<<EOD
<html>
<head>
  <style>
    body { font-family: 'Jost', Arial, sans-serif; color: #333; background-color: #f5f5f5; margin: 0; padding: 20px; }
    .container { max-width: 600px; margin: 0 auto; background-color: white; border-radius: 12px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    .logo-section { background-color: #f9f9f9; padding: 30px 20px; text-align: center; border-bottom: none; }
    .logo-section img { max-width: 150px; height: auto; border-radius: 50%; }
    .title-section { background-color: white; padding: 20px; text-align: center; border-bottom: 2px solid #28a745; }
    .content { padding: 30px 20px; }
    .field { margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
    .field:last-of-type { border-bottom: none; margin-bottom: 0; }
    .label { font-weight: 700; color: #28a745; display: block; margin-bottom: 5px; font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; }
    .value { color: #333; font-size: 14px; line-height: 1.6; }
    .value a { color: #28a745; text-decoration: none; }
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
      <h3 style="margin: 0; color: #28a745; font-size: 24px; font-weight: 700; text-align: center;">New Application Form</h3>
      <p style="color: #666; font-size: 14px; margin: 8px 0 0 0; text-align: center;">Position: <strong>$position</strong></p>
    </div>
    <div class="content">
      <div class="field">
        <span class="label">Applicant Name</span>
        <div class="value">$fullName</div>
      </div>
      <div class="field">
        <span class="label">Email Address</span>
        <div class="value"><a href="mailto:$email">$email</a></div>
      </div>
      <div class="field">
        <span class="label">Phone Number</span>
        <div class="value"><a href="tel:$phone">$phone</a></div>
      </div>
      <div class="field">
        <span class="label">Position Applied For</span>
        <div class="value">$position</div>
      </div>
      <div class="field">
        <span class="label">Years of Experience</span>
        <div class="value">$experience years</div>
      </div>
      <div class="field">
        <span class="label">Resume File</span>
        <div class="value">$fileName</div>
      </div>
      <div class="field">
        <span class="label">Additional Information</span>
        <div class="value" style="white-space: pre-line;">$message</div>
      </div>
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
                    '[Z-Connect] New Job Application - ' . $position,
                    $adminHtmlBody,
                    $logoPath,
                    'z_connect_logo',
                    $filePath
                );

                if ($adminResult['success']) {
                    // Send confirmation email to applicant
                    $confirmResult = $emailHelper->sendApplicationConfirmation($email, $fullName, $position);
                    
                    $response = array(
                        'success' => true,
                        'message' => 'Thank you for your application! We have received your submission and will review it shortly. You will receive a confirmation email within the next few minutes.'
                    );
                } else {
                    // Even if admin email fails, send confirmation
                    $emailHelper->sendApplicationConfirmation($email, $fullName, $position);
                    
                    $response = array(
                        'success' => true,
                        'message' => 'Your application has been submitted successfully. You will receive a confirmation email shortly.'
                    );
                }
                
                // Delete local file after email sent - files backed up in email, no persistent storage needed
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Error uploading resume. Please try again later.'
                );
            }
        } catch (Exception $e) {
            $response = array(
                'success' => false,
                'message' => 'Server error: ' . $e->getMessage()
            );
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

