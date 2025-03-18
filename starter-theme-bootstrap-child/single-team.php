<?php
/**
 * The Template for displaying all single team members.
 */

get_header("inner");

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		
		get_template_part( 'template-parts/contents/content', 'single-team' );
		
	endwhile;
endif;

wp_reset_postdata();


get_footer();
