<?php
$content_block = get_field('content_block_slider');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $slider = $content_block['slider'];
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];
    $bg_color = $content_block['bg_color'];      
    
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
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;     
    

      //Container Full
      $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
      $content_width = 'lg:w-1/2';
      $image_width = 'lg:w-1/2';    

     //Rounded Image
     $rounded = ' rounded-[50px_0px_50px_0px]';
     if($reverse_desktop){
        $rounded = ' rounded-[0px_50px_0px_50px]';
     }

     //Image Position
     $position = ' left-0 rounded-[0px_50px_0px_0px] pl-[20px] pr-[60px] pt-[30px]';
     if($reverse_desktop){
        $position = ' right-0 rounded-[50px_0px_0px_0px] pl-[60px] pr-[20px] pt-[30px]';
     }
   
?>

<section class="back-forth-simple-section back-forth-general max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="w-full pl-[22px] lg:pl-0 pr-[22px] lg:pr-0 mx-auto">
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[2em] xl:gap-x-[100px] 2xl:gap-x-[128px]">
            <div class="w-full <?php echo esc_attr($image_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
               <?php if( $slider ): ?>    
                <div class="slider-products slider-dots slider-fluid-full owl-carousel owl-theme relative overflow-hidden">
               
                    <?php  foreach ($slider as $slide): 
                        $image = $slide['image']; 
                        $name = $slide['name']; ?>
                         <div class="product-slide fluid-slide item w-full h-full">
                         <div class="relative flex flex-col w-full h-[15em] md:h-[30em] lg:h-full lg:max-h-[510px] 2xl:max-h-[680px] 3xl:max-h-[45em]">
                        <?php  if(!empty($image)): 
                            echo wp_get_attachment_image(
                                $image['ID'],
                                'full',
                                false,
                                array(
                                    'class' => 'transition-all duration-300 h-full w-full object-cover object-center z-[1]'.$rounded,
                                    'alt' => esc_attr($image['alt']),
                                )
                            );
                        endif;  ?>
                        <?php if($name): ?>
                            <div class="absolute bottom-0 bg-white z-[2] w-fit text-secondary text-[20px] sm:text-[28px] lg:text-[32px] font-[800] font-primary-font leading-[1] -mb-[1px] <?php echo $position;?>"><?php echo $name;?></div>
                        <?php endif; ?>
                     </div>
                     </div>
                 <?php endforeach; ?> 
               </div>     
              <?php endif; ?>     
            </div>  
            <div class="w-full <?php echo esc_attr($content_width); ?> flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">           
                <div class="lg:pt-[50px] lg:pb-[50px] 2xl:pt-[110px] 2xl:pb-[110px]  flex flex-col justify-center">
                <?php if ($heading) : ?>
                    <h2 class="text-secondary mb-0">
                        <?php echo $heading; ?>
                    </h2>
                <?php endif; ?> 
                <?php if($description): ?>
                <div class="font-text-font text-foreground mt-3 xl:mt-6 style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                    <?php echo $description; ?>                   
                </div>
                    <?php endif; ?> 
                    <?php if ($buttons) : ?>
                    <div class="w-full flex flex-wrap gap-4 justify-start mt-4 xl:mt-[50px]">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';    ?>
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                </a>
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

