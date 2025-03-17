<?php
/**
 * Template part for displaying projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('template-parts/sections/section-banner-project');
get_template_part('template-parts/sections/section-back-forth-contain');
get_template_part('template-parts/sections/section-slider-project');
get_template_part('template-parts/sections/section-mansory-bulk-project'); 
get_template_part('template-parts/sections/section-related-projects');
get_template_part('template-parts/sections/section-cta-contact');?>      
</article><!-- #post-<?php the_ID(); ?> -->
