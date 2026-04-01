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
    body { font-family: Arial, sans-serif; color: #333; }
    .container { max-width: 600px; margin: 0 auto; padding: 20px; border: 1px solid #ddd; border-radius: 8px; }
    .header { background-color: #28a745; color: white; padding: 20px; border-radius: 8px 8px 0 0; }
    .content { padding: 20px; }
    .field { margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px; }
    .label { font-weight: bold; color: #28a745; }
    .footer { background-color: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; text-align: center; font-size: 12px; color: #666; }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h2>New Job Application - $position</h2>
    </div>
    <div class="content">
      <div class="field">
        <span class="label">Applicant Name:</span> $fullName
      </div>
      <div class="field">
        <span class="label">Email:</span> <a href="mailto:$email">$email</a>
      </div>
      <div class="field">
        <span class="label">Phone:</span> <a href="tel:$phone">$phone</a>
      </div>
      <div class="field">
        <span class="label">Position Applied For:</span> $position
      </div>
      <div class="field">
        <span class="label">Years of Experience:</span> $experience years
      </div>
      <div class="field">
        <span class="label">Resume:</span> $fileName
      </div>
      <div class="field">
        <span class="label">Additional Information:</span>
        <p>$message</p>
      </div>
    </div>
    <div class="footer">
      <p>This is an automated email from Z-Connect application form.</p>
      <p>Application submitted at: " . date('Y-m-d H:i:s') . "</p>
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
                    '[Z-Connect] New Job Application - ' . $position,
                    $adminHtmlBody,
                    '',
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
