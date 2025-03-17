<?php
$content = get_field('services');
if ($content) {    
    $heading = $content['heading'];   
    $description = $content['description'];    
    $bg_color = $content['bg_color'];       
    $services_info = $content['services_info'];
  

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';


    //Spacing Settings
    $spacing = $content['spacing'];
    $spacing_top_desktop = $content['spacing_top_desktop'];
    $spacing_bottom_desktop = $content['spacing_bottom_desktop'];
    $spacing_top_mobile = $content['spacing_top_mobile'];
    $spacing_bottom_mobile = $content['spacing_bottom_mobile'];

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

    $container_classes = 'w-full flex-wrap h-full flex flex-col md:flex-row ';
    
?>

<section class="services-section max-w-full relative rounded-[50px_0px_50px_0px] lg:mr-0 lg:ml-0 mr-[22px] ml-[22px] <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>  
     <div class="w-full pl-[22px] pr-[22px] lg:pl-[48px] lg:pr-[48px] xl:pl-[68px] xl:pr-[68px] 2xl:pl-[68px] 2xl:pr-[88px] mx-auto">  
     <?php if( $services_info ): $animation_delay = 1.75; ?> 
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-[48px] xl:gap-y-[80px] 2xl:gap-y-[110px]">
            <div class="w-full lg:w-1/2 xl:w-1/3 lg:px-[20px] 2xl:px-[30px] animate__animated" data-animation="fadeIn" data-duration="1s" >
                <?php if ($heading) : ?>
                    <h2 class="text-white mb-0">
                        <?php echo $heading; ?>
                    </h2>
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="font-text-font text-white mt-3 xl:mt-6 style-disc" >                 
                        <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>
            </div>
        <?php $animation_delay = 1;  foreach ($services_info as $column): 
                $icon = $column['icon']; 
                $title = $column['title'];
                $text = $column['text'];
                $cta = $column['link'];
                $duration = $animation_delay . 's';  ?>
                <div class="w-full md:w-1/2 lg:w-1/2 xl:w-1/3 lg:px-[20px] 2xl:px-[30px]  animate__animated" data-animation="fadeIn" data-duration="<?php echo esc_attr($duration); ?>">
                    <div class="flex flex-row gap-x-[32px] w-full h-full justify-start items-start text-left">
                        <?php  if(!empty($icon)): 
                        echo wp_get_attachment_image(
                            $icon['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 h-[60px] 2xl:h-[80px] object-contain',
                                'alt' => esc_attr($icon['alt']),
                            )
                        );
                    endif;  ?>
                      <div>
                          <?php if($title): ?>
                             <h3 class="text-primary"><?php echo $title;?></h3>
                           <?php endif; ?> 
                           <?php if($text): ?>
                                <div class="font-text-font text-white mt-2 xl:mt-4 style-disc" >                 
                                    <?php echo $text; ?>                   
                                </div>
                            <?php endif; ?>
                            <?php if ($cta) :
                                $url = $cta['url'];
                                $title = $cta['title'];
                                $target = $cta['target'] ? $cta['target'] : '_self';  ?>
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="mt-3 2xl:mt-[25px] group flex items-center justify-start gap-[12px] font-secondary-font text-[16px] lg:text-[20px] font-[800] tracking-[2.4px] uppercase text-primary hover:text-primary">
                                    <?php echo esc_html($title); ?>
                                    <div class="relative">                                      
                                        <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-[1] origin-left scale-100 group-hover:opacity-0 group-hover:scale-0" xmlns="http://www.w3.org/2000/svg" width="27" height="16" viewBox="0 0 27 16" fill="none">
                                        <path d="M0 8H24" stroke="#00A2B2" stroke-width="3"/>
                                        <path d="M18 2L24 8L18 14" stroke="#00A2B2" stroke-width="3"/>
                                        </svg>                                       
                                        <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-0 origin-left scale-0 group-hover:opacity-[1] group-hover:scale-100" xmlns="http://www.w3.org/2000/svg" width="35" height="16" viewBox="0 0 35 16" fill="none">
                                        <path d="M0 8H32" stroke="#00A2B2" stroke-width="3"/>
                                        <path d="M26.3335 2L32.3335 8L26.3335 14" stroke="#00A2B2" stroke-width="3"/>
                                        </svg>
                                    </div>
                                </a>                                                  
                      <?php endif; ?> 
                      </div>      
                    </div>
                </div>
        <?php $animation_delay += 0.10; endforeach; ?> 
        </div>     
    <?php endif; ?>
     </div>       
</section> 
<?php }?>


