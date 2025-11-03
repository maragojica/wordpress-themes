<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Virginia_Interfaith
 */

get_header();
$subheading = get_field('404_subheadline', 'option');
$heading = get_field('404_headline', 'option');
$description = get_field('404_text', 'option');
$button = get_field('404_cta', 'option');
?>

		<section id="primary" class="pt-[121px] xl:pt-[158px]">
		<main id="main">
			<section class="info-text-section max-w-full relative bg-accent padding-medium h-screen flex items-center"> 
			<div class="container mx-auto">     
			  <div class="flex flex-col ">
				<div class="w-full text-center">
					<?php if($subheading): ?>
                        <div class="eyebrow text-quaternary mb-[12px]"  >
                            <?php echo $subheading; ?>
                        </div>   
                    <?php endif; ?> 
                        <?php if ($heading) : ?>
                         <h2 class="text-foreground mb-0" >
                                <?php echo $heading; ?>
                         </h2> 
                    <?php endif; ?>                     
                    <?php if($description): ?>
                    <div class="text-foreground style-disc mt-[15px]" data-aos="fade-in" >                 
                        <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>	
            </div>
          </div>  
		  <?php if ($button) :
				$url = $button['url'];
				$title = $button['title'];
				$target = $button['target'] ? $button['target'] : '_self';  ?>
				<div class="w-full">
					<div class="flex flex-wrap gap-2 lg:gap-8 mt-[30px] justify-center" data-aos="fade-up">
						<div class="relative group">
						<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn w-fit btn_fill_light">
							<?php echo esc_html($title); ?>                                                         
						</a> 
						</div> 
					</div>
				</div>  
			<?php endif; ?>	
			</div>  
		</section>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php include get_template_directory() . '/template-parts/global/global-get-involved.php'; ?>
<?php
get_footer();
