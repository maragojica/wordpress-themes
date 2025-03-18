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
	<div class="card-body pt-0 pb-0">
		<h5 class="card-subtitle cl-orange pb-0 mb-3 pt-3 no-shadow text-uppercase"><a class="cl-orange" href="/category/<?php echo $slugprimary;?>"><?php echo $nameprimary;?></a></h5>
		<?php the_title( '<h2 class="subheadline cl-blue-d">', '</h2>' ); ?>
        <?php the_post_thumbnail(); ?>
        <div class="copy-text copy-lg cl-black pt-4">
            <?php the_content();?>
        </div>
	</div>
</div>

