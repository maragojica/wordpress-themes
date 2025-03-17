<?php
$content_block = get_field('content_block_text');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];   
    $extra_subheading = $content_block['extra_subheading']; 
    $description_one = $content_block['description_column_one'];
    $description_two = $content_block['description_column_two'];
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

     //Text Color Settings
     $text_color = $content_block['text_color_style'];
     if($text_color == "light"){
        $headline_color = "text-secondary-dark";
        $subheadline_color = "text-primary";
        $description_color = "text-primary";      
     }else{
        $headline_color = "text-accent";
        $subheadline_color = "text-primary";
        $description_color = "text-secondary-dark";      
     }
    
       
 

    if ($description_two) {
        $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
        $content_width = 'lg:w-1/2';
        $col_two_width = 'lg:w-1/2';
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
        $content_width = 'w-full';
        $col_two_width = ''; 
        $btn_align = 'justify-center';
    }
   
?>

<section class="columns-info-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[140px]">
          <div class="w-full flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="lg:pt-[20px] flex flex-col justify-center">
                    <?php if ($subheading) : ?>
                        <h3 class="<?php echo $subheadline_color;?> mb-[10px]">
                            <?php echo $subheading; ?>
                        </h3>
                    <?php endif; ?>
                    <?php if ($heading) : ?>
                        <h2 class="<?php echo $headline_color;?> mb-[20px]">
                            <?php echo $heading; ?>
                        </h2>
                    <?php endif; ?>   
                    <?php if ($extra_subheading) : ?>
                        <h3 class="<?php echo $subheadline_color;?> mt-[10px]">
                            <?php echo $extra_subheading; ?>
                        </h3>
                    <?php endif; ?> 
                </div>
            </div> 
        </div>   
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-0 lg:gap-x-[60px] lg:pt-[50px] pt-[30px]">   
            <?php if($description_one): ?>
            <div class="w-full <?php echo esc_attr($content_width); ?> flex-1 flex flex-col justify-center animate__animated font-text-font <?php echo $description_color;?> style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description_one; ?>                   
            </div>
            <?php endif; ?>
            
            <?php if($description_two): ?>
            <div class="w-full <?php echo esc_attr($col_two_width); ?> flex-1 flex flex-col justify-center animate__animated font-text-font <?php echo $description_color;?> style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description_two; ?>                   
            </div>
            <?php endif; ?>
        </div>
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[140px]">
          <div class="w-full flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="lg:pt-[20px] lg:pb-[20px] flex flex-col justify-center">                                 
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-6">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-full sm:min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
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

