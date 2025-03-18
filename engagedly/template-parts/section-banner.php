<?php
$banner_desktop = get_sub_field('image_desktop');
$banner_mobile = get_sub_field('image_mobile');
$banner_title = get_sub_field('title');
$banner_content = get_sub_field('content');
$banner_button_text = get_sub_field('button_text');
$banner_button_link = get_sub_field('button_link');
?>
<section id="banner-home" class="relative">
	<svg class="home-slider-svg-1" viewBox="0 0 100 100" height="100%" width="100%">
		<circle cx="100%" cy="40%" r="65" stroke-width="0" fill="#2175BC" fill-opacity="0.08" />
	</svg>
	<div class="container relative">
		<div class="box-banner-home">
			<?php if ( !empty($banner_mobile) ) : ?>
			<img class="img-fluid m-auto d-block img-banner-home-mv" src="<?php echo $banner_mobile['url']; ?>">
			<?php endif; ?>
			<div class="box-banner-text">
				<?php if ( !empty($banner_title) ) : ?>
					<h1 class="title-page cl-gray pb-5 mb-0"><?php echo $banner_title; ?></h1>
				<?php endif; ?>
				<?php if ( !empty($banner_content) ) : ?>
					<div class="copy-text font-adrianna cl-black pb-4">
						<?php echo $banner_content; ?>
					</div>
				<?php endif; ?>
				<?php if ( !empty($banner_button_text) ) : ?>
					<a href="<?php echo $banner_button_link;?>" class="btn btn-orange text-uppercase font-adrianna">Request Demo</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<style>
    <?php if ( !empty($banner_desktop) ) : ?>
	#banner-home .container{
		background-image: url("<?php echo $banner_desktop['url']; ?>");
		background-size: 46%;
		background-repeat: no-repeat;
	}
    <?php endif; ?>
</style>