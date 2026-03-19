    <section class="about mega-section" id="about">
      <div class="container">
        <!-- Start first about div-->
        <div class="content-block">
          <div class="row">
            <div class="col-12 col-lg-6 d-flex align-items-center order-1 order-lg-0 about-col pad-end wow fadeInUp" data-wow-delay="0.6s">
              <div class="text-area">
                <div class="sec-heading light-title ">
                  <div class="content-area"><span class="pre-title wow fadeInUp" data-wow-delay=".2s">about Us</span>
                    <h2 class="title wow fadeInUp" data-wow-delay=".4s"><span class='hollow-text'>trusted</span> since<span class='featured-text'> 2005. <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 150" preserveAspectRatio="none"><path d="M7.7,145.6C109,125,299.9,116.2,401,121.3c42.1,2.2,87.6,11.8,87.3,25.7"></path></svg></span></h2>
                  </div>
                </div>
                <p class="about-text">RJEN Innovative IT Solutions, Co. Ltd. was established in 2005 as a limited partnership. To better serve our clients and ensure long-term stability, we transitioned to a corporate structure in 2017, forming Z-Connect, Inc. This change provides a stronger foundation for our partnership with you and reinforces our commitment to your success.</p>
                <?php
                // Get the current page name
                $current_page = basename($_SERVER['PHP_SELF']);

                if ($current_page != 'about-us.php') {
                ?>
                <div class="cta-area"><a class="btn-solid reveal-start" href="about-us.php">about us</a>
                  <!-- <div class="signature ">
                    <div class="signature-img"></div>
                    <div class="signature-name">CEO &amp; Founder </div>
                  </div> -->
                </div>
                <?php
                }
                ?>
              </div>
            </div>
            <div class="col-12 col-lg-6 d-flex align-items-center order-0 order-lg-1 about-col wow fadeInUp" data-wow-delay="0.2s">
              <div class="img-area" data-tilt>
                <div class="image"><img class="about-img img-fluid" loading="lazy" src="assets/images-zconnect/about-us/rjen-logo.png" alt="Our vision"></div>
              </div>
            </div>
          </div>
        </div>
        <!--End first about div-->
      </div>
    </section>