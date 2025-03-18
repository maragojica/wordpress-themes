<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("article-post"); ?>>
	<div class="row d-flex align-items-center">
		<div class="col-md-6">
			<?php get_template_part( 'template-parts/header/excerpt-header', get_post_format() ); ?>
		</div>
		<div class="col-md-6">
			<?php $category = get_the_category(); ?>
			<h4 class="titleinfo cl-green text-uppercase mb-1 mb-lg-2">
				<?php $i = 1; foreach(get_the_category() as $category)
				{
					if($i>1) { echo '<span class="separator cl-green"> | </span>';}
					echo '<a class="cl-green link-more-post" href="'.get_category_link($category->cat_ID).'">'.$category->cat_name.'</a>';

				$i++; } ?>
			</h4>
			<?php the_title( sprintf( '<h3 class="subtitle cl-dark mb-2 mb-lg-4"><a class="cl-dark link-headline" href="%s">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
			<div class="copy-text cl-body">
				<?php get_template_part( 'template-parts/excerpt/excerpt', get_post_format() ); ?>
			</div><!-- .entry-content -->
		</div>
	</div>
	<div class="row mb-4 mt-2">
		<div class="col-md-12">
			<div class="line bg-line w-100"></div>
		</div>
	</div>


</article><!-- #post-${ID} -->
