<?php
$image_text_design = get_sub_field('design');
$image_text_image = get_sub_field('image');
$image_text_title = get_sub_field('title');
$image_text_subtitle = get_sub_field('subtitle');
$image_text_content = get_sub_field('content');
$image_text_button_text = get_sub_field('button_text');
$image_text_button_link = get_sub_field('button_link');
$image_text_read_more_button_text = get_sub_field('read_more_button_text');
$image_text_read_more_button_link = get_sub_field('read_more_button_link');

if (!empty($image_text_design[0])) : ?>
    <section id="section-offers-container-width" class="section-offers-our-mission">
        <section class="section-grid product-grid-two-columns-right">
            <div class="container-fluid">
                <div class="row flex-lg-row-reverse align-items-center justify-content-center">
                    <div class="col-lg-6 pr-0">
                        <div class="wrap-box position-relative">
                            <div class="wrap-image img-resp">
                                <img src="<?php echo $image_text_image['url']; ?>" alt="<?php echo $image_text_image['title']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-text-our-mission col-lg-6 pt-4 pb-4">
                        <div class="box-text-our-mission">
                            <h2 class="title-offer text-uppercase font-adrianna cl-gray"><?php echo wp_kses_post( $image_text_title ); ?></h2>
                            <?php if ($image_text_subtitle != '') : ?>
                                <h2 class="title-section cl-white font-adrianna pb-2"><?php echo wp_kses_post( $image_text_subtitle ); ?></h2>
                            <?php endif; ?>
                            <div class="copy-text font-adrianna cl-black pb-4"><?php echo wp_kses_post( $image_text_content ); ?></div>
                            <div class="stack-btn row">
                                <div class="col-md-12">
                                    <?php if ($image_text_button_text != '') : ?>
                                        <a href="<?php echo $image_text_button_link; ?>" class="btn btn-orange text-uppercase"><?php echo $image_text_button_text; ?></a>
                                    <?php endif; ?>
                                    <?php if ($image_text_read_more_button_text != '') : ?>
                                        <a href="<?php echo $image_text_read_more_button_link; ?>" class="btn btn-border-orange text-uppercase mr-lg-3"><?php echo $image_text_read_more_button_text; ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
<?php else: ?>
    <section id="section-banner-two-columns" class="d-flex align-items-center justify-content-center z-index-up-bottom-shape-banner-3 position-relative">
        <div class="container-fluid pr-0 pl-0">
            <div class="row align-items-center justify-content-center bg-gray mr-0 ml-0 position-relative">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-10 left5 top0 z-index-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-20 left25 top5 z-index-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main-2.svg" class="bg-elipse width-15 left-5 bottom-5 z-index-0">
                <div class="col-lg-6 pr-0 pl-0">
                    <div class="box-text">
                        <h4 class="title-coniferous"><?php echo wp_kses_post( $image_text_title ); ?></h4>
						<?php if ($image_text_subtitle != '') : ?>
                            <h2 class="title-section cl-white font-adrianna pb-2"><?php echo wp_kses_post( $image_text_subtitle ); ?></h2>
						<?php endif; ?>
                        <div class="copy-text font-adrianna cl-ligth-white"><?php echo wp_kses_post( $image_text_content ); ?></div>
						<?php if ($image_text_button_text != '') : ?>
                            <a href="<?php echo $image_text_button_link; ?>" class="btn btn-white text-uppercase"><?php echo wp_kses_post( $image_text_button_text ); ?></a>
						<?php endif; ?>
	                    <?php if ($image_text_read_more_button_text != '') : ?>
                            <a href="<?php echo $image_text_read_more_button_link; ?>" class="btn btn-border-orange text-uppercase mr-lg-3"><?php echo $image_text_read_more_button_text; ?></a>
	                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 pr-0 pl-0 wrap-image">
                    <img class="img-fluid" src="<?php echo $image_text_image['url']; ?>" alt="<?php echo $image_text_image['title']; ?>">
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>