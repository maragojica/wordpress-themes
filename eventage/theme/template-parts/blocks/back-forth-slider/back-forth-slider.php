<?php
$content_block = get_field('content_block_slider');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $slider = $content_block['slider'];
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
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;     
    

      //Container Full
      $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
      $content_width = 'lg:w-1/3';
      $image_width = 'lg:w-2/3';   
   
?>

<section class="back-forth-simple-section back-forth-general max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">
        <div class="w-full">
        <?php if ($heading) : ?>
            <h2 class="text-black uppercase mb-[1em] lg:mb-[40px] animate__animated"  data-animation="fadeIn" data-duration="1.5s">
                <?php echo $heading; ?>
            </h2>
        <?php endif; ?> 
        </div>
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[2em] xl:gap-x-[80px]">
            <div class="w-full <?php echo esc_attr($image_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
               <?php if( $slider ): ?>    
                <div class="slider-works slider-dots slider-fluid-full owl-carousel owl-theme relative overflow-hidden">
               
                    <?php  foreach ($slider as $slide): 
                        $image = $slide['image']; ?>
                         <div class="work-slide fluid-slide item w-full h-full">
                         <div class="relative flex flex-col w-full h-[300px] sm:h-[450px]">
                        <?php  if(!empty($image)): 
                            echo wp_get_attachment_image(
                                $image['ID'],
                                'full',
                                false,
                                array(
                                    'class' => 'transition-all duration-300 h-full w-full object-cover object-center rounded-[5px] parallax-image',
                                    'alt' => esc_attr($image['alt']),
                                )
                            );
                        endif;  ?>                       
                     </div>
                     </div>
                 <?php endforeach; ?> 
               </div>     
              <?php endif; ?>     
            </div>  
            <div class="w-full <?php echo esc_attr($content_width); ?> flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">           
                <div class="flex flex-col justify-center">
                <?php if($description): ?>
                    <div class="text-black animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
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

