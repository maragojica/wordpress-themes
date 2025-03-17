<?php
$content_block = get_field('content_block_contact');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $description = $content_block['description'];    
    $image = $content_block['image']; 
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
<section class="contact-section max-w-full <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>  >   
   <div class="max-w-full relative xl:h-full pl-[22px] xl:pl-0 pr-[22px] lg:pr-0">
       <div class="max-w-full w-full flex lg:flex-row flex-col xl:justify-start xl:h-full gap-y-[2em] lg:gap-y-0 lg:gap-x-[2em] xl:gap-x-[50px] 2xl:gap-x-[128px]" >    
            <div class="w-full lg:w-1/2">
            <?php echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'rounded-[50px_0px_50px_0px] w-full h-fit lg:h-full object-cover object-center')); ?>        
            </div>
            <div class="w-full lg:w-1/2">
              <div class="w-full h-full" >
                <div class="bg-secondary rounded-[50px_0px_50px_0px] p-[2em] lg:p-[3em] 2xl:p-[88px] w-full h-full flex flex-col justify-center contact-form -mt-[1px] xl:mt-0">
                <?php if ($heading) : ?>
                        <h2 class="text-primary mb-0 animate__animated" data-animation="fadeIn" data-duration="1.3s">
                            <?php echo $heading; ?>
                        </h2>
                    <?php endif; ?> 
                    <?php if($description): ?>
                    <div class="font-text-font text-white  mt-3 style-disc animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description; ?>                   
                    </div>
                    <?php endif; ?> 
                    <?php if ($gravity_form) : ?>
                        <div class="lg:pt-[50px] pt-[22px] general_contact"> 
                            <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form) . '" title="false" description="false" ajax="true"]'); ?>
                            </div> 
                        </div>                        
                    <?php endif; ?> 
              </div>
        </div>
     </div>      
    </div>   
</section>
<?php }
?>

