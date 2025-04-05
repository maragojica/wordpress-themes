<?php
$content_block = get_field('content_contact');
if ($content_block) {
    
    $heading = $content_block['heading'];      
    $description = $content_block['description'];
    $contact_list = $content_block['contact_list'];    
    $buttons = $content_block['buttons'];
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

<section class="contact-section max-w-full relative <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>   
   
   
    <div class="container mx-auto">     
       <div class="<?php echo esc_attr($container_classes); ?> lg:gap-y-0 gap-y-[3em] lg:gap-x-[3em] xl:gap-x-[145px] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
          <div class="<?php echo esc_attr($heading_width); ?> contact-info animate__animated" data-animation="fadeIn" data-duration="1.5s">
                 <?php if ($heading) : ?>
                    <h3 class="text-black uppercase mb-0 animate__animated"  data-animation="fadeIn" data-duration="1.5s">
                        <?php echo $heading; ?>
                    </h3>
                    <?php endif; ?>                    
                 <?php
                    if ($contact_list) { 	?>
                        <div class="block pt-[6px]">
                            <?php								
                               foreach ($contact_list as $column_contact):  
                                  $icon = $column_contact['svg'];  
                                  $contact = $column_contact['contact']; ?>
                                    <div class="flex gap-[17px] flex-row items-start justify-start mt-[15px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                                    <?php if( $icon): ?>
                                        <div class="mt-[5px]">
                                            <?php if($icon): echo $icon; endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($contact): ?>
                                        <div class="contact text-black mb-0">                 
                                            <?php echo $contact; ?>                   
                                    </div>
                                    <?php endif; ?>
                                    </div>
                         <?php endforeach; ?>   
                        </div>
                    <?php 
                    }  ?>
                     <?php if($description): ?>
                    <div class="text-black animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                        <?php echo $description; ?>                   
                    </div>
               <?php endif; ?>
               
               <?php if ($buttons) : ?>
                    <div class="flex flex-wrap justify-start gap-4 mt-[30px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                    <?php foreach ($buttons as $button) : ?>
                        <?php 
                        $button_link = $button['button'];
                        $button_style = $button['button_style'];
                        if ($button_link) :
                            $url = $button_link['url'];
                            $title = $button_link['title'];
                            $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                            <div class="relative group">
                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                <?php echo esc_html($title); ?>
                            </a>     
                            
                        </div>            
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>            
            <div class="<?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >  
                <div class="contact-form rounded-[5px] border-[3px] border-primary bg-white p-[1.5em] lg:py-[52px] lg:px-[64px] animate__animated" data-animation="fadeIn" data-duration="1.5s" >   
                    <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>                         
                </div>   
            </div>           
        </div>  
    </div>
</section>

<?php }
?>

