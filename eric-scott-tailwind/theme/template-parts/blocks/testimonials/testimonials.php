<?php
$content_block = get_field('content_testimonials');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];   
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];      
    $testimonials_list = $content_block['testimonials_list'];
    $add_bottom_divider = $content_block['add_bottom_divider'];
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

     

    if ($testimonials_list) {
        $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : 'items-start'));
        $content_width = 'lg:w-2/5';
        $media_width = 'lg:w-3/5';
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
        $content_width = 'w-full';
        $media_width = ''; 
        $btn_align = 'justify-center';
    }
   
?>

<section class="testimonials-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[2em] lg:pt-[60px] xl:pt-[80px]">
            <?php if ($testimonials_list) : ?>
                <div class="w-full flex flex-col flex-1 <?php echo esc_attr($media_width); ?> <?php if($reverse_mobile): ?> pt-[80px] lg:pt-0 <?php endif; ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">           
                   <div class="relative xl:pr-[6em]">
                   <div class="absolute -left-[21px] lg:-left-[35px] xl:-left-[48px] -top-[60px] xl:-top-[80px] z-[1]">   
                        <svg class="max-w-[80px] xl:max-w-[108px] h-fit object-contain object-center" xmlns="http://www.w3.org/2000/svg" width="108" height="99" viewBox="0 0 108 99" fill="none">
                        <path opacity="0.4" d="M0 52.3019L20.9272 0H44.0969L28.775 52.3019H43.3493V99H0V52.3019ZM64.2769 52.3019L84.8303 0H108L92.6781 52.3019H107.252V99H64.2769V52.3019Z" fill="#B9AB97"/>
                        </svg>
                    </div>     
                    <div id="testimonials-slider" class="testimonials-slider owl-carousel owl-theme">
                        <?php foreach( $testimonials_list as $featured_post ):                         
                            $titlepost = get_the_title( $featured_post->ID );
                            $position = get_field( 'position', $featured_post->ID );
                            $content = $featured_post->post_content;  ?>
                            <div class="item w-full">
                                <div class="h-full w-full flex flex-col">                                        
                                    <?php if ($content) : ?>
                                        <div class="text-secondary"><?php echo wp_kses_post($content); ?></div>
                                    <?php endif; ?>                                                                     
                                    <?php if ($titlepost || $position) : ?>
                                    <div class="text-secondary position font-secondary mt-[27px]" ><?php echo $titlepost; ?><?php if($position): echo ', '.$position; endif; ?> </div>
                                    <?php endif; ?>                                                                                                  
                                </div>                         
                          </div>
                        <?php endforeach; ?>       
                    </div>
                   </div>
                </div>
            <?php wp_reset_postdata();  endif; ?>
            <div class="w-full <?php echo esc_attr($content_width); ?> flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">

               <?php if ($heading) : ?>
                <div class="relative">
                    <?php if( $subheading): ?>
                        <div class="text-secondary subheading font-secondary capitalize rotate--10.166 absolute -left-[1.2rem] md:-left-[34px] lg:-left-[51px] -top-[12px] xl:top-0 z-[1] animate__animated" data-animation="fadeIn" data-duration="1.3s"><?php echo $subheading; ?></div>
                    <?php endif; ?>
                    <h2 class="text-primary animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                </div>               
                <?php endif; ?> 
                <?php if($description): ?>
                    <div class="text-secondary mt-[1.5em] style-disc animate__animated" data-animation="fadeIn" data-duration="1.5s" >                 
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
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="min-w-min sm btn <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                    </a>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>  
               
            </div>
        </div>
    </div>
    <?php if($add_bottom_divider): ?>
     <div class="w-full absolute left-0 bottom-0 z-3">
        <div class="line-divider"></div>   
        <div class="line-border mt-[11px]"></div>          
     </div>
   <?php endif; ?>
</section>

<?php }
?>

