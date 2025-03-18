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
    <?php if( have_rows('section_banner_contact') ): ?>
    <?php while( have_rows('section_banner_contact') ): the_row();

    // Get sub field values.
    $title = get_sub_field('title_banner_contact');
    $image = get_sub_field('image_banner_contact');
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
	<?php if( have_rows('section_contact_page') ): ?>
		<?php while( have_rows('section_contact_page') ): the_row();
			// Get sub field values.
			$title = get_sub_field('title_contact_page');
			$subtitle = get_sub_field('subtitle_contact_page');
			$text = get_sub_field('text_contact_page');
			?>
			<section class="section-90 mb-lg-5">
				<div class="container">
					<div class="row pt-lg-5 mb-lg-4">
						<div class="col-md-3 pt-md-5">
							<?php if( $title ): ?>
								<h3 class="subtitle cl-dark mb-2 mb-lg-4"><?php echo $title;?> <span class="cl-green"><?php echo $subtitle;?></span></h3>
							<?php endif; ?>
							<?php if( $text ): ?>
							<div class="copy-text cl-body text-heavy">
								<?php echo $text;?>
							</div>
							<?php endif; ?>
						</div>
						<div class="col-md-9 mb-md-0 mb-4"><?php echo do_shortcode('[contact-form-7 id="202" title="Contact Form"]'); ?></div>
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
	<?php if( have_rows('section_additional_page') ): ?>
	<?php while( have_rows('section_additional_page') ): the_row(); ?>
			<section id="contact-additional">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="copy-text cl-body">
							<?php echo get_sub_field('text_additional_page'); ?>	
							</div>
						</div>
					</div>
				</div>
			</section>
        <?php endwhile; ?>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
