<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Celedore_Fine_Wallpaper
 */

get_header("inner");
?>

	<main id="primary" class="site-main">
       <?php $bg_img =  get_field('bg_404', 'option') ?>
		<section class="error-404 not-found text-center" <?php if(!empty($bg_img)): ?>style="background: linear-gradient(rgba(62, 76, 94, 0.70), rgba(62, 76, 94, 0.70)), url('<?php echo esc_url($bg_img); ?>') center center no-repeat;" <?php endif; ?>>
			<div class="container">
			<header class="page-header">
				<h1 class="page-title cl-white"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'celedore-fine' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p class="cl-white"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'celedore-fine' ); ?></p>			
				

			</div><!-- .page-content -->
			</div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
