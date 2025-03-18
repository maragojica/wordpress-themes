<?php
/**
 * Template Name (Done): Our Mission Template
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
<?php get_header(); ?>

<section class="banner-internal-page banner-internal-page-shape-4 bg-gray z-index-5">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse out-section-elipse width-62 width-80-sm right-15 top-15 z-index-1">
    <div class="overlay overlay-bg-white overlay-page-shape-4"></div>
    <div class="container container-absolute z-index-2">
        <div class="row align-items-center justify-content-start row-absolute">
            <div class="col-md-12">
                <div class="box-banner-home">
                    <img class="img-fluid m-auto d-block img-banner-home-mv" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-our-mision-mv.png">
                    <h1 class="title-page cl-gray pb-3 mb-0">Our Mission</h1>
                    <div class="copy-text font-adrianna cl-black">
                        <p>Improve employee engagement by making the workplace fun and motivating.</p>
                    </div>
                    <a href="#" class="btn btn-orange text-uppercase mt-2">Request Free Demo</a>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .banner-internal-page-shape-4 .container{
        background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-our-mission.png) no-repeat bottom right;
    }
</style>

    <section id="section-offers-container-width" class="section-offers-our-mission">
        <section class="section-grid product-grid-two-columns-right">
            <div class="container-fluid">
                <div class="row flex-lg-row-reverse align-items-center justify-content-center">
                    <div class="col-lg-6 pr-0">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/img-platform.png" alt="Offers 1">
                            </div>
                        </div>
                    </div>
                    <div class="col-text-our-mission col-lg-6 pt-4 pb-4">
                        <!--<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/our-mission-circles-stars.png" class="bg-elipse width-80-percent top0 left0 bottom0 z-index-0">-->
                        <div class="box-text-our-mission">
                            <h2 class="title-offer text-uppercase font-adrianna cl-gray">WITH THE Engagedly Platform,</h2>
                            <div class="copy-text font-adrianna cl-black pb-4">
                                <p>organizations can align and motivate their workforce. Features of this software include Goal Setting, Manager Feedback, Peer Praise, Idea Generation, Knowledge Sharing/eLearning, Rewards, Objectives Alignment (OKR) & Social Performance. Engagedly is the most comprehensive tool available to drive Employee Engagement.</p>
                            </div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-orange text-uppercase">Watch Video</a>
                                    <a href="#" class="btn btn-border-orange text-uppercase mr-lg-3">Request Free Demo</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns relative">
        <div class="container">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/our-mission-stars.png" class="bg-elipse width-15 right5 bottom2 z-index-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 col-title-case-studie">
                    <h2 class="title-offer font-adrianna cl-gray text-uppercase text-center pb-4 pt-5 pt-tb-0">Success Stories</h2>
                </div>
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
