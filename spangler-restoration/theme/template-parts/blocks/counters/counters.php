<?php
$content_block = get_field('content_counters');
if ($content_block) {
    
    $counters = $content_block['counters'];
    $add_bg_shape = $content_block['add_bg_shape']; 
    $bg_shape = $content_block['bg_shape']; 

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
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;
   
?>

<section class="counters-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> style="background-image: linear-gradient(270deg, rgba(255, 255, 255, 0.16) 2.98%, rgba(255, 255, 255, 0.56) 33.49%);">
    <?php if($add_bg_shape): ?>
        <?php if(!empty($bg_shape)): 
         echo wp_get_attachment_image(
            $bg_shape['ID'],
            'full',
            false,
            array(
                'class' => 'absolute right-0 bottom-0 z-[1] w-fit h-fit lg:h-fit max-w-full object-contain',
                'alt' => esc_attr($bg_shape['alt']),            
            )
        );
     endif; endif; ?>
    <div class="container mx-auto relative z-[2]">   
    
        <?php $i = 1; if($counters):    
        foreach ($counters as $column_icons) :          
             $columns_content = $column_icons['columns_content'];   
              //Columns Text Align Settings
                $columns_text_align = $column_icons['columns_number'];   
                $select_columns = 'w-full px-[30px]';
              
                switch ($columns_text_align) {
                    case 'two':
                        $select_columns .= ' sm:w-1/2 md:w-1/2 lg:w-1/2';
                        break;
                    case 'three':
                        $select_columns .= ' sm:w-1/2 md:w-1/3 lg:w-1/3';
                        break;
                    case 'four':
                        $select_columns .= ' sm:w-1/2 md:w-1/4 lg:w-1/4';
                        break;
                    case 'five':
                        $select_columns .= ' sm:w-1/2 md:w-1/3 lg:w-1/5';
                        break;
                }     ?>
                <?php if($columns_content):  ?>
                <div class="flex flex-col sm:gap-y-0 gap-y-[1.5em] sm:flex-row flex-wrap justify-center items-start mx-auto <?php if($i>1): ?> mt-[1.5em] lg:mt-[100px] <?php endif;?>">   
                    <?php foreach ($columns_content as $column) : 
                        
                        
                        $title = $column['title'];
                        $number = $column['number'];      
                        $after = $column['after'];   
                        ?>
                        <div class="<?php echo $select_columns; ?> mt-0" data-aos="fade-up" >
                            <div class="flex flex-col h-full relative justify-between items-center text-center">  
                                                    
                                <div class="flex-wrap flex justify-center items-center flex-col">
                                    <?php if($number): ?>
                                        <div class="flex items-center gap-[4px] box-counters mb-[15px] lg:mb-[20px] uppercase"><h2 class="text-[#0066CA] mb-0 counter-number"  data-count="<?php echo esc_attr($number); ?>">0</h2><span class="text-[#0066CA]"><?php if($after): echo $after; endif; ?></span></div>
                                    <?php endif; ?>
                                    <?php if($title): ?>
                                        <div class="text-[#00194C] text-sub"><?php echo $title; ?></div>
                                    <?php endif; ?>                              
                                </div>                      
                            </div>
                        </div>
                    <?php endforeach; ?>      
                </div>
                <?php endif; ?>  
        <?php $i++; endforeach; endif; ?>              
        </div>    
     <div>
    </div>
</section>

<?php }
?>

