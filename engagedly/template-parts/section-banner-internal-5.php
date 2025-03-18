<?php
global $post;
$page_slug = $post->post_name;

$banner_title = get_sub_field('title');
$banner_subtitle = get_sub_field('subtitle');
$banner_content = get_sub_field('content');
$banner_button_text = get_sub_field('button_text');
$banner_button_link = get_sub_field('button_link');
$banner_bar_color = get_sub_field('bar_color');
?>

<section class="banner-internal-page banner-internal-page-shape-3 banner-internal-page-3-with-circle <?php echo $banner_bar_color; ?> z-index-5">
    <?php get_template_part( 'template-parts/template-circles/content', $page_slug ); ?>
    <div class="overlay overlay-bg-white overlay-page-shape-3"></div>
    <div class="container container-absolute">
        <div class="row flex-md-row-reverse align-items-center justify-content-center row-absolute">
            <div class="col-md-12 col-lg-6">
                <?php get_template_part('template-parts/section', 'testimonials_banner'); ?>
            </div>
            <div class="col-md-12 col-lg-6">
                <h4 class="title-coniferous"><?php echo $banner_title; ?></h4>
                <h1 class="title-page pb-4 mb-0 cl-gray text-uppercase"><?php echo $banner_subtitle; ?></h1>
                <div class="copy-text font-adrianna cl-gray pb-4">
                    <?php echo $banner_content; ?>
                </div>
                <a href="<?php echo $banner_button_link; ?>" class="btn btn-orange text-uppercase font-adrianna"><?php echo $banner_button_text; ?></a>
            </div>
        </div>
    </div>
</section>