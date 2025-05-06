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
       
    $alignment = $hero['vertical_alignment'];    
    $alignment_hori = $hero['horizontal_alignment'];  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $hero['spacing'];
    $spacing_top_desktop = $hero['spacing_top_desktop'];
    $spacing_bottom_desktop = $hero['spacing_bottom_desktop'];
    $spacing_top_mobile = $hero['spacing_top_mobile'];
    $spacing_bottom_mobile = $hero['spacing_bottom_mobile'];

    $spacing_class = '';
    switch ($spacing) {
        case 'small':
            $spacing_class = 'padding-small';
            break;
        case 'medium':
            $spacing_class = 'padding-medium';
            break;
        case 'large':
            $spacing_class = 'padding-large';
            break;
    }    

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    //Container Settings

    $container_classes = 'flex flex-col h-full w-full ' . ($alignment === 'middle' ? 'justify-center' : ($alignment === 'bottom' ? 'justify-end' : ($alignment === 'top' ? 'justify-start' : 'justify-around'))) . ($alignment_hori === 'middle' ? ' items-center text-center' : ($alignment_hori === 'right' ? ' items-end text-right' : ($alignment_hori === 'left' ? ' items-start text-left' : ' items-stretch items-center')));
?>
<section class="hero-section max-w-full lg:px-[70px] xl:px-[75px] 2xl:px-[102px] <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
<div class="max-w-full z-[3] h-[400px] md:h-[450px] lg:h-[500px] 2xl:h-[666px] relative bg-cover bg-center bg-no-repeat lg:rounded-[25px] rounded-[0px_0px_25px_25px] lg:mt-[60px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php if(!empty($image)):?>style="background-image: url(<?php echo esc_url($image['url']); ?>)"<?php endif; ?> data-aos="fade-in">
    <?php if($banner_type['value'] == "video"){ 
                $videomp4 = $hero['banner_video_mp4'];  
                $poster_video = $hero['video_poster']; ?> 
                <video class="absolute top-0 left-0 h-full w-full object-cover object-center z-[1] lg:rounded-[25px] rounded-[0px_0px_25px_25px]" autoplay loop muted preload playsinline style="pointer-events: none;" <?php if( $poster_video ): ?> poster="<?php echo esc_url($poster_video['url']); ?>" <?php endif; ?>>
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>              
    <div class="overlay <?php echo esc_attr($container_classes); ?> absolute z-[2] top-0 left-0 lg:rounded-[25px] rounded-[0px_0px_25px_25px] bg-[linear-gradient(270deg,rgba(0,0,0,0)_-0.57%,rgba(0,0,0,0.5)_94.01%),linear-gradient(0deg,rgba(0,0,0,0.05)_0%,rgba(0,0,0,0.05)_100%)]" >
     <div class="container mx-auto h-full <?php echo esc_attr($container_classes); ?> relative"> 
        <?php if ( !empty($logo)) : 
                $srcset = wp_get_attachment_image_srcset($logo['ID']);
                $sizes = wp_get_attachment_image_sizes($logo['ID'], 'full'); ?>                
            <img class="img-fluid w-[129px] h-[36px] object-center object-contain md:absolute top-14 md:mb-0 mb-10" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="36" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" data-aos="fade-up" data-aos-offset="100" data-aos-delay="50"/>                            
        <?php endif; ?> 
        <?php if ($heading) : ?>                 
            <h2 class="text-secondary uppercase" data-aos="fade-up" data-aos-offset="200" data-aos-delay="50">
                <?php echo $heading; ?>
            </h2>           
           <?php endif; ?>            
           <?php if($description): ?>
                <div class="text-secondary mt-[20px] style-disc lg:max-w-[60%] xl:max-w-[60%] 2xl:max-w-[65%] <?php if($alignment_hori == 'middle'): ?> mx-auto <?php endif; ?>" data-aos="fade-up" data-aos-offset="200" data-aos-delay="60">                 
                    <?php echo $description; ?>                   
                </div>
           <?php endif; ?> 
       
     <?php if ($buttons) : ?>
            <div class="flex flex-wrap <?php if($alignment_hori == 'middle'){ ?>justify-center <?php }else{ ?> justify-start <?php } ?> gap-4 mt-5 lg:mt-7" data-aos="fade-up" data-aos-offset="200" data-aos-delay="70">
                <?php foreach ($buttons as $button) : ?>
                    <?php 
                    $button_link = $button['button'];
                    $button_style = $button['button_style'];
                    if ($button_link) :
                        $url = $button_link['url'];
                        $title = $button_link['title'];
                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                        <div class="relative group">
                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn btn_w <?php if($button_style): echo $button_style; endif;?>">
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
