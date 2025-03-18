<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

	if ( is_attachment() ) {
		// Parent post navigation.
		the_post_navigation(
			array(
				/* translators: %s: Parent post link. */
				'prev_text' => sprintf( __( '<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'twentytwentyone' ), '%title' ),
			)
		);
	} ?>

	<section class="section-list-news mt-0 mb-0 section-100 bg-grey-ligth pt-5 pb-5">
		<div class="container">
			<div class="row pb-3">
				<div class="col-md-12">
					<h3 class="subtitle cl-dark mb-4">Related News</h3>
				</div>
			</div>
			<div class="row">
				<?php
				$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 4,
						'orderby'=>'post_date',
						'order'=>'desc'
				);
				$wp_query = new WP_Query($args); ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
					<div class="col-md-6 mb-4 col-news">
						<h4 class="title-news mb-2 cl-green"><a class="cl-green" href="<?php the_permalink(); ?>"><?php the_title();?> →</a></h4>
						<div class="copy-text cl-body pb-3">
							<?php echo strip_tags(get_the_excerpt()); ?>
						</div>
					</div>
				<?php endwhile;  wp_reset_query(); ?>
			</div>
		</div>
	</section>
<?php endwhile; // End of the loop.

get_footer(); ?>
