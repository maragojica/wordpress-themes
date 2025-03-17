<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Eric_Scott
 */

get_header();
$image = get_field('404_bg_image', 'option');
$bg_overlay = get_field('404_bg_color', 'option');
$heading = get_field('404_headline', 'option');
$subheading = get_field('404_subheadline', 'option');
$description = get_field('404_text', 'option');
$buttons = get_field('buttons_404', 'option');
?>

	<section id="primary">
		<main id="main">
		<section class="hero-section max-w-full h-screen relative bg-cover bg-fixed bg-center bg-no-repeat padding-small  lg:pt-0 lg:pb-0 pt-0-important pb-0-important" <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?>>
               
    <div class="overlay flex flex-col h-full w-full justify-center items-center text-center absolute z-[2] top-0 left-0 pb-[70px]" <?php if( $bg_overlay): ?> style="background-color: <?php echo $bg_overlay;?>"<?php endif;?> >
     <div class="container mx-auto text-center"> 
        <?php if ($heading) : ?>
           <div class="relative">
            <?php if( $subheading): ?>
                <div class="text-white mx-auto subheading font-secondary capitalize text-center animate__animated" data-animation="fadeIn" data-duration="1.3s"><?php echo $subheading; ?></div>
             <?php endif; ?>
            <h1 class="text-primary animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h1>
           </div> 
           <?php endif; ?>  
           <?php if($description): ?>
                <div class="text-sub text-white mt-[1.5em] style-disc lg:max-w-[55%] xl:max-w-[50%] mx-auto animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                    <?php echo $description; ?>                   
                </div>
           <?php endif; ?> 
       
     <?php if ($buttons) : ?>
            <div class="flex flex-wrap justify-center gap-4 mt-6 animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_style = $button['button_style'];
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                            <?php echo esc_html($title); ?>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>   
             
         </div>
   </div>
     <div class="w-full absolute left-0 -bottom-[3px] z-3">
        <div class="line-border"></div>
        <div class="line-divider mt-[11px]"></div>        
     </div>
 
</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
