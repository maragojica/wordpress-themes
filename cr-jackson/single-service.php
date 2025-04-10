<?php
/**
 * The template for displaying all single services
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package CR_Jackson
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/contents/content', "service" );

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
