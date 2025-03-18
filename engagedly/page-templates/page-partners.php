<?php
/**
 * Template Name (Done): Partners Template
 * The Case Studies page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 */?>
<?php get_header("inner"); ?>
    <section class="banner-internal-page banner-internal-page-shape bg-gray">
        <div class="overlay overlay-bg-light-1 overlay-page-shape"></div>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
            <div>
                <h1 class="title-page pb-4 mb-0 cl-white text-uppercase">Our Partners</h1>
                <div class="copy-text font-adrianna cl-ligth-white pb-4">
                    <p>We partner with a wide variety of reputable companies to amplify the services that we provide. If you’re interested in partnering with us, please inquire using the form at the bottom of this page.</p>
                </div>
                <a href="#" class="btn btn-orange text-uppercase font-adrianna">Request Free Demo</a>
            </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-press-releases.png) top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-press-releases-mv.png) top center;
            }
        }
    </style>
    <!--<secion class="top-shape-banner">
        <svg class="banner-internal-left-svg-1" height="130" width="73%">
            <line x1="0" x2="100%" style="stroke:#494B57;stroke-width:30" y1="40" y2="85%"></line>
        </svg>
        <svg class="banner-internal-rigth-svg-1" height="130" width="27%">
            <line style="stroke:#494B57;stroke-width:30" x2="0" y1="40" y2="85%" x1="100%"></line>
        </svg>
    </secion>
    <secion class="bottom-shape-banner">
        <svg class="banner-internal-left-svg-2" width="73%" height="130">
            <line x1="0" x2="100%" y2="85%" y1="40" style="stroke:#ffffff;stroke-width:60"></line>
        </svg>
        <svg class="banner-internal-rigth-svg-2" height="130" width="27%">
            <line x2="0" y1="40" y2="85%" x1="100%" style="stroke:#ffffff;stroke-width:60"></line>
        </svg>
    </secion>-->

    <section id="section-partners">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase">Payroll / HRIS</h2>
                </div>
            </div>
            <div class="row row-cols-5 row-partners align-items-center pb-4">
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner">
                        <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/atica@2x.png">
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner d-flex align-items-center justify-content-center">
                      <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/atica-1@2x.png">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner d-flex align-items-center justify-content-center">
                       <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/atica-2@2x.png">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner d-flex align-items-center justify-content-center">
                       <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/atica-3@2x.png">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner d-flex align-items-center justify-content-center">
                       <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/atica-4@2x.png">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase">Single Sign On (SSO)</h2>
                </div>
            </div>
            <div class="row row-cols-5 row-partners align-items-center pb-4">
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner">
                        <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo1.png">
                    </div>

                </div>
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner d-flex align-items-center justify-content-center">
                        <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo2.png">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner d-flex align-items-center justify-content-center">
                        <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo3.png">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner d-flex align-items-center justify-content-center">
                        <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo4.png">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md pb-4">
                    <div class="box-img-partner d-flex align-items-center justify-content-center">
                        <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo5.png">
                    </div>
                </div>
            </div>

            <div class="row row-cols-2 pb-4">
                <div class="col-12 col-sm-12 col-md-7-1">
                     <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase">Onboarding /HRIS</h2>
                    <div class="row row-cols-3 row-partners d-flex align-items-center justify-content-center">
                        <div class="col-12 col-sm-6 col-md pb-4">
                            <div class="box-img-partner">
                                <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo6.png">
                            </div>

                        </div>
                        <div class="col-12 col-sm-6 col-md pb-4">
                            <div class="box-img-partner d-flex align-items-center justify-content-center">
                                <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo7.png">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md pb-4"></div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md">
                    <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase">Communication</h2>
                   <div class="row row-cols-2 row-partners d-flex align-items-center justify-content-center">
                       <div class="col-12 col-sm-6 col-md pb-4">
                           <div class="box-img-partner">
                               <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo8.png">
                           </div>
                       </div>
                       <div class="col-12 col-sm-6 col-md pb-4"></div>
                   </div>
                </div>
            </div>

            <div class="row row-cols-2">
                <div class="col-12 col-sm-12 col-md-7-1">
                    <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase">Compensation Management</h2>
                    <div class="row row-cols-3 row-partners d-flex align-items-center justify-content-center">
                        <div class="col-12 col-sm-6 col-md pb-4">
                            <div class="box-img-partner">
                                <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo9.png">
                            </div>

                        </div>
                        <div class="col-12 col-sm-6 col-md pb-4">
                        </div>
                        <div class="col-12 col-sm-6 col-md pb-4"></div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md">
                    <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase">Learning</h2>
                    <div class="row row-cols-2 row-partners d-flex align-items-center justify-content-center pb-5">
                        <div class="col-12 col-sm-6 col-md pb-4">
                            <div class="box-img-partner">
                                <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo10.png">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md"></div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2 pb-4">
                <div class="col-12 col-sm-12 col-md-7-1">
                    <h2 class="title-section cl-gray font-adrianna pb-5 text-uppercase">Service Partners</h2>
                    <div class="row row-cols-3 row-partners d-flex align-items-center justify-content-center pb-5">
                        <div class="col-12 col-sm-6 col-md pb-4">
                            <div class="box-img-partner">
                                <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo11.png">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md pb-4">
                            <div class="box-img-partner">
                                <img class="m-auto d-block img-fluid" alt="Partner Name" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo12.png">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md pb-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="full-container-banner" class="banner-info banner-info-wform banner-info-wbubble relative d-flex align-items-center justify-content-center">
        <div class="overlay overlay-bg-light-1"></div>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-bubbles-partner">
                      <div class="text-shape">
                          <h2 class="title-bubble cl-gray font-adrianna pb-2 text-uppercase text-center">Thinking about PARNERING?</h2>
                          <div class="copy-text font-adrianna cl-black text-center">
                              <p>Engagedly is looking for HR Consultants, Employee Engagement Experts and HR Technology Systems Integrators. We offer generous commissions and other revenue generation opportunities.</p>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="box-become-partner-form">
                        <h2 class="title-section cl-gray font-adrianna pb-2">BECOME A PARTNER</h2>
                        <form class="become-partner-form w-100 m-auto">
                            <div class="row row-form">
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Name</label>
                                        <input class="w-100" name="your_name" type="text" placeholder="Jane Doe">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Email Address</label>
                                        <input class="w-100" name="your_email" type="email" placeholder="John@examplewebsite.com">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Phone Number</label>
                                        <input class="w-100" name="your_phone" type="text" placeholder="520-123-4567">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Company Name</label>
                                        <input class="w-100" name="company_name" type="text" placeholder="The Sher Agency">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Region</label>
                                        <select name="select_region" class="wide">
                                            <option value="0" data-display="Select">-Select One-</option>
                                            <option value="1">Some option</option>
                                            <option value="2">Another option</option>
                                            <option value="3">Potato</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="box">
                                        <label class="d-block">Employee Count</label>
                                        <select name="select_employee_count" class="wide">
                                            <option value="0" data-display="Select">-Select One-</option>
                                            <option value="1">Some option</option>
                                            <option value="2">Another option</option>
                                            <option value="3">Potato</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-btn-submit row-request-demo-form pt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn-submit w-100">JOIN US</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <style>
        .banner-info{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-form-partners.png) top center;
        }

    </style>
<?php get_footer(); ?>
