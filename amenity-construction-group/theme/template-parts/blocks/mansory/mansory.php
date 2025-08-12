<?php
$content_block = get_field('content_mansory');
if ($content_block) {
    
    $slider_mansory = $content_block['slider_mansory']; 
 
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
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    
    //Container Full

    $container_classes = 'lg:grid grid-cols-6 gap-[24px] hidden ';
   
?>

<section class="mansory-section max-w-full lg:mb-[24px] mb-[12px] <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>"  <?php echo $anchor_attr; ?> data-aos="fade-in">  
    <?php if($slider_mansory): ?>
    <div class="full">
        <div class="lg:block hidden">
            <div class="swiper-container swiper mansory-slider overflow-hidden" id="mansory-slider">
                 <div class="swiper-wrapper">
                     <?php foreach ($slider_mansory as $item) : 
                        $mansory = $item['mansory_gallery']; ?>
                        <div class="swiper-slide w-full">
                            <?php if ($mansory):  
                                    $pattern = array('col-span-2', 'col-span-2', 'col-span-2', 'col-span-3', 'col-span-3');
                                    $counter = 0; ?>       
                                <div class="<?php echo esc_attr($container_classes); ?>">   
                                <?php foreach ($mansory as $image): $class = $pattern[$counter % count($pattern)]; $counter++; ?>                
                                        <div class="relative group overflow-hidden h-[335px] xl:h-[400px] mansory-item <?php echo $class; ?>">
                                        <a class="w-full h-full" tab-index="0" href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" aria-label="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>">
                                        <img class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />               
                                        </a>
                                        </div>                      
                                <?php endforeach; ?>   
                            </div>
                            <?php endif; ?>
                        </div>
                     <?php endforeach; ?>
                 </div>
                 <div class="swiper-pagination-mansory swiper-pagination-general-mansory bg-white/80 absolute right-0 bottom-[12px] text-right z-10 mr-[12px] max-w-fit ml-auto px-[8px] py-[6px]"></div> 
            </div>   
         </div>        
        <div class="lg:hidden block">
            <div class="swiper-container swiper mansory-slider-fluid overflow-hidden" id="mansory-slider-fluid">
                <div class="swiper-wrapper">
                     <?php foreach ($slider_mansory as $item) : 
                        $mansory = $item['mansory_gallery']; ?>
                    <?php foreach ($mansory as $image): ?>
                        <div class="swiper-slide item w-full">
                        <div class="relative group w-full h-[236px] sm:h-[400px] md:h-[500px]">
                            <a class="w-full h-full" tab-index="0" href="<?php echo esc_url($image['url']); ?>" data-fancybox="gallery" aria-label="<?php echo esc_attr($image['alt']); ?>" title="<?php echo esc_attr($image['alt']); ?>">
                            <img class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />               
                            </a>
                        </div>    
                    </div> 
                    <?php endforeach; ?>   
                     <?php endforeach; ?>
            </div>            
            <div class="swiper-pagination-mansory-fluid swiper-pagination-general-mansory bg-white/80 text-primary absolute right-0 bottom-[12px] text-right z-10 mr-[12px] max-w-fit ml-auto px-[8px] py-[6px]"></div> 
            </div>
        </div>                   
    </div>
     <?php endif; ?>     
</section>

<?php }
?>

