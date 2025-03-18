<?php
/**
 * Template Name: Action Hub Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content-actionhub' );
		}
	}
	?>

<?php get_footer(); ?>
