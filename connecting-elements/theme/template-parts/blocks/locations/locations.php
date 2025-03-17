<?php
$content_block = get_field('content_block_locations');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $subheading = $content_block['subheading']; 
    $description = $content_block['description'];    
    $locations = $content_block['locations'];       
    
    
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
   
     //Content
     $content_classes = 'h-full 2xl:flex-wrap xl:flex flex-col xl:flex-row gap-[50px] 2xl:gap-0 ';
     $content_width = 'w-full h-full xl:w-1/2 pt-[2em] xl:pt-[60px] relative 2xl:px-[50px] ';    
     $column_classes = 'h-full md:flex flex-col md:flex-row gap-[20px] 2xl:gap-[50px] justify-between ';
     $column_width = 'w-full md:w-1/2';  
?>

<section class="locations-section max-w-full relative lg:mb-[160px] mb-[3em] <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="w-full mx-auto pl-[22px] lg:pl-0 pr-[22px] lg:pr-0">
        <div class="w-full bg-[rgba(182,184,186,0.10)] p-[3em] lg:p-[88px] xl:px-[60px] xl:py-[80px] 2xl:p-[148px] mx-auto rounded-tl-[50px] rounded-br-[50px] " >  
            <div class="w-full text-center animate__animated" data-animation="fadeIn" data-duration="1.3s">
            <?php if ($heading) : ?>
                <h2 class="text-secondary mb-0">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?> 
            <?php if ($subheading) : ?>
                <h3 class="text-primary pt-[15px] mb-0">
                    <?php echo $subheading; ?>
                </h3>
            <?php endif; ?>  
            <?php if($description): ?>
                <div class="font-text-font text-foreground mt-3 style-disc "  >                 
                    <?php echo $description; ?>                   
                </div>
             <?php endif; ?> 
            </div> 
            <?php $counter_cols = 1; if($locations):?>
                <div class="<?php echo esc_attr($content_classes); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                    <?php foreach ($locations as $location): 
                        $location_name = $location['location_name']; 
                        $location_columns = $location['location_columns']; ?>
                        <div class="<?php echo esc_attr($content_width); ?>">
                        <?php if ($location_name) : ?>
                            <h3 class="text-secondary pb-[1em] lg:pb-[40px] mb-0 text-center">
                                <?php echo $location_name; ?>
                            </h3>
                        <?php endif; ?> 
                       <?php if($location_columns): ?>
                        <div class="<?php echo esc_attr($column_classes); ?>">
                            <?php foreach ($location_columns as $column): 
                            $location_info = $column['location_info']; 
                            if($location_info): ?>
                              <div class="<?php echo esc_attr($column_width); ?>">
                             <?php   foreach ($location_info as $info): 
                                    $title = $info['title'];
                                    $text = $info['text'];  ?>
                                    <div class="mb-[15px] locations md:text-left text-center">
                                    <?php if($title): ?>
                                        <div class="text-primary font-primary-font text-[16px] lg:text-[20px] 2xl:text-[22px]"><?php echo $title;?></div>
                                    <?php endif; ?>   
                                    <?php if($text): ?>
                                        <div class="text-foreground font-primary-font"><?php echo $text;?></div>
                                    <?php endif; ?>  
                                </div>
                                 <?php endforeach; ?> 
                              </div>  
                            <?php endif; ?>
                            <?php endforeach; ?>  
                        </div>
                       <?php endif; ?>     
                       <?php if($counter_cols % 2 != 0): ?>
                            <div class="h-[calc(100%-88px)] w-[4px] bg-primary opacity-20 absolute top-[88px] right-0 xl:right-[12px] 2xl:right-[44px] xl:block hidden"></div>
                        <?php endif; ?>    
                        </div>                      
                    <?php $counter_cols++; endforeach; ?>    
                </div>
            <?php endif; ?>    
        </div>
    </div>
</section>

<?php }
?>

