<?php
/**
 * Displays the content when the in perspective template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php $title_description = get_field('title_description_pers'); $description_inpractice = get_field('description_pers');
	if($title_description || $description_inpractice): ?>
	<div class="section-info-page">
		<div class="container">
			<div class="info-page" uk-alert>
				<a class="uk-alert-close" uk-close></a>
				<h3>
		        <?php if($title_description): ?>
					<span><?php echo $title_description;?> <svg class="icon-info-page mr-2 ml-2 d-inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"> <image  x="0px" y="0px" width="24px" height="24px"  xlink:href="data:img/png;base64,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" /> </svg>
					</span>
			    <?php endif; ?>
					<?php if($description_inpractice): echo $description_inpractice; endif; ?>
				</h3>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php $top_article = get_field('top_article_pers');
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
					<div class="card-post post-purple pb-sm-0 pb-4 pl-md-5 pl-0">
						<?php
						$taxslug = "perspective_cat";
						$arcticle_terms = wp_get_object_terms( $idarcticle,  $taxslug );
						if ( ! empty( $arcticle_terms ) ) {
							if ( ! is_wp_error( $arcticle_terms ) ) { ?>
								<div class="category-post pb-3 pb-lg-4">
									<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
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
	<?php $left_article = get_field('sidebar_left_articles_pers');
	if($left_article): $idarcticle = $left_article->ID; ?>
	<div class="section section-main-post d-flex align-items-center mb-md-5">
		<div class="container">
			<div class="row equal">
				<div class="col-sm-11 col-md-10 col-lg-7 col-main-sidebar">
		<?php $i = 0; foreach( $left_article as $post ):
			setup_postdata($post); ?>
				<div class="card-post post-purple">
						<div class="row equal align-items-md-center">
							<div class="col-sm-5">
								<?php if ( has_post_thumbnail() ) {
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
									$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
									$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
									<a href="<?php the_permalink(); ?>">
										<div class="box-img-article">
											<img class="img-fluid img-fit-top w-100 h-100 pb-4 pb-sm-0" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
										</div>
									</a>
								<?php } ?>
							</div>
							<div class="col-sm pb-sm-0 pb-4">
								<?php
								$taxslug = "perspective_cat";
								$arcticle_terms = wp_get_object_terms( $post->ID,  $taxslug );
								if ( ! empty( $arcticle_terms ) ) {
									if ( ! is_wp_error( $arcticle_terms ) ) { ?>
										<div class="category-post pb-3 pb-lg-4">
											<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
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

	<div class="section-quote-inperspective section-quote-inside bg-dark d-flex align-items-center mb-md-3 mb-lg-5">
		<div class="container">
			<div class="row align-items-center row-center m-auto row-xs-100">
				<div class="col-md-12">
					<?php $title_article = get_field('title_article_pers');
					$post_article = get_field('select_article_pers');
					$idarcticle = $post_article->ID;
					$quote_article = get_field('quote_article_pers');
					$author_article = get_field('author_article_pers');
					$author_title = get_field('author_title_pers');
					$author_image = get_field('author_image_pers');?>
					<h4 class="title-section cl-purple"><?php if($title_article):  echo $title_article; endif; ?><?php if( $post_article ): ?> <span class="pl-md-4 pt-md-0 pt-4">From article <a class="cl-gray cl-white-h" href="<?php echo esc_url( get_permalink($idarcticle) ); ?>"><i><?php echo esc_html( $post_article->post_title ); ?></i></a></span><?php endif; ?></h4>
					<?php if( $quote_article ): ?>
						<div class="quote cl-white pt-4 pt-md-5 pb-5"><?php echo $quote_article;?></div>
					<?php endif; ?>
					<div class="quote-author d-flex align-items-center justify-content-end">
						<?php if($author_article || $author_title): ?>
							<span class="pr-md-5 pr-3"><?php if($author_article): ?>By <?php echo $author_article; endif; ?><?php if($author_title): ?>, <?php echo $author_title; endif; ?></span>
						<?php endif; ?>
						<?php if( !empty($author_image) ): ?>
							<svg xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink"	width="21px" height="21px">
								<image  x="0px" y="0px" width="21px" height="21px"  xlink:href="data:img/png;base64,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" />
							</svg>
							<img class="rounded-circle img-quote" src="<?php echo esc_url($author_image['url']); ?>" alt="<?php echo esc_attr($author_image['alt']); ?>">
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $query = array(
			'post_type' => 'perspective',     //all articles(perspective) order by date
			'post_status' => 'publish',
			'orderby' => 'post_date',
			'order' => 'desc',
			'posts_per_page' => -1
	);
	$allpost = new WP_Query($query); ?>
	<?php if ( $allpost->have_posts() ) : ?>
	<div class="section-recent-articles section-all-stories mb-md-5 mb-0 purple-links">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="title-post cl-dark pb-5">All Stories</h4>
				</div>
			</div>
			<div class="row equal loadmoreitemsarticles">
		<?php while($allpost->have_posts()) : $allpost->the_post();
			$taxslug = "perspective_cat"; ?>
				<div class="col-md-4 col-lg-3 mb-md-5 col-post-items">
					<div class="card-post post-purple">
						<div class="row equal align-items-start">
							<div class="col-4 col-md-12 order-2 order-md-1">
								<div class="box-card-img pb-md-4">
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
							</div>
							<div class="col-8 col-md-12 order-1 order-md-2">
								<?php $arcticle_terms = wp_get_object_terms( get_the_ID(),  $taxslug );
								if ( ! empty( $arcticle_terms ) ) {
									if ( ! is_wp_error( $arcticle_terms ) ) { ?>
										<div class="category-post pb-3 pb-lg-4">
											<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
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