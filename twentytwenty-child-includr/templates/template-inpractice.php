<?php
/**
 * Template Name: In Practice Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/contents/content-inpractice' );
		}
	}

	?>

</main><!-- #site-content -->

<?php get_footer(); ?>
