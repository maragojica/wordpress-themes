<?php
global $post;
$post_slug = $post->post_name;
$post_type = $post->post_type;

$offers_width = get_sub_field('width');
$offers_float = get_sub_field('float');
$offers_img = get_sub_field('image');
$offers_title = get_sub_field('title');
$offers_content = get_sub_field('content');
$offers_button_text = get_sub_field('button_text');
$offers_button_link = get_sub_field('button_link');
$offers_read_more_button_text = get_sub_field('read_more_button_text');
$offers_read_more_button_link = get_sub_field('read_more_button_link');
$add_graybg = get_sub_field('add_gray_bg_offers');
$add_ellipse = get_sub_field('add_section_ellipse_offers');
?>
<section class="section-grid  <?php if ($add_graybg) : ?>section-grid-bg-video<?php endif; ?> <?php echo $post_slug.' '.'type-'.$post_type; ?> product-grid-two-columns-<?php echo $offers_float == 'Right' ? 'right' : 'left'; ?> position-relative z-index-0">
	<?php if ($add_ellipse) : ?>
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-20 width-15-xl right-10 top-10 top-30-tb z-index-0">
	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-20 width-15-xl left-5 top10 z-index-0">
	<?php endif; ?>
	<div class="<?php echo $offers_width == 'full' ? 'container-fluid pr-0 pl-0' : 'container' ?>">
		<div class="<?php echo $offers_float == 'Right' ? 'row flex-lg-row-reverse' : 'row'; ?> align-items-center justify-content-center <?php echo $offers_width == 'full' ? 'mr-0 ml-0' : '' ?> position-relative z-index-3">
			<div class="col-lg-6 <?php echo $offers_width == 'full' ? ($offers_float == 'Right' ? 'pr-0' : 'pl-0') : ''; ?>">
				<div class="wrap-box position-relative">
					<div class="wrap-image img-resp">
                        <?php if ($offers_img['type'] == 'video') : ?>
                        <?php //echo do_shortcode('[video autoplay="on" preload="auto" loop="on" src="' . $offers_img['url'] . '"]'); ?>
                            <video style="width: 100%; height: auto;" loop playsinline autoplay muted>
                                <source src="<?php echo $offers_img['url']; ?>" type="<?php echo $offers_img['mime_type'] ?>">
                                Your browser does not support the video tag.
                            </video>
                        <?php elseif ($offers_img['type'] == 'image'): ?>
						<img src="<?php echo $offers_img['url']; ?>" alt="<?php echo $offers_img['title']; ?>" />
                        <?php endif; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-text">
				<?php if ($offers_width == 'full' && $offers_float == 'Right') : ?>
                <div class="wrap-text-bullet">
				<?php endif; ?>
				<h2 class="title-offer font-adrianna cl-gray"><?php echo wp_kses_post( $offers_title ); ?></h2>
				<div class="copy-text font-adrianna cl-black pb-4"><?php echo wp_kses_post( $offers_content ); ?></div>
				<div class="stack-btn row">
					<div class="col-md-12">
						<?php if ($offers_button_text != '') : ?>
							<a href="<?php echo wp_kses_post( $offers_button_link ); ?>" class="btn btn-border-orange text-uppercase mr-lg-3"><?php echo wp_kses_post( $offers_button_text ); ?></a>
						<?php endif; ?>
						<?php if ($offers_read_more_button_text != '') : ?>
							<a href="<?php echo wp_kses_post( $offers_read_more_button_link ); ?>" class="btn btn-orange text-uppercase"><?php echo wp_kses_post( $offers_read_more_button_text ); ?></a>
						<?php endif; ?>
					</div>
				</div>
                <?php if ($offers_width == 'full' && $offers_float == 'Right') : ?>
                </div>
		        <?php endif; ?>
			</div>
		</div>
	</div>
</section>