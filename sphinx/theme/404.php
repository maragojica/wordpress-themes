<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sphinx
 */

get_header();
$image = get_field('404_image', 'option');
$subheading = get_field('404_subheadline', 'option');
$heading = get_field('404_headline', 'option');
$description = get_field('404_text', 'option');
$button = get_field('404_cta', 'option');
?>

	<section id="primary">
		<main id="main">
			
			<section class="404-section max-w-full relative bg-foreground">
				<div class="w-full bg-cover bg-no-repeat bg-center h-screen overflow-hidden bg-fixed" <?php if(!empty($image)): ?> style="background-image: url('<?php echo esc_url($image['url']); ?>');" <?php endif; ?>>
				<div class="box-media-hero w-full h-full flex flex-col justify-center items-center text-center relative z-[2]" style="background: rgba(26, 27, 35, 0.5); "  >
					<?php if($heading || $description || $button ): ?>              
							<div class="container mx-auto" data-aos="fade-in">
								<?php if($subheading): ?>
									<h1 class="text-white mb-[12px]"  >
										<?php echo $subheading; ?>
									</h1>   
								<?php endif; ?>   
								<?php if ($heading) : ?>
								<h2 class="text-white mb-0" data-aos="fade-up" >
									<?php echo $heading; ?>
								</h2> 
							<?php endif; ?>                         
								<?php if($description): ?>
								<div class="text-large text-white style-disc mt-5 mx-auto lg:max-w-[50%]" data-aos="fade-up" data-aos-delay="100" >                 
									<?php echo $description; ?>                   
								</div>
							<?php endif; ?> 
							<?php if ($button) :
								$url = $button['url'];
								$title = $button['title'];
								$target = $button['target'] ? $button['target'] : '_self';  ?>
								<div class="w-full">
									<div class="flex flex-wrap gap-2 lg:gap-8 mt-[30px] justify-center" data-aos="fade-up">
										<div class="relative group">
										<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn w-fit btn_outline_action">
											<?php echo esc_html($title); ?>                                                         
										</a> 
										</div> 
									</div>
								</div>  
							<?php endif; ?>	
						</div>              
				<?php endif; ?> 
				</div>  
				</div> 
			</section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
