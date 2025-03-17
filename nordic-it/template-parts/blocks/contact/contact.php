<?php
$content_block = get_field('content_block');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];   
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];
    $map_shortcode = $content_block['map_shortcode'];
    $calendar = $content_block['calendar'];
    $full_width_title = $content_block['full_width_title']; 
    $contact_list = $content_block['contact_list'];
    $gravity_form_id = $content_block['gravity_form'];
    $bg_color = $content_block['bg_color'];      
    
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

     //Text Color Settings
     $text_color = $content_block['text_color_style'];
     if($text_color == "light"){
        $headline_color = "text-secondary-dark";
        $subheadline_color = "text-primary";
        $description_color = "text-primary";
        $border_color = "#628290";
     }else{
        $headline_color = "text-accent";
        $subheadline_color = "text-secondary-dark";
        $description_color = "text-secondary-dark";
        $border_color = "#50594F";
     }
    
     //Image Line Color Settings
     if($reverse_desktop){
        $side_pos_line = 'lg:-right-[20px] -right-[15px]';
     }else{
        $side_pos_line = 'lg:-left-[20px] -left-[15px]';
     }

      //Media Type
    $sidebar_type = $content_block['sidebar_type'];   

    if (($sidebar_type != "nosidebar") && ($sidebar_type != "noform")) {
        $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
        $content_width = 'lg:w-1/2';
        $side_width = 'lg:w-1/2';
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
        $content_width = 'w-full';
        $side_width = ''; 
        $btn_align = 'justify-center';
    }
   
?>

<section class="back-forth-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">
        <?php if( $full_width_title ): ?>
            <div class="w-full flex flex-col justify-center text-center mb-[30px] animate__animated" data-animation="fadeIn" data-duration="1.5s">  
                   <?php if ($subheading) : ?>
                            <h3 class="<?php echo $subheadline_color;?> mb-[10px]">
                                <?php echo $subheading; ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <h2 class="<?php echo $headline_color;?> mb-[20px]">
                                <?php echo $heading; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <div class="font-text-font style-disc <?php echo $description_color;?>">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($buttons) : ?>
                            <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-6">
                                <?php foreach ($buttons as $button) : ?>
                                    <?php 
                                    $button_link = $button['button'];
                                    $button_style = $button['button_style'];
                                    if ($button_link) :
                                        $url = $button_link['url'];
                                        $title = $button_link['title'];
                                        $target = $button_link['target'] ? $button_link['target'] : '_self';
                                    ?>
                                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-full sm:min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
            </div>    
        <?php endif; ?>
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[3em] lg:gap-y-0 lg:gap-x-[85px]">            
            <?php if($sidebar_type == "map" || $sidebar_type == "calendar" || $sidebar_type == "noform") { ?>
                <div class="w-full flex flex-col flex-1 <?php echo esc_attr($side_width); ?>">
                <?php if ($map_shortcode || $calendar) : ?>
                    <?php if($contact_list): $animation_delay = 1; ?>
                    <div class="flex flex-col sm:flex-row flex-nowrap justify-between 2xl:mb-[48px] mb-[21px] gap-[12px]">
                    <?php $i = 1; foreach ($contact_list as $column) : 
                    
                        $title = $column['title'];
                        $text = $column['text'];                    
                        $duration = $animation_delay . 's'; ?>
                        <?php if( $i > 1 ): ?>
                            <div class="h-[3px] lg:h-full w-12 mx-auto lg:w-[3px] bg-primary-light opacity-25 lg:min-h-[69px]"></div>
                        <?php endif; ?>
                        <div class="animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                            <div class="flex flex-col h-full relative justify-start 2xl:justify-center items-center text-center">
                            <?php if($title): ?>
                                    <div class="text-subheading font-secondary-font uppercase <?php echo $headline_color;?>"><?php echo $title; ?></div>
                                <?php endif; ?>   
                                <?php if ($text) : ?>
                                    <div class="font-text-font bodysmall <?php echo $description_color;?>">
                                        <?php echo $text; ?>
                                    </div>
                                <?php endif; ?>  
                            </div>
                        </div>
                            
                    <?php $animation_delay += 0.75; $i++; endforeach; ?>  
                    </div>                       
                <?php endif; ?>
                <div class="rounded-[12px] relative w-full flex flex-col flex-1 z-[2] animate__animated" data-animation="fadeIn" data-duration="1.5s" >   
                    <div class="absolute lg:top-[20px] top-[15px] <?php echo $side_pos_line;?> w-full h-full rounded-[12px] z-[1] border-4 border-solid" style="border-color: <?php echo $border_color;?>"></div>  
                     <div class="box-side bg-primary rounded-[12px] w-full object-cover object-center relative z-[2] lg:my-0 mt-[2em] text-center <?php if ($map_shortcode) { ?> h-[20em] md:h-[25em] lg:h-[533px] <?php }else{ ?> h-full flex flex-col justify-center items-center lg:p-[60px] p-[30px] <?php } ?>">
                    <?php  if ($map_shortcode) { echo $map_shortcode; }else{ echo $calendar; }?>
                    </div> 
                </div>
            <?php endif; ?>
            </div>
            <?php } ?>   
            <div class="w-full <?php echo esc_attr($content_width); ?> flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="flex flex-col justify-center">
                    <?php if( !$full_width_title ): ?>
                        <?php if ($subheading) : ?>
                            <h3 class="<?php echo $subheadline_color;?> mb-[10px]">
                                <?php echo $subheading; ?>
                            </h3>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <h2 class="<?php echo $headline_color;?> mb-[20px]">
                                <?php echo $heading; ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <div class="font-text-font style-disc <?php echo $description_color;?>">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($buttons) : ?>
                            <div class="flex flex-wrap gap-4 <?php echo $btn_align;?> mt-6 mb-6">
                                <?php foreach ($buttons as $button) : ?>
                                    <?php 
                                    $button_link = $button['button'];
                                    $button_style = $button['button_style'];
                                    if ($button_link) :
                                        $url = $button_link['url'];
                                        $title = $button_link['title'];
                                        $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                        <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-full sm:min-w-min btn <?php if($button_style): echo $button_style; endif;?>">
                                            <?php echo esc_html($title); ?>
                                        </a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>                       
                <?php endif; ?>
                    <?php if($sidebar_type != "noform"):
                    if ($gravity_form_id) : ?>
                            <div class="contact-form rounded-[12px] relative w-full flex flex-col flex-1 z-[2] <?php if( !$full_width_title ): ?> mt-[14px]<?php endif;?> animate__animated" data-animation="fadeIn" data-duration="1.5s" >   
                                <div class="absolute lg:top-[20px] top-[15px] <?php echo $side_pos_line;?> w-full h-full rounded-[12px] z-[1] border-4 border-solid" style="border-color: <?php echo $border_color;?>"></div>  
                                <div class="bg-primary-light rounded-[12px] w-full h-full flex flex-col justify-center items-center relative z-[2] my-0 xl:p-[60px] p-[30px]">
                                <?php echo do_shortcode('[gravityform id="' . esc_attr($gravity_form_id) . '" title="false" description="false" ajax="true"]'); ?>
                                </div> 
                            </div>                        
                    <?php endif; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php }
?>

