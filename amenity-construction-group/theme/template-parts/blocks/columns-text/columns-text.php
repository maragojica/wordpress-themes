<?php
$content_block = get_field('content_block_text');
if ($content_block) {
    
    $bg_image_section = $content_block['bg_image_section']; 
    $heading = $content_block['heading'];        
    $heading_color = $content_block['heading_color'];  
    $description_one = $content_block['description_column_one'];
    $description_two = $content_block['description_column_two'];
    $buttons = $content_block['buttons'];   
    $columns_number = $content_block['columns_number'];    
    $full_title = $content_block['full_width_title'];
    
    $add_top_shape = $content_block['add_top_shape'];     
    $add_bottom_shape = $content_block['add_bottom_shape'];   
    $add_margin_top = $content_block['add_margin_top'];  
    $add_margin_bottom = $content_block['add_margin_bottom'];  

    $add_info_list = $content_block['add_info_list'];  
    $info_list = $content_block['info_list'];  
    
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
        $container_classes = 'flex flex-col items-center lg:text-center lg:mx-auto';
        $row_classes = 'items-center';
        $heading_width = 'w-full';    
        $content_width = 'w-full';      
        $btn_align = 'justify-center';
    }
    $heading_color_class = '';
    if ($heading_color === "blue") {
        $heading_color_class = 'text-tertiary';
    } else {
        $heading_color_class = 'text-secondary';
    }
   
?>

<section class="columns-text-section max-w-full relative bg-cover bg-center bg-no-repeat py-[2em] lg:py-[85px] px-[2em] lg:px-[85px] <?php echo esc_attr($className); ?>  <?php if($add_top_shape &&  $add_margin_top): ?> sm:mt-[15px] md:mt-[25px] lg:mt-[50px] add-top-shape <?php endif;?> <?php if($add_bottom_shape && $add_margin_bottom):?> lg:mb-[43px]  <?php endif;?>" <?php echo $anchor_attr; ?> <?php if(!empty($bg_image_section)): ?> style="background-image: url('<?php echo esc_url($bg_image_section['url']); ?>');" <?php endif; ?>>
   <?php if($add_top_shape): ?>       
     <div class="absolute left-0 top-0 sm:top-[-30px] md:top-[-50px] lg:top-[-100px] z-[2] w-full h-fit top-shape-wave">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/layer_top_fullwidth.svg'); ?>" alt="Top Shape Wave" class="w-full h-fit object-contain lg:block hidden"  data-aos="fade-in">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/layer_top_fullwidth_mv.svg'); ?>" alt="Top Shape Wave" class="w-full h-fit object-contain lg:hidden block"  data-aos="fade-in">
     </div>
    <?php endif; ?>
    <div class="w-full bg-primary relative z-[1] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
        <div class="container mx-auto relative z-[10]">     
        <?php if($full_title): if ($heading) : ?>
            <div class="w-full text-center">
              <h2 class="<?php echo $heading_color_class; ?> mb-[20px]" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2> 
            </div>
         <?php endif; endif; ?>  
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[2em]">
          <div class="<?php echo esc_attr($heading_width); ?>" >
                <div class="flex flex-col justify-center <?php echo esc_attr($row_classes); ?>">
                <?php if(!$full_title): if ($heading) : ?>
                        <h2 class="<?php echo $heading_color_class; ?> text-center mb-[20px]" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2>  
                    <?php endif; endif; ?>                     
                    <?php if($description_one): ?>
                    <div class="text-white info style-disc mx-auto lg:max-w-[840px] text-center" data-aos="fade-up" >                 
                        <?php echo $description_one; ?>                   
                    </div>
                    <?php endif; ?>  
                    <?php  if ($columns_number == "one") { ?>    
                        <?php if($add_info_list): ?>
                        <div class="flex flex-wrap flex-col lg:flex-row items-start mx-[-30px]" data-aos="fade-up">
                            <?php foreach ($info_list as $item) : 
                                $title = $item['title'];
                                 $text = $item['text']; ?>
                                <div class="flex lg:items-center lg:justify-center px-[15px] lg:w-1/3 w-full mb-[15px] lg:mb-0">
                                    <div class="w-full h-full flex flex-col lg:items-center justify-center p-[1em] lg:p-[30px] 2xl:p-[45px] lg:text-center">
                                        <?php if($title): ?>
                                           <div class="subheadline uppercase text-tertiary">
                                            <?php echo $title; ?>
                                            </div>
                                        <?php endif; ?>
                                         <?php if ($text) : ?>
                                        <div class="text-white info style-disc mt-4">
                                            <?php echo $text; ?>
                                    </div> 
                                    <?php endif; ?>
                                    </div>                                  
                                   
                                </div>
                            <?php endforeach; ?>
                        </div>    
                        <div class="hidden  max-w-full">                        
                            <div class="swiper-container swiper items-text-slider overflow-hidden" id="items-text-slider">
                                <div class="swiper-wrapper">
                                    <?php foreach ($info_list as $item) : 
                                    $title = $item['title'];
                                    $text = $item['text']; ?>
                                    <div class="swiper-slide item w-full">
                                        <div class="w-full text-left lg:text-center">
                                                <?php if($title): ?>
                                                <div class="subheadline uppercase text-tertiary">
                                                    <?php echo $title; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($text) : ?>
                                                <div class="text-white info style-disc mt-2">
                                                    <?php echo $text; ?>
                                                </div> 
                                            <?php endif; ?>
                                        </div>  
                                    </div>
                                    <?php endforeach; ?>                                    
                               </div>  
                               <div class="swiper-pagination-items-text swiper-pagination-general text-center mt-2"></div>   
                           </div>                            
                        </div>
                        <?php endif; ?>                     
                       <?php if ($buttons) : ?>
                        <div class="flex flex-wrap justify-center gap-3 lg:gap-8 mt-5" data-aos="fade-up">
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
                    <?php } ?>               
                </div>
            </div> 
            <?php if($description_two): ?>
            <div class="<?php echo esc_attr($content_width); ?> text-white style-disc" data-aos="fade-up">                 
                <?php echo $description_two; ?> 
                <?php  if ($columns_number == "two") { ?>   
                    <?php if ($buttons) : ?>
                        <div class="flex flex-wrap justify-start gap-3 lg:gap-8 mt-5" data-aos="fade-up">
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
                <?php } ?>                   
            </div>
            <?php endif; ?>
        </div>  
    </div>
    </div>
     <?php if($add_bottom_shape): ?>       
     <div class="absolute left-0 bottom-0 sm:bottom-[-30px] md:bottom-[-50px] z-[2] w-full h-fit object-contain bottom-shape-wave">      
      <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/layer_bottom_fullwidth_right.svg'); ?>" alt="Bottom Shape Wave" class="w-full h-fit object-contain lg:hidden block"  data-aos="fade-in">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/layer_bottom_fullwidth_right_mv.svg'); ?>" alt="Bottom Shape Wave" class="w-full h-fit object-contain lg:block hidden"  data-aos="fade-in">
    </div>
      <?php endif; ?>   
</section>

<?php }
?>
