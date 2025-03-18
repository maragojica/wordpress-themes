<?php
/**
 * The template for displaying single podcast.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/contents/content', 'single-podcast' );
		}
	}

	?>

</main><!-- #site-content -->
<?php get_footer(); ?>
