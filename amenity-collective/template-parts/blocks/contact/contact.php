<?php
$content_block = get_field('content_contact');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $description = $content_block['description'];  
    $buttons = $content_block['buttons'];
    $bg_color = $content_block['bg_color']; 
    $columns_number = $content_block['columns_number'];      
 
    
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
       
 

    if ($columns_number == "two") {
        $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
        $heading_width = 'w-full lg:w-2/5'; 
        $content_width = 'w-full lg:w-3/5';      
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
        $heading_width = 'w-full';    
        $content_width = 'w-full';      
        $btn_align = 'justify-center';
    }
   
?>

<section class="contact-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
   
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[6em]">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="flex flex-col justify-center">
                    <?php if ($subheading) : ?>
                        <h3 class="text-foreground mb-[10px] uppercase">
                            <?php echo $subheading; ?>
                        </h3>
                    <?php endif; ?>
                    <?php if ($heading) : ?>
                        <h2 class="text-secondary mb-0">
                            <?php echo $heading; ?>
                        </h2>
                    <?php endif; ?> 
                    <?php if($description): ?>
                    <div class="font-text-font text-foreground  mt-4 style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description; ?>                   
                    </div>
                    <?php endif; ?>  
                    <?php  if ($columns_number == "one") { ?> 
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-4 lg:mt-12">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>    
                    <?php } ?>               
                </div>
            </div> 
            <?php if ($columns_number == "two"):
                   $gravity_form_id = $content_block['gravity_form'];  
                   $bottom_text = $content_block['bottom_text'];   ?>
            <div class="<?php echo esc_attr($content_width); ?> animate__animated font-text-font text-foreground style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                 
                <div class="contact-form bg-gray p-[20px] lg:py-[40px] lg:px-[60px] animate__animated" data-animation="fadeIn" data-duration="1.5s" >   
                    <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>    
                    <?php if($bottom_text): ?>
                        <div id="bottom-text" class="font-primary-font font-semibold text-[14px] lg:text-left text-center mt-2"><?php echo $bottom_text;?></div>
                    <?php endif; ?>    
                </div>                        
                                
            </div>
            <?php endif; ?>
        </div>  
    </div>
</section>

<?php }
?>

