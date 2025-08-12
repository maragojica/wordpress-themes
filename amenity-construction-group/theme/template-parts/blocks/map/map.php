<?php
$content_block = get_field('content_info_map');
if ($content_block) {
    
    $headings = $content_block['headings']; 
    $description = $content_block['description'];   
     $buttons = $content_block['buttons'];    
    $map_shortcode = $content_block['map_shortcode'];   
    $map_mobile = $content_block['map_mobile'];  
    $map_shortcode_list = $content_block['map_list'];      

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
      
    $container_classes = 'flex flex-col items-center justify-center';        
    $content_width = 'w-full';      
    $btn_align = 'justify-start';
    
   
?>

<section class="map-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
   
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?>">
          <div class="<?php echo esc_attr($content_width); ?> ">
                <div class="flex flex-col justify-center">  
                    <div class="flex align-items-center justify-between lg:flex-row flex-col gap-8 lg:gap-[50px] xl:gap-[50px] 2xl:gap-[106px]">
                        <?php if($headings): ?>
                        <div class="w-full xl:w-1/2" data-aos="fade-up">
                            <div class="flex flex-col overflow-hidden lg:flex-row flex-wrap justify-center lg:justify-between border-t-[2px] border-b-[2px] border-tertiary">
                                <?php foreach ($headings as $heading) : ?>
                                    <div class="flex w-full lg:w-1/2 items-center xl:justify-start justify-center title-map text-secondary lg:px-[30px] py-[23px] relative">
                                        <?php echo $heading['text_heading']; ?>
                                         <?php if($heading !== end($headings)) : ?>
                                        <span class="hidden lg:block border-r border-[2px] border-tertiary absolute right-0 h-[200%] rotate-50 line-border-map"></span>
                                    <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>     
                        </div>
                        <?php endif; ?>
                        <?php if($description): ?>
                            <div class="w-full xl:w-1/2 text-accent info style-disc" data-aos="fade-up">                 
                            <?php echo $description; ?>                   
                        </div>
                        <?php endif; ?>              
                    </div>
               
                <?php if($map_shortcode): ?>
                    <div class="map-container lg:block hidden mt-[1em]" data-aos="fade-in">
                        <?php echo do_shortcode($map_shortcode); ?>
                    </div>
                <?php endif; ?>
                <?php if($map_mobile): ?>
                    <div class="map-container lg:hidden block mt-0" data-aos="fade-in">
                        <?php if(!empty($map_mobile)): ?>
                            <img src="<?php echo esc_url($map_mobile['url']); ?>" alt="<?php echo esc_attr($map_mobile['alt']); ?>" class="w-full h-auto" loading="lazy">
                        <?php endif; ?>    
                    </div>
                <?php endif; ?>
                <?php if($map_shortcode_list): ?>
                    <div class="map-list-container justify-center flex lg:flex-row flex-col mt-[1em] lg:mt-[85px] lg:gap-x-[38px]">
                        <?php foreach ($map_shortcode_list as $map_item): ?>
                            <div class="map-item flex gap-x-[7px] lg:gap-x-[17px] lg:mt-0 md:mt-[1em] mt-[0.2em] cursor-pointer justify-center items-center text-primary hover:text-secondary" data-aos="fade-up" data-label="<?php echo esc_attr($map_item['label']); ?>">
                                <?php if(!empty($map_item['pin'])): ?>
                                    <img src="<?php echo esc_url($map_item['pin']['url']); ?>" alt="<?php echo esc_attr($map_item['pin']['alt']); ?>" class="w-[23px] h-[28px] object-contain" loading="lazy">
                                <?php endif; ?>
                                <div class="map-item-title">
                                    <?php echo do_shortcode($map_item['title']); ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                                      
                    <?php if ($buttons) : ?>
                    <div class="flex flex-wrap gap-3 lg:gap-8 mt-5 <?php echo $btn_align; ?>" data-aos="fade-up">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_type = $button['button_type'];
                            $button_style_btn = $button['button_style_btn'];
                            $button_style_link = $button['button_style_link'];
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
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
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
            </div>           
        </div>  
    </div>
</section>

<?php }
?>

