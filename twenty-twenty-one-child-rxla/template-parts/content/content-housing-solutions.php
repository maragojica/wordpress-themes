<?php
/**
 * Displays the content when the housing solutions template is used.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( have_rows('section_banner_housingsol') ): ?>
    <?php while( have_rows('section_banner_housingsol') ): the_row();

    // Get sub field values.
    $title = get_sub_field('title_banner_housingsol');
    $image = get_sub_field('image_banner_housingsol');
    ?>
            <?php if( $title ): ?>
            <section class="section-title-home mb-0 section-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="headline text-center cl-dark pt-5 pb-4 pl-4"><?php echo $title;?></h1>
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

	<?php if( have_rows('section_info_1_housingsol') ): ?>
		<?php while( have_rows('section_info_1_housingsol') ): the_row();
			// Get sub field values.
			$title = get_sub_field('title_info_1_housingsol');
			$subtitle = get_sub_field('subtitle_info_1_housingsol');
			$content = get_sub_field('text_info_1_housingsol');
			?>
			<section class="section-100 pt-lg-5">
				<div class="container">
						<div class="row">
							<div class="col-md-6">
								<?php if( $title ): ?>
									<h4 class="titleinfo cl-orange text-uppercase mb-1 mb-lg-2"><?php echo $title;?></h4>
								<?php endif; ?>
								<?php if( $subtitle ): ?>
									<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $subtitle;?></h3>
								<?php endif; ?>
							</div>
							<div class="col-md-6 mb-md-0 mb-0 mt-2">
								<?php if( $content ): ?>
									<div class="copy-text cl-body">
									<?php echo $content;?>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<div class="row mb-4 mt-1 mt-md-5">
						<div class="col-md-12">
							<div class="line bg-line w-100"></div>
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php if( have_rows('section_info_2_housingsol') ): ?>
		<?php while( have_rows('section_info_2_housingsol') ): the_row();
			// Get sub field values.
			$title = get_sub_field('title_info_2_housingsol');
			$subtitle = get_sub_field('subtitle_info_2_housingsol');
			$content = get_sub_field('text_info_2_housingsol');
			?>
			<section class="section-100 pt-lg-5">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<?php if( $title ): ?>
								<h4 class="titleinfo cl-green text-uppercase mb-1 mb-lg-2"><?php echo $title;?></h4>
							<?php endif; ?>
							<?php if( $subtitle ): ?>
								<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $subtitle;?></h3>
							<?php endif; ?>
						</div>
						<div class="col-md-6 mb-md-0 mb-0 mt-4">
							<?php if( $content ): ?>
								<div class="copy-text cl-body">
									<?php echo $content;?>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="row mb-4 mt-1 mt-md-5">
						<div class="col-md-12">
							<div class="line bg-line w-100"></div>
						</div>
					</div>
				</div>
			</section>
		<?php endwhile; ?>
	<?php endif; ?>

	<?php if( have_rows('section_info_3_housingsol') ):
          while( have_rows('section_info_3_housingsol') ): the_row();
			  // Get sub field values.
			  $title = get_sub_field('title_info_3_housingsol'); ?>
			<section class="section-unique-featured section-90 mb-0 pt-0 mt-3 pt-md-5 mt-md-5">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php if( $title ): ?>
							<h3 class="subtitle cl-dark mb-0 mb-lg-5 pb-md-5"><?php echo $title;?></h3>
							<?php endif; ?>
						</div>
					</div>
					<?php if( have_rows('list_info_3_housingsol') ): ?>

							<?php while( have_rows('list_info_3_housingsol') ) : the_row();
								// Get sub field values.
								$position_item = get_sub_field('position_list_housingsol');
								$title_item = get_sub_field('title_list_housingsol');
								$text_item = get_sub_field('text_list_housingsol');
								$image_item = get_sub_field('image_list_housingsol');
								?>
								<?php if( $position_item['value'] == "left" ){ ?>
								<div class="row equal mb-md-5 mb-3 row-difference align-items-center flex-md-row-reverse">
									<div class="col-md-6">
										<div class="box-row-featured">
											<?php if( $title_item ): ?>
												<h3 class="title-difference cl-dark mb-2 mb-lg-4"><?php echo $title_item;?></h3>
											<?php endif; ?>
											<?php if( $text_item ): ?>
												<div class="copy-text cl-body"><?php echo $text_item; ?></div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-6">
										<?php if( $image_item ): ?>
											<!-- normal -->
											<div class="ih-item square effect3 bottom_to_top">
												<div uk-lightbox>
													<a href="<?php echo $image_item['url'];?>" data-caption="<?php echo $image_item['alt'];?>">
														<div class="img"><img src="<?php echo $image_item['url'];?>" alt="<?php echo $image_item['alt'];?>"></div>
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
								<?php }else{ ?>
								<div class="row equal mb-md-5 mb-3 row-difference align-items-center">
									<div class="col-md-6">
										<div class="box-row-featured">
											<?php if( $title_item ): ?>
												<h3 class="title-difference cl-dark mb-2 mb-lg-4"><?php echo $title_item;?></h3>
											<?php endif; ?>
											<?php if( $text_item ): ?>
												<div class="copy-text cl-body"><?php echo $text_item; ?></div>
											<?php endif; ?>
										</div>
									</div>
									<div class="col-md-6">
										<?php if( $image_item ): ?>
											<!-- normal -->
											<div class="ih-item square effect3 bottom_to_top">
												<div uk-lightbox>
													<a href="<?php echo $image_item['url'];?>" data-caption="<?php echo $image_item['alt'];?>">
														<div class="img"><img src="<?php echo $image_item['url'];?>" alt="<?php echo $image_item['alt'];?>"></div>
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
