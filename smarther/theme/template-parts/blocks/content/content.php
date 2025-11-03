<?php
$content_block = get_field('content_block_content');
if ($content_block) {

    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];
    $description = $content_block['description'];
    $bg_color = $content_block['bg_color'];
    $buttons = $content_block['buttons'];

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
         case 'xsmall':
            $spacing_class = 'padding-xsmall';
            break;
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
    
    if($bg_color === 'white'){
        $bg_class = 'bg-white';
    } elseif($bg_color === 'neutral'){
        $bg_class = 'bg-neutral';
    }
 
    $container_classes = 'flex flex-col ';
    $heading_width = 'w-full';    
    $btn_align = 'justify-center';
   
?>

<section class="content-section max-w-full relative <?php if($bg_color): echo $bg_class; endif; ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?>> 
    <div class="container mx-auto">     
       <div class="w-full  mx-auto lg:max-w-[60%]"> 
       <div class="<?php echo esc_attr($container_classes); ?>">
          <div class="<?php echo esc_attr($heading_width); ?> ">  
             <?php if($subheading): ?>
                        <div class="eyebrow text-quaternary mb-[12px]"  >
                            <?php echo $subheading; ?>
                        </div>   
                    <?php endif; ?> 
                        <?php if ($heading) : ?>
                         <h2 class="text-foreground mb-0" >
                                <?php echo $heading; ?>
                         </h2> 
                    <?php endif; ?>                     
                    <?php if($description): ?>
                    <div class="text-foreground style-disc mt-[15px]" data-aos="fade-in" >                 
                        <?php echo $description; ?>                   
                    </div>
                <?php endif; ?>
          </div>    
        </div>  
        </div> 
    </div>   
</section>
<?php }
?>
