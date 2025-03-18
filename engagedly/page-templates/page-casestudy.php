<?php
/**
 * Template Name (Done): Case Studies Template
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

    <section class="banner-internal-page banner-internal-page-shape-2 bg-orange">
        <div class="overlay overlay-bg-light overlay-page-shape-2"></div>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
            <div class="box-banner-internal">
                <h1 class="title-page pb-4 mb-0 cl-white text-uppercase">CASE STUDIES</h1>
                <div class="copy-text font-adrianna cl-white pb-4">
                    <p>HR Departments Around the World Are Using Engagedly to Supercharge Engagement. See how these world-renowned organizations are powering their human resources with our software.</p>
                </div>
                <a href="#" class="btn btn-orange text-uppercase font-adrianna">Request Free Demo</a>
            </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape-2::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-case-page.png) no-repeat top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape-2::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-case-page-mv.png) no-repeat top center;
            }
        }
    </style>
    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-three-casestudies">

                        <div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/case-studie-1.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title font-adrianna cl-blue">Bates White</h5>
                                        <p class="card-text cl-black font-adrianna">See How We Increased Bates White’s Employee Engagement in Just 6 Months</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            READ CASE STUDY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/case-studie-2.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title font-adrianna cl-blue">Experian</h5>
                                        <p class="card-text cl-black font-adrianna">See How We Increased Experian’s Employee Engagement in Just 6 Months</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            READ CASE STUDY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/case-studie-3.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title font-adrianna cl-blue">Emids</h5>
                                        <p class="card-text cl-black font-adrianna">See How We Increased Emid's Employee Engagement in Just 6 Months</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            READ CASE STUDY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/case-studie-1.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title font-adrianna cl-blue">Bates White</h5>
                                        <p class="card-text cl-black font-adrianna">See How We Increased Bates White’s Employee Engagement in Just 6 Months</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            READ CASE STUDY</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img class="card-img-top" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/case-studie-3.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title font-adrianna cl-blue">Experian</h5>
                                        <p class="card-text cl-black font-adrianna">See How We Increased Experian’s Employee Engagement in Just 6 Months</p>
                                        <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                            READ CASE STUDY</a>
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