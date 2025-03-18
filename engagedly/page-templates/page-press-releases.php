<?php
/**
 * Template Name (Done): Press Releases Template
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
           <div>
               <h1 class="title-page pb-4 mb-0 cl-white text-uppercase">PRESS RELEASES</h1>
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
    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/press-release-post.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Engagedly Announces Partnership With Kaizen Human Capital</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/press-release-post.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Engagedly Announces Partnership With Kaizen Human Capital</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/press-release-post.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Engagedly Announces Partnership With Kaizen Human Capital</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/press-release-post.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Engagedly Announces Partnership With Kaizen Human Capital</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/press-release-post.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Engagedly Announces Partnership With Kaizen Human Capital</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Press Release" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/press-release-post.jpg">
                        <div class="card-body">
                            <h5 class="card-title font-adrianna cl-blue">November 14</h5>
                            <p class="card-text cl-black font-adrianna">Engagedly Announces Partnership With Kaizen Human Capital</p>
                            <a href="#" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


<?php get_footer(); ?>
