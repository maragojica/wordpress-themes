<?php

get_header('inner');

global $post;
$page_slug = $post->post_name;
$post_type = $post->post_type;

$header = get_field('header');
$banner1_bg_desktop = $header['image_bg_desktop'];
$banner1_bg_mobile = $header['image_bg_mobile'];
$banner1_overlay = $header['overlay'];
$banner1_title = $header['title'];
$banner1_subtitle = $header['subtitle'];
$banner1_content = $header['content'];
$banner1_button_text = $header['button_text'];
$banner1_button_link = $header['button_link'];

switch ($banner1_overlay) {
    case 1:
        $overlay = 'overlay overlay-page-shape-2 overlay-bg-light';
        break;
    case 2:
        $overlay = 'overlay overlay-page-shape-2 overlay-bg-light-1';
        break;
    default:
        $overlay = 'overlay-page-shape-2';
        break;
}
while (have_posts()) : the_post();
    ?>
    <section class="banner-internal-page banner-internal-page-shape-2 bg-white banner-internal-page-single-industries">
        <?php if ($overlay): ?>
            <div class="<?php echo $overlay; ?>"></div>
        <?php endif; ?>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
            <div class="box-banner-internal">
                <?php if ( !empty($banner1_subtitle) ) : ?>
                    <h4 class="title-coniferous mb-0"><?php echo wp_kses_post( $banner1_subtitle ); ?></h4>
                <?php endif; ?>
                <?php if ( !empty($banner1_title) ) : ?>
                    <h1 class="title-page pb-1 pb-md-4 mb-0 mt-0 mb-md-1 cl-white text-uppercase"><?php echo $banner1_title; ?></h1>
                <?php else: ?>
                    <h1 class="title-page pb-1 pb-md-4 mb-0 mt-0 mb-md-1 cl-white text-uppercase"><?php the_title(); ?></h1>
                <?php endif; ?>
                <?php if ( !empty($banner1_content) ) : ?>
                    <div class="copy-text font-adrianna cl-ligth-white pb-2">
                        <p><?php echo wp_kses_post( $banner1_content ); ?></p>
                    </div>
                <?php endif; ?>
                <?php if ( !empty($banner1_button_text) ) : ?>
                    <a href="<?php echo  $banner1_button_link; ?>" class="btn btn-orange text-uppercase font-adrianna"><?php echo wp_kses_post( $banner1_button_text ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <style>
        <?php if ( !empty($banner1_bg_desktop) ) : ?>
        .banner-internal-page-shape-2::before {
            background: url(<?php echo $banner1_bg_desktop['url']; ?>) no-repeat top center;
        }
        <?php endif; ?>
        <?php if ( !empty($banner1_bg_mobile) ) : ?>
        @media (max-width: 575.98px) {
            .banner-internal-page-shape-2::before {
                background: url(<?php echo $banner1_bg_mobile['url']; ?>) no-repeat top center;
            }
        }
        <?php endif; ?>
    </style>
    <?php
    $testimonial = get_field('testimonial');
    $phrase = $testimonial['phrase'];
    $phrase_author = $testimonial['author'];
    $phrase_title = $testimonial['title'];
    $phrase_button_title = $testimonial['button_title'];
    $phrase_button_link = $testimonial['button_link'];
    $phrase_link = $testimonial['link'];
    $phrase_link_image = $testimonial['link_image'];

    ?>

    <?php if (!empty($phrase)): ?>
        <section id="content-shape-banner" class="bg-gray footer-shape content-higher position-relative z-index-1">
        <div class="container">
            <div class="row flex-lg-row-reverse align-items-start justify-content-center">
                <div class="col-lg-6">
                    <h5 class="info-case-study cl-white font-adrianna"><?php echo $phrase_title ?></h5>
                    <div class="stack-btn row">
                        <div class="col-md-12">
                            <?php if (!empty($phrase_button_title)): ?>
                            <a href="<?php echo $phrase_button_link ?>" class="btn btn-orange text-uppercase mr-lg-3"><?php echo $phrase_button_title ?></a>
                            <?php endif; ?>
                            <?php if (!empty($phrase_link_image)): ?>
                            <a href="<?php echo $phrase_link ?>" target="_blank" class="stack-logo"><img src="<?php echo $phrase_link_image['url'] ?>" alt="Experian"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="blockquote-row bg-gray">
                        <div class="row">
                            <div class="col-1 col-lg-2 pr-0 text-right"><span class="text-blockquote cl-white">&ldquo;</span></div>
                            <div class="col col-text-blockquote">
                                <p><em><?php echo $phrase ?></em></p>
                                <h6 class="name-blockquote cl-white pt-3 mb-0"><?php echo $phrase_author ?></h6>
                            </div>
                        </div>
                    </div>
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
            $add_graybg = $section['add_gray_bg_industries'];
            $add_ellipse = $section['add_section_ellipse_industries'];
            ?>
            <section class="section-grid <?php if ($add_graybg) : ?>section-grid-bg-video<?php endif; ?> <?php echo $page_slug.' '.'type-'.$post_type; ?> product-grid-two-columns-<?php echo $offers_float == 'Right' ? 'right' : 'left'; ?> position-relative">
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
                                        <?php //echo do_shortcode('[video autoplay="on" preload="auto" src="' . $offers_img['url'] . '"]'); ?>
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
