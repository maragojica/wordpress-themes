<?php
$content_block = get_field('content_application');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $description = $content_block['description'];   
    $gravity_form_id = $content_block['gravity_form'];     

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
<section class="job-application-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container mx-auto">
        <div class="w-full lg:max-w-[60%] mx-auto" >   
             <?php if ($heading) : ?>               
                    <h2 class="text-primary sm text-center" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>                             
            <?php endif; ?> 
            <?php if($description): ?>
                <div class="text-secondary lg:max-w-[80%] mx-auto style-disc mt-3 text-center">                 
                    <?php echo $description; ?>                   
                </div>
             <?php endif; ?> 
             <div class="contact-form general_contact mt-[70px]" >   
                    <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>                         
                </div>  
        </div>
    </div>    
</section>
<?php }
?>

