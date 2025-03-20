<?php
$content_block = get_field('content_info_inner');
if ($content_block) {

    $headline = $content_block['headline'];
    $description = $content_block['description'];

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

<section class="content-inner-section -mb-[180px] bg-black overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
  <div class="container mx-auto pb-[180px]">    
      <div class="w-full text-center">
           <?php if($headline): ?>
                <h3 class="text-white mb-[1em] lg:mb-[50px]"><?php echo $headline; ?></h3>
           <?php endif; ?>
           <?php if($description): ?>
                <div class="text-white mt-[10px] style-disc "  >                 
                    <?php echo $description; ?>                   
                </div>
            <?php endif; ?>    
       </div>  
    </div>    
</section>

<?php }
?>

