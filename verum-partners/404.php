<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Verum_Partners
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<div class="container">
			<header class="page-header">
				<h1 class="page-title text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'verum-partners' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content dp-1 text-center">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'verum-partners' ); ?></p>
				<?php get_search_form(); ?>
				<div class="m-t2">                        
					<a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s" href="<?php echo esc_url( home_url( '/' ) );?>" aria-label="Back To Home" title="Back To Home">
				    Back To Home
					<svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
					<path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
				</svg> 
				<svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
					<path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
				</svg>
				</a> 
				</div>
			</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
