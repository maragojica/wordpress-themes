<?php
$section_background = get_sub_field('background');
$section_title = get_sub_field('title');
$section_content = get_sub_field('content');
?>

<section id="full-container-banner" class="banner-info banner-info-wform relative d-flex align-items-center justify-content-center">
	<div class="overlay overlay-bg-light"></div>
	<div class="container">
		<?php if ($section_title): ?>
		<div class="row align-items-center justify-content-center">
			<div class="col-md-12">
				<h2 class="title-section cl-white font-adrianna pb-2 text-center"><?php echo $section_title; ?></h2>
			</div>
		</div>
        <?php endif; ?>
		<div class="row align-items-center justify-content-center"><?php echo $section_content; ?></div>
	</div>
</section>
<style>
	.banner-info{
		background: url(<?php echo $section_background['url'] ?>) top center;
	}
</style>