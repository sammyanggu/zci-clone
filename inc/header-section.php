    <header class="page-header inner-page-header header-basic" id="page-header">
      
      <!-- Begin search Box (popup) -->
      <!-- Note that the button which calls this popup is commented out, so this box will never appear. -->
      <div class="header-search-box">
        <div class="close-search"></div>
        <form class="nav-search search-form" role="search" method="get" action="#">
          <div class="search-wrapper"> 
            <label class="search-lbl">Search for:</label>
            <input class="search-input" type="search" placeholder="Search..." name="searchInput" autofocus="autofocus"/>
            <button class="search-btn" type="submit"><i class="bi bi-search icon"></i></button>
          </div>
        </form>
      </div>
      <!-- End search Box (popup) -->
      
      <!-- Begin Main Menu -->
      <div class="container">
        <nav class="menu-navbar">
          <div class="header-logo"><a class="logo-link" href="https://zconnect.ph"><img class="logo-img light-logo" loading="lazy" src="assets/images-zconnect/logo/z-connect-circle-logo.png" alt="Z-Connect logo"/><img class="logo-img dark-logo" loading="lazy" src="assets/images-zconnect/logo/z-connect-circle-logo.png" alt="logo"/></a></div>
          <div class="links menu-wrapper">
            <ul class="list-js links-list">
              <li class="menu-item has-sub-menu"><a class="menu-link<?php
              // Get the current page name
              $current_page = basename($_SERVER['PHP_SELF']);
              
              if ($current_page == 'index.php') {
                  echo " active";
              };
              ?>" href="index.php">home<i class="fas"> </i></a>
              </li>
              <li class="menu-item has-sub-menu"><a class="menu-link<?php
              // Get the current page name
              $current_page = basename($_SERVER['PHP_SELF']);
              
              if ($current_page == 'services.php') {
                  echo " active";
              }
              ?>" href="services.php">services<i class="fas"> </i></a>
              </li>
              <li class="menu-item menu-group has-sub-menu"><a class="menu-link<?php
              // Get the current page name
              $current_page = basename($_SERVER['PHP_SELF']);
              
              if ($current_page == 'about-us.php') {
                  echo " active";
              }
              ?>" href="about-us.php">about us</a><a class="menu-link dropdown-arrow" href="#"><i class="fas fa-chevron-down"></i></a>
                <ul class="sub-menu">
                  <li><a href="events.php">Events</a></li>
                  <li><a href="awards.php">Awards</a></li>
                </ul>
              </li>
              <li class="menu-item menu-group has-sub-menu"><a class="menu-link<?php
              // Get the current page name
              $current_page = basename($_SERVER['PHP_SELF']);
              
              if ($current_page == 'contact-us.php') {
                  echo " active";
              }
              ?>" href="contact-us.php">contact us</a><a class="menu-link dropdown-arrow" href="#"><i class="fas fa-chevron-down"></i></a>
                <ul class="sub-menu">
                  <li><a href="index.php#apply-now">Apply Now</a></li>
                </ul>
              </li>
            </ul>
          </div>
          <!-- End Main Menu -->
          
          <!-- Begin Controls Box -->
          <div class="controls-box">
          
            <!-- Begin Menu Toggle button (shown only on mobile) -->
            <div class="control menu-toggler"><span></span><span></span><span></span></div>
            <!-- End Menu Toggle button (shown only on mobile) -->
            
            <!-- Begin search icon button -->
            <!-- <div class="control header-search-btn"><i class="bi bi-search icon"></i></div> -->
            <!-- End search icon button -->
            
          </div>
          <!-- End Controls Box -->
          
        </nav>
      </div>
    </header>