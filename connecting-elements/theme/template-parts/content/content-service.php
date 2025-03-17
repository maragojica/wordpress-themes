<?php
/**
 * Template part for displaying single services posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package connecting-elements
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="entry-content">
		<?php
		the_content();		
		?>
	</div><!-- .entry-content -->

</article><!-- #post-${ID} -->
