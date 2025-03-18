<?php
/**
 * Displays the content when the in practice template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php $title_description = get_field('title_description'); $description_inpractice = get_field('description_inpractice');
	if($title_description || $description_inpractice): ?>
	<div class="section-info-page">
		<div class="container">
			<div class="info-page" uk-alert>
				<a class="uk-alert-close" uk-close></a>
				<h3>
					<?php if($title_description): ?>
					<span><?php echo $title_description;?> <svg class="icon-info-page mr-2 ml-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"> <image  x="0px" y="0px" width="24px" height="24px"  xlink:href="data:img/png;base64,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" />	</svg>
					</span>
					<?php endif; ?>
					<?php if($description_inpractice): echo $description_inpractice; endif; ?>
				</h3>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php $top_article = get_field('top_article_inpractice');
	if($top_article): $idarcticle = $top_article->ID; ?>
	<div class="section-featured-page">
		<div class="container">
			<div class="row equal align-items-md-center">
				<div class="col-sm col-featured-img">
					<?php if ( has_post_thumbnail($idarcticle) ) {
						$featured_img_url = get_the_post_thumbnail_url($idarcticle,'full');
						$thumbnail_id = get_post_thumbnail_id( $idarcticle );
						$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
						<a href="<?php echo esc_url( get_permalink($idarcticle) ); ?>">
							<img class="img-fluid img-fit-top w-100 h-100 pb-4 pb-sm-0" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
						</a>
					<?php } ?>
				</div>
				<div class="col-sm">
					<div class="card-post post-red pb-sm-0 pb-4 pl-md-5 pl-0">
						<?php
						$taxslug = "practice_cat";
						$arcticle_terms = wp_get_object_terms( $idarcticle,  $taxslug );
						if ( ! empty( $arcticle_terms ) ) {
							if ( ! is_wp_error( $arcticle_terms ) ) { ?>
								<div class="category-post pb-3 pb-lg-4">
									<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
										<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,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" />
									</svg>
									<?php $j = 1; foreach( $arcticle_terms as $term ) { ?>
										<?php if($j > 1 && $j <= 3):?>, <?php endif; ?>
										<?php if($j <= 3):?>
											<a href="<?php echo esc_url( get_term_link( $term->slug, $taxslug ) );?>"><?php echo esc_html( $term->name );?></a>
										<?php endif; ?>
										<?php $j++; } ?>
								</div>
							<?php } }?>
						<h2 class="title-post cl-dark pb-4"><a href="<?php echo esc_url( get_permalink($idarcticle) ); ?>" class="cl-dark"><?php echo esc_html( $top_article->post_title ); ?></a></h2>
						<div class="copy-text"><?php echo get_the_excerpt($idarcticle); ?></div>
					</div>
				</div>
				<div class="col-md-12">
					<hr class="hr-lg hide-sm">
				</div>

			</div>
		</div>
	</div>
	<?php  endif; ?>
	<?php $left_article = get_field('sidebar_left_articles');
	if($left_article): $idarcticle = $left_article->ID; ?>
	<div class="section section-main-post d-flex align-items-center mb-md-5">
		<div class="container">
			<div class="row equal">
				<div class="col-sm-11 col-md-10 col-lg-7 col-main-sidebar">
					<?php $i = 0; foreach( $left_article as $post ):
					setup_postdata($post); ?>
							<div class="card-post post-red">
								<div class="row equal align-items-md-center">
									<div class="col-sm-5">
										<?php if ( has_post_thumbnail() ) {
											$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
											$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
											$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
											<a href="<?php the_permalink(); ?>">
												<div class="box-img-article">
													<img class="img-fluid img-fit-center w-100 h-100 pb-4 pb-sm-0" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
												</div>
											</a>
										<?php } ?>
									</div>
									<div class="col-sm pb-sm-0 pb-4">
										<?php
										$taxslug = "practice_cat";
										$arcticle_terms = wp_get_object_terms( $post->ID,  $taxslug );
										if ( ! empty( $arcticle_terms ) ) {
											if ( ! is_wp_error( $arcticle_terms ) ) { ?>
												<div class="category-post pb-3 pb-lg-4">
													<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
														<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,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" />
													</svg>
													<?php $j = 1; foreach( $arcticle_terms as $term ) { ?>
														<?php if($j > 1 && $j <= 3):?>, <?php endif; ?>
														<?php if($j <= 3):?>
															<a href="<?php echo esc_url( get_term_link( $term->slug, $taxslug ) );?>"><?php echo esc_html( $term->name );?></a>
														<?php endif; ?>
														<?php $j++; } ?>
												</div>
											<?php } }?>
										<h3 class="title-post cl-dark pb-4 pr-0 pl-0"><a href="<?php the_permalink(); ?>" class="cl-dark"><?php the_title(); ?></a></h3>
										<div class="copy-post"><?php the_excerpt(); ?></div>
									</div>
								</div>
							</div>
							<?php if($i < count($left_article) - 1): ?><hr class="hr-lg hide-sm"><?php endif; ?>
					<?php $i++; endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php  wp_reset_postdata(); endif; ?>
	<?php $full_article = get_field('full_article');
	if($full_article): $idarcticle = $full_article->ID; ?>
	<div class="section-quote-inpractice section-quote-inside bg-dark mb-md-3 mb-lg-5">
		<div class="container-fluid pr-0 pl-0">
			<div class="row equal align-items-lg-center flex-sm-row-reverse mr-0 ml-0">
				<div class="col-md pr-0 pl-0 d-flex align-items-lg-center">
					<div class="box-info">
						<h4 class="title-section cl-red">In Practice</h4>
						<div class="quote cl-white pt-4 pt-lg-5 pb-md-4 pb-lg-5"><a href="<?php echo esc_url( get_permalink($idarcticle) ); ?>" class="cl-white cl-white-h">“<?php echo esc_html( $full_article->post_title ); ?>”</a></div>
						<div class="copy-text cl-ligth2 hide-md"><?php echo get_the_excerpt($idarcticle); ?></div>
					</div>
				</div>
				<div class="col-md-5 pr-0 pl-0">
					<?php if ( has_post_thumbnail($idarcticle) ) {
						$featured_img_url = get_the_post_thumbnail_url($idarcticle,'full');
						$thumbnail_id = get_post_thumbnail_id( $idarcticle );
						$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
						<a href="<?php echo esc_url( get_permalink($idarcticle) ); ?>">
							<img class="img-fluid img-quote-inpractice w-100 h-auto pb-0" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
						</a>
					<?php } ?>
					<div class="box-info hide-tb">
					<div class="copy-text cl-ligth2"><?php echo get_the_excerpt($idarcticle); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php  endif; ?>
	<?php $query = array(
		'post_type' => 'practice',     //all articles(practice) order by date
		'post_status' => 'publish',
		'orderby' => 'post_date',
		'order' => 'desc',
		'posts_per_page' => -1
);
$allpost = new WP_Query($query); ?>
	<?php if ( $allpost->have_posts() ) : ?>
	<div class="section-recent-articles section-all-stories mb-md-5 mb-0 red-links">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="title-post cl-dark pb-5">All Stories</h4>
				</div>
			</div>
			<div class="row equal loadmoreitemsarticles">
		<?php while($allpost->have_posts()) : $allpost->the_post();
			$taxslug = "practice_cat"; ?>
				<div class="col-md-4 col-lg-3 mb-md-5 col-post-items">
					<div class="card-post post-red">
						<div class="row equal align-items-start">
							<div class="col-4 col-md-12 order-2 order-md-1">
								<?php if ( has_post_thumbnail() ) {
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
									$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
									$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
									<a href="<?php the_permalink(); ?>">
										<div class="box-card-img pb-md-4">
											<img class="img-fluid img-fit-center w-100 h-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
										</div>
									</a>
								<?php } ?>
							</div>
							<div class="col-8 col-md-12 order-1 order-md-2">
								<?php $arcticle_terms = wp_get_object_terms( get_the_ID(),  $taxslug );
								if ( ! empty( $arcticle_terms ) ) {
									if ( ! is_wp_error( $arcticle_terms ) ) { ?>
										<div class="category-post pb-3 pb-lg-4">
											<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
												<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,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" />
											</svg>
											<?php $j = 1; foreach( $arcticle_terms as $term ) { ?>
												<?php if($j > 1 && $j <= 3):?>, <?php endif; ?>
												<?php if($j <= 3):?>
													<a href="<?php echo esc_url( get_term_link( $term->slug, $taxslug ) );?>"><?php echo esc_html( $term->name );?></a>
												<?php endif; ?>
												<?php $j++; } ?>
										</div>
									<?php } }?>
								<h5 class="title-post cl-dark pb-md-3"><a href="<?php the_permalink(); ?>" class="cl-dark"><?php the_title();?></a></h5>
								<div class="copy-post"><?php the_excerpt(); ?></div>
							</div>
						</div>
					</div>
					<hr class="hide-tb">
				</div>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
	<?php endif; wp_reset_postdata();?>
</article><!-- .post -->