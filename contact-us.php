<!DOCTYPE html>
<html lang="en-PH">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Contact Z-Connect for IT Solutions">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- fav icon -->
        <link rel="icon" href="assets/images-zconnect/logo/z-connect-circle-logo.png">
        
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
        
        <!-- Font Family -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600;700;800&amp;display=swap">
        
        <!-- main-LTR -->
        <link rel="stylesheet" href="css/main-LTR.css">
        <title> Z-Connect   |   Contact Us</title>
  </head>
  <body>
    <!--Start Page Header-->
    <?php include('inc/header-section.php');?>
    <!--End Page Header-->
    <!-- Start inner Page hero-->
    <section class="d-flex align-items-center page-hero inner-page-hero" id="page-hero">
      <div class="overlay-photo-image-bg parallax" data-bg-img="assets/images/hero/inner-page-hero.jpg" data-bg-opacity="1"></div>
      <div class="overlay-color" data-bg-opacity=".75"></div>
      <div class="container">
        <div class="hero-text-area centerd">
          <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">Contact Us</h1>
          <nav aria-label="breadcrumb ">
            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
              <li class="breadcrumb-item"><a class="breadcrumb-link" href="index.php"><i class="bi bi-house icon "></i>home</a></li>
              <li class="breadcrumb-item active">contact us</li>
            </ul>
          </nav>
        </div>
      </div>
    </section>
    <!-- End inner Page hero-->

    <!-- Start contact-us -->
    <section class="contact-us mega-section pb-0" id="contact-us">
      <div class="container">
        <section class="locations-section mega-section">
          <div class="sec-heading centered">
            <div class="content-area">
              <h2 class="title wow fadeInUp" data-wow-delay=".4s">our office in Manila, Philippines</h2>
            </div>
          </div>

          <div class="contact-info-panel">
            <div class="info-section">
              <div class="row">

                  <!-- Begin left hand Div -->
                  <div class="col-12 col-lg-5 info-panel">
                    <h4 class="location-title">Las Piñas</h4>
                    <div class="line-on-side"></div>
                    <p class="location-address">Block 32 Lot 2 Jasmin Street,<br>T.S. Cruz Subdivision,<br>Almanza II,<br>Las Piñas City, 1751<br>Philippines.</p>
                    <div class="location-card"><i class="flaticon-email icon"></i>
                      <div class="card-content">
                        <h6 class="content-title">email:</h6><div class="email"></div>
                      </div>
                    </div>
                    <div class="location-card"><i class="flaticon-phone-call icon"></i>
                      <div class="card-content">
                        <h6 class="content-title">phone:</h6><a class="tel link" href="0063284030774">+63 (0)2 8403 0774</a>
                      </div>
                    </div>
                  </div>
                  <!-- End left hand Div -->
                  
                  <!-- Begin right hand Div -->
                  <div class="map-box col-12 col-lg-7 info-panel-map-side">
                    <h4 class="location-title">Find us on Google Maps</h4>
                    <div class="line-on-side"></div>
                    <div class="mapouter">
                        <iframe class="map-iframe" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d483.01047062100656!2d121.0210498!3d14.4223346!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d1863618e9ed%3A0xb41765a28c683954!2sZ-Connect%20Inc.!5e0!3m2!1sen!2sph!4v1738547926601!5m2!1sen!2sph" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                    </div>
                  </div>
                  <!-- End right hand Div -->

              </div>
            </div>
          </section>
        

        <section class="contact-us-form-section mega-section">
          <div class="row">
            <div class="col-12">
              <div class="contact-form-panel">
                <div class="sec-heading centered">
                  <div class="content-area">
                    <h2 class="title wow fadeInUp" data-wow-delay=".4s">Have any questions? Let's answer them</h2>
                  </div>
                </div>
                <div class="contact-form-inputs wow fadeInUp" data-wow-delay=".6s">
                  <div class="custom-form-area input-boxed"> 
                    <!--Form To have user messages-->
                    <form class="main-form" id="contact-us-form" action="php/send-mail.php" method="post"><span class="done-msg"></span>
                      <div class="row">
                        <div class="col-12 col-lg-6">
                          <div class="input-wrapper">
                            <input class="text-input" id="user-name" name="UserName" type="text"/>
                            <label class="input-label" for="user-name">Name<span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 col-lg-6">
                          <div class="input-wrapper">
                            <input class="text-input" id="user-email" name="UserEmail" type="email"/>
                            <label class="input-label" for="user-email">E-mail<span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="input-wrapper">
                            <input class="text-input" id="msg-subject" name="subject" type="text"/>
                            <label class="input-label" for="msg-subject">Subject<span class="req">*</span></label><span class="b-border"></span><span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 ">
                          <div class="input-wrapper">
                            <textarea class=" text-input" id="msg-text" name="message"></textarea>
                            <label class="input-label" for="msg-text">your message <span class="req">*</span></label><span class="b-border"></span><i></i><span class="error-msg"></span>
                          </div>
                        </div>
                        <div class="col-12 submit-wrapper">
                          <button class="btn-solid" id="submit-btn" type="submit" name="UserSubmit">Send your message</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>
    <!-- End contact-us -->

    <!-- Contact Form Modal Popup -->
    <style>
      .modal-backdrop-contact {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1040;
      }
      
      .modal-backdrop-contact.show {
        display: block;
      }
      
      .modal-content-popup-contact {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.3);
        z-index: 1050;
        max-width: 500px;
        width: 90%;
        text-align: center;
      }
      
      .modal-content-popup-contact.show {
        display: block;
      }
      
      .modal-content-popup-contact h2 {
        color: #28a745;
        font-size: 24px;
        margin-bottom: 15px;
        margin-top: 0;
      }
      
      .modal-content-popup-contact p {
        color: #333;
        font-size: 16px;
        margin-bottom: 20px;
        line-height: 1.5;
      }
      
      .modal-content-popup-contact .check-icon {
        font-size: 60px;
        color: #28a745;
        margin-bottom: 20px;
      }
      
      .modal-close-btn-contact {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
      }
      
      .modal-close-btn-contact:hover {
        background-color: #1e7e34;
      }
    </style>

    <script>
      // Initialize modal elements for contact form
      const contactModal = document.createElement('div');
      contactModal.className = 'modal-backdrop-contact';
      document.body.appendChild(contactModal);
      
      const contactModalContent = document.createElement('div');
      contactModalContent.className = 'modal-content-popup-contact';
      contactModalContent.innerHTML = `
        <div class="check-icon">✓</div>
        <h2>Message Sent Successfully!</h2>
        <p>Thank you for reaching out to us!<br><br>A confirmation email has been sent to your email address. Our team will review your message and get back to you shortly.</p>
        <button class="modal-close-btn-contact" onclick="location.reload()">Close</button>
      `;
      document.body.appendChild(contactModalContent);
      
      // Window function to show contact modal (called by jQuery in main.js)
      window.showContactModalPopup = function() {
        contactModal.classList.add('show');
        contactModalContent.classList.add('show');
      };
    </script>

    <!-- Start  page-footer Section-->
    <?php include("inc/footer-section.php");?>
    <!-- End  page-footer Section-->
    
  </body>
</html>