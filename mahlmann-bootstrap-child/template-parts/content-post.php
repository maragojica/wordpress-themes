<?php
/**
 * Template part for displaying posts
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
	<div class="card-body pt-0">
		<h4 class="card-subtitle cl-orange text-uppercase pb-0 mb-2 pt-3 no-shadow"><a class="cl-orange" href="/category/<?php echo $slugprimary;?>"><?php echo $nameprimary;?></a></h4>
		<?php the_title( '<h5 class="card-subtitlecl-blue-d"><a class="cl-blue-d cl-orange-h" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
		<div class="copy-text cl-black">
			<?php $excerpt = get_the_excerpt();
			$excerpt = substr( $excerpt, 0, 85 ); // Only display first 50 characters of excerpt
			$result = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );
			echo $result."..."; ?>
		</div>
	</div>
</div>

