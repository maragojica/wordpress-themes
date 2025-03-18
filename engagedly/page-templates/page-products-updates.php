<?php
/**
 * Template Name (Done): Products Updates Releases Template
 * The Case Studies page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
http://engagedly.co/products-updates-releases-test/ * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 */?>
<?php get_header("inner"); ?>
    <!--<section class="banner-internal size-banner-internal-2 relative d-flex align-items-center justify-content-center">-->
    <section class="banner-internal-page banner-internal-page-shape bg-orange">
        <div class="overlay overlay-bg-light-1 overlay-page-shape"></div>
        <div class="container size-banner-internal-2 relative d-flex align-items-center justify-content-center container-absolute">
           <div class="m-auto">
               <h1 class="title-page pb-4 mb-0 cl-white text-uppercase text-center">OUR MOST RECENT UPDATE</h1>
           </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-products-releases.png) top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-product-rel-mv.png) top center;
            }
        }
    </style>

    <!--<secion class="top-shape-banner">
        <svg class="banner-internal-left-svg-1" height="130" width="73%">
            <line x1="0" x2="100%" style="stroke:#f15a2b;stroke-width:30" y1="40" y2="85%"></line>
        </svg>
        <svg class="banner-internal-rigth-svg-1" height="130" width="27%">
            <line style="stroke:#f15a2b;stroke-width:30" x2="0" y1="40" y2="85%" x1="100%"></line>
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

    <section id="section-featured" class="position-relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 left-10 bottom-10 z-index-0">
        <div class="container">
            <div class="box-main bg-gray">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="title-featured cl-white font-adrianna">New Features</h6>
                        <div class="copy-text font-adrianna cl-ligth-white pb-4">
                            <p>New Integration with Zapier</p>
                            <p>You can now share files through our application!</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h6 class="title-featured cl-white font-adrianna">Other Improvements</h6>
                        <div class="copy-text font-adrianna cl-ligth-white pb-4">
                            <p>Fixed bugs on the main dashboard.</p>
                            <p>The application loads 3% faster on tablets now!</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-three-featured">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <h2 class="title-section cl-gray font-adrianna text-center pb-4">THE NEXT 3 FEATURES We’re WORKING ON</h2>
                    </div>
                 </div>
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-4 pb-4">
                        <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                            <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                            <div class="copy-text font-adrianna cl-gray-ligth">
                                <p>New Integration with Lipsum</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pb-4">
                        <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                            <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                            <div class="copy-text font-adrianna cl-gray-ligth">
                                <p>New Integration with Lipsum</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 pb-4">
                        <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                            <div class="acr-title text-uppercase text-center d-flex align-items-center justify-content-center mb-3">FPT</div>
                            <div class="copy-text font-adrianna cl-gray-ligth">
                                <p>New Integration with Lipsum</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <section id="section-banner-two-columns" class="d-flex align-items-center justify-content-center z-index-up-bottom-shape-banner-3 position-relative">
        <div class="container-fluid pr-0 pl-0">
            <div class="row align-items-center justify-content-center bg-gray mr-0 ml-0 position-relative">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-10 left5 top0 z-index-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-20 left25 top5 z-index-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-15 left-5 bottom-5 z-index-0">
                <div class="col-lg-6 pr-0 pl-0">
                    <div class="box-text">
                        <h2 class="title-section cl-white font-adrianna pb-2">Your Team’s Engagement</h2>
                        <div class="copy-text font-adrianna cl-ligth-white"><p>Let your employees connect &amp; collaborate, share ideas, ask for help and communicate values organization wide.</p>
                        </div>
                        <a href="" class="btn btn-white text-uppercase">Request Free Demo</a>
                    </div>
                </div>
                <div class="col-lg-6 pr-0 pl-0 wrap-image">
                    <img class="img-fluid" src="http://engagedly.co/wp-content/uploads/2020/02/three-business-people-in-the-office-talking-PZMXXU7@2x.png" alt="three-business-people-in-the-office-talking-PZMXXU7@2x">
                </div>
            </div>
        </div>
    </section>
    <section id="section-newsletter" class="position-relative z-index-2">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h2 class="title-section cl-gray font-adrianna pb-2">Join Our NEWSLETTER</h2>
                    <div class="box-newsletter-email">
                        <p><a class="newsletter-email font-coniferous" href="mailto:welove@engagedly.com" target="_blank">welove@engagedly.com</a></p>
                    </div>
                    <a href="" class="btn btn-border-orange text-uppercase">Subscribe here</a>
                </div>
            </div>
        </div>
    </section>


<?php get_footer(); ?>
