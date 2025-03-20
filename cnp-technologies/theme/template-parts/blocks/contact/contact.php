<?php
$content_block = get_field('content_contact');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $description = $content_block['description'];  
    $contact_list = $content_block['contact_list'];    
    $buttons = $content_block['buttons'];
    $gravity_form_id = $content_block['gravity_form'];  

    $add_bg_shape = $content_block['add_bg_shape']; 
    $bg_shape = $content_block['bg_shape'];  
    
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

<section class="contact-section max-w-full relative <?php echo esc_attr($className); ?> <?php if($add_bg_shape): ?> lg:mt-[-180px] <?php endif;?>" <?php echo $anchor_attr; ?>>   
    <?php if($add_bg_shape): ?>
        <?php if(!empty($bg_shape)): 
         echo wp_get_attachment_image(
            $bg_shape['ID'],
            'full',
            false,
            array(
                'class' => 'absolute right-0 bottom:0 w-full h-full lg:h-fit object-cover lg:object-contain parallax-img',
                'alt' => esc_attr($bg_shape['alt']),  
                'data-velocity' => '-20'              
            )
        );
     endif; ?>
    <?php endif; ?>
    <div class="container mx-auto <?php if($add_bg_shape): ?> lg:mt-[180px] <?php endif;?>">     
       <div class="<?php echo esc_attr($container_classes); ?> lg:gap-y-0 gap-y-[3em] lg:gap-x-[3em] xl:gap-x-[145px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
          <div class="<?php echo esc_attr($heading_width); ?> contact-info animate__animated" data-animation="fadeIn" data-duration="1.5s">
                 <?php if ($heading) : ?>
                        <h2 class="text-primary mb-[5px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                            <?php echo $heading; ?>
                        </h2> 
                    <?php endif; ?>                    
                 <?php
                    if ($contact_list) { 	?>
                        <div class="block pt-[6px] lg:pl-[50px]">
                            <?php								
                               foreach ($contact_list as $column_contact):  
                                  $icon = $column_contact['svg'];  
                                  $contact = $column_contact['contact']; ?>
                                    <div class="flex gap-[33px] flex-row items-center justify-start mt-[30px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                                    <?php if( $icon): ?>
                                        <div>
                                            <?php if($icon): echo $icon; endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($contact): ?>
                                        <div class="contact text-primary hover:text-secondary mb-0">                 
                                            <?php echo $contact; ?>                   
                                    </div>
                                    <?php endif; ?>
                                    </div>
                         <?php endforeach; ?>   
                        </div>
                    <?php 
                    }  ?>
                     <?php if($description): ?>
                    <div class="text-black mt-[50px] style-disc animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description; ?>                   
                    </div>
               <?php endif; ?> 
                 <?php if ($buttons) : ?>
                    <div class="flex flex-wrap gap-4 mt-[35px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                            $button_type = $button['button_type'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group bottom-shape-btn-<?php echo $button_type;?>">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min bottom-shape-btn btn <?php if($button_style): echo $button_style; endif;?>">
                                        <span class="bottom-shape-btn-<?php echo $button_type;?>"><?php echo esc_html($title); ?></span> 
                                    </a>  
                                </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>  
            </div>            
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
                <div class="contact-form bg-black p-[20px] lg:py-[52px] lg:px-[64px] animate__animated" data-animation="fadeIn" data-duration="1.5s" >   
                    <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>                         
                </div>          
            </div>           
        </div>  
    </div>
</section>

<?php }
?>

