<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Engagedly
 */

get_header("inner"); ?>

	<section class="banner-internal-page banner-internal-page-shape bg-orange">
		<div class="overlay overlay-bg-light-1 overlay-page-shape"></div>
		<div class="container d-flex align-items-center justify-content-center container-absolute">
			<div class="box-banner-internal m-auto error-404 not-found">
				<h1 class="title-page pb-4 mb-0 cl-white text-uppercase text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ccos' ); ?></h1>
				<form name="search" method="get" action="/" class="form-search">
					<div class="input-group">
						<span class="input-group-btn group-img-search"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ios-search.svg" border="0"> </span>
						<input type="text" class="form-control" name="s" id="search" placeholder="Search terms, topics, or questions.">
						<span class="input-group-btn group-btn-search"> <button type="submit" class="btn btn-default btn-search">SEARCH</button> </span>
					</div>
				</form>
			</div>
		</div>
	</section>
	<style>
		.banner-internal-page-shape::before{
			background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-blog.png) top center;
		}
		@media (max-width: 575.98px) {
			.banner-internal-page-shape::before{
				background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-blog-mv.png) top center;
			}
		}
	</style>
<?php
get_footer();
