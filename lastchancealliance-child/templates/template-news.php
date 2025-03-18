<?php
/**
 * Template Name: News Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header("inner");
?>

	<?php
	get_template_part( 'template-parts/content-news' );
	?>

<?php get_footer(); ?>
