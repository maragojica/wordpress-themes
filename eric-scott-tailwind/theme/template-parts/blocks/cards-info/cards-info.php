<?php
$content_block = get_field('content_block_cards');
if ($content_block) {
    
    $slider = $content_block['info_list']; 
    $add_bottom_divider = $content_block['add_bottom_divider'];
 
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

    
    //Container Full

    $container_classes = 'h-full lg:flex flex-col lg:flex-row ';
   
?>

<section class="cards-info-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($add_bottom_divider): ?> style="padding-bottom: 12px !important;"<?php endif;?>>
    <div class="w-full mx-auto ">  
    <?php if ($slider):  ?>       
    <div class="<?php echo esc_attr($container_classes); ?>">   
    <?php foreach ($slider as $column_slider): 
            $heading = $column_slider['heading']; 
            $text = $column_slider['description'];
            $image = $column_slider['image']; 
            $buttons = $column_slider['buttons'];?>    
            
            <!-- Card -->
            <div class="relative group w-full lg:w-1/4 h-[30em] xl:h-[40em] 2xl:h-[850px] overflow-hidden">
                <!-- Background Image -->                      
                <?php if ( !empty($image)) :  ?> 
                    <img class="h-full w-full object-cover group-hover:scale-110 grayscale-0 group-hover:grayscale transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />  
                <?php  endif; ?> 
                <div class="lg:block hidden absolute left-0 bottom-0 py-[30px] xl:py-[45px] px-[30px] xl:px-[42px] w-full">
                    <?php if($heading): ?>
                    <div class="subtitle text-white"><?php echo $heading;?></div>
                    <?php endif; ?>
                </div>

                <!-- Title and Description (Expandable Box) -->
                <div class="transform lg:translate-y-[100%] group-hover:translate-y-0 py-[30px] xl:py-[45px] px-[30px] xl:px-[42px] absolute z-[2] bottom-0 left-0 right-0 lg:bg-transparent bg-[rgba(12,35,64,0.70)] group-hover:bg-[rgba(12,35,64,0.80)] group-hover:backdrop-blur-[37px] text-white text-left flex flex-col justify-end overflow-hidden transition-all duration-300 h-full lg:h-[162px] xl:h-[195px] group-hover:h-full">
                <!-- Title (Always Visible) -->
                <div class="">
                    <?php if($heading): ?>
                    <div class="subtitle"><?php echo $heading;?></div>
                    <?php endif; ?>
                </div>
                
                    <!-- Description (Hidden by Default) -->
                    <div class="lg:opacity-0 transform lg:translate-y-full group-hover:translate-y-0 group-hover:opacity-100 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 ease-in-out">
                        <?php if( $text): ?>
                        <div class="font-text-font text-white mt-[32px] style-disc" >                 
                            <?php echo $text; ?>                   
                        </div>
                        <?php endif; ?>
                        <?php if ($buttons) : ?>
                            <div class="flex flex-wrap gap-4 justify-start mt-[1em] lg:mt-[60px]">
                                <?php foreach ($buttons as $button) : ?>
                                    <?php 
                                    $button_link = $button['button'];
                                    $button_style = $button['button_style'];
                                    if ($button_link) :
                                        $url = $button_link['url'];
                                        $title = $button_link['title'];
                                        $target = $button_link['target'] ? $button_link['target'] : '_self';    ?>
                                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min sm btn <?php if($button_style): echo $button_style; endif;?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>  
                    </div>
                </div>
            </div>   
            
         
    <?php endforeach; ?>   
    </div>
    <?php endif; ?>                   
    </div>
    <?php if($add_bottom_divider): ?>
     <div class="w-full ">
        <div class="line-divider"></div>   
        <div class="line-border mt-[11px]"></div>             
     </div>
   <?php endif; ?>
</section>

<?php }
?>

