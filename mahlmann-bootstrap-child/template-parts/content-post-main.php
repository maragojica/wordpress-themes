<?php
/**
 * Template part for displaying posts main
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>
<div class="card card-post w-100 border-0 rounded-0" id="post-<?php the_ID(); ?>">
	<?php $id = get_the_ID();
	$post_categories = get_post_primary_category($id, 'category');
	$primary_category = $post_categories['primary_category'];
	$nameprimary = $primary_category->name;
	$slugprimary = $primary_category->slug; ?>
	<?php the_post_thumbnail(); ?>
	<div class="card-body pt-0 pb-0">
		<h4 class="headline-section cl-m-green pb-0 mb-3 pt-4 no-shadow"><a class="cl-m-green cl-yellow-h" href="/category/<?php echo $slugprimary;?>"><?php echo $nameprimary;?></a></h4>
		<?php the_title( '<h2 class="subheadline-section cl-d-blue"><a class="cl-d-blue cl-yellow-h" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<div class="card-text-main cl-d-gray-2">
			<?php $excerpt = get_the_excerpt();
			$excerpt = substr( $excerpt, 0, 160 ); // Only display first 100 characters of excerpt
			$result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
			echo $result; ?>
		</div>
	</div>
</div>

