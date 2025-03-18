<?php
/**
 * The Template for displaying all single knowledge hub.
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single-knowledge-hub' );

	endwhile;
endif;

wp_reset_postdata(); ?>


<?php get_footer(); ?>
