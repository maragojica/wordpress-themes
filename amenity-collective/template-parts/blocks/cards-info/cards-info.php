<?php
$content_block = get_field('content_block_cards');
if ($content_block) {
    
    $slider = $content_block['info_list']; 

 
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

    $container_classes = 'h-full lg:flex flex-col lg:flex-row hidden ';
   
?>

<section class="cards-info-section max-w-full relative overflow-hidden lg:h-fit custom-gradient-white-rev <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto ">  
    <?php if ($slider):  ?>       
    <div class="<?php echo esc_attr($container_classes); ?> gap-y-[18px] lg:gap-y-0 lg:gap-x-[33px]">   
    <?php foreach ($slider as $column_slider): 
            $heading = $column_slider['heading']; 
            $text = $column_slider['description'];
            $image = $column_slider['image']; ?>    
            
            <!-- Card -->
            <div class="relative group w-full lg:w-1/3 h-[500px] lg:h-[650px] xl:h-[700px] 2xl:h-[821px] overflow-hidden">
                <!-- Background Image -->                      
                <?php if ( !empty($image)) :  ?> 
                    <img class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />  
                <?php  endif; ?> 

                <!-- Title and Description (Expandable Box) -->
                <div class="py-[25px] xl:py-[35px] px-[15px] xl:px-[21px] absolute bottom-0 left-0 right-0 bg-[rgba(25,25,25,0.70)] lg:bg-foreground group-hover:bg-[rgba(25,25,25,0.70)] backdrop-blur-[62px] text-white text-center flex flex-col items-center justify-center lg:justify-start group-hover:justify-center overflow-hidden transition-all duration-300 h-full lg:h-[162px] xl:h-[150px] 2xl:h-[156px] 3xl:h-[160px] group-hover:h-full">
                <!-- Title (Always Visible) -->
                <div class="">
                    <?php if($heading): ?>
                    <h3 class="uppercase text-secondary-light mb-0"><?php echo $heading;?></h3>
                    <?php endif; ?>
                </div>
                
                <!-- Description (Hidden by Default) -->
                <div class="lg:opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <?php if( $text): ?>
                    <div class="font-text-font text-white mt-4 style-disc" >                 
                        <?php echo $text; ?>                   
                    </div>
                    <?php endif; ?>
                </div>
                </div>
            </div>                        
    <?php endforeach; ?>   
    </div>
    <?php endif; ?>
        <div class="w-full lg:hidden block animate__animated" data-animation="fadeIn" data-duration="1.5s"> 
        <?php if ($slider):  ?>  
            <div class="slider-cards slider-fluid-full slider-dash owl-carousel owl-theme relative overflow-hidden">
            <?php foreach ($slider as $column_slider): 
                   $heading = $column_slider['heading']; 
                   $text = $column_slider['description'];
                   $image = $column_slider['image'];?>
                   <div class="cards-slide fluid-slide item">
                     <!-- Card -->
                        <div class="relative group w-full h-[500px] overflow-hidden">
                            <!-- Background Image -->                      
                            <?php if ( !empty($image)) :  ?> 
                                <img class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-300" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />  
                            <?php  endif; ?> 

                            <!-- Title and Description (Expandable Box) -->
                            <div class="py-[25px] xl:py-[35px] px-[15px] xl:px-[21px] absolute bottom-0 left-0 right-0 bg-[rgba(25,25,25,0.70)] lg:bg-foreground group-hover:bg-[rgba(25,25,25,0.70)] backdrop-blur-[62px] text-white text-center flex flex-col items-center justify-center lg:justify-start group-hover:justify-center overflow-hidden transition-all duration-300 h-full lg:h-[265px] xl:h-[240px] 2xl:h-[172px] group-hover:h-full">
                            <!-- Title (Always Visible) -->
                            <div class="">
                                <?php if($heading): ?>
                                <h3 class="uppercase text-secondary-light mb-0"><?php echo $heading;?></h3>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Description (Hidden by Default) -->
                            <div class="lg:opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <?php if( $text): ?>
                                <div class="font-text-font text-white mt-4 style-disc" >                 
                                    <?php echo $text; ?>                   
                                </div>
                                <?php endif; ?>
                            </div>
                            </div>
                        </div> 
                   </div>
               <?php endforeach; ?>   
            </div>
        <?php endif; ?>
         </div>                   
    </div>
</section>

<?php }
?>

