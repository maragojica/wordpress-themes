<?php
$content_block = get_field('content_before_after');
if ($content_block) {
    $heading = $content_block['heading'];      
    $subheading = $content_block['subheading']; 
    $description = $content_block['description']; 
    $slider = $content_block['slider_before_after']; 
 
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

    
    //Container Full

    $container_classes = 'mx-auto max-w-full lg:max-w-[90%] ';
   
?>

<section class="before-after-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">  
            <div class="w-full mx-auto text-center">
                    <?php if ($subheading) : ?>
                    <div class="text-sub text-secondary mb-[15px]" data-aos="fade-up">
                        <?php echo $subheading; ?>
                    </div> 
                    <?php endif; ?>
                    <?php if($heading): ?>
                       <h2 class="text-primary uppercase mb-[15px]" data-aos="fade-up" >
                            <?php echo $heading; ?>
                        </h2> 
                    <?php endif; ?>    
                    <?php if($description): ?>
                    <div class="text-black style-disc style-triangle mx-auto lg:max-w-[40%]" data-aos="fade-up" >                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?>                                  
            </div> 
    <?php if ($slider):  ?>       
        <div class="pt-[60px] <?php echo esc_attr($container_classes); ?>" data-aos="fade-up" >   
            <div class="swiper-container w-full h-full md:px-0 before-after-slider" id="before-after-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($slider as $column_slider):                 
                            $before_image = $column_slider['before_image']; 
                            $after_image = $column_slider['after_image'];?>    
                            
                            <div class="swiper-slide w-full">
                                <div class="h-full w-full"> 
                                 <div id="before-after" class="before-after twentytwenty-container" >
                                        <?php if ( !empty($before_image)) : 
                                                $srcset = wp_get_attachment_image_srcset($before_image['ID']);
                                                $sizes = wp_get_attachment_image_sizes($before_image['ID'], 'full'); ?>                
                                            <img src="<?php echo esc_url($before_image['url']); ?>" alt="<?php echo esc_attr($before_image['alt']); ?>" height="700" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                        <?php endif; ?> 
                                        <?php if ( !empty($after_image)) : 
                                                $srcset = wp_get_attachment_image_srcset($after_image['ID']);
                                                $sizes = wp_get_attachment_image_sizes($after_image['ID'], 'full'); ?>                
                                            <img src="<?php echo esc_url($after_image['url']); ?>" alt="<?php echo esc_attr($after_image['alt']); ?>" height="700" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                        <?php endif; ?> 
                                   </div>
                                </div>
                            </div>
                    <?php endforeach; ?>   
                </div>                            
            </div>
            <div class="flex items-center gap-3">
                <div class="before-slider-slider-prev swiper-button-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="37" viewBox="0 0 36 37" fill="none">
                    <path d="M36 16.0979L8.82584 16.0979L21.3248 3.59887L18.1443 0.47412L0.288573 18.3298L18.1443 36.1855L21.3248 33.0608L8.82584 20.5618L36 20.5618L36 16.0979Z" fill="#0066CA"/>
                    </svg>
                </div> 
                <div class="before-slider-slider-next swiper-button-next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="37" viewBox="0 0 36 37" fill="none">
                    <path d="M-6.82936e-07 20.5618L27.1742 20.5618L14.6752 33.0608L17.8557 36.1855L35.7114 18.3298L17.8557 0.47412L14.6752 3.59887L27.1742 16.0979L-8.7806e-07 16.0979L-6.82936e-07 20.5618Z" fill="#0066CA"/>
                    </svg>
                </div>    
                </div> 
           </div>
        <?php endif; ?>  
    </div>   
</section>

<?php }
?>

