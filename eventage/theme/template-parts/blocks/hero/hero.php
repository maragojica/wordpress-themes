<?php
$hero = get_field('hero');
if ($hero) {
    
    $heading = $hero['heading'];     
    $description = $hero['description'];    
    $logo = $hero['logo'];
    $banner_type = $hero['banner_type'];
    $image = $hero['bg_image'];   
    $image_mobile = $hero['bg_image_mobile'];    
    $buttons = $hero['buttons'];  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Container Settings

    $container_classes = 'flex flex-col h-full w-full justify-center lg:justify-end ';
?>

<section class="hero-section max-w-full h-screen relative z-[1] bg-cover bg-fixed bg-center bg-no-repeat animate__animated <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?> <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-animation="fadeIn" data-duration="1.1s">
    <?php if($banner_type['value'] == "video"){ 
                $videomp4 = $hero['banner_video_mp4'];  
                $poster_video = $hero['video_poster']; ?> 
                <video class="absolute top-0 left-0 h-full w-full object-cover object-top z-[1]" autoplay loop muted preload playsinline style="pointer-events: none;" <?php if( $poster_video ): ?> poster="<?php echo esc_url($poster_video['url']); ?>" <?php endif; ?>>
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>              
    <div class="overlay absolute h-full w-full z-[2] top-0 left-0 bg-[linear-gradient(0deg,rgba(0,0,0,0.20)_0%,rgba(0,0,0,0.20)_100%)]" >
     <div class="container mx-auto h-full">
        <div class="<?php echo esc_attr($container_classes); ?> h-full lg:pb-[70px] xl:pb-[100px] lg:gap-[60px] xl:gap-[80px] 2xl:gap-[100px]">
            <div class="w-full lg:w-[60%] xl:w-[70%] 2xl:w-[66%]">
             <?php if(!empty($logo)): 
                echo wp_get_attachment_image(
                        $logo['ID'],
                        'full',
                        false,
                        array(
                            'class' => 'w-full h-fit object-contain max-w-[200px] sm:max-w-[234px] mb-[20px]',
                            'alt' => esc_attr($logo['alt'])             
                        )
                    );
                endif; ?>
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
<?php if($banner_type['value'] == "image"):
 if(!empty($image_mobile)): ?>
    <style>
        @media (max-width: 575.98px) {
            .hero-section{
                background-image: url(<?php echo esc_url($image_mobile['url']); ?>) !important;
            }
         }
    </style>
<?php endif; endif;?>    
<?php }
?>

