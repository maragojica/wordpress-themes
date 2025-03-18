<?php
$newsletter_title = get_sub_field('title');
$newsletter_content = get_sub_field('content');
?>
<section id="section-newsletter" class="position-relative z-index-2">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-12">
				<h2 class="title-section cl-gray font-adrianna pb-2"><?php echo wp_kses_post( $newsletter_title ); ?></h2>
				<?php if ($newsletter_content != '') : ?>
					<?php echo $newsletter_content; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>