<!DOCTYPE html>
<html lang="en-PH">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Z-Connect - Application Form">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- fav icon -->
        <link rel="icon" href="assets/images/fav-icon/fav-icon.png">
        
        <!-- bootstarp -->
        <link rel="stylesheet" href="css/vendors/bootstrap.min.css">
        
        <!-- animate.css file -->
        <link rel="stylesheet" href="css/vendors/animate.css">
        
        <!-- flaticon -->
        <link rel="stylesheet" href="css/vendors/flaticon/flaticon.css">
        
        <!-- fontAwesome -->
        <link rel="stylesheet" href="css/vendors/all.min.css">
        
        <!-- bootstrap icons -->
        <link rel="stylesheet" href="css/vendors/bootstrap-icons-1.9.1/bootstrap-icons.css">
        
        <!-- fonts site preconnect -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <!-- fonts site preconnect -->
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <!-- Font Family -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;display=swap">
        
        <!-- main-LTR -->
        <link rel="stylesheet" href="css/main-LTR.css">
        <title>Application Form - Z-Connect</title>
  </head>
  <body>
  
    <!--Start Page Header-->
    <?php include('inc/header-section.php');?>
    <!--End Page Header-->
    
    <!-- Start Application Section -->
    <section class="page-application" style="padding: 85px 0 80px 0;">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <div class="application-form-wrapper">
              <h1 class="section-title text-center mb-5">Join Our Team</h1>
              
              <form id="applicationForm" action="php/submit-application.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                
                <div class="row">
                  <div class="col-12 col-lg-6">
                    <div class="form-group mb-3">
                      <label for="fullName" class="form-label">Full Name <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="fullName" name="fullName" required>
                      <small class="text-danger d-none" id="fullNameError">Please enter a valid full name</small>
                    </div>
                  </div>

                  <div class="col-12 col-lg-6">
                    <div class="form-group mb-3">
                      <label for="email" class="form-label">Email Address <span style="color: red;">*</span></label>
                      <input type="email" class="form-control" id="email" name="email" required>
                      <small class="text-danger d-none" id="emailError">Please enter a valid email address</small>
                    </div>
                  </div>

                  <div class="col-12 col-lg-6">
                    <div class="form-group mb-3">
                      <label for="phone" class="form-label">Phone Number <span style="color: red;">*</span></label>
                      <input type="tel" class="form-control" id="phone" name="phone" required>
                      <small class="text-danger d-none" id="phoneError">Please enter a valid phone number</small>
                    </div>
                  </div>

                  <div class="col-12 col-lg-6">
                    <div class="form-group mb-3">
                      <label for="position" class="form-label">Position Applying For <span style="color: red;">*</span></label>
                      <select class="form-control" id="position" name="position" required>
                        <option value="">Select a position</option>
                        <option value="IT Solutions">IT Solutions</option>
                        <option value="Structured Cabling">Structured Cabling</option>
                        <option value="Building Automation">Building Automation</option>
                        <option value="Network Support">Network Support</option>
                        <option value="Other">Other</option>
                      </select>
                      <small class="text-danger d-none" id="positionError">Please select a position</small>
                    </div>
                  </div>

                  <div class="col-12 col-lg-6">
                    <div class="form-group mb-3">
                      <label for="experience" class="form-label">Years of Experience <span style="color: red;">*</span></label>
                      <input type="number" class="form-control" id="experience" name="experience" min="0" required>
                      <small class="text-danger d-none" id="experienceError">Please enter a valid number</small>
                    </div>
                  </div>

                  <div class="col-12 col-lg-6">
                    <div class="form-group mb-3">
                      <label for="resume" class="form-label">Upload Resume (PDF) <span style="color: red;">*</span></label>
                      <input type="file" class="form-control" id="resume" name="resume" accept=".pdf" required>
                      <small class="text-danger d-none" id="resumeError">Please upload a PDF file</small>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group mb-3">
                      <label for="message" class="form-label">Additional Information</label>
                      <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group mb-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agreeTerms" name="agreeTerms" required>
                        <label class="form-check-label" for="agreeTerms">
                          I agree to the terms and conditions <span style="color: red;">*</span>
                        </label>
                      </div>
                      <small class="text-danger d-none" id="termsError">You must agree to the terms and conditions</small>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="d-grid gap-2">
                      <button type="submit" class="btn btn-solid cta-link-primary" style="padding: 0.75rem 1.5rem; width: fit-content;">Submit</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Application Section -->

    <!-- Start Footer-->
    <?php include('inc/footer-section.php');?>
    <!-- End Footer-->
    
    <!-- jquery -->
    <script src="js/vendors/jquery-3.6.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="js/vendors/bootstrap.bundle.min.js"></script>

    <!-- Application Form Validation and Submission -->
    <script>
      const form = document.getElementById('applicationForm');
      
      function validateForm() {
        // Reset all error messages
        document.getElementById('fullNameError').classList.add('d-none');
        document.getElementById('emailError').classList.add('d-none');
        document.getElementById('phoneError').classList.add('d-none');
        document.getElementById('positionError').classList.add('d-none');
        document.getElementById('experienceError').classList.add('d-none');
        document.getElementById('resumeError').classList.add('d-none');
        document.getElementById('termsError').classList.add('d-none');

        let isValid = true;

        // Validate Full Name
        const fullName = document.getElementById('fullName').value.trim();
        if (fullName.length < 3) {
          document.getElementById('fullNameError').classList.remove('d-none');
          isValid = false;
        }

        // Validate Email
        const email = document.getElementById('email').value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
          document.getElementById('emailError').classList.remove('d-none');
          isValid = false;
        }

        // Validate Phone
        const phone = document.getElementById('phone').value.trim();
        const phoneRegex = /^[0-9\-\+\(\)\s]+$/;
        if (phone.length < 7 || !phoneRegex.test(phone)) {
          document.getElementById('phoneError').classList.remove('d-none');
          isValid = false;
        }

        // Validate Position
        const position = document.getElementById('position').value;
        if (position === '') {
          document.getElementById('positionError').classList.remove('d-none');
          isValid = false;
        }

        // Validate Experience
        const experience = document.getElementById('experience').value;
        if (experience === '' || experience < 0) {
          document.getElementById('experienceError').classList.remove('d-none');
          isValid = false;
        }

        // Validate Resume
        const resume = document.getElementById('resume').files;
        if (resume.length === 0) {
          document.getElementById('resumeError').classList.remove('d-none');
          isValid = false;
        } else {
          const resumeFile = resume[0];
          if (resumeFile.type !== 'application/pdf') {
            document.getElementById('resumeError').classList.remove('d-none');
            isValid = false;
          }
          // Check file size (max 5MB)
          if (resumeFile.size > 5 * 1024 * 1024) {
            document.getElementById('resumeError').textContent = 'Resume file must be less than 5MB';
            document.getElementById('resumeError').classList.remove('d-none');
            isValid = false;
          }
        }

        // Validate Terms
        const agreeTerms = document.getElementById('agreeTerms').checked;
        if (!agreeTerms) {
          document.getElementById('termsError').classList.remove('d-none');
          isValid = false;
        }

        return isValid;
      }

      // Handle form submission
      form.addEventListener('submit', function(e) {
        e.preventDefault();

        if (!validateForm()) {
          return false;
        }

        // Show loading state
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';

        // Create FormData for file upload
        const formData = new FormData(form);

        // Submit via AJAX
        fetch(form.getAttribute('action'), {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          // Reset button state
          submitBtn.disabled = false;
          submitBtn.textContent = originalText;

          // Create/show success or error message
          let messageDiv = document.getElementById('formMessage');
          if (!messageDiv) {
            messageDiv = document.createElement('div');
            messageDiv.id = 'formMessage';
            messageDiv.style.marginTop = '20px';
            messageDiv.style.padding = '15px';
            messageDiv.style.borderRadius = '5px';
            messageDiv.style.fontWeight = 'bold';
            form.parentNode.insertBefore(messageDiv, form);
          }

          if (data.success) {
            messageDiv.style.backgroundColor = '#d4edda';
            messageDiv.style.color = '#155724';
            messageDiv.style.border = '1px solid #c3e6cb';
            messageDiv.textContent = '✓ ' + data.message;
            
            // Reset form
            form.reset();
            
            // Hide message after 5 seconds
            setTimeout(() => {
              messageDiv.style.display = 'none';
            }, 5000);
          } else {
            messageDiv.style.backgroundColor = '#f8d7da';
            messageDiv.style.color = '#721c24';
            messageDiv.style.border = '1px solid #f5c6cb';
            messageDiv.textContent = '✗ ' + data.message;
          }
        })
        .catch(error => {
          // Reset button state
          submitBtn.disabled = false;
          submitBtn.textContent = originalText;

          // Show error message
          let messageDiv = document.getElementById('formMessage');
          if (!messageDiv) {
            messageDiv = document.createElement('div');
            messageDiv.id = 'formMessage';
            messageDiv.style.marginTop = '20px';
            messageDiv.style.padding = '15px';
            messageDiv.style.borderRadius = '5px';
            messageDiv.style.fontWeight = 'bold';
            form.parentNode.insertBefore(messageDiv, form);
          }

          messageDiv.style.backgroundColor = '#f8d7da';
          messageDiv.style.color = '#721c24';
          messageDiv.style.border = '1px solid #f5c6cb';
          messageDiv.textContent = '✗ Error submitting form. Please try again later.';
        });

        return false;
      });
    </script>

  </body>
</html>
