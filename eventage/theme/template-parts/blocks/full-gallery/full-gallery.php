<?php
$content_block = get_field('content_block_gallery');
if ($content_block) {    
   
    $slider_gallery = $content_block['slider_gallery'];  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Spacing Settings
    $spacing = $content_block['spacing'];
    $spacing_top_desktop = $content_block['spacing_top_desktop'];
    $spacing_bottom_desktop = $content_block['spacing_bottom_desktop'];
    $spacing_top_mobile = $content_block['spacing_top_mobile'];
    $spacing_bottom_mobile = $content_block['spacing_bottom_mobile'];

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
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;  
?>

<section class="full-gallery-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">
       <div class="w-full animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
               <?php if( $slider_gallery ): ?>    
                <div class="slider-works slider-dots slider-fluid-full owl-carousel owl-theme relative overflow-hidden">               
                    <?php  foreach ($slider_gallery as $slide): ?>
                       <div class="work-slide fluid-slide item w-full h-full">
                         <div class="relative flex flex-col w-full h-[300px] mb:h-[450px] lg:h-[550px] xl:h-[750px] rounded-[5px]">
                           <img class="transition-all duration-300 h-full w-full object-cover object-center rounded-[5px] parallax-image" src="<?php echo esc_url($slide['url']); ?>" alt="<?php echo esc_attr($slide['alt']); ?>" />                                            
                         </div>
                     </div>
                 <?php endforeach; ?> 
               </div>     
              <?php endif; ?>     
         </div>  
    </div>
</section>

<?php }
?>

