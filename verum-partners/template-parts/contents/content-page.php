<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part('template-parts/sections/section-default-banner'); 
	get_template_part('template-parts/sections/section-info'); 	
	get_template_part('template-parts/sections/section-contact'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
