<?php
$content_block = get_field('content_block_values');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description = $content_block['description'];  
    $values = $content_block['values'];  
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
       
 
    $container_classes = 'h-full flex flex-col lg:flex-row ';
    $heading_width = 'w-full lg:w-[30%]'; 
    $content_width = 'w-full lg:w-[70%]';  
   
?>

<section class="value-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>   
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> gap-y-[2em] lg:gap-y-0 lg:gap-x-[2em]">
          <div class="<?php echo esc_attr($heading_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
              <?php if ($heading) : ?>
                    <h2 class="text-primary sm animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>                           
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="text-secondary mt-[1.5em] style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
            </div>            
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
            <?php
                    if ($values) { 	?>
                        <div class="flex h-full items-stretch flex-wrap flex-col md:flex-row">
                            <?php								
                               foreach ($values as $column_value):  
                                  $title = $column_value['title'];  
                                  $text = $column_value['text']; ?>
                                    <div class="w-full md:w-1/2 md:p-[15px] md:mb-0 mb-[20px]">
                                       <div class="w-full h-full lg:p-[40px] md:p-[30px] p-[20px] rounded-[6px] shadow-[0px_4px_14px_2px_rgba(12,35,64,0.09)]">
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

