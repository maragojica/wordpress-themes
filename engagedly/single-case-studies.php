<?php
/**
 * The template for displaying all Case Studies custom posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Engagedly
 */

get_header("inner"); ?>
	<!--<section class="banner-internal banner-internal-two-cols relative d-flex align-items-center justify-content-center">
		<div class="overlay overlay-bg-light-1"></div>
		<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<h4 class="title-coniferous cl-white">Case Study</h4>
						<h1 class="title-page pb-4 mb-0 cl-white text-uppercase"><?php echo get_field('client_quote'); ?></h1>
						<div class="copy-text font-adrianna cl-white pb-4">
							<p><em><?php echo get_field('client_name_and_position'); ?></em></p>
						</div>
					</div>
				</div>
		</div>
	</section>
	<style>
		.banner-internal{
			background: url(<?php echo get_field('background')['url']; ?>) top center;
		}
		@media (max-width: 575.98px) {
			.banner-internal{
				background: url(<?php echo get_field('background_mobile')['url']; ?>) top center;
			}
		}
	</style>-->

	<section class="banner-internal-page banner-internal-page-shape-2 bg-orange">
		<div class="overlay overlay-bg-light-1 overlay-page-shape-2"></div>
		<div class="container d-flex align-items-center justify-content-center container-absolute">
			<div class="box-banner-internal">
				<h4 class="title-coniferous cl-white">Case Study</h4>
				<h1 class="title-page pb-4 mb-0 cl-white text-uppercase"><?php echo get_field('client_quote'); ?></h1>
				<div class="copy-text font-adrianna cl-white pb-4">
					<p><em><?php echo get_field('client_name_and_position'); ?></em></p>
				</div>
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

						get_template_part( 'template-parts/content-case-studies');

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
