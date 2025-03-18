<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Quantum_Security_&_Innovations
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="error-404 not-found text-center">
			<div class="container">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'quantum-security-innovations' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content dp-1 dp-2">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'quantum-security-innovations' ); ?></p>
					<div class="button-wrapper green p-t05">
					<a tabindex="0" class="button cl-green cl-white-h bg-green-h" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Go to Home" title="Go to Home">Go to Home</a>                            
				</div>
				</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->
	</main><!-- #main -->

<?php
get_footer();
?>
