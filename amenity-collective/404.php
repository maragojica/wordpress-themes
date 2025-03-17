<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Amenity_Collective
 */

get_header();
$image = get_field('404_bg_image', 'option');
$bg_color = get_field('404_bg_color', 'option');
$heading = get_field('404_headline', 'option');
$subheading = get_field('404_subheadline', 'option');
$description = get_field('404_text', 'option');
$buttons = get_field('buttons_404', 'option');
?>

	<section id="primary">
		<main id="main">

		<section class="hero-section max-w-full h-[15em] sm:h-[25em] lg:h-[28em] 2xl:h-[691px] relative border-b-[12px] border-b-primary  bg-cover bg-center bg-no-repeat"  <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>
    
    <div class="overlay text-center flex flex-col items-center h-full w-full justify-center absolute z-[2] top-0 left-0 px-0" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
     <div class="container mx-auto">               
             <?php if ($subheading) : ?>
                <h3 class="text-white mb-[15px] uppercase bodymedium animate__animated" data-animation="fadeIn" data-duration="1.3s">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
                <h1 class="text-white mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $heading; ?>
                </h1>
            <?php endif; ?>            
            <?php if ($description) : ?>
                <div class="bodymedium mt-[10px] font-text-font text-white md:max-w[80%] lg:max-w-[60%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.4s">
                    <?php echo $description; ?>
                </div>
            <?php endif; ?>

            <?php if ($buttons) : ?>
                <div class="flex flex-wrap gap-4 justify-center mt-8 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';
                        ?>
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                <?php echo esc_html($title); ?>
                            </a>
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
