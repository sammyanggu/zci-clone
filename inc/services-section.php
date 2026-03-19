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
        
        <div class="row gx-4 gy-4 services-row">
        
          <!--Start First service box-->
          <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".1s">
              <div class="service-icon"><i class="flaticon-handshake font-icon"></i></div><span class="service-num hollow-text">1</span>
              <div class="service-content">
                <h3 class="service-title">Our Partners</h3>
                <div class="partner-logos-grid">
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/Panduit.png" alt="Panduit logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/belden-logo.png" alt="Belden logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Network/commscope.jpg" alt="Commscope logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Datacenter/CISCO.png" alt="Cisco logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Datacenter/aruba.jpg" alt="Aruba logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Datacenter/TPLINK.jpg" alt="TPLink logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/Hikvision-Logo.png" alt="Hikvision logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/Honeywell-Logo.png" alt="Honeywell logo" />
                  <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Datacenter/Fortinet-Logo.png" alt="Fortinet logo" />
                </div>
                <!-- End Partner Logos Grid -->

              </div>
              <a class="read-more" data-bs-toggle="modal" data-bs-target="#partnerModal">read more<i class="bi bi-arrow-right icon"></i></a>
            </div>
          </div>
          <!-- End First service box -->
            
          <!--Start Second service box-->
          <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".2s">
              <div class="service-icon"><i class="flaticon-network font-icon"></i></div><span class="service-num hollow-text">2</span>
              <div class="service-content">
                <h3 class="service-title">Networking &amp; Structured Cabling System</h3>
                <p class="service-text">Future Proof Investment: The most significant benefits of a structured cabling system is the high bandwidth, which makes it a reliable infrastructure for supporting business growth. Having adaptable IT that is scalable and can respond quickly to industry changes is vital. Supports quick and easy development and deployment of new services for enterprise network and data centers.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End Second service box-->
          
          <!--Start Third service box-->
          <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".3s">
              <div class="service-icon"><i class="flaticon-datacenter font-icon"></i></div><span class="service-num hollow-text">3</span>
              <div class="service-content">
                <h3 class="service-title">Data Center</h3>
                <p class="service-text">Data center facilities rarely achieve the operational and capacity requirements specified in their initial designs.  The advent of new technologies that require substantial incremental power and cooling capacity; the pressure to consolidate multiple data centers into fewer locations; the need for incremental space; changes in operational procedures; and potential changes in safety and security regulations converge to impose constant facilities changes on the modern data center.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End Third service box-->
          
          <!--Start fourth service box-->
          <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".4s">
              <div class="service-icon"><i class="flaticon-filter font-icon"></i></div><span class="service-num hollow-text">4</span>
              <div class="service-content">
                <h3 class="service-title">Ancillary Devices</h3>
                <p class="service-text">Physical security is always a component of a wider security strategy, but it makes up a sizeable piece of this larger plan.  Security experts agree that the three most important components of a physical security plan are access control, surveillance, and fire detection, which works together to make your space more secure.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End fourth service box   -->
          
          <!--Start 5th service box-->
          <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".5s">
              <div class="service-icon"><i class="flaticon-building-management font-icon"></i></div><span class="service-num hollow-text">5</span>
              <div class="service-content">
                <h3 class="service-title">Building Management System</h3>
                <p class="service-text">In a nut shell, BMS-System otherwise called BAS or Building Automation is a computer-based control system which reduces work force, automates the system, and add savings on energy consumption in buildings by monitoring and controlling the mechanical and electrical equipment in modern-day buildings or any industrial plants.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End 5th service box-->
          
          <!--Start 6th service box-->
          <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".6s">
              <div class="service-icon"><i class="flaticon-managed-services font-icon"></i></div><span class="service-num hollow-text">6</span>
              <div class="service-content">
                <h3 class="service-title">Managed Support Services</h3>
                <p class="service-text">Technology plays a central role in business, making it a key component of almost every company.  Staying on top of your business’s IT game can be a real challenge, as the technological environment is always changing. Overwhelmed with choices and a lack of expertise, many companies often over spend on IT without understanding which technology expenses are vital, a luxury or redundant.</p>
              </div>
              <!-- <a class="read-more" href="service-single.html">read more<i class="bi bi-arrow-right icon "></i></a> -->
            </div>
          </div>
          <!-- End 6th service box-->
          
          <!--Start 7th service box-->
          <div class="col-12 col-md-6 col-lg-4 mx-auto">
            <div class="box service-box h-100 wow fadeInUp reveal-start" data-wow-offset="0" data-wow-delay=".7s">
              <div class="service-icon"><i class="flaticon-nanotechnology font-icon"></i></div><span class="service-num hollow-text">7</span>
              <div class="service-content">
                <h3 class="service-title">Infrastructure Assessment</h3>
                <p class="service-text">Important in understanding the product or services against the desired design during the scoping process of a project.  The assessment provides the output of gap analysis in accordance to the designed model from the accepted product or services.  This covers auditing the process, the technology, desired reports and recommendations in degree of meeting the desired output of the products and services.</p>
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
              <img class="partner-logo" loading="lazy" src="assets/images-zconnect/partner-logos/Ancillary-devices/LILIN.png" alt="LILIN logo" />
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