<?php
/**
 * Template part for displaying services post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php  get_template_part('template-parts/sections/section-info-team'); 	
	get_template_part('template-parts/sections/section-contact'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
