<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package eventage
 */

get_header();
$image = get_field('404_bg_image', 'option');
$heading = get_field('404_headline', 'option');
$description = get_field('404_text', 'option');
$buttons = get_field('buttons_404', 'option');

?>

	<section id="primary">
		<main id="main">

	<section class="hero-section max-w-full h-[30em] lg:h-screen relative z-[1] bg-cover bg-fixed bg-center bg-no-repeat animate__animated" <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-animation="fadeIn" data-duration="1.1s">
               
    <div class="overlay absolute h-full w-full z-[2] top-0 left-0 bg-[linear-gradient(0deg,rgba(0,0,0,0.20)_0%,rgba(0,0,0,0.20)_100%)]" >
     <div class="container mx-auto h-full">
        <div class="flex flex-col h-full w-full justify-center h-full lg:gap-[60px] xl:gap-[80px] 2xl:gap-[100px]">
            <div class="w-full lg:w-[60%] xl:w-[70%] 2xl:w-[66%]">             
                <?php if ($heading) : ?>                 
                    <h1 class="text-white animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h1>           
                <?php endif; ?> 
            </div>
            <div class="w-full lg:w-[40%] xl:w-[30%] 2xl:w-[34%] self-end">
              <?php if($description): ?>
                    <div class="sub-text text-white animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description; ?>                   
                    </div>
               <?php endif; ?> 
             <?php if ($buttons) : ?>
                <div class="flex flex-wrap justify-center justify-start gap-4 mt-[30px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_style = $button['button_style'];
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                        <div class="relative group">
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                            <?php echo esc_html($title); ?>
                        </a>     
                        
                       </div>            
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?> 
            </div>
        </div>       
         </div>
   </div>  
</section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
