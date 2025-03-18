<?php
/**
 * The template part for displaying results in search pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article class="wow fadeIn pt-5 mt-5" data-wow-delay="0.3s" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $id = get_the_ID();
	$post_categories = get_post_primary_category($id, 'category');
	$primary_category = $post_categories['primary_category'];
	$nameprimary = $primary_category->name;
	$excerpt = get_field('excerpt_inthenews');
	$externalink = get_field('external_link_inthenews');
	if ($externalink) {
		$link_url = $externalink['url'];
		$link_title = $externalink['title'];
		$link_target = $externalink['target'] ? $externalink['target'] : '_self'; ?><?php } ?>
	<div class="row-news-items">
		<div class="row">
			<?php if (has_post_thumbnail()) { ?>
				<div class="col-md-5">
					<?php if ($nameprimary == "In the News") { ?>
						<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
							<img  src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
					<?php } else { ?>
						<a href="<?php the_permalink(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(); ?>"></a>
					<?php } ?>
				</div>           <?php } ?>
			<div class="col-md pt-4">
				<div class="inner-news">
					<div>
						<div class="category"><?php echo get_the_category_list(", "); ?><?php if (get_field('source_inthenews')): ?> <span class="divide">|</span> <?php the_field('source_inthenews'); endif; ?></div>
						<?php if ($nameprimary == "In the News") { ?>
							<h3><a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"><?php the_title(); ?></a>
							</h3>
						<?php } else { ?>
							<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a> </h3>
						<?php } ?>
						<div  class="mb-5">
							<?php if ($nameprimary == "In the News") { ?>
								<strong class="date"><?php the_date(); ?></strong> &ndash;
								<?php if ($excerpt) {
									echo strip_tags($excerpt);
								} ?>
								<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>"   class="read-more"><?php echo $link_title; ?> &rarr;</a>
							<?php } else { ?>
								<strong class="date"><?php the_date(); ?></strong> &ndash; <?php echo strip_tags(get_the_excerpt()); ?>
								<a href="<?php the_permalink(); ?>" class="read-more">READ MORE &rarr;</a>
							<?php } ?>
						</div>
					</div>
					<?php $tags = wp_get_post_tags($post->ID);
					if (count($tags) > 0): ?>
						<div>
							<div class="tags d-inline"><strong>TAGS: </strong>
								<?php $buffer_tags = array();
								foreach ($tags as $tag) {
									$buffer_tags[] = $tag->name;
								}
								echo implode(', ', $buffer_tags); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="line-separator w-100"></div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

