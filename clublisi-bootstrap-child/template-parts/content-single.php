<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="section-banner-single">
		<div class="section-single position-relative  mx-md-5 mx-3 mt-md-5 mt-3">
			<?php
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			$thumb_id = get_post_thumbnail_id();
			$alt = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
			 if (has_post_thumbnail()): ?>
				<img class="img-fluid fit-cover-center-top w-100 h-100" width="1618" height="559" src="<?php echo esc_url($featured_img_url); ?>" alt="<?php echo esc_attr($alt); ?>" />
			<?php endif; ?>
			<div class="overlay overlay-banner d-flex align-items-center justify-content-center">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-sm-8 col-md-6">
							<div class="line-banner"></div>
							<?php $banner_text = get_field('banner_text');
							if($banner_text): ?>
								<div class="headline text-center cl-white pt-4 pb-4"><?php echo $banner_text;?></div>
							<?php endif; ?>
							<div class="line-banner"></div>
						</div>
					</div>
				</div>
				<div class="pt-3 box-banner-link">
					<a class="link-post d-flex justify-content-center flex-column align-items-center text-center cl-white" href="#singlecontent" aria-label="Scroll Single">scroll<div class="line-cta"></div></a>
				</div>
			</div>
		</div>
		<div class="footer-banner mx-md-5 mx-3 my-3">
			<div class="d-flex align-items-center justify-content-md-between justify-content-end">
				<?php $banner_footer = get_field('banner_footer');
				if($banner_footer): ?>
				<div class="banner-footer hide-md"><?php echo $banner_footer;?></div>
				<?php endif; ?>
				<div class="share-single d-flex align-items-center">
					<div class="banner-footer">share  //  </div><?php echo do_shortcode('[addtoany]'); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="single-content pt-5 pb-5" id="singlecontent">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-9">
					<div class="dp-1 cl-dark"><?php the_content();?></div>
					<div class="row justify-content-center align-items-center">
						<div class="col-md-6 pe-md-4">
							<?php $quote_title = get_field('quote_title');
							if($quote_title): ?>
							<h2 class="cl-dark text-md-start text-center"><?php echo $quote_title;?></h2>
							<?php endif; ?>
						</div>
						<div class="col-md">
							<?php $quote_text = get_field('quote_text');
							if($quote_text): ?>
								<div class="dp-1 cl-dark"><?php echo $quote_text;?></div>
							<?php endif; ?>
						</div>
					</div>
					<?php $info_text= get_field('info_text');
					if($info_text): ?>
						<div class="dp-1 cl-dark"><?php echo $info_text;?></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="row text-center justify-content-center pt-md-5 pb-md-5">
				<div class="col-md-9">
					<?php $title_bottom = get_field('title_bottom');
					if($title_bottom):?>
							<h2 class="cl-dark"><?php echo $title_bottom;?></h2>
					<?php endif; ?>
					<?php $cta_bottom = get_field('cta_bottom');
					if($cta_bottom) {
						$link_url = $cta_bottom['url'];
						$link_title = $cta_bottom['title'];
						$link_target = $cta_bottom['target'] ? $cta_bottom['target'] : '_self';?>
							<div class="pt-3">
								<a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?><div class="line-cta"></div></a>
							</div>
					<?php } ?>
					<?php $info_bottom = get_field('info_bottom');
					if($info_bottom): ?>
						<div class="info-bottom-single footer-banner text-center mt-5 pt-5 pb-5"><?php echo $info_bottom;?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
</article><!-- /#post-<?php the_ID(); ?> -->
