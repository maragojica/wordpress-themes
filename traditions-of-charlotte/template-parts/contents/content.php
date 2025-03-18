<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php get_template_part('template-parts/sections/section-post-banner'); 
get_template_part('template-parts/sections/section-info-blog'); 
get_template_part('template-parts/sections/section-related-news'); 
get_template_part('template-parts/sections/section-contact-sm');  ?>

</article><!-- #post-<?php the_ID(); ?> -->
