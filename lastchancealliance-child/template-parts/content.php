<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<section class="banner-inner-page">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="category"><?php echo get_the_category_list(", "); ?><?php if (get_field('source_inthenews')): ?> <span class="divide">|</span> <?php the_field('source_inthenews'); endif; ?></div>
					<h3 class="headline-section cl-dark pb-3"><?php the_title(); ?></h3>

					<?php $tags = wp_get_post_tags($post->ID);
					if (count($tags) > 0): ?>
						<div>
							<div class="date-post d-inline pr-5"><?php the_date(); ?></div>
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
	</section>
	<section class="info-inner-page">
		<div class="container">
			<?php if ( has_post_thumbnail() ) {
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				$alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>
				<div class="row row-featured-image pb-5 mb-5">
					<div class="col-md-12">
						<img class="m-auto w-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
					</div>
				</div>
			<?php } ?>
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="copy-text sm-text light-content cl-dark-2 mb-5">
						<?php the_content(); ?>
					</div>
					<div class="line-separator w-100"></div>
				</div>
			</div>
			<?php
			$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'post__not_in' => array($post->ID),
					'orderby'=>'post_date',
					'order'=>'desc'
			);
			$wp_query = new WP_Query($args); ?>
			<div class="row section-news row-recent-news pb-5">
				<div class="col-md-12">
					<h4 class="title-topic cl-dark-blue pb-5">Recent News</h4>
				</div>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post();
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					$id = get_the_ID();
					$post_categories = get_post_primary_category($id, 'category');
					$primary_category = $post_categories['primary_category'];
					$nameprimary = $primary_category->name;
					$externalink = get_field('external_link_inthenews');
					if ($externalink) {
						$link_url = $externalink['url'];
						$link_title = $externalink['title'];
						$link_target = $externalink['target'] ? $externalink['target'] : '_self'; ?><?php } ?>
					<div class="col-md-4 mb-4">
						<div class="ih-item item-post square effect6 from_top_and_bottom">
							<?php if ($nameprimary == "In the News") { ?>
							<a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
								<?php }else{ ?>
								<a href="<?php the_permalink(); ?>">
									<?php } ?>
									<div class="img"><img src="<?php echo $featured_img_url;?>" alt="<?php the_title();?>"></div>
									<div class="info">
										<h3 class="title-item-post cl-white"><?php echo get_small_title(70,0);?>
											<svg class="d-inline-block ml-3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="34px">
												<image  x="0px" y="0px" width="24px" height="34px"  xlink:href="data:img/png;base64,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" />
											</svg>
										</h3>
									</div>
								</a>
						</div>
					</div>
				<?php endwhile;  wp_reset_query(); ?>
			</div>
		</div>
	</section>
</article>
