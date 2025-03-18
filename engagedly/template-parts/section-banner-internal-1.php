<?php
global $post;
$page_slug = $post->post_name;

$banner1_width = get_sub_field('width');
$banner1_bg_desktop = get_sub_field('image_bg_desktop');
$banner1_bg_mobile = get_sub_field('image_bg_mobile');
$banner1_overlay = get_sub_field('overlay');
$banner1_title = get_sub_field('title');
$banner1_subtitle = get_sub_field('subtitle');
$banner1_content = get_sub_field('content');
$banner1_button_text = get_sub_field('button_text');
$banner1_button_link = get_sub_field('button_link');
$banner1_bar_color = get_sub_field('bar_color');
$banner1_bottom_color = get_sub_field('bottom_color');

switch ($banner1_overlay) {
    case 1:
        $overlay = 'overlay overlay-bg-light';
        break;
    case 2:
	    $overlay = 'overlay overlay-bg-light-1';
        break;
    default:
        $overlay = '';
        break;
}

switch ($page_slug){
    case "industries":
    case "case-studies-overview":
        $class_banner = "banner-internal-page-shape-2";
        $overlay .= " overlay-page-shape-2";
        break;
    default:
        $class_banner = "banner-internal-page-shape";
        $overlay .= " overlay-page-shape";
        break;
}

if (is_array($banner1_width)) $banner1_width = $banner1_width[0];
?>
<section class="banner-internal-page-<?php echo $page_slug." ".$class_banner." ".$banner1_bar_color; ?>">
	<?php if ($overlay): ?>
	    <div class="<?php echo $overlay; ?>"></div>
    <?php endif; ?>
    <?php if ($page_slug != 'engagedly-press-releases'): ?>
    <div class="container d-flex align-items-center justify-content-center container-absolute">
        <div class="<?php echo ($banner1_width != 'full') ? 'box-banner-internal' : ''; ?>">
			<?php if ( !empty($banner1_subtitle) ) : ?>
            <h4 class="title-coniferous"><?php echo wp_kses_post( $banner1_subtitle ); ?></h4>
			<?php endif; ?>
			<?php if ( !empty($banner1_title) ) : ?>
			<h1 class="title-page pb-1 pb-md-4 mb-0 mt-0 mb-md-1 cl-white text-uppercase"><?php echo $banner1_title; ?></h1>
			<?php endif; ?>
			<?php if ( !empty($banner1_content) ) : ?>
            <div class="copy-text font-adrianna cl-ligth-white pb-4">
				<?php echo $banner1_content; ?>
			</div>
			<?php endif; ?>
			<?php if ( !empty($banner1_button_text) ) : ?>
			<a href="<?php echo  $banner1_button_link; ?>" class="btn btn-orange text-uppercase font-adrianna"><?php echo wp_kses_post( $banner1_button_text ); ?></a>
			<?php endif; ?>
        </div>
    </div>
    <?php else: ?>
        <div class="container relative d-flex align-items-center container-absolute">
            <div>
                <h1 class="title-page pb-4 mb-0 cl-white text-uppercase"><?php the_title(); ?></h1>
            </div>
        </div>
    <?php endif; ?>
</section>

<style>
    <?php if ( !empty($banner1_bg_desktop) ) : ?>
    .banner-internal-page-shape::before,
    .banner-internal-page-shape-2::before{
		background: url(<?php echo $banner1_bg_desktop['url']; ?>) no-repeat top center;
	}
    <?php endif; ?>
    <?php if ( !empty($banner1_bg_mobile) ) : ?>
	@media (max-width: 575.98px) {
        .banner-internal-page-shape::before,
        .banner-internal-page-shape-2::before{
			background: url(<?php echo $banner1_bg_mobile['url']; ?>) no-repeat top center;
		}
	}
    <?php elseif ( !empty($banner1_bg_desktop) ): ?>
    @media (max-width: 575.98px) {
        .banner-internal-page-shape::before,
        .banner-internal-page-shape-2::before{
            background: url(<?php echo $banner1_bg_desktop['url']; ?>) no-repeat top center;
        }
    }
    <?php endif; ?>
</style>