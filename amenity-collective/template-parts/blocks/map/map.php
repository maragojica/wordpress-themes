<?php
$content_block = get_field('map');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $description = $content_block['description'];      
    $bg_color = $content_block['bg_color'];
    $map_info = $content_block['map_info']; 
    $all_map = $content_block['all_map']; 
    $general_map = $content_block['general_map']; 

   
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
   
?>

<section class="map-section max-w-full relative overflow-hidden lg:h-fit <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>  <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">  
       <div class="w-full text-center animate__animated" data-animation="fadeIn" data-duration="1.5s">                
           <?php if ($subheading) : ?>
                <h3 class="text-foreground mb-[10px] uppercase">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>
            <?php if ($heading) : ?>
                <h2 class="text-secondary mb-0">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
            <?php if($description): ?>
            <div class="font-text-font text-foreground mt-4 style-disc md:max-w[80%] lg:max-w-[60%] mx-auto">                 
                <?php echo $description; ?>                   
            </div>
             <?php endif; ?>                 
        </div>   
            <?php if($map_info): ?>
                <div class="w-full map-desktop">
                    <!-- Map Tabs -->
                    <div class="flex justify-between gap-2 xl:gap-4 2xl:gap-6 mb-6 mt-8 animate__animated" data-animation="fadeIn" data-duration="1.3s">
                        <div class="flex flex-wrap justify-between rounded-[50px] bg-blueinfo-medium py-1 px-1 gap-[10px] xl:gap-[9px] 2xl:gap-[4px]"  id="tabs">
                        <?php foreach ($map_info as $map):
                         $title = $map['title']; 
                         $pin = $map['pin'];   ?>
                        <button  data-target="<?php echo extractFirstWordLowercase($title);?>" aria-controls="<?php echo $title; ?>" class="tab-button flex justify-center items-center gap-[6px] xl:gap-[10px] 2xl:gap-[11px] text-[14px] lg:text-[16px] 2xl:text-[18px] font-bold cursor-pointer transition-all duration-300 ease-in-out font-primary-font text-center bg-transparent text-foreground px-1 xl:px-5 py-2 rounded-[50px] hover:bg-white" >
                        <?php if(!empty($pin)): ?>
                            <?php  echo wp_get_attachment_image(
                            $pin['ID'],
                            'full',
                            false,
                            array(
                                'class' => 'transition-all duration-300 w-full max-w-[15px] xl:max-w-[18px] 2xl:max-w-[23px] object-contain transition-transform',
                                'alt' => esc_attr($pin['alt']),
                            )
                        ); ?>  
                            <?php endif; ?>    
                                <?php echo $title; ?>
                            </button>
                        <?php endforeach; ?>  
                        </div>  
                        <?php if($all_map): ?>
                        <button data-target="general" aria-controls="<?php echo $all_map; ?>" class="view-all-button text-[14px] lg:text-[16px] 2xl:text-[18px] font-[800] bg-primary px-6 xl:px-9 text-white py-3 rounded-[50px] border-2 border-primary cursor-pointer transition-all duration-300 ease-in-out font-primary-font text-center">
                            <?php echo $all_map; ?>
                        </button> 
                        <?php endif; ?>
                    </div>   
                    <!-- Map Images -->
                    <div class="content-map relative bg-white rounded-[30px] lg:rounded-[55px] overflow-hidden p-5 lg:px-[63px] lg:py-[43px]">
                    <?php foreach ($map_info as $map):
                         $title = $map['title'];                        
                         $map_image = $map['map_image']; ?>
                        <div id="<?php echo extractFirstWordLowercase($title);?>" class="map-image hidden opacity-0 transition-opacity duration-500">
                            <?php if(!empty($map_image)): ?>
                                <?php  echo wp_get_attachment_image(
                                $map_image['ID'],
                                'full',
                                false,
                                array(
                                    'class' => 'transition-all duration-300 w-full h-fit md:h-[400px] lg:h-[550px] xl:h-[650px] 2xl:h-[865px] object-contain transition-transform',
                                    'alt' => esc_attr($map_image['alt']),
                                )
                            ); ?>  
                            <?php endif; ?>                             
                        </div>
                        <?php endforeach; ?>  
                        <?php if(!empty( $general_map)): ?>
                        <div id="general" class="map-image opacity-100 transition-opacity duration-500">
                        <?php  echo wp_get_attachment_image(
                                $general_map['ID'],
                                'full',
                                false,
                                array(
                                    'class' => 'transition-all duration-300 w-full h-fit md:h-[400px] lg:h-[550px] xl:h-[650px] 2xl:h-[865px] object-contain transition-transform',
                                    'alt' => esc_attr($general_map['alt']),
                                )
                            ); ?> 
                        </div>
                        <?php endif; ?>
                    </div>
            </div>
             <!-- Map Dropdown -->
            <div class="w-full map-mobile mt-5">
               <div class="custom-dropdown relative text-center mb-5 animate__animated" data-animation="fadeIn" data-duration="1.3s">
                    <button id="filterButton" class="dropdown-button w-full flex items-center justify-center gap-2 px-4 py-2 border-2 border-primary rounded-[50px] font-primary-font text-[18px] bg-primary text-white font-[800] hover:text-white">
                    <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M8 17H24" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 11H29" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13 23H19" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </span>
                    <span id="dropdownLabel" class="text-primary font-[800] font-primary-font text-[18px]">View All</span>
                    </button>
                    <ul id="dropdownMenu" class="dropdown-menu absolute left-0 z-10 mt-2 w-full p-4 bg-white border-2 border-blueinfo-medium rounded-xl shadow-md hidden">
                    <li class="dropdown-item text-primary font-[800] font-primary-font py-1 text-[18px]" data-target="general-mv">View All</li>
                    <?php foreach ($map_info as $map):
                         $title = $map['title'];                        
                         $map_image = $map['map_image']; ?>
                         <li class="dropdown-item text-primary font-[800] font-primary-font py-1 text-[18px]" data-target="<?php echo extractFirstWordLowercase($title)."-mv";?>"><?php echo $title;?></li>
                    <?php endforeach; ?>                      
                    </ul>
                </div>    
                <?php if(!empty( $general_map)): ?> 
                <div id="general-mv" class="map-image-mv content-map bg-white rounded-[30px] lg:rounded-[55px] overflow-hidden p-5 lg:px-[63px] lg:py-[43px] opacity-100 transition-opacity duration-500 active">
                <?php  echo wp_get_attachment_image(
                        $general_map['ID'],
                        'full',
                        false,
                        array(
                            'class' => 'transition-all duration-300 w-full h-fit md:h-[400px] lg:h-[550px] xl:h-[650px] 2xl:h-[865px] object-contain transition-transform',
                            'alt' => esc_attr($general_map['alt']),
                        )
                    ); ?> 
                </div>
                <?php endif; ?>
                <?php foreach ($map_info as $map):
                         $title = $map['title'];                        
                         $map_image = $map['map_image']; ?>
                        <div id="<?php echo extractFirstWordLowercase($title)."-mv";?>" class="map-image-mv content-map bg-white rounded-[30px] lg:rounded-[55px] overflow-hidden p-5 lg:px-[63px] lg:py-[43px] opacity-0 transition-opacity duration-500 hidden">
                            <?php if(!empty($map_image)): ?>
                                <?php  echo wp_get_attachment_image(
                                $map_image['ID'],
                                'full',
                                false,
                                array(
                                    'class' => 'transition-all duration-300 w-full h-fit md:h-[400px] lg:h-[550px] xl:h-[650px] 2xl:h-[865px] object-contain transition-transform',
                                    'alt' => esc_attr($map_image['alt']),
                                )
                            ); ?>  
                            <?php endif; ?>                             
                        </div>
                <?php endforeach; ?>                  
            </div>
        <?php endif; ?>    
    </div>
</section>

<?php }
?>

