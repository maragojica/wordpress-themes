<?php
/**
 * Template Name (Done): White Papers Template
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
    <!--<section class="banner-internal relative d-flex align-items-center justify-content-center">-->
    <section class="banner-internal-page banner-internal-page-shape bg-orange">
        <div class="overlay overlay-bg-light-1 overlay-page-shape"></div>
        <div class="container relative d-flex align-items-center container-absolute">
           <div class="box-banner-internal">
               <h1 class="title-page pb-4 mb-0 cl-white text-uppercase">WHITE PAPERS</h1>
               <div class="copy-text font-adrianna cl-ligth-white pb-4">
                   <p>HR Departments Around the World Are Using Engagedly to Supercharge Engagement. See how these world-renowned organizations are powering their human resources with our software.</p>
               </div>
               <a href="#" class="btn btn-orange text-uppercase font-adrianna">Request Free Demo</a>
           </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-white-papers.png) top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-whitepapers-mv.png) top center;
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
    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-three-casestudies">

                        <div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/white-papers-img.png" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text cl-black font-adrianna">Key Trends in Performance Management</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            GET WHITE PAPER</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/case-studie-2.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text cl-black font-adrianna">Engagement White Papers</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            GET WHITE PAPER</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/white-papers-img-1.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text cl-black font-adrianna">Driver’s of Employment Engagement</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            GET WHITE PAPER</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/case-studie-1.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text cl-black font-adrianna">Key Trends in Performance Management</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            GET WHITE PAPER</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/white-papers-img-1.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text cl-black font-adrianna">Engagement White Papers</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            GET WHITE PAPER</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


<?php get_footer(); ?>
