<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
<style type="text/css">
	body.error404 main#site-content {
    	background-color: #fff;
	}
</style>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="section-inner-content">
			            <div class="container">
			                <div class="row row-inner m-auto">
			                    <div class="col-md-12 mb-4 pb-4">
									<!--<header class="page-header" style="text-align: center;">
										<h1 class="page-title"><?php _e( 'Not Found', 'twentythirteen' ); ?></h1>
									</header>-->

									<div class="page-wrapper">
										<div class="page-content" style="text-align: center;">
											<h2 class="title-section text-uppercase cl-light-blue"><?php _e( 'Page not found', 'twentythirteen' ); ?></h2>
											<p class="copy-sing mb-4">Sorry, but the page you are looking for is not found. Please go back to the <a class="cl-light-blue" href="<?php echo esc_url( home_url( '/' ) ); ?>">homepage</a></p>

											<?php get_search_form(); ?>
										</div><!-- .page-content -->
									</div><!-- .page-wrapper -->
								</div>
							</div>
						</div>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>