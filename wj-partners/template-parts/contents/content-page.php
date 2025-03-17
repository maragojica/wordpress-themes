<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WJ_Partners
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php get_template_part('template-parts/sections/section-info-page');
 $show_media_section = get_field('show_media_section');	
	if( $show_media_section ):
	get_template_part('template-parts/sections/section-banner-media');
	endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
