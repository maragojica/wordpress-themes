<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Engagedly
 */

get_header("inner"); ?>

<section class="banner-internal-post banner-internal-shape bg-gray">
	<div class="overlay overlay-bg-light overlay-shape"></div>
	<div class="container d-flex align-items-center justify-content-center container-absolute">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="title-page pb-4 mb-0 cl-white text-uppercase"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>
<style>
<?php if ( has_post_thumbnail() ) { ?>
	.banner-internal-shape::before{
		background: url(<?php the_post_thumbnail_url(); ?>) no-repeat center center;
	}
<?php } ?>

</style>
<section id="content-shape-banner" class="content-social-single relative">
    <div class="container pr-0 pl-0">
        <div class="row align-items-center justify-content-start">
            <div class="col-lg-6">
                <svg class="banner-social-top-svg-1" width="100%" height="80">
                    <line x1="-4" x2="100%" y2="100%" y1="40" style="stroke:#F15B2B ;stroke-width:80"></line>
                </svg>
                <div class="box-social w-100 d-flex align-items-center justify-content-center">
                    <div class="row align-items-center justify-content-center w-100 text-center">
                        <div class="col-4 pl-0"><h2 class="title-social-box mb-0 cl-white text-uppercase">Share:</h2></div>
                        <div class="col-8 pl-0">
							<?php echo do_shortcode("[addtoany]"); ?>
                            <!--<a href="#" class="social-links" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Twitter.svg"></a>
                            <a href="#" class="social-links" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Linkedin.svg"></a>
                            <a href="#" class="social-links" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Email.svg"></a>
                            <a href="#" class="social-links" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/Facebook.svg"></a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="single-content single simple-sidebar relative d-flex align-items-center justify-content-center mb-5 pb-5 mb-mv-0 pb-mv-0">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 left-20 top50-percent z-index-0">
	<div class="container">
		<div class="row align-items-start justify-content-center">
			<div class="col-lg-7">
				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content-single-post');

				endwhile; // End of the loop.
				?>
			</div>
			<div class="col-lg">
                <?php get_sidebar('sidebar'); ?>
            </div>
		</div>
	</div>
</section>
<?php
get_footer();
