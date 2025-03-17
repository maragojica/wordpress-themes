<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<h2 class="entry-title section-title text-uppercase cl-blue mt-0 mb-0"><?php the_title();?></h2>
	</header><!-- .entry-header -->	
	<div class="description cl-black entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<a href="<?php echo esc_url( get_permalink() ) ;?>" aria-label="Read More" title="Read More" tabindex="0" class="section-subtitle text-uppercase link-read-more" >Read More</a>
</article><!-- #post-<?php the_ID(); ?> -->
