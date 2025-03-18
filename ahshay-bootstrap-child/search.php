<?php
/**
 * The Template for displaying Search Results pages.
 */

get_header();


?>
<article id="post-<?php the_ID(); ?>" <?php post_class("bg-lighter"); ?>>
	<section class="banner-inside pt-md-5 pb-md-5 pt-3 pb-3 d-flex align-items-center position-relative bg-lighter">
		<div class="container z-index-2">
			<div class="row justify-content-center text-center">
				<div class="col-md-12">
					<h2 class="cl-dark-green">
						<?php printf( esc_html__( 'Search Results for: %s', 'starter-theme-bootstrap' ), get_search_query() ); ?>
					</h2>
				</div>
			</div>
		</div>
	</section>
	<section class="section-resources bg-lighter pb-md-5">
		<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
			<div class="row equal">
				<?php
				if ( have_posts() ) :
					get_template_part( 'archive', 'loop' );
				else : ?>
					<div class="dp-1">
						<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'starter-theme-bootstrap' ); ?></p>
						<?php
						get_search_form();
						?>
					</div>
				<?php endif; ?>
			</div><!-- /.row -->
		</div>
	</section>
</article><!-- /#post-<?php the_ID(); ?> -->
<?php
wp_reset_postdata();

get_footer(); ?>
