<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php  get_template_part('template-parts/sections/section-post-banner');
get_template_part('template-parts/sections/section-info-blog');
get_template_part('template-parts/sections/section-post-navigation');
 get_template_part('template-parts/sections/section-subscriptions'); 
 get_template_part('template-parts/sections/section-contact'); 
 ?>
</article><!-- #post-<?php the_ID(); ?> -->
