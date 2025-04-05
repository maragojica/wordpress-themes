<?php
$content_block = get_field('content_services');
if ($content_block) {    
    $services_list = $content_block['services_list'];       
   
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
       
 
    $container_classes = 'flex flex-col flex-wrap md:flex-row md:mx-[-15px]';
    $tabs_width = 'w-full md:w-[35%] md:px-[15px] tabs-headings';   
    $content_width = 'w-full md:w-[65%] md:px-[15px] tabs-content';      
   
?>

<section class="services-section tabs-container max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   
    <div class="container mx-auto"> 
        <?php if( $services_list): ?>    
          <div class="<?php echo esc_attr($container_classes); ?> gap-y-[32px]">      
            <div class="<?php echo esc_attr($tabs_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.2s" >  
            <?php  foreach ($services_list as $index => $tab):  ?> 
                    <div class="tab-heading animate__animated" data-animation="fadeTop" data-duration="1.5s" data-tab="tab-<?php echo $index;?>"><h5 class="font-[800] mb-0"><?php echo esc_html($tab['tab_link']);?></h5></div>
                <?php endforeach; ?>  
            </div>  
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.2s" >  
                <?php foreach ($services_list as $index => $tab):  ?> 
                <div class="tab-content animate__animated" data-animation="fadeIn" data-duration="1.5s" id="tab-<?php echo $index;?>">
                    <h3 class="text-black uppercase mb-[1em] lg:mb-[20px]"><?php echo $tab['tab_title'];?></h3>
                    <div class="text-black"><?php echo $tab['tab_content'];?></div>
                    <?php $tabs_list = $tab['tabs_list'];
                    if($tabs_list): ?>
                      <div class="grid grid-cols-1 sm:grid-cols-2 sm:gap-4 mt-[1em] lg:mt-[20px]">
                      <?php foreach ($tabs_list as $index => $tablist):  ?> 
                        <div class="text-black style-disc"><?php echo $tablist['tab_list_content'];?></div>
                        <?php endforeach; ?>   
                      </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>   
            </div>                        
           </div>  
        <?php endif; ?>
    </div>
</section>

<?php }
?>

