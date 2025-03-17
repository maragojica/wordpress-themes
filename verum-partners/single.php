<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Verum_Partners
 */

get_header("bg");
?>

	<main id="primary" class="site-main main-bg">

		<?php
		while ( have_posts() ) :
			the_post();		

			if ( in_category( 'audio' ) ) {
				get_template_part( 'template-parts/contents/content', 'cat-audio' );
			} 
			else {
				get_template_part( 'template-parts/contents/content', get_post_type() );
			}
			
						

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
