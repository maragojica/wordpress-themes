<?php
/**
 * The Template for displaying all single posts.
 */

get_header("inner");

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		
		get_template_part( 'template-parts/contents/content', 'single' );
		
	endwhile;
endif;

wp_reset_postdata();


get_footer();
