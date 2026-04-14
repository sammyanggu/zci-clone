<!DOCTYPE html>
<html lang="en-PH">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About Z-Connect's IT Solutions">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- fav icon -->
        <link rel="icon" href="assets/images-zconnect/logo/z-connect-circle-logo.png">
        
        <!-- bootstarp -->
        <link rel="stylesheet" href="css/vendors/bootstrap.min.css">
        
        <!-- animate.css file -->
        <link rel="stylesheet" href="css/vendors/animate.css">
        
        <!-- Fancybox -->
        <link rel="stylesheet" href="css/vendors/jquery.fancybox.min.css">
        
        <!-- Swiper -->
        <link rel="stylesheet" href="css/vendors/swiper-bundle.min.css">
        
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
        <title>Z-Connect   |   About Us</title>
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
          <h1 class="hero-title wow fadeInUp" data-wow-delay=".2s">About Us</h1>
          <nav aria-label="breadcrumb">
            <ul class="breadcrumb wow fadeInUp" data-wow-delay=".6s">
              <li class="breadcrumb-item"><a class="breadcrumb-link" href="index.php"><i class="bi bi-house icon"></i>home</a></li>
              <li class="breadcrumb-item active">about us</li>
            </ul>
          </nav>
        </div>
      </div>
    </section>
    <!-- End inner Page hero-->

    <!-- Start about Section-->
    <?php include('inc/about-us-section.php');?>
    <!-- End about Section-->
    
    <!-- Start mission-values-vision Section -->
    <?php include('inc/mission-values-vision_section.php');?>
    <!-- End mission-values-vision Section -->
    
    <!-- Start  our-team Section-->
    <?php // include('inc/our-team-section.php');?>
    <!-- End  our-team Section-->

    <!-- Start  take-action Section-->
    <?php include('inc/take-action-section.php');?>
    <!-- End  take-action Section-->

    <!-- Start  page-footer Section-->
    <?php include("inc/footer-section.php");?>
    <!-- End  page-footer Section-->
    
  </body>
</html>