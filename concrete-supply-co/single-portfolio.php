<?php
/**
 * The template for displaying all single portfolios
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Concrete_Supply_Co
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
