<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CR_Jackson
 */

get_header("inner");
?>

	<main id="primary" class="site-main">
	<div class="container">
		<div class="row middle-xs justify-center">
			<div class="col-xs-12 col-lg-10 m-t3 m-b3">
				<section class="error-404 not-found text-center">
					<header class="page-header">
						<h1 class="page-title cl-blue"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cr-jackson' ); ?></h1>
					</header><!-- .page-header -->

					<div class="page-content dp-1 cl-blue">
						<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cr-jackson' ); ?></p>	
					</div><!-- .page-content -->

					<div class="button-list m-t2 center-xs">  										
							<a class="btn cta-btn" tabindex="0" href="<?php echo esc_url( home_url( '/' ) );?>" aria-label="Back Home" title="Back Home">
								Back To Home
							</a> 
						<div>	
				</section><!-- .error-404 -->
		</div>
		</div>
	</div>
	</main><!-- #main -->

<?php
get_footer();
