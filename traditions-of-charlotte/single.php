<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Traditions_of_Charlotte
 */

get_header("inner");
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/contents/content', get_post_type() );		
		
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
