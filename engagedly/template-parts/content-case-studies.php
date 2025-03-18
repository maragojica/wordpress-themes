<?php
/**
 * Template part for displaying Cases Studies custom posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Engagedly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="title-section pb-4 mb-0 cl-gray text-uppercase"><?php the_title(); ?></h2>
	<h2 class="sub-title-section pb-4 mb-0 cl-gray text-uppercase"><?php echo get_field('subtitle'); ?></h2>
	<div class="copy-text font-adrianna cl-black pb-4">
		<?php the_content(); ?>
	</div>
</article><!-- #post-## -->
