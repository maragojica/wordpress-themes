<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package CNP_Technologies
 */

get_header();
$image = get_field('404_bg_image', 'option');
$bg_overlay = get_field('404_bg_color', 'option');
$heading = get_field('404_headline', 'option');
$description = get_field('404_text', 'option');
$buttons = get_field('buttons_404', 'option');
?>

	<section id="primary">
		<main id="main">

		<section class="hero-section max-w-full bottom-shape custom-h h-[700px] md:h-[calc(90vh-101px)] lg:h-[calc(90vh-113px)] relative z-[1] bg-cover bg-fixed bg-center bg-no-repeat animate__animated padding-small lg:pt-0 lg:pb-0 pt-0-important pb-0-important animate__animated" <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-animation="fadeIn" data-duration="1.1s">
                  
			<div class="overlay flex flex-col h-full w-full justify-center items-center text-center absolute z-[2] top-0 left-0 bg-[linear-gradient(270deg,rgba(0,55,108,0)_-0.57%,rgba(0,55,108,0.5)_94.01%),linear-gradient(0deg,rgba(0,55,108,0.55)_0%,rgba(0,55,108,0.55)_100%)]">
				 <div class="container mx-auto"> 
				   <?php if ($heading) : ?>		   
					<h1 class="text-white animate__animated fadeIn" data-animation="fadeIn" data-duration="1.2s" style="animation-duration: 1.2s;">
						<?php echo $heading; ?>
					</h1>           
					<?php endif; ?>
					<?php if($description): ?>
					 <div class="text-sub text-white mt-[10px] style-disc lg:max-w-[60%] xl:max-w-[60%] 2xl:max-w-[50%] mx-auto animate__animated fadeIn" data-animation="fadeIn" data-duration="1.3s" style="animation-duration: 1.3s;">                 
						<?php echo $description; ?>
					 </div>
					<?php endif; ?>	  
					 
					<?php if ($buttons) : ?>
                    <div class="flex justify-center flex-wrap gap-4 mt-[20px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            $button_type = $button['button_type'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group bottom-shape-btn-<?php echo $button_type;?>">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min bottom-shape-btn btn <?php if($button_style): echo $button_style; endif;?>">
                                        <span class="bottom-shape-btn-<?php echo $button_type;?>"><?php echo esc_html($title); ?></span> 
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
