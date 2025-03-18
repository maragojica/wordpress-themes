<?php
/**
 * The Template for displaying Category Archive pages.
 */

get_header();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class("bg-lighter"); ?>>
	<section class="banner-inside pt-md-5 pb-md-5 pt-3 pb-3 d-flex align-items-center position-relative bg-lighte">
		<div class="container z-index-2">
			<div class="row justify-content-center text-center pt-5">
				<div class="col-md-12 pt-5">
					<h2 class="cl-dark-green text-uppercase">
						<?php printf( esc_html__( 'Category Archives: %s', 'starter-theme-bootstrap' ), single_cat_title( '', false ) ); ?>
					</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="section-resources  bg-lighter pb-md-5">
		<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
			<div class="row equal">
				<?php
				if ( have_posts() ) :
					get_template_part( 'archive', 'loop' );
				else :
					// 404.
					get_template_part( 'content', 'none' );
				endif; ?>
			</div><!-- /.row -->
		</div>
	</section>
</article><!-- /#post-<?php the_ID(); ?> -->
<?php wp_reset_postdata(); // End of the loop.

get_footer();
