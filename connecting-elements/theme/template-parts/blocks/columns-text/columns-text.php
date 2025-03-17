<?php
$content_block = get_field('content_block_text');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description_one = $content_block['description_column_one'];
    $description_two = $content_block['description_column_two'];
    $buttons = $content_block['buttons'];
    $bg_color = $content_block['bg_color']; 
    $add_top_shape = $content_block['add_top_shape']; 
    $top_shape = $content_block['top_shape']; 
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
        $heading_width = 'lg:w-2/5'; 
        $content_width = 'lg:w-3/5';      
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
         if($top_shape){
            $heading_width = 'w-full lg:w-[60%]';   
         }else{
            $heading_width = 'w-full lg:w-[75%]';    
         }        
        $content_width = 'w-full';      
        $btn_align = 'justify-center';
    }
   
?>
<section class="columns-text-section max-w-full relative <?php if($top_shape): ?> mt-[3em] lg:mt-[160px] 2xl:mt-[245px] <?php endif; ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>  >
    <?php if($top_shape): ?>
        <?php if(!empty($top_shape)): 
         echo wp_get_attachment_image(
            $top_shape['ID'],
            'full',
            false,
            array(
                'class' => 'w-full max-w max-w-full h-auto min-w-[calc(100vw+40px)] -ml-[40px] lg:-ml-[120px] -mb-[3em] md:-mb-[6em] xl:-mb-[10em] 3xl:-mb-[13em] 4k:-mb-[20em] animate__animated',
                'alt' => esc_attr($top_shape['alt']),   
                'data-animation' =>  'fadeIn',
                'data-duration' =>  '1.5s'             
            )
        );
     endif; ?>
    <?php endif; ?>
<div class="max-w-full rounded-[50px_0px_50px_0px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>"  <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    
    <div class="container mx-auto <?php if($top_shape): ?> pt-[6em] md:pt-[9em] lg:pt-[152px] 4k:pt-[19em] <?php endif;?>">     
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[2em] 2xl:gap-x-[6em]">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="flex flex-col justify-center">  
                    <?php if ($heading) : ?>
                        <h2 class="text-secondary mb-0">
                            <?php echo $heading; ?>
                        </h2>
                    <?php endif; ?> 
                    <?php if($description_one): ?>
                    <div class="font-text-font text-foreground  mt-3 xl:mt-5 style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description_one; ?>                   
                    </div>
                    <?php endif; ?>  
                    <?php  if ($columns_number == "one") { ?> 
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 xl:gap-[80px] <?php echo $btn_align;?> mt-4 xl:mt-[50px]">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
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
                        <div class="flex flex-wrap gap-4 xl:gap-[80px] <?php echo $btn_align;?> mt-4 xl:mt-[50px]">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';
                                ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
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
</div>
</section>
<?php }
?>

