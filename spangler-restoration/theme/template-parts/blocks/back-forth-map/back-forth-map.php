<?php
$content_block = get_field('content_block_map');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $description = $content_block['description'];        
    $buttons = $content_block['buttons'];
    $map = $content_block['map'];  
    $locations = $content_block['locations']; 
    
    $reverse_desktop = in_array('yes', $content_block['reverse_order_desktop']);
    $reverse_mobile = in_array('yes', $content_block['reverse_order_mobile']);
    $alignment = $content_block['vertical_alignment'];

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
       
 
    $container_classes = 'h-full flex flex-col md:flex-row ' . ($reverse_desktop ? 'md:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full md:w-2/5'; 
    $content_width = 'w-full md:w-3/5';      
    $btn_align = 'justify-start';
   
?>

<section class="back-forth-map-section max-w-full relative <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?>>   
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> md:gap-y-0 gap-y-[3em] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
          <div class="<?php echo esc_attr($heading_width); ?> px-[1.5rem] <?php if($reverse_desktop){ ?> md:pl-[20px] xl:pl-[30px] <?php }else{ ?> md:pr-[20px] xl:pr-[30px] <?php } ?> flex flex-col justify-center">
            <?php if ($heading) : ?>
                <div class="relative">
                    <?php if( $subheading): ?>
                        <div class="text-sub text-secondary mb-[15px]" data-aos="fade-up"  ><?php echo $subheading; ?></div>
                    <?php endif; ?>
                    <h2 class="text-primary uppercase" data-aos="fade-up" >
                        <?php echo $heading; ?>
                    </h2>
                </div>               
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="text-black style-disc style-triangle" data-aos="fade-up"  >                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
                 <?php if( $locations ):
                     foreach ($locations as $location) : 
                        $color = $location['color'];
                        $text = $location['text'];?>
                    <div class="flex items-center mt-[20px] w-full"  >
                        <?php if($color): ?>
                            <div class="min-w-[110px] h-[30px] rounded-[50px]" style="background-color: <?php echo esc_attr($color); ?>;"></div>
                        <?php endif; ?>    
                        <?php if($text): ?>
                            <div class="text-black info style-disc pl-[25px]">                 
                                <?php echo $text; ?>                   
                            </div>
                    <?php endif; ?> 
                    </div>
                  <?php  endforeach; endif; ?>  
                   
                 <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-5 lg:mt-8" data-aos="fade-up" >
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                 <?php endif; ?>  
            </div>            
            <div class="<?php echo esc_attr($content_width); ?>" <?php if($reverse_desktop){ ?> data-aos="fade-left" <?php }else{ ?> data-aos="fade-right" <?php } ?> >  
                 <?php if ( !empty($map)) : 
                        $srcset = wp_get_attachment_image_srcset($map['ID']);
                        $sizes = wp_get_attachment_image_sizes($map['ID'], 'full'); ?>                
                    <img class="img-fluid w-full h-full object-center object-contain" src="<?php echo esc_url($map['url']); ?>" alt="<?php echo esc_attr($map['alt']); ?>" height="600" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                <?php endif; ?> 
            </div>           
        </div>  
    </div>
   
</section>

<?php }
?>

