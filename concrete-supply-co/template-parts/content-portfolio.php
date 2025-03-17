<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('template-parts/section-portfolio-banner');         
    get_template_part('template-parts/section-portfolio-details'); 
	get_template_part('template-parts/section-related-portfolio'); ?>	
</article><!-- #post-<?php the_ID(); ?> -->
