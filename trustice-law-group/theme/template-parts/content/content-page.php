<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Trustice_Law_Group
 */
$top_space = get_field('add_top_spacing');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content <?php if($top_space): ?> pt-[119px] xl:pt-[190px] <?php endif; ?>">
		<?php
		the_content();		
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
