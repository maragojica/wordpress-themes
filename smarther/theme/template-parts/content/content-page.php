<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smarther
 */
$top_space = get_field('add_top_spacing');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content <?php if($top_space): ?> pt-[132px] lg:pt-[135px] xl:pt-[169px] <?php endif; ?>">
		<?php
		the_content();		
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
