<?php

get_header("inner");

global $post;
$page_slug = $post->post_name;
$post_type = $post->post_type;

$header = get_field('header');
$banner2_bg_desktop = $header['image_bg_desktop'];
$banner2_bg_mobile = $header['image_bg_mobile'];
$banner2_overlay = $header['overlay'];
$banner2_title = $header['title'];
$banner2_content = $header['content'];
$banner2_button_text = $header['button_text'];
$banner2_button_link = $header['button_link'];
$banner2_bar_color = $header['bar_color'];
$banner2_bottom_color = $header['bottom_color'];
$banner2_footer_content = $header['footer_content'];
$banner2_footer_button_text = $header['footer_button_text'];
$banner2_footer_button_link = $header['footer_button_link'];

switch ($banner2_overlay) {
	case 1:
		$overlay = 'overlay overlay-page-shape-2 overlay-bg-light';
		break;
	case 2:
		$overlay = 'overlay overlay-page-shape-2 overlay-bg-light-1';
		break;
	default:
		$overlay = 'overlay overlay-page-shape-2 ';
		break;
}

while (have_posts()) : the_post();
	?>
    <section class="banner-internal-page-<?php echo $page_slug; ?> banner-internal-page-shape-2 <?php echo $banner2_bar_color; ?> banner-internal-page-single-usecases">
        <div class="<?php echo $overlay; ?>"></div>
        <div class="d-flex align-items-center justify-content-center container-absolute">
            <div class="box-banner-internal">
                <h4 class="title-coniferous  mb-0">Use Case:</h4>
	            <?php if ( !empty($banner2_title) ) : ?>
                    <h1 class="title-page pb-1 pb-md-4 mb-0 mt-0 mb-md-1  cl-white text-uppercase"><?php echo $banner2_title; ?></h1>
	            <?php else : ?>
                    <h1 class="title-page pb-1 pb-md-4 mb-0 mt-0 mb-md-1 cl-white text-uppercase"><?php the_title(); ?></h1>
	            <?php endif; ?>
	            <?php if ( !empty($banner2_content) ) : ?>
                    <div class="copy-text font-adrianna cl-ligth-white pb-2"><?php echo $banner2_content; ?></div>
	            <?php endif; ?>
	            <?php if ( !empty($banner2_button_text) ) : ?>
                    <a href="<?php echo  $banner2_button_link; ?>" class="btn btn-orange text-uppercase font-adrianna"><?php echo wp_kses_post( $banner2_button_text ); ?></a>
	            <?php endif; ?>
            </div>
        </div>
    </section>

    <style>
        <?php if ( !empty($banner2_bg_desktop) ) : ?>
        .banner-internal-page-shape::before,
        .banner-internal-page-shape-2::before{
            background: url(<?php echo $banner2_bg_desktop['url']; ?>) no-repeat top center;
        }
        <?php endif; ?>
        <?php if ( !empty($banner2_bg_mobile) ) : ?>
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before,
            .banner-internal-page-shape-2::before{
                background: url(<?php echo $banner2_bg_mobile['url']; ?>) no-repeat top center;
            }
        }
        <?php elseif ( !empty($banner2_bg_desktop) ): ?>
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before,
            .banner-internal-page-shape-2::before{
                background: url(<?php echo $banner2_bg_desktop['url']; ?>) no-repeat top center;
            }
        }
        <?php endif; ?>
    </style>

    <?php if ( !empty($banner2_footer_content) ) : ?>
    <section id="content-shape-banner" class="bg-gray footer-shape footer-shape-uses-cases content-higher position-relative z-index-1">
        <div class="container">
            <div class="d-flex align-items-center mt-3">
                <div class="col-lg-8">
                    <?php if ( !empty($banner2_footer_content) ) : ?>
                        <div class="copy-text font-adrianna cl-white pb-4"><?php echo $banner2_footer_content; ?></div>
                    <?php else : ?>
                        <div class="copy-text font-adrianna cl-gray pb-4"><?php the_content(); ?></div>
                    <?php endif; ?>
					<?php if ( !empty($banner2_footer_button_text) ) : ?>
                        <a href="<?php echo $banner2_footer_button_link; ?>" class="btn btn-border-white text-uppercase"><?php echo $banner2_footer_button_text; ?></a>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section>
	<?php endif; ?>

	<?php
    $sections = get_field('sections');

    if (!empty($sections)):
        foreach ($sections as $section):
            $offers_width = $section['width'];
            $offers_float = $section['float'];
            $offers_img = $section['image'];
            $offers_title = $section['title'];
            $offers_content = $section['content'];
            $offers_button_text = $section['button_text'];
            $offers_button_link = $section['button_link'];
            $offers_read_more_button_text = $section['read_more_button_text'];
            $offers_read_more_button_link = $section['read_more_button_link'];
            $add_graybg = $section['add_gray_bg_usecase'];
            $add_ellipse = $section['add_section_ellipse_usecase'];
	?>
            <section class="section-grid <?php if ($add_graybg) : ?>section-grid-bg-video<?php endif; ?> <?php echo $post_slug.' '.'type-'.$post_type; ?> product-grid-two-columns-<?php echo $offers_float == 'Right' ? 'right' : 'left'; ?> position-relative z-index-0">
                <?php if ($add_ellipse) : ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-20 width-15-xl left-10 top-10 top-30-tb z-index-0">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-20 width-15-xl right-5 top10 z-index-0">
                <?php endif; ?>
                <div class="<?php echo $offers_width == 'full' ? 'container-fluid pr-0 pl-0' : 'container' ?>">
                    <div class="<?php echo $offers_float == 'Right' ? 'row flex-lg-row-reverse' : 'row'; ?> align-items-center justify-content-center <?php echo $offers_width == 'full' ? 'mr-0 ml-0' : '' ?> position-relative z-index-3">
                        <div class="col-lg-6 <?php echo $offers_width == 'full' ? ($offers_float == 'Right' ? 'pr-0' : 'pl-0') : ''; ?>">
                            <div class="wrap-box position-relative">
                                <div class="wrap-image img-resp">
                                    <?php if ($offers_img['type'] == 'video') : ?>
                                        <?php //echo do_shortcode('[video src="' . $offers_img['url'] . '"]'); ?>
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
                        <div class="col-lg-6">
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
	<?php
	    endforeach;
	endif;

	// check if the flexible content field has rows of data
	if (have_rows('page_content')) :
		// loop through the rows of data
		while (have_rows('page_content')) : the_row();
			get_template_part('template-parts/section', get_row_layout());
		endwhile;
	endif;
endwhile;
?>

<?php get_footer(); ?>
