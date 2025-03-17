<?php
/**
 * The template for displaying all cmp products cpt
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Construction_Metal_Products
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/contents/content', "cmp-product" );
			

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
