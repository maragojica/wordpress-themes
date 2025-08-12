<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Amenity_Construction_Group
 */

get_header();
$heading = get_field('404_headline', 'option');
$description = get_field('404_text', 'option');
$buttons = get_field('buttons_404', 'option');
?>

	<section id="primary">
		<main id="main">
		<section class="info-hero-section h-screen max-w-full relative bg-primary border-b-[12px] border-primary" >		
			<div class="overlay text-center flex flex-col items-center h-full w-full justify-center absolute z-[2] top-0 left-0 px-0 bg-primary">
			<div class="container mx-auto">
				   <?php if($heading ): ?>
					<h1 class="text-white mb-0 capitalize" data-aos="fade-up">
						<?php echo $heading; ?>
					</h1>
					<?php endif; ?>
					  <?php if ($description) : ?>
						<div class="text-medium lg:mt-5 mt-8 font-text-font text-white md:max-w[80%] lg:max-w-[60%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
							<?php echo $description; ?>
						</div>
					<?php endif; ?>
					 <?php if ($buttons) : ?>
                    <div class="flex flex-wrap gap-3 lg:gap-8 mt-5 justify-center" data-aos="fade-up">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_type = $button['button_type'];
                            $button_style_btn = $button['button_style_btn'];
                            $button_style_link = $button['button_style_link'];
                            $button_style = '';
                            if ($button_type === 'btn') {
                                $button_style = 'btn ';
                                if ($button_style_btn) {
                                    $button_style .= ' ' . $button_style_btn;
                                }
                            } elseif ($button_type === 'link') {
                                $button_style = 'simple-link ';
                                if ($button_style_link) {
                                    $button_style .= ' ' . $button_style_link;
                                }
                            }
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group">
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="<?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                </a>     
                                
                            </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
				</div>
		</div>
		</section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
