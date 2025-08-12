<?php
$content_block = get_field('content_block_back_forth_contact');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];    
    $hide_subheading_desktop = $content_block['hide_subheading_desktop'];  
    $description = $content_block['description'];        
    $buttons = $content_block['buttons'];
    $gravity_form_id = $content_block['gravity_form']; 
     $contact_list = $content_block['contact_list'];
    
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
       
 
    $container_classes = 'flex flex-col lg:flex-row lg:flex-nowrap ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full lg:w-1/2 xl:w-1/2 2xl:w-[45%]'; 
    $content_width = 'w-full lg:w-1/2 xl:w-1/2 2xl:w-[55%]';      
    $btn_align = 'justify-start';
   
?>

<section class="back-foth-contact-section max-w-full relative <?php echo esc_attr($className); ?> " <?php echo $anchor_attr; ?>>   
    <div class="container mx-auto px-0 lg:px-[1.5rem] relative z-10">     
       <div class="<?php echo esc_attr($container_classes); ?> lg:gap-y-0 gap-y-[3em] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
          <div class="<?php echo esc_attr($heading_width); ?> lg:min-h-[520px] px-[1.5rem] <?php if($reverse_desktop){ ?> lg:pl-[80px] <?php }else{ ?> lg:pr-[80px] <?php } ?> flex flex-col justify-center">
                 <?php if( $subheading): ?>
                    <div class="text-quaternary eyebrow text-tertiary mb-[23px] <?php if($hide_subheading_desktop): ?> lg:hidden block <?php endif;?>" data-aos="fade-up" >
                        <?php echo $subheading; ?>
                    </div> 
                <?php endif; ?>
                <?php if ($heading) : ?>
                    <h2 class="text-secondary mb-0" data-aos="fade-up" >
                        <?php echo $heading; ?>
                    </h2>                             
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="text-medium text-accent info style-disc mt-[23px]" data-aos="fade-up">                 
                        <?php echo $description; ?>                   
                    </div>
                 <?php endif; ?> 
                 <?php
                    if ($contact_list) { 	?>
                        <div class="block pt-[3px]" data-aos="fade-up">
                            <?php								
                               foreach ($contact_list as $column_contact):  
                                  $icon = $column_contact['svg'];  
                                  $contact = $column_contact['contact']; ?>
                                    <div class="flex gap-[10px] md:gap-[25px] flex-row items-center justify-start mt-[20px]" data-aos="fade-up">
                                    <?php if( $icon): ?>
                                        <div class="lg:max-w-[22px] max-w-[16px] icon-box-contact">
                                            <?php if($icon): echo $icon; endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($contact): ?>
                                        <div class="contact-head uppercase text-primary hover:text-secondary mb-0 contact">                 
                                            <?php echo $contact; ?>                   
                                    </div>
                                    <?php endif; ?>
                                    </div>
                         <?php endforeach; ?>   
                        </div>
                    <?php 
                    }  ?>
                   
                  <?php if ($buttons) : ?>
                    <div class="flex flex-wrap gap-3 lg:gap-8 mt-5 <?php echo $btn_align; ?>" data-aos="fade-up">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_type = $button['button_type'];
                            $button_style_btn = $button['button_style_btn'];
                            $button_style_link = $button['button_style_link'];
                            $button_style = '';
                            if ($button_type === 'btn') {
                                $button_style = 'btn ';
                                if ($button_style_btn) {
                                    $button_style .= ' ' . $button_style_btn;
                                }
                            } elseif ($button_type === 'link') {
                                $button_style = 'simple-link ';
                                if ($button_style_link) {
                                    $button_style .= ' ' . $button_style_link;
                                }
                            }
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group">
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="<?php if($button_style): echo $button_style; endif;?>">
                                    <?php echo esc_html($title); ?>
                                </a>     
                                
                            </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
             
            </div>            
            <div class="<?php echo esc_attr($content_width); ?>" <?php if($reverse_desktop){ ?> data-aos="fade-left" <?php }else{ ?> data-aos="fade-right" <?php } ?>  >  
                   <?php if ($gravity_form_id) : ?>           
                    <div class="contact-form contact-form-general bg-foreground p-[32px] w-full h-full" data-aos="fade-in">
                        <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>              
                    </div>                   
                    <?php endif; ?>    
            </div>           
        </div>  
    </div>    
</section>

<?php }
?>

