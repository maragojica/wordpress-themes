<?php
/**
 * Template Name: Partners Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header("inner");
?>

	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content-partners' );
		}
	}
	?>

<?php get_footer(); ?>
