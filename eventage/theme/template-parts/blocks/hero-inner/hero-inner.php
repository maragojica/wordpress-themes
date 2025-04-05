<?php
$hero = get_field('hero_inner');
if ($hero) {
    
    $heading = $hero['heading']; 
    $banner_type = $hero['banner_type'];
    $image = $hero['bg_image'];   
    $image_mobile = $hero['bg_image_mobile'];    
    $buttons = $hero['buttons'];  

    $alignment = $hero['vertical_alignment'];

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Container Settings

    $container_classes = 'flex flex-col h-full w-full justify-center ' . ($alignment === 'middle' ? 'lg:justify-center' : ($alignment === 'bottom' ? 'lg:justify-end lg:pb-[70px] xl:pb-[100px]' : 'lg:justify-start lg:pt-[70px] xl:pt-[100px]'));
?>

<section class="hero-inner-section max-w-full h-[30em] lg:h-screen relative z-[1] bg-cover bg-fixed bg-center bg-no-repeat animate__animated <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?> <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-animation="fadeIn" data-duration="1.1s">
    <?php if($banner_type['value'] == "video"){ 
                $videomp4 = $hero['banner_video_mp4'];  
                $poster_video = $hero['video_poster']; ?> 
                <video class="absolute top-0 left-0 h-full w-full object-cover object-top z-[1]" autoplay loop muted preload playsinline style="pointer-events: none;" <?php if( $poster_video ): ?> poster="<?php echo esc_url($poster_video['url']); ?>" <?php endif; ?>>
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>              
    <div class="overlay absolute h-full w-full z-[2] top-0 left-0 bg-[linear-gradient(0deg,rgba(0,0,0,0.30)_0%,rgba(0,0,0,0.30)_100%)]" >
     <div class="container mx-auto h-full">
        <div class="<?php echo esc_attr($container_classes); ?> h-full lg:gap-[60px] xl:gap-[80px] 2xl:gap-[100px]">
            <div class="w-full lg:w-[60%] xl:w-[70%] 2xl:w-[66%]">
                <?php if ($heading) : ?>                 
                    <h3 class="text-white animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h3>           
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
<?php if($banner_type['value'] == "image"):
 if(!empty($image_mobile)): ?>
    <style>
        @media (max-width: 575.98px) {
            .hero-inner-section{
                background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
            }
         }
    </style>
<?php endif; endif;?>    
<?php }
?>

