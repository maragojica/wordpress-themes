<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Charity_Charge
 */

get_header();
$subheading = get_field('404_subheadline', 'option');
$heading = get_field('404_headline', 'option');
$description = get_field('404_text', 'option');
$button = get_field('404_cta', 'option');
?>

	<main id="primary" class="site-main">

		<section class="back-forth-hero-section position-relative bg-blue-darker">
			<div class="top-section padding-large">
				<div class="container">
					<div class="row align-items-center justify-content-center text-center g-5">
						<div class="col-12 col-md-7">
							<?php if($subheading): ?>
							<p class="color-white" data-aos="fade-up">
							<?php echo $subheading; ?>
							</p>
							<?php endif; ?>
							<?php if($heading): ?>
							<h1 class="color-white subheadline" data-aos="fade-up">
								<?php echo $heading; ?>
							</h1>
							<?php endif; ?>
							<?php if($description): ?>
							<div class="color-white content-text mt-4" data-aos="fade-up" data-aos-delay="50">
								<p><?php echo $description; ?></p>
							</div>
							<?php endif; ?>
							<?php if($button): 
								$url = $button['url'];
								$title = $button['title'];
								$target = $button['target'] ? $button['target'] : '_self'; ?>
							<div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-lg-5 mt-4 justify-content-center" data-aos="fade-up" data-aos-delay="50">
								<div class="relative group">
									<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" class="button primary w-100 w-lg-auto medium">
										<?php echo esc_html($title); ?>
									</a>
								</div>								
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</section>

	</main><!-- #main -->

<?php
get_footer();
