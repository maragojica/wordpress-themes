<?php
/**
 * Template part for displaying content projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php  
	get_template_part('template-parts/sections/section-project-banner');
	get_template_part('template-parts/sections/section-project-info');
	get_template_part('template-parts/sections/section-contact-sm');  ?>	
</article><!-- #post-<?php the_ID(); ?> -->
