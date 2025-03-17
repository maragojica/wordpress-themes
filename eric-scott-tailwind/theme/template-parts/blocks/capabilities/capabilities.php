<?php
$content_block = get_field('content_block_capabilities');
if ($content_block) {

    $capabilities = $content_block['capabilities'];  
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
   
    $content_width = 'w-full ';      
   
?>

<section class="capabilities-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   
    <div class="w-full pl-contain"> 
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
            <?php
                if ($capabilities) { 	?>
                    <div id="capabilities-slider" class="capabilities-slider slider-fluid-full owl-carousel owl-theme">
                        <?php								
                            foreach ($capabilities as $column_capability):  
                                $subtittle = $column_capability['subtittle'];  
                                $title = $column_capability['title'];  
                                $text = $column_capability['text']; ?>
                                <div class="item w-full h-full">
                                    <div class="w-full h-full flex flex-col p-[20px] md:p-[30px] lg:px-[40px] lg:py-[80px] xl:py-[120px] xl:px-[50px] rounded-[6px] shadow-[0px_4px_14px_2px_rgba(12,35,64,0.09)]">
                                    <?php if( $subtittle): ?>
                                    <div class="text-primary subtext mb-[5px]">
                                        <?php echo $subtittle; ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if( $title): ?>
                                    <h3 class="text-secondary mb-[20px]">
                                        <?php echo $title; ?>
                                    </h3>
                                    <?php endif; ?>
                                    <?php if($text): ?>
                                        <div class="text-secondary style-disc">                 
                                            <?php echo $text; ?>                   
                                        </div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                        <?php endforeach; ?>   
                    </div>
                <?php 
                }  ?>         
            </div>    
    </div>
    <?php if($add_bottom_divider): ?>
     <div class="w-full absolute left-0 bottom-0 z-3">
        <div class="line-divider"></div>   
        <div class="line-border mt-[11px]"></div>             
     </div>
   <?php endif; ?>
</section>

<?php }
?>

