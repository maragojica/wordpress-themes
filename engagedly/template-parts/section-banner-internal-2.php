<?php
global $post;
$page_slug = $post->post_name;

$banner2_bg_desktop = get_sub_field('image_bg_desktop');
$banner2_bg_mobile = get_sub_field('image_bg_mobile');
$banner2_overlay = get_sub_field('overlay');
$banner2_title = get_sub_field('title');
$banner2_subtitle = get_sub_field('subtitle');
$banner2_content = get_sub_field('content');
$banner2_button_text = get_sub_field('button_text');
$banner2_button_link = get_sub_field('button_link');
$banner2_footer_content = get_sub_field('footer_content');
$banner2_footer_button_text = get_sub_field('footer_button_text');
$banner2_footer_button_link = get_sub_field('footer_button_link');
$banner2_bar_color = get_sub_field('bar_color');
$banner2_bottom_color = get_sub_field('bottom_color');

switch ($banner2_overlay) {
	case 1:
		$overlay = 'overlay overlay-bg-light overlay-page-shape-6';
		break;
	case 2:
		$overlay = 'overlay overlay-bg-light-1 overlay-page-shape-6';
		break;
	default:
		$overlay = 'overlay overlay-bg-white overlay-page-shape-6';
		break;
}
?>
<section class="banner-internal-page-<?php echo $page_slug; ?> banner-internal-page banner-internal-page-shape-6 z-index-5 <?php echo $banner2_bar_color; ?>">
	<?php get_template_part( 'template-parts/template-circles/content', $page_slug ); ?>
    <div class="<?php echo $overlay; ?>"></div>
    <div class="container container-absolute z-index-2">
        <div class="row align-items-md-center align-items-start justify-content-start row-absolute">
        <div class="col-md-12">
            <div class="box-banner-home">
				<?php if ( !empty($banner2_bg_mobile) ) : ?>
                    <img class="img-fluid m-auto d-block img-banner-home-mv" src="<?php echo $banner2_bg_mobile['url']; ?>">
				<?php endif; ?>
				<?php if ( !empty($banner2_subtitle) ) : ?>
                    <h4 class="title-coniferous"><?php echo $banner2_subtitle; ?></h4>
				<?php endif; ?>
				<?php if ( !empty($banner2_title) ) : ?>
                    <h1 class="title-page pb-4 mb-0 cl-gray text-uppercase"><?php echo $banner2_title; ?></h1>
				<?php endif; ?>
				<?php if ( !empty($banner2_content) ) : ?>
                    <div class="copy-text font-adrianna cl-gray pb-4"><?php echo $banner2_content; ?></div>
				<?php endif; ?>
				<?php if ( !empty($banner2_button_text) ) : ?>
                    <a href="<?php echo  $banner2_button_link; ?>" class="btn btn-orange text-uppercase font-adrianna"><?php echo wp_kses_post( $banner2_button_text ); ?></a>
				<?php endif; ?>
            </div>
        </div>
    </div>
    </div>
</section>

<style>
    <?php if ( !empty($banner2_bg_desktop) ) : ?>
    .banner-internal-page-shape-6::before{
        background: url(<?php echo $banner2_bg_desktop['url']; ?>) no-repeat bottom 30px right;
    }
    <?php endif; ?>
</style>

<?php if ( !empty($banner2_footer_content) ) : ?>
<section id="content-shape-banner" class="bg-gray footer-shape footer-shape-uses-cases content-higher position-relative z-index-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
	            <?php if ( !empty($banner2_footer_content) ) : ?>
                    <div class="copy-text font-adrianna cl-white pb-4"><?php echo $banner2_footer_content; ?></div>
	            <?php endif; ?>
				<?php if ( !empty($banner2_footer_button_text) ) : ?>
                    <a href="<?php echo $banner2_footer_button_link; ?>" class="btn btn-border-white text-uppercase"><?php echo $banner2_footer_button_text; ?></a>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>