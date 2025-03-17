<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celedore_Fine_Wallpaper
 */

?>
<?php get_template_part('template-parts/sections/section-info-text'); 
$show_content_page = get_field('show_content_page'); 
if($show_content_page): ?>
<article id="post-<?php the_ID(); ?>" <?php post_class("p-t4"); ?>>
	
	<div class="container">
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php celedore_fine_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();
		
		?>
	</div><!-- .entry-content -->	
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>
<?php get_template_part('template-parts/sections/section-subscribe'); ?>
