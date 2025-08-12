<?php
$content_block = get_field('content_contact');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $description = $content_block['description']; 
    $gravity_form_id = $content_block['gravity_form'];  
    
    $reverse_desktop = in_array('yes', $content_block['reverse_order_desktop']);
    $reverse_mobile = in_array('yes', $content_block['reverse_order_mobile']);
    $alignment = $content_block['vertical_alignment'];

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
       
 
    $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full lg:w-1/2'; 
    $content_width = 'w-full lg:w-1/2';      
    $btn_align = 'justify-start';
   
?>

<section class="contact-section max-w-full relative lg:mt-[100px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>     
    <div class="bg-[#00194C] py-[3em] lg:py-[105px]">
    <div class="container mx-auto relative z-[2]">     
       <div class="<?php echo esc_attr($container_classes); ?> lg:gap-y-0 gap-y-[3em] lg:gap-x-[80px] lg:max-w-[90%] lg:mx-auto">
          <div class="<?php echo esc_attr($heading_width); ?> contact-info">
                 <?php if ($heading) : ?>
                    <h2 class="text-white uppercase" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </h2>
                    <?php endif; ?>                   
                
                     <?php if($description): ?>
                    <div class="text-white text-sub-medium style-disc" data-aos="fade-up">                 
                        <?php echo $description; ?>                   
                    </div>
               <?php endif; ?>               
            </div>            
            <div class="<?php echo esc_attr($content_width); ?>" data-aos="fade-up">  
                <div class="contact-form bg-white p-[30px] lg:py-[50px] lg:px-[44px] lg:mt-[-200px]" >   
                    <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>                         
                </div>   
            </div>           
        </div>  
    </div>
    </div>    
</section>

<?php }
?>

