<?php
/**
 * Displays the content when the home template is used.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( have_rows('section_banner_home') ): ?>
    <?php while( have_rows('section_banner_home') ): the_row();

    // Get sub field values.
    $title = get_sub_field('title_banner_home');
    $bannertype = get_sub_field('banner_type_home');
    $image = get_sub_field('image_home');
    $videosource = get_sub_field('video_source_home');
    $videolocal = get_sub_field('video_url_local');
    $videoid = get_sub_field('video_id');
    $videomp4 = get_sub_field('video_mp4');
    ?>
            <?php if( $title ): ?>
            <section class="section-title-home mb-0 section-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="headline cl-dark text-center pt-4 pb-3 pt-lg-5 pb-lg-4"><?php echo $title;?></h1>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>

            <?php if( $bannertype['value'] == "image" ): ?>
                <section class="section-banner-image section-banner section-90 d-flex align-items-center mt-0">
                </section>
				<style>
					.section-banner-image{
						background-image: url("<?php echo $image['url'];?>");
					}
				</style>
             <?php endif; ?>

			<?php if( $bannertype['value'] == "video" ): ?>
				<section class="section-banner-image section-banner section-90 d-flex align-items-center mb-0">
					<?php if( $videosource['value'] == "local" ||  $videosource['value'] == "file"){ ?>
							<?php if($videosource['value'] == "local"){
									$url = $videolocal;
							  }elseif($videosource['value'] == "file"){ $url = $videomp4; } ?>
							 <video class="w-100 h-auto" src="<?php echo $url;?>" loop muted playsinline uk-video="autoplay: inview"></video>
					<?php }elseif($videosource['value'] == "youtube"){ ?>
						<iframe src="https://www.youtube-nocookie.com/embed/<?php echo $videoid;?>?autoplay=1&showinfo=0&rel=0&modestbranding=1&playsinline=1" width="1920" height="1080" frameborder="0" allowfullscreen uk-responsive uk-video="automute: true"></iframe>
					<?php } ?>
				</section>
			<?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
	<?php if( have_rows('section_about_home') ): ?>
		<?php while( have_rows('section_about_home') ): the_row();
		// Get sub field values.
		$title = get_sub_field('title_about_home');
		$text = get_sub_field('text_about_home');
		$cta = get_sub_field('cta_about_home');
		?>
			<section class="section-90 mt-md-5 mt-3 pt-3">
				<div class="container">
					<div class="row">
						<?php if( $title ): ?>
						<div class="col-md-6">
							<h3 class="subtitle cl-dark mb-md-0 mb-3"><?php echo $title;?></h3>
						</div>
						<?php endif; ?>
						<?php if( $text ): ?>
							<div class="col-md-6">
								<div class="copy-text cl-body">
									<?php echo $text;?>
									<?php  if($cta) {
										$link_url = $cta['url'];
										$link_title = $cta['title'];
										$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
										<div>
											<a class="cta-link cl-green" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?><i class="fas fa-long-arrow-alt-right"></i></a>
										</div>
									<?php } ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="row mb-4 mt-4">
						<div class="col-md-12">
							<div class="line bg-line w-100"></div>
						</div>
					</div>
					<div class="row row-quote align-items-center justify-content-center mt-5">
						<div class="col-md-12">
							<?php if( get_sub_field('quote_home') ): ?>
								<div class="copy-text quote-lg cl-grey-ligth-2 quote-center">
									<?php echo the_sub_field('quote_home'); ?>
								</div>
								<div class="d-flex justify-content-end align-items-center">
									<div id="quote-image" class="mr-3">
										<?php $quote_image = get_sub_field('image_quote_home'); ?>
										<img class="rounded-circle" src="<?php echo $quote_image['url'] ?>" alt="<?php echo $quote_image['alt'] ?>" width="60">
									</div>
									<div class="d-flex flex-column">
										<div id="quote-name"><?php the_sub_field('name_quote_home'); ?></div>
										<div class="quote-position"><?php the_sub_field('position_quote_home'); ?></div>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php if( have_rows('section_housing_solution_home') ): ?>
		<?php while( have_rows('section_housing_solution_home') ): the_row();
			// Get sub field values.
			$image = get_sub_field('image_housing_solution_home');
			$title = get_sub_field('title_housing_solution_home');
			$subtitle = get_sub_field('subtitle_housing_solution_home');
			$text = get_sub_field('text_housing_solution_home');
			$cta = get_sub_field('cta_housing_solution_home');
			?>
			<section class="section-90 mb-lg-5">
				<div class="container">
					<div class="row mb-4">
						<div class="col-md-12">
							<div class="line bg-line w-100"></div>
						</div>
					</div>
					<div class="row align-items-center justify-content-center pt-lg-5 mb-lg-4">
						<div class="col-md-6 mb-md-0 mb-4">
						<?php if( !empty($image) ): ?>
							<!-- normal -->
							<div class="ih-item square effect3 bottom_to_top">
								<div uk-lightbox>
									<a href="<?php echo $image['url'];?>" data-caption="<?php echo $image['alt'];?>">
										<div class="img"><img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>"></div>
										<div class="info">
											<h3><?php echo $image['alt'];?></h3>
										</div>
									</a>
								</div>
							</div>
							<!-- end normal -->
						<?php endif; ?>
							</div>
							<div class="col-md-6">
								<?php if( $subtitle ): ?>
									<h4 class="titleinfo cl-green text-uppercase mb-1 mb-lg-2"><?php echo $subtitle;?></h4>
								<?php endif; ?>
								<?php if( $title ): ?>
									<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $title;?></h3>
								<?php endif; ?>
								<?php if( $text ): ?>
								<div class="copy-text cl-body">
									<?php echo $text;?>
									<?php  if($cta) {
										$link_url = $cta['url'];
										$link_title = $cta['title'];
										$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
										<div class="mb-4">
											<a class="cta-link cl-green" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?><i class="fas fa-long-arrow-alt-right"></i></a>
										</div>
									<?php } ?>
								</div>
								<?php endif; ?>
							</div>
					</div>
					<div class="row mb-4 pt-lg-5">
						<div class="col-md-12">
							<div class="line bg-line w-100"></div>
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php if( have_rows('section_our_housing_home') ): ?>
		<?php while( have_rows('section_our_housing_home') ): the_row();
			// Get sub field values.
			$image = get_sub_field('image_our_housing_home');
			$title = get_sub_field('title_our_housing_home');
			$subtitle = get_sub_field('subtitle_our_housing_home');
			$text = get_sub_field('text_our_housing_home');
			$cta = get_sub_field('cta_our_housing_home');
			?>
			<section class="section-100 pt-lg-4">
				<div class="container">
					<div class="box-red w-100">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-6 mb-md-0 mb-4">
								<?php if( !empty($image) ): ?>
									<!-- normal -->
									<div class="ih-item square effect3 bottom_to_top">
										<div uk-lightbox>
											<a href="<?php echo $image['url'];?>" data-caption="<?php echo $image['alt'];?>">
												<div class="img"><img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>"></div>
												<div class="info">
													<h3><?php echo $image['alt'];?></h3>
												</div>
											</a>
										</div>
									</div>
									<!-- end normal -->
								<?php endif; ?>
							</div>
							<div class="col-md-6">
								<?php if( $subtitle ): ?>
									<h4 class="titleinfo cl-orange text-uppercase mb-1 mb-lg-2"><?php echo $subtitle;?></h4>
								<?php endif; ?>
								<?php if( $title ): ?>
									<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $title;?></h3>
								<?php endif; ?>
								<?php if( $text ): ?>
									<div class="copy-text cl-body">
										<?php echo $text;?>
										<?php  if($cta) {
											$link_url = $cta['url'];
											$link_title = $cta['title'];
											$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
											<div>
												<a class="cta-link cl-orange" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?><i class="fas fa-long-arrow-alt-right"></i></a>
											</div>
										<?php } ?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>

				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->