<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WJ_Partners
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('template-parts/sections/section-info-blog');
get_template_part('template-parts/sections/section-related-news'); 
get_template_part('template-parts/sections/section-banner-media'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
