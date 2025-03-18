<?php
global $post;
$page_slug = $post->post_name;

$banner3_bg_desktop = get_sub_field('image_bg_desktop');
$banner3_bg_mobile = get_sub_field('image_bg_mobile');
$banner3_image = get_sub_field('image');
$banner3_image_mobile = get_sub_field('image_mobile');
$banner3_title = get_sub_field('title');
$banner3_subtitle = get_sub_field('subtitle');
$banner3_subtitle_top = get_sub_field('subtitle_top');
$banner3_content = get_sub_field('content');
$banner3_button_text = get_sub_field('button_text');
$banner3_button_link = get_sub_field('button_link');
$banner3_bar_color = get_sub_field('bar_color');
$banner3_bar_color_bottom = get_sub_field('bar_color_bottom');
$banner3_search_block_title = get_sub_field('search_block_title');
$banner3_overlay = get_sub_field('overlay');
$banner3_columns = get_sub_field('columns');
$banner3_circle_background = get_sub_field('circle_background');

if($banner3_overlay)
{
    $class_color = 'cl-white';
    $class_color2 = 'cl-ligth-white';
}
else
{
    $class_color = 'cl-gray';
    $class_color2 = 'cl-gray';
}

switch ($page_slug){
    case "clients":
        $class_banner = "banner-internal-page-shape-3 banner-internal-page-3-with-circle z-index-5";
        $overlay .= " overlay-bg-white overlay-page-shape-3";
        $container_class = "container container-absolute";
        $class_color = 'cl-gray';
        $class_color2 = 'cl-gray';
        break;
    case "our-mission":
        $class_banner = "banner-internal-page-shape-4 z-index-5";
        $overlay .= " overlay-bg-white overlay-page-shape-4";
        $container_class = "container container-absolute z-index-2";
        break;
    case "advisory-board":
        $class_banner = "banner-internal-page-shape-5 z-index-5";
        $overlay .= " overlay-bg-white overlay-page-shape-5";
        $container_class = "container container-absolute d-flex align-items-center justify-content-start z-index-2";
        $class_color = 'cl-gray';
        $class_color2 = 'cl-gray';
        break;
    default:
        $class_banner = "banner-internal-page-shape";
        $overlay .= " overlay-bg-light-1 overlay-page-shape";
        $container_class = "container d-flex align-items-center justify-content-center container-absolute";
        break;
}

?>
<!--id="banner-home" -->
<section class="banner-internal-page-<?php echo $page_slug.' '.$class_banner.' '.$banner3_bar_color; ?>">
    <?php get_template_part( 'template-parts/template-circles/content', $page_slug ); ?>

    <?php if ($banner3_overlay): ?>
        <div class="overlay<?php echo $overlay?>"></div>
    <?php endif; ?>
    <div class="<?php echo $container_class; ?>">
        <?php if ($banner3_columns == 1): ?>
            <!--    If Our Mission Page    -->
            <?php if ($page_slug == "our-mission"):  ?>
            <div class="row align-items-center justify-content-start row-absolute">
                <div class="col-md-12">
                    <div class="box-banner-home">
                        <img class="img-fluid m-auto d-block img-banner-home-mv" src="<?php echo $banner3_image_mobile['url']; ?>">
                        <h1 class="title-page cl-gray pb-3 mb-0"><?php echo $banner3_title ?></h1>
                        <div class="copy-text font-adrianna cl-black">
                            <?php echo $banner3_content; ?>
                        </div>
                        <a href="<?php echo $banner3_button_link ?>" class="btn btn-orange text-uppercase mt-2"><?php echo $banner3_button_text ?></a>
                    </div>
                </div>
            </div>

            <!--    If not Our Mission Page    -->
            <?php else: ?>
            <div class="box-banner-internal <?php if ($banner3_search_block_title) echo 'm-auto' ?>">
            <?php if ($banner3_image_mobile): ?>
                <img class="img-fluid m-auto d-block img-banner-home-mv" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-our-mision-mv.png">
            <?php endif; ?>
            <div class="box-banner-text">
            <?php if ( !empty($banner3_subtitle_top) ) : ?>
            <h4 class="title-coniferous"><?php echo $banner3_subtitle_top ?></h4>
            <?php endif; ?>
            <?php if ( !empty($banner3_title) ) : ?>
            <h1 class="title-page pb-4 mb-0 <?php echo $class_color ?> text-uppercase"><?php echo $banner3_title ?> <span class="cl-orange-2"><?php echo $banner3_subtitle ?></span></h1>
            <?php endif; ?>
            <?php if ( !empty($banner3_content) ) : ?>
            <div class="copy-text font-adrianna <?php echo $class_color2 ?> pb-4">
                <?php echo $banner3_content ?>
            </div>
            <?php endif; ?>
            <?php if ($banner3_button_link): ?>
                <a href="<?php echo $banner3_button_link ?>" class="btn btn-orange text-uppercase font-adrianna"><?php echo $banner3_button_text ?></a>
            <?php endif; ?>
            </div>
            <?php endif; ?>
            <?php if ($banner3_search_block_title) get_template_part('template-parts/section','search_block'); ?>
        </div>
        <?php else: ?>
            <div class="row flex-md-row-reverse align-items-center justify-content-center row-absolute">
                <div class="col-md-12 col-lg-6">
                    <?php
                        if (have_rows('second_column_content')) :
                            while (have_rows('second_column_content')) : the_row();
                                get_template_part('template-parts/section', get_row_layout());
                            endwhile;
                        endif;
                    ?>
                </div>

                <div class="col-md-12 col-lg-6">
                    <h4 class="title-coniferous"><?php echo $banner3_subtitle_top ?></h4>
                    <h1 class="title-page pb-4 mb-0 text-uppercase <?php echo $class_color ?>"><?php echo $banner3_title ?> <span class="cl-orange-2"><?php echo $banner3_subtitle ?></span></h1>
                    <div class="copy-text font-adrianna <?php echo $class_color2 ?> pb-4">
                        <?php echo $banner3_content ?>
                        <?php if ($banner3_button_link): ?>
                            <a href="<?php echo $banner3_button_link ?>" class="btn btn-orange text-uppercase font-adrianna mt-2 mt-md-5"><?php echo $banner3_button_text ?></a>
                        <?php endif; ?>
                    </div>

                    <?php
                    if ($banner3_search_block_title) get_template_part('template-parts/section','search_block');
                    ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<style>
    .banner-internal-our-mission .container{
        background-image: url("<?php echo $banner3_image['url']; ?>");
    }
    .banner-internal-page-shape-4 .container{
        background: url("<?php echo $banner3_image['url']; ?>") no-repeat bottom right;
    }
    .banner-internal-page-shape::before{
        background: url(<?php echo $banner3_bg_desktop['url'] ?>) top center;
    }
    @media (max-width: 575.98px) {
        .banner-internal-page-shape::before{
            background: url(<?php echo $banner3_bg_mobile['url'] ?>) top center;
        }
    }
</style>
