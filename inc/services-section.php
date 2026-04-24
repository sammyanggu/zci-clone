    <section class="services services-boxed mega-section" id="services">
      <div class="container">
        <div class="sec-heading">
          <div class="content-area"><span class="pre-title wow fadeInUp" data-wow-delay=".2s">services</span>
            <h2 class="title wow fadeInUp" data-wow-delay=".4s"><span class='hollow-text'>Services</span> We Offer</h2>
            <p class="service-text wow fadeInUp" data-wow-delay=".6s">With a diverse service portfolio comprising of experts from across the IT landscape, we've got you covered...</p>
          </div>
          <?php
          // Get the current page name
          $current_page = basename($_SERVER['PHP_SELF']);

          if ($current_page != 'services.php') {
          ?>
          <div class="cta-area wow fadeInUp" data-wow-delay=".8s"><a class="cta-btn btn-solid" href="services.php">see all services <i class="bi bi-arrow-right icon "></i></a></div>
          <?php
          };
          ?>
        </div>
        
        <div class="row gx-3 gy-3 services-row">
        
          <!--Start First service box-->
          <div class="col-12 col-md-6 col-lg-3">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".1s">
              <div class="service-icon"><i class="flaticon-handshake font-icon"></i></div><span class="service-num hollow-text">1</span>
              <div class="service-content">
                <h3 class="service-title">Our Partners</h3>
                <div class="partner-logos-grid">
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/belden-logo.png" alt="Belden logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/Panduit.png" alt="Panduit logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/tiandy.png" alt="Tiandy logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/Hikvision-Logo.png" alt="Hikvision logo" />
                </div>
              </div>
              <a class="read-more" data-bs-toggle="modal" data-bs-target="#partnerModal">read more<i class="bi bi-arrow-right icon"></i></a>
            </div>
          </div>
          <!-- End First service box -->
            
          <!--Start Second service box-->
          <div class="col-12 col-md-6 col-lg-3">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".2s">
              <div class="service-icon"><i class="flaticon-network font-icon"></i></div><span class="service-num hollow-text">2</span>
              <div class="service-content">
                <h3 class="service-title">Networking &amp; Structured Cabling System</h3>
                <p class="service-text">High-bandwidth infrastructure supporting business growth. Scalable IT solutions for enterprise networks and data centers with easy deployment of new services.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End Second service box-->
          
          <!--Start Third service box-->
          <div class="col-12 col-md-6 col-lg-3">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".3s">
              <div class="service-icon"><i class="flaticon-datacenter font-icon"></i></div><span class="service-num hollow-text">3</span>
              <div class="service-content">
                <h3 class="service-title">Data Center</h3>
                <p class="service-text">Optimized facilities meeting operational and capacity requirements. Expert solutions for power, cooling, consolidation, and compliance with modern standards.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End Third service box-->
          
          <!--Start fourth service box-->
          <div class="col-12 col-md-6 col-lg-3">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".4s">
              <div class="service-icon"><i class="flaticon-filter font-icon"></i></div><span class="service-num hollow-text">4</span>
              <div class="service-content">
                <h3 class="service-title">Ancillary Devices</h3>
                <p class="service-text">Complete physical security solutions including access control, surveillance, and fire detection for comprehensive space protection.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End fourth service box   -->
          
          <!--Start 5th service box-->
          <div class="col-12 col-md-6 col-lg-3">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".5s">
              <div class="service-icon"><i class="flaticon-building-management font-icon"></i></div><span class="service-num hollow-text">5</span>
              <div class="service-content">
                <h3 class="service-title">Building Management System</h3>
                <p class="service-text">Automated control system reducing workforce while optimizing energy consumption through intelligent monitoring and management of mechanical and electrical equipment.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End 5th service box-->
          
          <!--Start 6th service box-->
          <div class="col-12 col-md-6 col-lg-3">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".6s">
              <div class="service-icon"><i class="flaticon-managed-services font-icon"></i></div><span class="service-num hollow-text">6</span>
              <div class="service-content">
                <h3 class="service-title">Managed Support Services</h3>
                <p class="service-text">Expert IT management navigating complex technology landscapes. Optimize spending while ensuring vital systems remain efficient and cost-effective.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End 6th service box-->
          
          <!--Start 7th service box-->
          <div class="col-12 col-md-6 col-lg-3">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".7s">
              <div class="service-icon"><i class="flaticon-nanotechnology font-icon"></i></div><span class="service-num hollow-text">7</span>
              <div class="service-content">
                <h3 class="service-title">Infrastructure Assessment</h3>
                <p class="service-text">Comprehensive gap analysis evaluating your infrastructure against desired design. Detailed audits, recommendations, and optimization strategies for maximum performance.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End 7th service box-->
          
        </div>
      </div>
    </section>
          
    <!-- Begin Partner Modal Structure -->
    <div class="modal fade" id="partnerModal" tabindex="-1" aria-labelledby="partnerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="partnerModalLabel">Our Partners</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
          
            
            <h3 class="service-title">networking &amp; structured cabling system</h3>
            <div class="partner-logos-grid">
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/belden-logo.png" alt="Belden logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/commscope.jpg" alt="Commscope logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/Fiber-rex.png" alt="Fiber-Rex logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/legrand.png" alt="Legrand logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/Panduit.png" alt="Panduit logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/premium-line.png" alt="Premium Line logo" />
            </div>
            
            <h3 class="service-title">data center</h3>
            <div class="partner-logos-grid">
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Datacenter/aruba.jpg" alt="Aruba logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Datacenter/CISCO.png" alt="Cisco logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Datacenter/Fortinet-Logo.png" alt="Fortinet logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Datacenter/TPLINK.jpg" alt="TPLink logo" />
            </div>
            
            <h3 class="service-title">ancillary devices</h3>
            <div class="partner-logos-grid">
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/apc_by_schneider_electric_logo.png" alt="APC Schneider Electric logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/aruba.jpg" alt="Aruba logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/CISCO.png" alt="CISCO logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/cooper.png" alt="Cooper logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/Dahua-logo-1.jpg" alt="Dahua logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/Hikvision-Logo.png" alt="Hikvision logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/Honeywell-Logo.png" alt="Honeywell logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/KStarUPS.jpg" alt="KStarUPS logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/tiandy.png" alt="Tiandy logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/protec.jpeg" alt="Protec logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/ubiquiti.jpg" alt="Ubiquiti logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/Vertiv.png" alt="Vertiv logo" />
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/zk-teco.png" alt="ZK Teco logo" />
            </div>
          
          </div>
        </div>
      </div>
    </div>
    <!-- End of Partner Modal -->