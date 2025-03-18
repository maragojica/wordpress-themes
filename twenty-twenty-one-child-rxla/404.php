<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
	<section class="section-90 mb-lg-5 section-404 d-flex align-items-center">
		<div class="container">
			<div class="row align-items-center row-404">
				<div class="col-lg-6 mb-3 mb-lg-4">
					<div class="d-flex align-items-center justify-content-center">
						<div class="mr-3">
							<img alt="404" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icon404.png'; ?>" width="100px">
						</div>
						<div >
							<h1 class="page-title-error mb-3"><?php esc_html_e( 'Error 404', 'twentytwentyone' ); ?></h1>
							<h2 class="page-subtitle-error text-uppercase mb-0"><?php esc_html_e( 'PAGE NOT FOUND', 'twentytwentyone' ); ?></h2>
						</div>
					</div>

				</div>
				<div class="col-lg-6">
					<h3 class="subtitle cl-dark">Sorry, but the page you are looking for is not found. Please go back to the <a class="cl-green" href="<?php echo get_home_url(); ?>">homepage.</a></h3>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
