<?php
/**
 * The template for displaying all single projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Verb_Studios
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/contents/content', 'project' );			
			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
