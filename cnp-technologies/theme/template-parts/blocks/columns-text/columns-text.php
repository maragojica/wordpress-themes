<?php
$content_block = get_field('content_block_text');
if ($content_block) {
    
    $heading = $content_block['heading'];        
    $description_one = $content_block['description_column_one'];
    $description_two = $content_block['description_column_two'];
    $buttons = $content_block['buttons'];   
    $columns_number = $content_block['columns_number'];    
    $full_title = $content_block['full_title'];
    
     $add_bg_shape = $content_block['add_bg_shape']; 
    $bg_shape = $content_block['bg_shape']; 

    $add_cta = $content_block['add_cta'];  
    $cta_title = $content_block['cta_title'];
    $cta_text = $content_block['cta_text'];       
    $cta_texture = $content_block['cta_texture'];   
    
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
        $row_classes = 'items-left';
        $heading_width = 'lg:w-1/2'; 
        $content_width = 'lg:w-1/2';      
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center lg:max-w-[75%] xl:max-w-[68%] lg:mx-auto';
        $row_classes = 'items-center';
        $heading_width = 'w-full';    
        $content_width = 'w-full';      
        $btn_align = 'justify-center';
    }
   
?>

<section class="columns-text-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php if($add_bg_shape): ?> lg:mt-[-180px] <?php endif;?>" <?php echo $anchor_attr; ?> >
<?php if($add_bg_shape): ?>
        <?php if(!empty($bg_shape)): 
         echo wp_get_attachment_image(
            $bg_shape['ID'],
            'full',
            false,
            array(
                'class' => 'absolute right-0 bottom:0 w-full h-full lg:h-fit object-cover lg:object-contain parallax-img',
                'alt' => esc_attr($bg_shape['alt']),  
                'data-velocity' => '-20'              
            )
        );
     endif; ?>
    <?php endif; ?>
    <div class="container mx-auto <?php if($add_bg_shape): ?> lg:mt-[180px] <?php endif;?>">     
        <?php if($full_title): if ($heading) : ?>
            <div class="w-full text-center">
              <h2 class="text-primary mb-[20px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                    <?php echo $heading; ?>
                </h2> 
            </div>
         <?php endif; endif; ?>  
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[2em]">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="flex flex-col justify-center <?php echo esc_attr($row_classes); ?>">
                <?php if(!$full_title): if ($heading) : ?>
                        <h2 class="text-primary mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                            <?php echo $heading; ?>
                        </h2> 
                    <?php endif; endif; ?>                     
                    <?php if($description_one): ?>
                    <div class="text-black <?php if ($heading && !$full_title) : ?> mt-[0.5em] <?php endif; ?> style-disc animate__animated" data-animation="fadeIn" data-duration="1.1s" >                 
                        <?php echo $description_one; ?>                   
                    </div>
                    <?php endif; ?>  
                    <?php  if ($columns_number == "one") { ?> 
                        <?php if($add_cta): ?>
                            <div class="relative lg:mt-[50px] mt-[2em] mb-[20px]">
                                <?php if(!empty($cta_texture)): 
                                echo wp_get_attachment_image(
                                    $cta_texture['ID'],
                                            'full',
                                            false,
                                            array(
                                                'class' => 'absolute left-0 top:0 w-full h-full object-cover object-center',
                                                'alt' => esc_attr($cta_texture['alt'])
                                            )
                                        );
                                endif; ?>
                            <div class="flex relative z-[1] flex-col justify-between items-center px-[1.5em] py-[1.5em] lg:px-[50px] 2xl:px-[60px] lg:py-[30px] 2xl:py-[44px] ">
                                <?php if($cta_title): ?>
                                    <h3 class="text-white mb-0 text-center animate__animated" data-animation="fadeIn" data-duration="1.2s">
                                        <?php echo $cta_title; ?>
                                    </h3> 
                                <?php endif; ?>  
                               <?php if($cta_text): ?>
                                  <div class="text-white bold-descri mb-0 mt-[15px] text-center"><?php echo $cta_text;?></div>
                                <?php endif; ?>
                            </div>
                               </div>
                        <?php endif; ?>   
                        <?php if ($buttons) : ?>
                    <div class="flex flex-wrap justify-center gap-4 mt-[35px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            $button_type = $button['button_type'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group bottom-shape-btn-<?php echo $button_type;?>">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min bottom-shape-btn btn <?php if($button_style): echo $button_style; endif;?>">
                                        <span class="bottom-shape-btn-<?php echo $button_type;?>"><?php echo esc_html($title); ?></span> 
                                    </a>  
                                </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>     
                    <?php } ?>               
                </div>
            </div> 
            <?php if($description_two): ?>
            <div class="<?php echo esc_attr($content_width); ?> animate__animated text-black style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                <?php echo $description_two; ?> 
                <?php  if ($columns_number == "two") { ?>   
                    <?php if ($buttons) : ?>
                    <div class="flex flex-wrap gap-4 mt-[35px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            $button_type = $button['button_type'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group bottom-shape-btn-<?php echo $button_type;?>">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min bottom-shape-btn btn <?php if($button_style): echo $button_style; endif;?>">
                                        <span class="bottom-shape-btn-<?php echo $button_type;?>"><?php echo esc_html($title); ?></span> 
                                    </a>  
                                </div>            
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

