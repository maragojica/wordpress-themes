<?php
/**
 * Template part for displaying White Papers custom posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Engagedly
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="copy-text font-adrianna cl-black pb-4">
		<?php the_content(); ?>
	</div>
</article><!-- #post-## -->
