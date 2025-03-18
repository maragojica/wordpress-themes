<?php
/**
 * Template Name (Done): What We Offer Template
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
    <section class="banner-internal-page banner-internal-page-shape bg-orange">
        <div class="overlay overlay-bg-light-1 overlay-page-shape"></div>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
           <div class="box-banner-internal">
               <h4 class="title-coniferous">What we offer:</h4>
               <h1 class="title-page pb-4 mb-0 cl-white text-uppercase">Better, more efficient Performance Reviews</h1>
               <div class="copy-text font-adrianna cl-ligth-white pb-4">
                   <p>“There were a lot of costs to doing performance review the old way.”<br>
                   <strong class="cl-white">- John Doe</strong></p>
               </div>
               <a href="#" class="btn btn-orange text-uppercase font-adrianna">Request Free Demo</a>
           </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-what-we-offer.png) no-repeat top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-what-we-offer-mv.png) no-repeat top center;
            }
        }
    </style>


    <section id="section-offers-container-width" class="position-relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-tb-none width-30 right-15 top-8 z-index-0">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/arrow-left-1.png" class="bg-elipse bg-elipse-tb-none width-55 width-70-smd-1 left-10 left-15-smd-1 top-10 top-15-smd-1 z-index-0">
        <section class="section-grid product-grid-two-columns-left position-relative ">
            <div class="container">
                <div class="row align-items-center justify-content-center position-relative z-index-3">
                    <div class="col-lg-6">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-1-offers.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <h2 class="title-offer font-adrianna cl-gray">Intuitive, easy to use Performance Reviews</h2>
                            <div class="copy-text font-adrianna cl-black pb-4">
                                <p>Most people, employees and managers alike dread performance reviews. Engagedly’s Performance Management approach makes it easier for managers to implement a comprehensive employee performance management system that incorporates real time feedback, public praise and peer feedback into it.</p>
                                <ul>
                                    <li>Customizable templates</li>
                                    <li>Flexible rating scales</li>
                                    <li>Easily manage performance reviews</li>
                                </ul>
                            </div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-border-orange text-uppercase mr-lg-3">Request Free Demo</a>
                                    <a href="#" class="btn btn-orange text-uppercase">Read More</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-grid product-grid-two-columns-right position-relative">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-elipse-tb-none width-30 left-15 bottom-25 z-index-0">
            <div class="container">
                <div class="row flex-lg-row-reverse align-items-center justify-content-center position-relative z-index-3">
                    <div class="col-lg-6">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-2-offers.png" alt="Offers 2">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <h2 class="title-offer font-adrianna cl-gray">Customizable Templates and Industry Specific Review Templates</h2>
                            <div class="copy-text font-adrianna cl-black pb-4">
                                <p>Build customized templates for different groups of people, by role, by department or any other criteria. You can also make ratings and comments options by section in the review template.</p>
                                <p>Don’t know or don’t have a review template, let us help you with our industry and role specific review templates based on our experience of working with thousands of review cycles.</p>

                            </div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-border-orange text-uppercase mr-lg-3">Request Free Demo</a>
                                    <a href="#" class="btn btn-orange text-uppercase">Read More</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <section id="section-offers-full-width">
        <section class="section-grid product-grid-two-columns-left position-relative">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/arrow-right-2.png" class="bg-elipse bg-elipse-tb-none width-50 width-60-smd-1 width-70-smd-2 right-10 right-15-smd-1 right-25-smd-2 bottom-10 bottom-15-smd-2 z-index-0">
            <div class="container-fluid pr-0 pl-0">
                <div class="row align-items-center justify-content-center mr-0 ml-0 position-relative z-index-3">
                    <div class="col-lg-6 pl-0">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-1-full-offers.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <h2 class="title-offer font-adrianna cl-gray">Integrated Goal Review</h2>
                            <div class="copy-text font-adrianna cl-black pb-4">
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-border-orange text-uppercase mr-lg-3">Request Free Demo</a>
                                    <a href="#" class="btn btn-orange text-uppercase">Read More</a>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="section-grid product-grid-two-columns-right position-relative">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/arrow-left-2.png" class="bg-elipse bg-elipse-tb-none width-50 left-20 bottom-15 z-index-0">
            <div class="container-fluid pr-0 pl-0">
                <div class="row flex-lg-row-reverse align-items-center justify-content-center mr-0 ml-0 position-relative z-index-3">
                    <div class="col-lg-6 pr-0">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img class="w-100" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-2-full-offers.png" alt="Offers 2">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap-text-bullet">
                            <h2 class="title-offer font-adrianna cl-gray">9 Box for succession planning</h2>
                            <div class="copy-text font-adrianna cl-black pb-4">
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit</p>
                            </div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-border-orange text-uppercase mr-lg-3">Request Free Demo</a>
                                    <a href="#" class="btn btn-orange text-uppercase">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section class="section-grid product-grid-two-columns-left position-relative z-index-center-arrow">
            <div class="container-fluid pr-0 pl-0">
                <div class="row align-items-center justify-content-center mr-0 ml-0 position-relative z-index-3">
                    <div class="col-lg-6 pl-0">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-1-full-offers.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <h2 class="title-offer font-adrianna cl-gray">Competency Modeling</h2>
                            <div class="copy-text font-adrianna cl-black pb-4">
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-border-orange text-uppercase mr-lg-3">Request Free Demo</a>
                                    <a href="#" class="btn btn-orange text-uppercase">Read More</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-grid product-grid-two-columns-right position-relative">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/arrow-center-1.png" class="bg-elipse bg-elipse-tb-none width-30 left40 top-10 z-index-0">
            <div class="container-fluid pr-0 pl-0">
                <div class="row flex-lg-row-reverse align-items-center justify-content-center mr-0 ml-0 position-relative z-index-3">
                    <div class="col-lg-6 pr-0">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img class="w-100" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-2-full-offers.png" alt="Offers 2">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wrap-text-bullet">
                            <h2 class="title-offer font-adrianna cl-gray">30-60-90 Day reviews and Anniversary based reviews</h2>
                            <div class="copy-text font-adrianna cl-black pb-4">
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit</p>
                            </div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-border-orange text-uppercase mr-lg-3">Request Free Demo</a>
                                    <a href="#" class="btn btn-orange text-uppercase">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-grid product-grid-two-columns-left position-relative">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/arrow-right-3.png" class="bg-elipse bg-elipse-tb-none width-35 right-10 bottom-10 z-index-0">
            <div class="container-fluid pr-0 pl-0">
                <div class="row align-items-center justify-content-center mr-0 ml-0 position-relative z-index-3">
                    <div class="col-lg-6 pl-0">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-1-full-offers.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <h2 class="title-offer font-adrianna cl-gray">Advanced Analytics and Reporting:</h2>
                            <div class="copy-text font-adrianna cl-black pb-4">
                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore</p>
                            </div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-border-orange text-uppercase mr-lg-3">Request Free Demo</a>
                                    <a href="#" class="btn btn-orange text-uppercase">Read More</a>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </section>
    </section>


<?php get_footer(); ?>
