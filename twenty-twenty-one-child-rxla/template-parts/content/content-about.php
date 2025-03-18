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
    <?php if( have_rows('section_banner_about') ): ?>
    <?php while( have_rows('section_banner_about') ): the_row();

    // Get sub field values.
    $title = get_sub_field('title_banner_about');
    $image = get_sub_field('image_banner_about');
    ?>
            <?php if( $title ): ?>
            <section class="section-title-home mb-0 section-90">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="headline cl-dark text-center pt-5 pb-4"><?php echo $title;?></h1>
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
	<?php if( have_rows('section_about_page') ): ?>
		<?php while( have_rows('section_about_page') ): the_row();
		// Get sub field values.
		$text = get_sub_field('text_about_page');
		?>
			<section class="section-90 mt-5 pt-3">
				<div class="container">
					<?php if( $text ): ?>
							<div class="row">
								<div class="col-md-12">
									<div class="copy-text cl-body">
										<?php echo $text;?>
									</div>
								</div>
							</div>
					<?php endif; $count = count(get_sub_field('box_text_about')); ?>
					<?php if( have_rows('box_text_about') ): ?>
							<div class="row-about bg-grey-ligth mt-lg-5 mt-3">
								<div class="row equal align-items-center justify-content-center">
								<?php $i=1;
									while( have_rows('box_text_about') ) : the_row();
									$textinfo = get_sub_field('info_about_page');?>
										<div class="col-lg pb-lg-0 pb-4">
											<h4 class="headline-regular cl-green text-center"><?php echo $textinfo;?></h4>
										</div>
										<?php if( $i < $count ): ?>
											<div class="col-lg-1 pb-lg-0 pb-4 cl-green text-center">
												<i class="fas fa-arrow-right arrow-info arrow-info-up"></i>
												<i class="fas fa-arrow-down arrow-info arrow-info-down"></i>
											</div>
										<?php endif; ?>
								<?php $i++; endwhile; ?>
								</div>
							</div>
					<?php endif; ?>
					<div class="row row-quote quote-about align-items-start justify-content-center">
						<div class="col-md-6 mb-md-0 mb-4">
							<?php if( get_sub_field('quote_about') ): ?>
								<div class="copy-text cl-body">
									<?php echo the_sub_field('quote_about'); ?>
								</div>
								<div class="d-flex justify-content-end align-items-center mt-3">
									<div id="quote-image" class="mr-3">
										<?php $quote_image = get_sub_field('image_quote_about'); ?>
										<img class="rounded-circle" src="<?php echo $quote_image['url'] ?>" alt="<?php echo $quote_image['alt'] ?>" width="60">
									</div>
									<div class="d-flex flex-column">
										<div id="quote-name"><?php the_sub_field('name_quote_about'); ?></div>
										<div class="quote-position cl-red"><?php the_sub_field('position_quote_about'); ?></div>
									</div>
								</div>
							<?php endif; ?>
						</div>
						<div class="col-md-6">
							<?php $image = get_sub_field('image_info_quote_about');
							if( !empty($image) ): ?>
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
					</div>
				</div><!-- container -->
			</section>
		<?php endwhile; ?>
	<?php endif; ?>
	<?php if( have_rows('section_our_partners_about') ): ?>
	<?php while( have_rows('section_our_partners_about') ): the_row();
			// Get sub field values.
			$title = get_sub_field('title_our_partners_about');
			$text = get_sub_field('text1_our_partners_about');
			$text2 = get_sub_field('text_2_our_partners_about');
	?>

		<section id="our-partners" class="section-90">
			<div class="container">
				<div class="row mb-4">
					<div class="col-md-12">
						<div class="line bg-line w-100"></div>
					</div>
				</div>
				<div class="row row-title-partners">
					<div class="col-md-3">
					<?php if( $title ): ?>
						<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $title;?></h3>
					<?php endif; ?>
					</div>
					<div class="col-md-9">
						<div class="copy-text cl-body">
							<?php if( $text ): echo $text; endif; ?>
						</div>
					</div>
				</div>
				<?php if( have_rows('logo_partners_list') ): ?>
				<div class="row row-logo-partners">
					<div class="col-md-12">
						<div class="our-partners-gallery">
					    <?php while( have_rows('logo_partners_list') ) : the_row();
							$logo = get_sub_field('logo1_our_partners_about');
							$cta = get_sub_field('link1_our_partners_about');?>
							<div class="items">
								<?php  if($cta) {
									$link_url = $cta['url'];
									$link_title = $cta['title'];
									$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
									<a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
										<?php if( !empty($logo) ): ?>
											<img class="img-fluid" src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
										<?php endif; ?>
									</a>
								<?php } ?>
							</div>
						<?php endwhile; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<div class="row mb-4">
					<div class="col-md-12">
						<div class="line bg-line w-100"></div>
					</div>
				</div>
			</div>
		</section>
		<section id="rxla-text-image" class="section-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="copy-text text-partner cl-dark">
						<?php if( $text2 ): echo $text2; endif; ?>
					</div>
				</div>
				<div class="col-md-6">
					<?php if( have_rows('logo_partners_two_logos') ): ?>
					<div class="row align-items-center mt-0">
						<?php while( have_rows('logo_partners_two_logos') ) : the_row();
							$logo = get_sub_field('logo2_our_partners_about');
							$cta = get_sub_field('link2_our_partners_about');?>
							<div class="col-6 text-center">
								<?php  if($cta) {
									$link_url = $cta['url'];
									$link_title = $cta['title'];
									$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
									<a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
										<?php if( !empty($logo) ): ?>
											<img class="img-fluid" src="<?php echo $logo['url'];?>"">
										<?php endif; ?>
									</a>
								<?php } ?>
							</div>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
	  <?php endwhile; ?>
	<?php endif; ?>
	<?php if( have_rows('section_principles_about') ): ?>
	<?php while( have_rows('section_principles_about') ): the_row();
	// Get sub field values.
	$title = get_sub_field('title_principles_about');
	$subtitle = get_sub_field('subtitle_principles_about');
	$cta = get_sub_field('cta_principles_about');
	?>
	<section class="section-list-about section-90 mb-0">
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
			<div class="row row-list-about equal">
				<?php if( have_rows('list_principles_about') ): ?>
					<?php while( have_rows('list_principles_about') ) : the_row();
						$logo = get_sub_field('image_principles_about');
						$text = get_sub_field('text_principles_about');?>
						<div class="col-md-6 mb-4 mb-md-5">
					<div class="d-flex align-items-start">
						<div class="mr-3">
							<?php if( !empty($logo) ): ?>
								<img class="img-list-about" src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
							<?php endif; ?>
						</div>
						<div class="copy-text cl-body strong-orange">
							<?php if( $text ): echo $text; endif; ?>
						</div>
					</div>
				</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<div class="col-md-12">
					<?php  if($cta) {
						$link_url = $cta['url'];
						$link_title = $cta['title'];
						$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
						<a href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
							<a class="cta-link cl-orange text-underline" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title;?></a>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-md-12">
					<div class="line bg-line w-100"></div>
				</div>
			</div>
		</div>
	</section>
		<?php endwhile; ?>
	<?php endif; ?>
	<section class="section-list-team mt-0 section-90">
		<div class="container">
			<?php if( have_rows('section_our_team') ): ?>
				<?php while( have_rows('section_our_team') ): the_row();
					// Get sub field values.
					$title = get_sub_field('title_our_team');
					$subtitle = get_sub_field('title_info_our_team');
					$text = get_sub_field('text_our_team');
					?>
					<div class="row">
						<div class="col-md-12">
							<?php if( $title ): ?>
								<h3 class="subtitle cl-dark mb-4"><?php echo $title;?> <?php if( $subtitle ): ?><span class="info-text ml-2"><?php echo $subtitle;?></span><?php endif; ?></h3>
							<?php endif; ?>
							<div class="copy-text cl-body">
								<?php if( $text ): echo $text; endif;?>
							</div>
						</div>
					</div>
					<?php if( have_rows('team_members') ): ?>
					<div class="row equal row-team justify-content-center align-items-center mt-4">
						<?php $i = 1;while( have_rows('team_members') ) : the_row();
							$name = get_sub_field('name_team');
							$position = get_sub_field('position_team');
							$text = get_sub_field('text_team');
							$image = get_sub_field('image_team');?>
							<div class="col-sm-6 col-md text-left mb-3">
							<a href="#modal-team-<?php echo $i;?>" uk-toggle>
								<?php if( !empty($image) ): ?>
								<div class="box-img">
									<img class="team-img w-100 h-100" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
								</div>
								<?php endif; ?>
							<?php if( $name ): ?>
								<h4 class="titleinfo cl-green text-uppercase mb-2 pt-3"><?php echo $name;?></h4>
							<?php endif; ?>
								<?php if( $position ): ?>
								<div class="quote-position cl-body"><?php echo $position;?></div>
								<?php endif; ?>
							</a>
							<div id="modal-team-<?php echo $i;?>" class="uk-flex-top" uk-modal>
								<div class="uk-modal-dialog modal-dialog-team uk-modal-body uk-margin-auto-vertical">
									<button class="uk-modal-close-default" type="button" uk-close><i class="fas fa-arrow-left arrow-info cl-orange"></i></button>
									<div class="row align-items-center">
										<div class="col-md-4 mb-4 mb-md-0">
											<?php if( !empty($image) ): ?>
												<div class="box-img m-auto">
													<img class="team-img w-100 h-100 img-fluid" src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
												</div>
											<?php endif; ?>
										</div>
										<div class="col-md">
											<?php if( $name ): ?>
												<h4 class="titleinfo cl-green text-uppercase mb-2 pt-3"><?php echo $name;?></h4>
											<?php endif; ?>
											<?php if( $position ): ?>
												<div class="quote-position cl-body mb-4"><?php echo $position;?></div>
											<?php endif; ?>
											<?php if( $text ): ?>
												<div class="copy-text cl-body">
													<?php echo $text;?>
												</div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php $i++; endwhile; ?>
					</div>
					<?php  endif;?>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php if( have_rows('section_advisory_team') ): ?>
			<?php while( have_rows('section_advisory_team') ): the_row();
			// Get sub field values.
			$title = get_sub_field('title_advisory_team');
			?>
			<div class="row row-adv-team">
				<div class="col-md-3">
					<?php if( $title ): ?>
					<h3 class="subtitle cl-dark mb-2"><?php echo $title;?></h3>
					<?php endif; ?>
				</div>
				<?php if( have_rows('list_advisory_team') ): ?>
				<div class="col-md">
					<?php while( have_rows('list_advisory_team') ) : the_row();
					$text = get_sub_field('text_advisory_team');?>
					<div class="copy-text cl-body mb-4">
						<?php echo $text;?>
					</div>
					<?php endwhile; ?>
				</div>
				<?php  endif;?>
			</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</section>
	<?php if( get_field('show_news_undates') ): ?>
	<?php if( get_field('title_news_section') ): ?>
	<section class="section-list-news mt-0 section-90">
		<div class="container">
			<div class="row pb-3">
				<div class="col-md-12">
					<h3 class="subtitle cl-dark mb-4"><?php echo the_field('title_news_section');?> <?php if( get_field('subtitle_news_section') ): ?><span class="info-text ml-5 pl-5 cl-body"><?php echo the_field('subtitle_news_section');?></span><?php endif; ?></h3>
				</div>
			</div>
			<div class="row">
				<?php
				$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'posts_per_page' => 4,
						'orderby'=>'post_date',
						'order'=>'desc'
				);
				$wp_query = new WP_Query($args); ?>
				<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
				<div class="col-md-6 mb-4 col-news">
					<h4 class="title-news mb-2 cl-green"><a class="cl-green" href="<?php the_permalink(); ?>"><?php the_title();?> →</a></h4>
					<div class="copy-text cl-body pb-3">
						<?php echo strip_tags(get_the_excerpt()); ?>
					</div>
				</div>
				<?php endwhile;  wp_reset_query(); ?>
			</div>
			<div class="row mt-5">
				<div class="col-md-12">
					<div class="line bg-line w-100"></div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<?php endif; ?>
	<?php if( have_rows('section_faq') ): ?>
	<?php while( have_rows('section_faq') ): the_row();
			// Get sub field values.
			$title = get_sub_field('title_section_faq');
			$text = get_sub_field('text_section_faq');
	?>
	<section class="section-faqs mt-0 section-100 mt-md-5 pt-md-3 pt-0">
		<div class="container">
			<div class="box-green w-100">
			<div class="row">
				<div class="col-md-6">
			    <?php if( $title ): ?>
					<h3 class="subtitle cl-dark mb-4"><?php echo $title;?></h3>
			    <?php  endif;?>
					<div class="copy-text cl-body strong-green">
						<?php if( $text ): ?>
						<?php echo $text;?>
						<?php  endif;?>
					</div>
				</div>
				<div class="col-md-6">
					<?php if( have_rows('faqs_list') ): ?>
					<ul uk-accordion>
						<?php $i = 1; while( have_rows('faqs_list') ): the_row();
							// Get sub field values.
							$question = get_sub_field('question');
							$answer = get_sub_field('answer');
							?>
							<li <?php if($i == 1){ ?> class="uk-open" <?php } ?>>
								<a class="uk-accordion-title" href="#"><?php echo $question;?></a>
								<div class="uk-accordion-content">
									<?php echo $answer;?>
								</div>
							</li>
						<?php $i++; endwhile; ?>
					</ul>
					<?php  endif;?>
				</div>
			</div>
			</div>
		</div>
	</section>
		<?php endwhile; ?>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
