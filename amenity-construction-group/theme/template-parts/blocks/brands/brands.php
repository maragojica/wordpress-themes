<?php
$content_block = get_field('content_block_brands');
if ($content_block) {
    
    $heading = $content_block['heading'];        
    $heading_color = $content_block['heading_color'];      

    $add_margin_top_desk = $content_block['add_margin_top_desktop'];   
    $add_margin_top_mob = $content_block['add_margin_top_mobile']; 
     
    $add_top_shape = $content_block['add_top_shape']; 
    $add_bottom_shape = $content_block['add_bottom_shape'];   
    
    $info_logos = $content_block['info_logos']; 
     $count = is_array($info_logos) ? count($info_logos) : 0;

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
       

    $container_classes = 'flex flex-col items-center lg:text-center lg:mx-auto';
    $row_classes = 'items-center';
    $heading_width = 'w-full';    
    $content_width = 'w-full';      
    $btn_align = 'justify-center';    
    $heading_color_class = '';

    if ($heading_color === "blue") {
        $heading_color_class = 'text-tertiary';
    } else {
        $heading_color_class = 'text-secondary';
    }
   
?>


<section class="brands-section max-w-full relative overflow-hidden <?php echo esc_attr($className); ?> <?php if($add_margin_top_desk): ?> lg:mt-[100px] <?php endif; ?> <?php if($add_margin_top_mob): ?> mt-[2em] <?php endif; ?>" <?php echo $anchor_attr; ?>>
    <?php if($add_top_shape): ?>       
        <div class="w-full h-[30px] lg:h-fit object-cover lg:object-contain top-shape-pattern">   
            <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/top_shape_pattern.svg'); ?>" alt="Top Shape Pattern" class="w-full h-fit object-contain lg:block hidden"  data-aos="fade-in">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/top_shape_pattern_mv.svg'); ?>" alt="Top Shape Pattern" class="w-full h-fit object-contain lg:hidden block"  data-aos="fade-in">
        </div>
    <?php endif; ?>   
    <div class="w-full bg-white relative lg:px-[60px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
        <div class="container mx-auto relative z-[10]">     
            <?php if($heading) : ?>
                <div class="w-full text-center lg:pb-[45px] pb-[3em]">
                    <h2 class="<?php echo esc_attr($heading_color_class); ?> mb-0" data-aos="fade-up">
                        <?php echo esc_html($heading); ?>
                    </h2> 
                </div>
            <?php endif; ?>               
            <?php if($info_logos): ?>
                <?php if($count <= 5): ?>
                    <!-- Desktop grid for 5 or fewer logos -->
                    <div class="hidden lg:flex flex-wrap gap-[40px] items-center justify-center" data-aos="fade-in">
                        <?php foreach ($info_logos as $column_logo): 
                            $logo = $column_logo['logo']; 
                            $link = $column_logo['link']; ?>
                            <?php if(!empty($logo)): ?>
                                <?php  if($link) {
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <div class="flex items-center justify-center w-[calc(20%-40px)]">
                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target);?>" aria-label="<?php echo esc_attr($link_title); ?>" ><?php } ?>
                                    <?php  echo wp_get_attachment_image(
                                        $logo['ID'],
                                        'full',
                                        false,
                                        array(
                                            'class' => 'transition-all duration-300 w-auto h-[116px] object-contain hover:-translate-y-[10px] transition-transform',
                                            'alt' => esc_attr($logo['alt']),
                                        )
                                    ); ?>                                    
                                <?php if($link) { ?>
                                    </a>
                                <?php } ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach;?>    
                    </div>
                    <!-- Mobile slider for 5 or fewer logos -->
                    <div class="lg:hidden block relative">
                        <div class="swiper brands-slider overflow-hidden" id="brands-slider" data-count="<?php echo esc_attr($count); ?>">
                            <div class="swiper-wrapper"> 
                                <?php foreach ($info_logos as $column_logo): 
                                    $logo = $column_logo['logo']; 
                                    $link = $column_logo['link']; ?>
                                    <div class="swiper-slide">
                                        <?php if(!empty($logo)): ?>
                                            <div class="flex items-center justify-center">
                                                <?php  if($link) {
                                                    $link_url = $link['url'];
                                                    $link_title = $link['title'];
                                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>                                                
                                                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target);?>" aria-label="<?php echo esc_attr($link_title); ?>" ><?php } ?>
                                                    <?php  echo wp_get_attachment_image(
                                                        $logo['ID'],
                                                        'full',
                                                        false,
                                                        array(
                                                            'class' => 'transition-all duration-300 w-auto h-[70px] md:h-[90px] object-contain transition-transform',
                                                            'alt' => esc_attr($logo['alt']),
                                                        )
                                                    ); ?>                                    
                                                <?php if($link) { ?>
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?> 
                            </div>
                            <!--<div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>-->
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Slider for more than 5 logos (desktop and mobile) -->
                    <div class="block relative">
                        <div class="swiper brands-slider" id="brands-slider">
                            <div class="swiper-wrapper"> 
                                <?php foreach ($info_logos as $column_logo): 
                                    $logo = $column_logo['logo']; 
                                    $link = $column_logo['link']; ?>
                                    <div class="swiper-slide">
                                        <?php if(!empty($logo)): ?>
                                             <div class="flex items-center justify-center">
                                            <?php  if($link) {
                                                $link_url = $link['url'];
                                                $link_title = $link['title'];
                                                $link_target = $link['target'] ? $link['target'] : '_self'; ?>                                               
                                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target);?>" aria-label="<?php echo esc_attr($link_title); ?>" ><?php } ?>
                                                <?php  echo wp_get_attachment_image(
                                                    $logo['ID'],
                                                    'full',
                                                    false,
                                                    array(
                                                        'class' => 'transition-all duration-300 w-auto h-[70px] md:h-[90px] object-contain transition-transform',
                                                        'alt' => esc_attr($logo['alt']),
                                                    )
                                                ); ?>                                    
                                            <?php if($link) { ?>
                                                </a>
                                            <?php } ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?> 
                            </div>
                            <!--<div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>-->
                        </div>
                    </div>
                <?php endif; ?>
            <?php endif; ?> 
        </div>        
    </div>     
    <?php if($add_bottom_shape): ?>       
        <div class="w-full h-[30px] lg:h-fit object-cover lg:object-contain bottom-shape-pattern">   
            <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/bottom_shape_pattern.svg'); ?>" alt="Bottom Shape Pattern" class="w-full h-fit object-contain lg:block hidden"  data-aos="fade-in">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/bottom_shape_pattern_mv.svg'); ?>" alt="Bottom Shape Pattern" class="w-full h-fit object-contain lg:hidden block"  data-aos="fade-in">
        </div>
    <?php endif; ?> 
</section>
<?php }
?>

