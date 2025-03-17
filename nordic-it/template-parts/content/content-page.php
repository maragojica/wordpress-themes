<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nordic_IT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("inner-content"); ?>>
<div class="entry-content">
		<?php
		the_content();		
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
