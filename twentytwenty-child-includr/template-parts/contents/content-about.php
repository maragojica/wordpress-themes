<?php
/**
 * Displays the content when the about template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="section-our-story">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="center-box-about m-auto">
						<div class="box-story bg-ligth p-md-5 p-4 mt-lg-0 mt-4">
							<?php $title = get_field('title_our_story');
							$subtitle = get_field('subtitle_our_story');
							if( $title ):?>
								<h3 class="title-section font-regular cl-blue">
									<?php echo $title;?>
									<svg class="mr-2 ml-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="43px" height="43px">
										<image  x="0px" y="0px" width="43px" height="43px"  xlink:href="data:img/png;base64,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" />
									</svg>
									<?php if( $subtitle ): ?>
										<span class="subtitle-section cl-dark-2 d-inlin"><?php echo $subtitle;?></span>
									<?php endif; ?>
								</h3>
							<?php endif; ?>
						</div>
						<?php $info = get_field('info_our_story');
						if( $info ):?>
						<div class="copy-text cl-dark-2 mt-md-2 pt-5 pr-md-25 pl-md-25"><?php echo $info;?></div>
						<?php endif; ?>
						<div class="pt-5 mt-md-5 mt-4 pr-md-25 pl-md-25">
							<?php $title = get_field('title_what_we_are');
							$subtitle = get_field('subtitle_what_we_are');
							if( $title ):?>
							<h4 class="title-info cl-blue mb-md-5 mb-4"><?php echo $title;?></h4>
							<?php endif; ?>
							<?php if( $subtitle ):?>
							<h2 class="title-post cl-dark-2 mb-md-5 mb-4"><?php echo $subtitle;?></h2>
							<?php endif; ?>
							<?php $info = get_field('info_what_we_are');
							if( $info ):?>
								<div class="copy-text cl-dark-2 mb-md-5 mb-4"><?php echo $info;?></div>
							<?php endif; ?>
							<?php $title = get_field('title_focuses');
							if( $title ):?>
								<h5 class="title-fosuses cl-dark-2 text-md-left text-center mb-md-5 mb-4 pt-4"><?php echo $title;?></h5>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<?php if( have_rows('list_focuses') ): ?>
					<div class="row-center-md row-full-md m-auto">
						<div class="row row-focused equal pt-5 pb-5">
							<?php while( have_rows('list_focuses') ) : the_row();
								$icon = get_sub_field('icon_focuses');
								$title = get_sub_field('title_focuses');
								$color = get_sub_field('color_focuses');
								?>
								<div class="col-6 col-md-3 col-focused text-center p-md-5 p-4">
									<?php if( !empty($icon) ): ?>
										<img class="m-auto icon-focused" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
									<?php endif; ?>
									<?php if( $title ):?>
										<h5 class="title-focused cl-blue pt-4" style="color: <?php echo $color;?>"><?php echo $title;?></h5>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="section-division bg-purple-dark d-flex align-items-center">
		<div class="container">
			<?php
			$title = get_field('title_divisions');
			$titlemv = get_field('title_divisions_mv');
			if( $title ):?>
			<div class="row">
				<div class="col-md-12">
					<h5 class="title-divisions cl-white text-center pt-md-4 <?php if( $titlemv ): ?>hide-md<?php endif; ?>"><?php echo $title;?></h5>
					<?php if( $titlemv ): ?>
						<h5 class="title-divisions cl-white text-center pt-md-4 hide-tb"><?php echo $titlemv;?></h5>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if( have_rows('list_divisions') ):
				$count = count(get_field('list_divisions'));?>
				<div class="row row-divisions mr-md-0 ml-md-0">
				<?php $i=1; while( have_rows('list_divisions') ) : the_row();
					$text = get_sub_field('text_divisions');
					?>
					<div class="col-md-4 pr-md-0 pl-md-0 col-divisions col-division-<?php echo $i;?>">
							<?php if( $title ): ?>
								<div class="text-divisions cl-white w-100 h-100 d-flex justify-content-md-center align-items-center">
									<?php echo $text; ?>
								</div>
							<?php endif; ?>
					</div>
					<?php if($i < $count) : ?><div class="hide-tb line-division w-100"></div><?php endif; ?>
				<?php $i++; endwhile; ?>
			</div>
			<?php endif; ?>
			<?php $title_bottom = get_field('title_bottom_divisions');
			if( $title_bottom ):?>
			<div class="row pt-md-5">
				<div class="col-md-12">
					<?php if( $title_bottom ): ?>
						<div class="text-divisions cl-white text-center"><p><?php echo $title_bottom;?></p></div>
					<?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<?php if( have_rows('list_team') ): ?>
	<div class="section-our-team bg-ligth">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<div class="center-box-about m-auto">
						<div class="pt-5 mt-md-5 mt-4 pr-md-25 pl-md-25">
							<?php $title = get_field('title_team1');
							if( $title ):?>
								<h4 class="title-info cl-blue mb-md-5 mb-4"><?php echo $title;?></h4>
							<?php endif; ?>
							<?php $info = get_field('text_team');
							if( $info ):?>
								<div class="copy-text cl-dark-2 mb-md-5 mb-4"><?php echo $info;?></div>
							<?php endif; ?>
							<?php
							$title2 = get_field('title_team2');
							if( $title2 ):?>
								<h3 class="title-post cl-dark-2"><?php echo $title2;?></h3>
							<?php endif; ?>
							<?php
							$title3 = get_field('title_team3');
							if( $title3 ):?>
								<h3 class="title-post font-regular cl-dark-2 mb-md-5 mb-4"><?php echo $title3;?></h3>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row-center-md row-full-md m-auto row-box-team">
				<div class="row row-team equal pt-4 pt-md-5">
				<?php while( have_rows('list_team') ) : the_row();
					$name = get_sub_field('name_team');
					$position = get_sub_field('position_name');
					$info = get_sub_field('info_team');
					$image = get_sub_field('image_team');
					$twitter = get_sub_field('twitter_team');
					?>
						<div class="col-md-6 col-lg-4 col-team">
							<div class="box-team bg-white w-100 h-100 position-relative d-flex justify-content-between flex-column">
								<div class="info-team p-4">
									<?php if( $position ):?>
										<h6 class="position-team cl-blue mb-2"><?php echo $position;?></h6>
									<?php endif; ?>
									<?php if( $name ):?>
										<h5 class="name-team cl-dark mb-2"><?php echo $name;?></h5>
									<?php endif; ?>
									<?php if( $info ):?>
										<div class="info-team cl-gray"><?php echo $info;?></div>
									<?php endif; ?>
								</div>
								<?php if( !empty($icon) ): ?>
									<img class="m-auto fluid-img img-team" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
								<?php endif; ?>
								<?php if($twitter) {
								$link_url = $twitter['url'];
								$link_title = $twitter['title'];
								$link_target = $twitter['target'] ? $twitter['target'] : '_self';?>
								<div class="overlay d-flex justify-content-start align-items-end">
									<a  href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
										<svg class="icon-profile-twitter ml-4 mb-4" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink"	width="45px" height="45px">
											<image  x="0px" y="0px" width="45px" height="45px"  xlink:href="data:img/png;base64,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" />
										</svg>
									</a>
								</div>
								<?php } ?>
							</div>
						</div>
				<?php endwhile; ?>
				</div>
				<div class="row row-fim">
					<div class="col-md-6 text-firm">
						<p>Supported by RALLY, an issue-driven communications firm.</p>
					</div>
					<div class="col-md"><hr></div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
</article><!-- .post -->