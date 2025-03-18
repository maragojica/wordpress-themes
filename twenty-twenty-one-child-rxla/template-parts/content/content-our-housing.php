<?php
/**
 * Displays the content when the about template is used.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( have_rows('section_banner_housing') ): ?>
    <?php while( have_rows('section_banner_housing') ): the_row();

    // Get sub field values.
    $title = get_sub_field('title_banner_housing');
    $image = get_sub_field('image_banner_housing');
    ?>
            <?php if( $title ): ?>
            <section class="section-title-home mb-0 section-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="headline cl-dark pt-5 pb-4 pl-4"><?php echo $title;?></h1>
                        </div>
                    </div>
                </div>
            </section>
            <?php endif; ?>
			<section class="section-banner-inside section-banner section-90 d-flex align-items-center mt-0">
			</section>
			<style>
				.section-banner-inside{
					background-image: url("<?php echo $image['url'];?>");
				}
			</style>
        <?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('section_project_showcase') ): ?>
		<?php while( have_rows('section_project_showcase') ): the_row();
			// Get sub field values.
			$title = get_sub_field('title_project_showcase');
			$subtitle = get_sub_field('subtitle_project_showcase');
			$text = get_sub_field('text_project_showcase');
			$content = get_sub_field('content_project_showcase');
			?>
			<section class="section-100 pt-lg-4">
				<div class="container">
						<div class="row">
							<div class="col-md-4">
								<?php if( $subtitle ): ?>
									<h4 class="titleinfo cl-orange text-uppercase mb-1 mb-lg-2"><?php echo $subtitle;?></h4>
								<?php endif; ?>
								<?php if( $title ): ?>
									<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $title;?></h3>
								<?php endif; ?>
								<?php if( $text ): ?>
									<div class="copy-text cl-body">
										<?php echo $text;?>
									</div>
								<?php endif; ?>
							</div>
							<div class="col-md-8 mb-md-0 mb-0 mt-4">
								<?php if( $content ): ?>
									<div class="copy-text cl-body">
									<?php echo $content;?>
									</div>
								<?php endif; ?>
							</div>
						</div>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('section_contact') ): ?>
		<?php while( have_rows('section_contact') ): the_row();
			// Get sub field values.
			$title = get_sub_field('title_contact');
			?>
			<section class="section-90 mb-lg-5">
				<div class="container">
					<div class="row mb-4">
						<div class="col-md-12">
							<div class="line bg-line w-100"></div>
						</div>
					</div>
					<div class="row pt-lg-5 mb-lg-4">
						<div class="col-md-6 pt-3">
							<div class="row">
								<div class="col-md-12">
									<?php if( $title ): ?>
									<h3 class="subtitle cl-dark mb-2 mb-lg-5"><?php echo $title;?></h3>
									<?php endif; ?>
								</div>
							</div>
							<?php if( have_rows('items_contact') ): ?>
							<div class="row equal">
								<?php while( have_rows('items_contact') ) : the_row();
								// Get sub field values.
								$image_item = get_sub_field('image_item_contact');
								$text_item = get_sub_field('text_item_contact');
								?>
								<div class="col-md-12 mb-3 mb-md-4">
									<div class="d-flex align-items-start">
										<div class="mr-3">
										<?php if( $image_item ): ?>
											<img alt="List" class="img-list-about" src="<?php echo $image_item['url']; ?>">
										<?php endif; ?>
										</div>
										<div class="copy-text cl-body strong-green">
										<?php if( $image_item ): ?>
											<?php echo $text_item; ?>
										<?php endif; ?>
										</div>
								    	</div>
								</div>
								<?php endwhile; ?>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-md-6 mb-md-0 mb-4">
							<?php echo do_shortcode('[contact-form-7 id="98" title="Contact Form Our Housing"]'); ?>
						</div>
					</div>
				</div>
			</section>
        	<?php endwhile; ?>
	<?php endif; ?>
	<?php $images = get_field('section_featured_slider');
	if( $images ):?>
	<section class="bg-grey-ligth-2 section-100 pt-5 pb-5">
		<div class="container-fluid">
			<div class="row align-items-center justify-content-center">
				<div class="col-md-12">
					<div class="carousel-three-casestudies">
						<div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
							<?php foreach( $images as $image ): ?>
								<div class="item">
									<div class="ih-item square effect3 bottom_to_top">
									<div uk-lightbox>
										<a href="<?php echo $image['url'];?>" data-caption="<?php echo $image['alt'];?>">
										<div class="card">
											<div class="img"><img class="card-img-top" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_url($image['alt']); ?>"></div>
											<div class="info">
												<h3><?php echo $image['alt'];?></h3>
											</div>
										</div>
										</a>
									</div>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php if( have_rows('section_unique_featured') ):
          while( have_rows('section_unique_featured') ): the_row();
			  // Get sub field values.
			  $title = get_sub_field('title_section_unique');
			  $subtitle = get_sub_field('subtitle_section_unique');
			  $titleinfo = get_sub_field('title_info_section_unique');
			  $subtitleinfo = get_sub_field('text_info_section_unique');?>
			<section class="section-unique-featured section-90 mb-0 pt-0 mt-3 pt-md-5 mt-md-5">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php if( $title ): ?>
							<h4 class="titleinfo cl-orange text-uppercase mb-1 mb-lg-2"><?php echo $title;?></h4>
							<?php endif; ?>
							<?php if( $subtitle ): ?>
							<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $subtitle;?></h3>
							<?php endif; ?>
						</div>
					</div>
					<?php if( have_rows('list_section_unique') ): ?>

							<?php while( have_rows('list_section_unique') ) : the_row();
								// Get sub field values.
								$position_item = get_sub_field('position_list_unique');
								$title_item = get_sub_field('title_list_unique');
								$text_item = get_sub_field('text_list_unique');
								$image_item = get_sub_field('image_list_unique');
								?>

								<?php if( $position_item['value'] == "full" ){ ?>
								<div class="row equal mb-md-5 mb-3">
								<div class="col-md-12">
									<div class="card card-featured w-100">
										<?php if( $image_item ): ?>
											<div class="box-img-featured ih-item square effect3 bottom_to_top">
												<!-- normal -->
													<div uk-lightbox>
														<a href="<?php echo $image_item['url'];?>" data-caption="<?php echo $image_item['alt'];?>">
															<div class="img"><img class="card-img-top h-100 w-100" src="<?php echo $image_item['url'];?>" alt="<?php echo $image_item['alt'];?>"></div>
															<div class="info">
																<h3><?php echo $image_item['alt'];?></h3>
															</div>
														</a>
													</div>
												<!-- end normal -->
											</div>
										<?php endif; ?>
										<div class="card-body">
											<?php if( $title_item ): ?>
												<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $title_item;?></h3>
											<?php endif; ?>
											<?php if( $text_item ): ?>
											<div class="copy-text cl-body"><?php echo $text_item; ?></div>
											<?php endif; ?>
										</div>
									</div>
								</div>
								</div>
								<?php } ?>
								<?php if( $position_item['value'] == "left" ){ ?>
								<div class="row equal mb-md-5 mb-3 row-featured align-items-center">
									<div class="col-md-6 pl-0 pr-0">
										<?php if( $image_item ): ?>
											<!-- normal -->
											<div class="ih-item square effect3 bottom_to_top">
												<div uk-lightbox>
													<a href="<?php echo $image_item['url'];?>" data-caption="<?php echo $image_item['alt'];?>">
														<div class="img"><img class="h-100 w-100"  src="<?php echo $image_item['url'];?>" alt="<?php echo $image_item['alt'];?>"></div>
														<div class="info">
															<h3><?php echo $image_item['alt'];?></h3>
														</div>
													</a>
												</div>
											</div>
											<!-- end normal -->
										<?php endif; ?>
									</div>
									<div class="col-md-6">
										<div class="box-row-featured">
											<?php if( $title_item ): ?>
												<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $title_item;?></h3>
											<?php endif; ?>
											<?php if( $text_item ): ?>
												<div class="copy-text cl-body"><?php echo $text_item; ?></div>
											<?php endif; ?>
										</div>
									</div>
								</div>
								<?php } ?>
							<?php if( $position_item['value'] == "right" ){ ?>
								<div class="row equal mb-md-5 mb-3 row-featured align-items-center">
									<div class="col-md-6">
										<div class="box-row-featured">
											<?php if( $title_item ): ?>
												<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $title_item;?></h3>
											<?php endif; ?>
											<?php if( $text_item ): ?>
												<div class="copy-text cl-body"><?php echo $text_item; ?></div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-6 pl-0 pr-0">
										<?php if( $image_item ): ?>
											<!--<img class="h-100 w-100" src="<?php echo $image_item['url']; ?>" alt="<?php echo $image_item['alt']; ?>">-->
											<!-- normal -->
											<div class="ih-item square effect3 bottom_to_top">
												<div uk-lightbox>
													<a href="<?php echo $image_item['url'];?>" data-caption="<?php echo $image_item['alt'];?>">
														<div class="img"><img class="h-100 w-100"  src="<?php echo $image_item['url'];?>" alt="<?php echo $image_item['alt'];?>"></div>
														<div class="info">
															<h3><?php echo $image_item['alt'];?></h3>
														</div>
													</a>
												</div>
											</div>
											<!-- end normal -->
										<?php endif; ?>
									</div>
								</div>
							<?php } ?>
							<?php endwhile; ?>

					<?php endif; ?>

					<div class="row">
						<div class="col-md-12 pr-md-0 pl-md-0">
							<?php if( $titleinfo ): ?>
								<h3 class="subtitle cl-dark mb-3 mb-lg-5"><?php echo $titleinfo;?></h3>
							<?php endif; ?>
							<?php if( $subtitleinfo ): ?>
								<div class="copy-text copy-text-info cl-body"><?php echo $subtitleinfo;?></div>
							<?php endif; ?>
						</div>
					</div>

				</div>
			</section>
		  <?php endwhile; ?>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
