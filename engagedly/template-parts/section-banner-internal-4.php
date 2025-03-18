<?php
global $post;
$page_slug = $post->post_name;

$banner4_image_desktop = get_sub_field('image_desktop');//print_r($banner4_image_desktop);
$banner4_image_mobile = get_sub_field('image_mobile');
$banner4_title = get_sub_field('title');
$banner4_content = get_sub_field('content');
$banner4_button_text = get_sub_field('button_text');
$banner4_button_link = get_sub_field('button_link');
$banner4_bar_color = get_sub_field('bar_color');
$banner4_bar_color_bottom = get_sub_field('bar_color_bottom');
$banner4_circle_background = get_sub_field('circle_background');
?>
<section id="banner-home" class="relative banner-internal-our-mission">
    <?php
    if ($banner4_circle_background)
        get_template_part( 'template-parts/template-circles/content', $page_slug );
    ?>
    <div class="container relative">
        <div class="box-banner-home">
            <img class="img-fluid m-auto d-block img-banner-home-mv" src="<?php echo $banner4_image_mobile['url'] ?>">
            <div class="box-banner-text">
	        <?php if ($banner4_title): ?>
            <h1 class="title-page cl-gray pb-5 mb-0"><?php echo $banner4_title; ?></h1>
	        <?php endif; ?>
            <?php if ( !empty($banner4_content) ) : ?>
            <div class="copy-text font-adrianna cl-black pb-4">
	            <?php echo $banner4_content; ?>
            </div>
            <?php endif; ?>
            <?php if ($banner4_button_text): ?>
                <a href="<?php echo $banner4_button_link; ?>" class="btn btn-orange text-uppercase mt-2 mt-md-5"><?php echo $banner4_button_text; ?></a>
            <?php endif; ?>
                </div>
        </div>
    </div>
</section>
<secion class="top-shape-banner">
    <svg class="banner-internal-left-svg-1" height="130" width="73%">
        <line x1="0" x2="100%" style="stroke:<?php echo $banner4_bar_color; ?>;stroke-width:30" y1="40" y2="85%"></line>
    </svg>
    <svg class="banner-internal-rigth-svg-1" height="130" width="27%">
        <line style="stroke:<?php echo $banner4_bar_color; ?>;stroke-width:30" x2="0" y1="40" y2="85%" x1="100%"></line>
    </svg>
</secion>
<secion class="bottom-shape-banner">
    <svg class="banner-internal-left-svg-2" width="73%" height="130">
        <line x1="0" x2="100%" y2="85%" y1="40" style="stroke:<?php echo $banner4_bar_color_bottom; ?>;stroke-width:60"></line>
    </svg>
    <svg class="banner-internal-rigth-svg-2" height="130" width="27%">
        <line x2="0" y1="40" y2="85%" x1="100%" style="stroke:<?php echo $banner4_bar_color_bottom; ?>;stroke-width:60"></line>
    </svg>
</secion>

<style>
    <?php if ( !empty($banner4_image_desktop) ) : ?>
    .banner-internal-our-mission .container{
        background-image: url("<?php echo $banner4_image_desktop['url'] ?>");
    }
    <?php endif; ?>
</style>