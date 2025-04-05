<?php
$content_block = get_field('content_block_media_bg');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $image = $content_block['image'];
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];        
    
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
    

      //Container Full
      $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
      $content_width = 'lg:w-[40%]';
      $image_width = 'lg:w-[60%]';   
   
?>

<section class="back-forth-media-bg-section custom-blue-gradient-inner max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">
        <div class="w-full">
        <?php if ($heading) : ?>
            <h2 class="text-white uppercase mb-[1em] lg:mb-[40px] animate__animated"  data-animation="fadeIn" data-duration="1.5s">
                <?php echo $heading; ?>
            </h2>
        <?php endif; ?> 
        </div>
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[2em] xl:gap-x-[80px]">
            <div class="w-full <?php echo esc_attr($image_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >                
              <?php if ( !empty($image)) : 
                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                    <img class="img-fluid transition-all duration-300 rounded-[5px] w-full h-full object-center object-cover parallax-image lg:h-[450px]" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="450" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                <?php endif; ?>  
            </div>  
            <div class="w-full <?php echo esc_attr($content_width); ?> flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">           
                <div class="flex flex-col justify-center">
                <?php if($description): ?>
                    <div class="lg:text-white text-black animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description; ?>                   
                    </div>
               <?php endif; ?> 
                <?php if ($buttons) : ?>
                    <div class="flex flex-wrap justify-center justify-start gap-4 mt-[40px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
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

<?php }
?>

