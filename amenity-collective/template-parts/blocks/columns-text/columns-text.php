<?php
$content_block = get_field('content_block_text');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $description_one = $content_block['description_column_one'];
    $description_two = $content_block['description_column_two'];
    $buttons = $content_block['buttons'];
    $bg_color = $content_block['bg_color']; 
    $columns_number = $content_block['columns_number'];  
    $shape_image = $content_block['shape'];       
    
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
        $container_classes = 'h-full flex flex-col xl:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
        $heading_width = 'xl:w-1/2 2xl:w-2/5'; 
        $content_width = 'xl:w-1/2 2xl:w-3/5';      
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
        $heading_width = 'w-full';    
        $content_width = 'w-full';      
        $btn_align = 'justify-center';
    }
   
?>

<section class="columns-text-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <?php if(!empty($shape_image)): 
         echo wp_get_attachment_image(
            $shape_image['ID'],
            'full',
            false,
            array(
                'class' => 'absolute left-0 bottom-0 lg:-bottom-[0] h-[173px] lg:h-[500px] object-contain',
                'alt' => esc_attr($shape_image['alt']),                
            )
        );
     endif; ?>
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[2em] 2xl:gap-x-[6em] 2xl:gap-x-0">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="flex flex-col justify-center">
                    <?php if ($subheading) : ?>
                        <h3 class="text-foreground mb-[10px] uppercase">
                            <?php echo $subheading; ?>
                        </h3>
                    <?php endif; ?>
                    <?php if ($heading) : ?>
                        <h2 class="text-secondary">
                            <?php echo $heading; ?>
                        </h2>
                    <?php endif; ?> 
                    <?php if($description_one): ?>
                    <div class="font-text-font text-foreground  mt-4 mb-4 style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description_one; ?>                   
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
            <?php if($description_two): ?>
            <div class="<?php echo esc_attr($content_width); ?> animate__animated font-text-font text-foreground style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description_two; ?> 
                <?php  if ($columns_number == "two") { ?>   
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-4 lg:mt-[30px]">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>  
                <?php } ?>                   
            </div>
            <?php endif; ?>
        </div>  
    </div>
</section>

<?php }
?>

