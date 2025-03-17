<?php
$content_block = get_field('content_block');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $image = $content_block['image'];
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

     //Text Color Settings
     $text_color = $content_block['text_color_style'];
     if($text_color == "light"){
        $headline_color = "text-secondary-dark";
        $subheadline_color = "text-primary";
        $description_color = "text-primary";
        $border_color = "#628290";
     }else{
        $headline_color = "text-accent";
        $subheadline_color = "text-secondary-dark";
        $description_color = "text-secondary-dark";
        $border_color = "#50594F";
     }
    
     //Image Line Color Settings
     if($reverse_desktop){
        $side_pos_line = 'lg:-right-[20px] -right-[15px]';
     }else{
        $side_pos_line = 'lg:-left-[20px] -left-[15px]';
     }

      //Media Type
    $media_type = $content_block['media_type'];   

    if ($media_type != "nomedia") {
        $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
        $content_width = 'lg:w-1/2';
        $image_width = 'lg:w-1/2';
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
        $content_width = 'w-full';
        $image_width = ''; 
        $btn_align = 'justify-center';
    }
   
?>

<section class="back-forth-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[140px]">
            <?php if($media_type == "single") { ?>
            <?php if ($image) : ?>
                <div class="rounded-[12px] relative w-full flex flex-col flex-1 z-[2] <?php echo esc_attr($image_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >   
                    <div class="absolute lg:top-[20px] top-[15px] <?php echo $side_pos_line;?> w-full h-full rounded-[12px] z-[1] border-4 border-solid" style="border-color: <?php echo $border_color;?>"></div>            
                     <?php echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'rounded-[12px] w-full h-full object-cover object-center relative z-[2] my-0')); ?>        
                     <?php $caption = $image['caption']; 
                        if($caption): ?>    
                        <div class="absolute lg:top-[20px] top-[15px] left-[20px] z-[3] font-secondary-font font-semibold tracking-[1.6px] uppercase text-[13px] lg:text-body text-accent"><?php echo $caption; ?></div>      
                        <?php endif; ?>  
                </div>
            <?php endif; ?>
            <?php }elseif($media_type == "multi"){ $multi_image_one = $content_block['multi_image_one']; $multi_image_two = $content_block['multi_image_two']; ?>
                <?php if($multi_image_one || $multi_image_two): ?>
                    <div class="w-full flex flex-col flex-1 <?php echo esc_attr($image_width); ?>" > 
                    <?php if ($multi_image_one) : ?>
                        <div class="rounded-[12px] relative w-full z-[2] animate__animated" data-animation="fadeIn" data-duration="1.5s" >   
                            <div class="absolute lg:top-[20px] top-[15px] <?php echo $side_pos_line;?> w-full h-full rounded-[12px] z-[1] border-4 border-solid" style="border-color: <?php echo $border_color;?>"></div>            
                            <?php echo wp_get_attachment_image($multi_image_one['ID'], 'full', false, array('class' => 'rounded-[12px] w-full h-full object-cover object-center relative z-[2] my-0')); ?>        
                            <?php $caption = $multi_image_one['caption']; 
                                if($caption): ?>    
                                <div class="absolute lg:top-[20px] top-[15px] left-[20px] z-[3] font-secondary-font font-semibold tracking-[1.6px] uppercase text-[13px] lg:text-body text-accent"><?php echo $caption; ?></div>      
                                <?php endif; ?>  
                        </div>
                    <?php endif; ?>
                    <?php if ($multi_image_two) : ?>
                        <div class="rounded-[12px] relative w-full z-[2] max-w-[70%] -mt-[129px] mx-auto animate__animated hidden lg:block" data-animation="fadeIn" data-duration="1.5s" >   
                            <div class="absolute lg:top-[20px] top-[15px] <?php echo $side_pos_line;?> w-full h-full rounded-[12px] z-[1] border-4 border-solid" style="border-color: <?php echo $border_color;?>"></div>            
                            <?php echo wp_get_attachment_image($multi_image_two['ID'], 'full', false, array('class' => 'rounded-[12px] w-full h-full object-cover object-center relative z-[2] my-0')); ?>        
                            <?php $caption = $multi_image_two['caption']; 
                                if($caption): ?>    
                                <div class="absolute lg:top-[20px] top-[15px] left-[20px] z-[3] font-secondary-font font-semibold tracking-[1.6px] uppercase text-[13px] lg:text-body text-accent"><?php echo $caption; ?></div>      
                                <?php endif; ?>  
                        </div>
                    <?php endif; ?>
                    </div>
                 <?php endif; ?>                  
             <?php } ?>   
            <div class="w-full <?php echo esc_attr($content_width); ?> flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="<?php if($media_type == "single"): ?>lg:pt-[20px] lg:pb-[20px] <?php endif; ?> flex flex-col justify-center">
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

                <?php if ($description) : ?>
                    <div class="font-text-font style-disc <?php echo $description_color;?>">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>

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

