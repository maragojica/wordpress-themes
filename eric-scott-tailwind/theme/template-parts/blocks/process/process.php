<?php
$content_block = get_field('content_block_process');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];  
    $desktop_image = $content_block['desktop_image'];  
    $mobile_image = $content_block['mobile_image']; 
    $description_one = $content_block['description_column_one'];
    $description_two = $content_block['description_column_two'];
    $buttons = $content_block['buttons'];
    $add_bottom_divider = $content_block['add_bottom_divider'];
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
        $heading_width = 'lg:w-[30%]'; 
        $content_width = 'lg:w-[70%] lg:pr-[5em]';      
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
        $heading_width = 'w-full';    
        $content_width = 'w-full';      
        $btn_align = 'justify-center';
    }
   
?>

<section class="process-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[3em]">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="flex flex-col justify-center">
                <?php if ($heading) : ?>
                <div class="relative">
                    <?php if( $subheading): ?>
                        <div class="text-secondary subheading font-secondary capitalize rotate--10.166 absolute -left-[1.2rem] md:-left-[34px] lg:-left-[51px] -top-[12px] xl:top-0 z-[1] animate__animated" data-animation="fadeIn" data-duration="1.3s"><?php echo $subheading; ?></div>
                    <?php endif; ?>
                    <h2 class="text-primary animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                </div>               
                <?php endif; ?> 
                    <?php if($description_one): ?>
                    <div class="text-secondary mt-[1.5em] style-disc style-disc animate__animated" data-animation="fadeIn" data-duration="1.2s" >                 
                        <?php echo $description_one; ?>                   
                    </div>
                    <?php endif; ?>  
                    <?php  if ($columns_number == "one") { ?> 
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-6">
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn sm <?php if($button_style): echo $button_style; endif;?>">
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
            <div class="<?php echo esc_attr($content_width); ?> animate__animated text-secondary style-disc animate__animated" data-animation="fadeIn" data-duration="1.2s" >                 
                <?php echo $description_two; ?> 
                <?php  if ($columns_number == "two") { ?>   
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
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min sm btn <?php if($button_style): echo $button_style; endif;?>">
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
        <?php if(!empty($desktop_image) || !empty($mobile_image)): ?>
            <div class="w-full lg:w-[75%] mx-auto mt-[3em] lg:mt-[115px] animate__animated" data-animation="fadeIn" data-duration="1.1s" >  
                 <?php if(!empty($desktop_image)): ?>   
                    <?php echo wp_get_attachment_image($desktop_image['ID'], 'full', false, array('class' => 'w-full h-fit object-contain object-center md:block hidden')); ?>        
                  <?php endif; ?> 
                  <?php if(!empty($mobile_image)): ?>   
                    <?php echo wp_get_attachment_image($mobile_image['ID'], 'full', false, array('class' => 'w-fit h-fit object-contain object-center md:hidden block')); ?>        
                  <?php endif; ?> 
            </div>
         <?php endif; ?>   
    </div>
    <?php if($add_bottom_divider): ?>
     <div class="w-full absolute left-0 bottom-0 z-3">
        <div class="line-divider"></div>   
        <div class="line-border mt-[11px]"></div>             
     </div>
   <?php endif; ?>
</section>

<?php }
?>

