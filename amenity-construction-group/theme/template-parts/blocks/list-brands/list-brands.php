<?php
$content_block = get_field('content_list_brands');
if ($content_block) {
    
    $heading = isset($content_block['heading']) ? $content_block['heading'] : '';  
    $list_items_brands = isset($content_block['list_items_brands']) ? $content_block['list_items_brands'] : array();      

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Spacing Settings
    $spacing = isset($content_block['spacing']) ? $content_block['spacing'] : '';
    $spacing_top_desktop = isset($content_block['spacing_top_desktop']) ? $content_block['spacing_top_desktop'] : '';
    $spacing_bottom_desktop = isset($content_block['spacing_bottom_desktop']) ? $content_block['spacing_bottom_desktop'] : '';
    $spacing_top_mobile = isset($content_block['spacing_top_mobile']) ? $content_block['spacing_top_mobile'] : '';
    $spacing_bottom_mobile = isset($content_block['spacing_bottom_mobile']) ? $content_block['spacing_bottom_mobile'] : '';

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
      
    $container_classes = 'flex flex-col items-center justify-center';        
    $content_width = 'w-full';      
    $btn_align = 'justify-start';
    
   
?>

<section class="brands-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container mx-auto">     
        <div class="<?php echo esc_attr($container_classes); ?>">
            <div class="<?php echo esc_attr($content_width); ?> ">
                <div class="flex flex-col justify-center">                
                    <?php if ($heading) : ?>
                        <h2 class="text-secondary text-center" data-aos="fade-up" >
                            <?php echo $heading; ?>
                        </h2>                             
                    <?php endif; ?>   
                    <?php if($list_items_brands): ?>
                       <div class="flex flex-wrap flex-col md:flex-row items-start justify-center md:mx-[-30px] lg:mx-[-30px] lg:gap-y-[73px] gap-y-[3em]">
                            <?php foreach ($list_items_brands as $brand_info): 
                                $logo = isset($brand_info['logo']) ? $brand_info['logo'] : '';
                                $title = isset($brand_info['title']) ? $brand_info['title'] : ''; 
                                $text = isset($brand_info['text']) ? $brand_info['text'] : ''; 
                                $buttons = isset($brand_info['buttons']) ? $brand_info['buttons'] : array(); ?>
                                <div class="w-full md:w-1/3 md:px-[15px] lg:px-[30px]">
                                    <?php  if(!empty($logo)): ?>
                                    <div class="brand-logo flex items-center justify-center">
                                        <?php echo wp_get_attachment_image(
                                            isset($logo['ID']) ? $logo['ID'] : '',
                                            'full',
                                            false,
                                            array(
                                                'class' => 'transition-all duration-300 w-auto h-[134px] object-contain transition-transform',
                                                'alt' => isset($logo['alt']) ? esc_attr($logo['alt']) : '',
                                                'data-aos' => 'fade-up',
                                            )
                                        ); ?>
                                    </div>
                                <?php endif; ?>
                                    <?php if($title): ?>
                                        <div class="brand-title text-secondary text-center mt-[25px]" data-aos="fade-up">
                                            <?php echo $title; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($text): ?>
                                        <div class="text-accent text-medium mt-1 style-disc text-center" data-aos="fade-up">                 
                                            <?php echo $text; ?>                   
                                        </div>
                                    <?php endif; ?> 
                                    <?php if ($buttons) : ?>
                                        <div class="flex flex-wrap gap-3 lg:gap-8 mt-6 justify-center" data-aos="fade-up">
                                            <?php foreach ($buttons as $button) : ?>
                                                <?php 
                                                $button_link = isset($button['button']) ? $button['button'] : '';
                                                $button_type = isset($button['button_type']) ? $button['button_type'] : '';
                                                $button_style_btn = isset($button['button_style_btn']) ? $button['button_style_btn'] : '';
                                                $button_style_link = isset($button['button_style_link']) ? $button['button_style_link'] : '';
                                                $button_style = '';
                                                if ($button_type === 'btn') {
                                                    $button_style = 'btn ';
                                                    if ($button_style_btn) {
                                                        $button_style .= ' ' . $button_style_btn;
                                                    }
                                                } elseif ($button_type === 'link') {
                                                    $button_style = 'simple-link ';
                                                    if ($button_style_link) {
                                                        $button_style .= ' ' . $button_style_link;
                                                    }
                                                }
                                                if ($button_link) :
                                                    $url = isset($button_link['url']) ? $button_link['url'] : '';
                                                    $title = isset($button_link['title']) ? $button_link['title'] : '';
                                                    $target = isset($button_link['target']) && $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                                    <div class="relative group">
                                                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="<?php if($button_style): echo $button_style; endif;?>">
                                                            <?php echo esc_html($title); ?>
                                                        </a>     
                                                    </div>            
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>  
                                </div>                                            
                            <?php endforeach;?>   
                        </div>
        
                    <?php endif; ?>   
                </div>
            </div>           
        </div>  
    </div>
</section>
<?php }
?>

