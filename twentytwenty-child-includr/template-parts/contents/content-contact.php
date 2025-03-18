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
	<div class="section section-main-single mt-lg-0 mt-5">
		<div class="container">
			<div class="row row-center-lg equal ml-md-auto align-items-md-center">
				<div class="col-md-10">
					<?php $title = get_field('title_contact'); $desc = get_field('title_description_contact');
					if( $title ):?>
						<h4 class="title-section cl-blue mb-5 pt-2"><?php echo $title;?><?php if( $desc ):?><span class="mt-3 mt-md-0 ml-sm-5 d-sm-inline"><?php echo $desc; ?></span><?php endif; ?></h4>
					<?php endif; ?>
					<?php $title = get_field('subtitle_contact');
					if( $title ):?>
					<h3 class="title-contact cl-white mb-md-5"><?php echo $title;?></h3>
					<?php endif; ?>
					<div class="box-contact-form pt-5 mb-3 mb-md-5 pb-md-5 position-relative">
						<?php $icon1 = get_field('icon_1_contact'); $icon2 = get_field('icon_2_contact'); $icon3 = get_field('icon_3_contact');?>
						<?php if( !empty($icon1) ): ?>
							<img class="icon-contact icon-contact1" src="<?php echo esc_url($icon1['url']); ?>" alt="<?php echo esc_attr($icon1['alt']); ?>" width="23px">
						<?php endif; ?>
						<?php if( !empty($icon2) ): ?>
							<img class="icon-contact icon-contact2" src="<?php echo esc_url($icon2['url']); ?>" alt="<?php echo esc_attr($icon2['alt']); ?>" width="32px">
						<?php endif; ?>
						<?php if( !empty($icon3) ): ?>
							<img class="hide-md icon-contact icon-contact3" src="<?php echo esc_url($icon3['url']); ?>" alt="<?php echo esc_attr($icon3['alt']); ?>" width="24px">
						<?php endif; ?>
                        <?php echo do_shortcode('[contact-form-7 id="318" title="Contact Page"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- .post -->
