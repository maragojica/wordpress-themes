<?php
/**
 * The Template for displaying all single resources.
 */

get_header();

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'single-resources' );

	endwhile;
endif;

wp_reset_postdata(); ?>


<?php get_footer(); ?>
