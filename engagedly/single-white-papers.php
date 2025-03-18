<?php
/**
 * The template for displaying all White Papers custom posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Engagedly
 */

get_header("inner"); ?>

	<section class="banner-internal-page banner-internal-page-shape-2 bg-orange banner-internal-page-single-usecases">
		<div class="overlay overlay-bg-light-1 overlay-page-shape-2"></div>
		<div class="container d-flex align-items-center justify-content-center container-absolute">
			<div class="box-banner-internal">
				<h4 class="title-coniferous cl-white">White Paper:</h4>
				<h1 class="title-page pb-1 pb-md-4 mb-0 mt-0 mb-md-1 cl-white text-uppercase"><?php the_title(); ?></h1>
			</div>
		</div>
	</section>
	<style>
		.banner-internal-page-shape-2::before{
			background: url(<?php echo get_field('background')['url']; ?>) no-repeat top center;
		}
		@media (max-width: 575.98px) {
			.banner-internal-page-shape-2::before{
				background: url(<?php echo get_field('background_mobile')['url']; ?>) no-repeat top center;
			}
		}
	</style>
	<section class="single-content single fixed-sidebar relative d-flex align-items-center justify-content-center mt-5 pt-5 mb-5 pb-5 mb-mv-0 pb-mv-0">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 width-50-sm right-10 bottom-20 bottom-35-sm z-index-0">
		<div class="container">
			<div class="row flex-lg-row-reverse align-items-start justify-content-center">
				<div class="col-lg">
					<!--sidebar area-->
                    <?php echo get_field('html_code'); ?>
					<!--end sidebar area-->
				</div>
				<div class="col-lg-7">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content-white-papers');

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>

			</div>
		</div>
	</section>
<?php
get_footer();
