<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Traditions_of_Charlotte
 */

 get_header("inner");
 ?>

 <main id="primary" class="site-main">
	<?php $bg_img =  get_field('bg_404', 'option') ?>
	 <section class="error-404 not-found text-center" <?php if(!empty($bg_img)): ?>style="background: linear-gradient(rgba(98, 114, 100, 0.70), rgba(98, 114, 100, 0.70)), url('<?php echo esc_url($bg_img); ?>') center center no-repeat;" <?php endif; ?>>
		 <div class="container">
		 <header class="page-header">
			 <h1 class="page-title cl-white"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'celedore-fine' ); ?></h1>
		 </header><!-- .page-header -->

		 <div class="page-content">
			 <p class="cl-white"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'celedore-fine' ); ?></p>			
			 <a tabindex="0" class="btn btn-forest-green hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Back Home" title="Back Home"><span>Back Home</span></a>                             

		 </div><!-- .page-content -->
		 </div>
	 </section><!-- .error-404 -->

 </main><!-- #main -->

<?php
get_footer();
