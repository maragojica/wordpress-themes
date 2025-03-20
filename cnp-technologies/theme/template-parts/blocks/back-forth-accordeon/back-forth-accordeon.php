<?php
$content_block = get_field('content_block_accordeon');
if ($content_block) {
    
    $heading = $content_block['heading'];     
    $description = $content_block['description'];   
    $use_two_columns_list = $content_block['use_two_columns_list'];     
    $buttons = $content_block['buttons'];
    $questions = $content_block['questions']; 

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
    $heading_width = 'w-full'; 
    $content_width = 'w-full';      
    $btn_align = 'justify-start';
   
     //Columns Text Align Settings
     $columns_number = $content_block['columns_layout'];      
     switch ($columns_number) {
         case 'column_50':            
             $heading_width .= ' lg:w-1/2'; 
             $content_width .= ' lg:w-1/2';  
             break;
         case 'column_30':            
             $heading_width .= ' lg:w-[30%]'; 
             $content_width .= ' lg:w-[70%]'; 
             break;
         case 'column_40':
            $heading_width .= ' lg::w-[40%]'; 
            $content_width .= ' lg:w-[60%]'; 
             break;         
     }
?>

<section class="back-foth-accordeon-section overflow-hidden max-w-full relative <?php echo esc_attr($className); ?> <?php if($add_bg_shape): ?> lg:mt-[-180px] <?php endif;?>" <?php echo $anchor_attr; ?>>   
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
       <div class="<?php echo esc_attr($container_classes); ?> lg:gap-y-0 gap-y-[3em] lg:gap-x-[3em] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
           <div class="<?php echo esc_attr($heading_width); ?> flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <?php if ($heading) : ?>
                        <h2 class="text-primary mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                            <?php echo $heading; ?>
                        </h2> 
                    <?php endif; ?> 
                    <?php if($description): ?>
                    <div class="text-black mt-[10px] style-disc <?php if($use_two_columns_list): ?> style-two <?php endif;?> animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
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
                 <?php if ($questions) : ?>
                    <div class="w-full overflow-hidden mt-[28px] border-t-secondary border-t-[2px]">
                        <?php foreach ($questions as $index => $question) : ?>
                            <div class="border-b-secondary border-b-[2px] animate__animated" data-animation="fadeIn" data-duration="1.5s">
                                <button id="controlsAccordionItem<?php echo esc_attr($index); ?>" type="button" class="text-secondary-dark accordion-header cursor-pointer flex w-full no-underline items-center justify-between gap-4 text-left py-[15px] md:py-[20px] lg:py-[28px] focus-visible:outline-none" aria-controls="accordionItem<?php echo esc_attr($index); ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>">
                                    <h3 class="my-0 text-primary sm w-fit"><?php echo esc_html($question['title']); ?></h3>                           
                                    <div class="indicator transition-transform duration-300 bg-contain bg-center bg-no-repeat"></div>
                                </button>
                                <div id="accordionItem<?php echo esc_attr($index); ?>" class="accordion-content overflow-hidden transition-max-height duration-300 ease-out <?php echo $index === 0 ? 'max-h-screen' : 'max-h-0'; ?>" role="region" aria-labelledby="controlsAccordionItem<?php echo esc_attr($index); ?>">
                                    <div class="list-style text-primary pb-[28px]">
                                        <?php echo $question['text']; ?>
                                     </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?> 
            </div>           
        </div>  
    </div>    
</section>

<?php }
?>

