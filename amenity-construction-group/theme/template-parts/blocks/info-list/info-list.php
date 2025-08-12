<?php
$content_block = get_field('content_block_info_list');
if ($content_block) {
    
    $heading = $content_block['heading'];        
    $heading_color = $content_block['heading_color'];      
    $add_margin_top_desk = $content_block['add_margin_top_desktop'];   
    $add_margin_top_mob = $content_block['add_margin_top_mobile']; 
     
    $add_top_shape = $content_block['add_top_shape']; 
    $add_bottom_shape = $content_block['add_bottom_shape'];         
    
     $add_info_list = $content_block['add_info_list'];  
      $info_list = $content_block['info_list']; 

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


<section class="info-list-section max-w-full relative <?php echo esc_attr($className); ?> <?php if($add_margin_top_desk): ?> lg:mt-[100px] <?php endif; ?> <?php if($add_margin_top_mob): ?> mt-[2em] <?php endif; ?>" <?php echo $anchor_attr; ?>>
    <?php if($add_top_shape): ?>       
            <div class="w-full h-fit object-contain top-shape-pattern">   
                <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/top_shape_pattern.svg'); ?>" alt="Top Shape Pattern" class="w-full h-fit object-contain lg:block hidden"  data-aos="fade-in">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/top_shape_pattern_mv.svg'); ?>" alt="Top Shape Pattern" class="w-full h-fit object-contain lg:hidden block"  data-aos="fade-in">
            </div>
        <?php endif; ?>   
    <div class="w-full bg-white relative lg:px-[60px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
      
        <div class="container mx-auto relative z-[10] lg:pt-[60px] 2xl:pb-[15px] lg:pb-[30px] pb-[1em] py-[2em]">     
            <?php if($heading) : ?>
                <div class="w-full lg:text-center">
                    <h2 class="<?php echo $heading_color_class; ?> mb-[5px]]" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </h2> 
                </div>
            <?php endif; ?>  
             <?php if($add_info_list): ?>
            <div class="flex flex-wrap flex-col lg:flex-row mx-[-30px] items-start" data-aos="fade-up">
                <?php foreach ($info_list as $item) : 
                    $title = $item['title'];
                        $text = $item['text']; ?>
                    <div class="flex lg:items-center lg:justify-center px-[15px] lg:w-1/3 w-full mb-[15px] lg:mb-0">
                        <div class="w-full h-full flex flex-col lg:items-center lg:justify-center p-[1em] lg:p-[30px] 2xl:p-[45px] lg:text-center">
                            <?php if($title): ?>
                                <div class="subheadline uppercase text-primary">
                                <?php echo $title; ?>
                                </div>
                            <?php endif; ?>
                                <?php if ($text) : ?>
                            <div class="text-accent text-medium info style-disc mt-4">
                                <?php echo $text; ?>
                        </div> 
                        <?php endif; ?>
                        </div>                                  
                        
                    </div>
                <?php endforeach; ?>
            </div>    
            <?php endif; ?>  
        </div>        
    </div>     
        <?php if($add_bottom_shape): ?>       
            <div class="w-full h-fit object-contain bottom-shape-pattern">   
                <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/bottom_shape_pattern.svg'); ?>" alt="Bottom Shape Pattern" class="w-full h-fit object-contain lg:block hidden"  data-aos="fade-in">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/bottom_shape_pattern_mv.svg'); ?>" alt="Bottom Shape Pattern" class="w-full h-fit object-contain lg:hidden block"  data-aos="fade-in">
            </div>
        <?php endif; ?> 
</section>

<?php }
?>

