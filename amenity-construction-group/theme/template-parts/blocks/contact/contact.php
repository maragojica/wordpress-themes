<?php
$content_block = get_field('content_block_contact');
if ($content_block) {
    
    $bg_image_section = $content_block['bg_image_section']; 
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

<section class="contact-form-section max-w-full relative overflow-hidden <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?><?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
   <div class="absolute top-0 left-0 w-full bottom-[190px] bg-cover bg-center bg-no-repeat z-0 pointer-events-none" <?php if(!empty($bg_image_section)): ?> style="background-image: url('<?php echo esc_url($bg_image_section['url']); ?>');" <?php endif; ?>></div>
        <div class="container mx-auto relative z-[10]">   
            <div class="flex items-start justify-between lg:flex-row flex-col lg:gap-x-[70px] lg:gap-y-0 pb-[50px] lg:max-w-[91%] mx-auto">
                <?php if ($heading) : ?>                   
                    <h2 class="text-secondary mb-6 lg:mb-0 text-left min-w-fit" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </h2>                     
                <?php endif; ?>
                <?php if($description): ?>
                    <div class="text-muted-text info style-disc text-left lg:text-right" data-aos="fade-up" >                 
                        <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>                  
            </div> 
            <?php if ($gravity_form_id) : ?>           
            <div class="contact-form contact-fluid bg-foreground px-[32px] pt-[32px] pb-[57px] mb-[2em] lg:max-w-[91%] mx-auto" data-aos="fade-in">
                <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>              
            </div>                   
             <?php endif; ?>
        </div>
</section>
<?php }
?>
