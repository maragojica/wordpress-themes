<?php
$content_block = get_field('content_block_forms');
if ($content_block) {
    
    $heading = $content_block['heading'];    
    $description = $content_block['description']; 
    $gravity_form = $content_block['gravity_form'];  
    
    
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

<section class="forms-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container mx-auto">
        <div class="w-full bg-[rgba(182,184,186,0.10)] p-[22px] lg:p-[2em] xl:p-[88px] xl:max-w-[90%] mx-auto rounded-tl-[50px] rounded-br-[50px] " >   
            <?php if ($heading) : ?>
                <h2 class="text-primary mb-3">
                    <?php echo $heading; ?>
                </h2>
            <?php endif; ?>  
            <?php if($description): ?>
                <div class="font-text-font text-foreground mb-4 style-disc "  >                 
                    <?php echo $description; ?>                   
                </div>
             <?php endif; ?>    
            <?php if ($gravity_form) : ?>
                <div class="pt-3 general_contact"> 
                    <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form) . '" title="false" description="false" ajax="true"]'); ?>
                    </div> 
                </div>                        
            <?php endif; ?>           
        </div>
    </div>
</section>

<?php }
?>

