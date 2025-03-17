<?php
$content_block = get_field('content_testimonials');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $subheading = $content_block['subheading'];   
    $description = $content_block['description'];
    $buttons = $content_block['buttons'];
    $bg_color = $content_block['bg_color'];   
    $testimonials_list = $content_block['testimonials_list'];
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
        $headline_color = "text-accent";
        $subheadline_color = "text-primary-light";
        $description_color = "text-accent";
        
     }else{
        $headline_color = "text-secondary-dark";
        $subheadline_color = "text-primary";
        $description_color = "text-primary";
       
     }   
    

    if ($testimonials_list) {
        $container_classes = 'h-full flex flex-col lg:flex-row ' . ($reverse_desktop ? 'lg:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : 'items-start'));
        $content_width = 'lg:w-1/2';
        $media_width = 'lg:w-1/2';
        $btn_align = 'justify-start';
    } else {
        $container_classes = 'flex flex-col items-center text-center';
        $content_width = 'w-full';
        $media_width = ''; 
        $btn_align = 'justify-center';
    }
   
?>

<section class="testimonials-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>>
    <div class="container mx-auto">
        <div class="<?php echo esc_attr($container_classes); ?> gap-y-[1em] lg:gap-y-0 lg:gap-x-[140px]">
            <?php if ($testimonials_list) : ?>
                <div class="w-full h-full flex flex-col flex-1 <?php echo esc_attr($media_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.5s">                
                    <div id="testimonials-slider" class="testimonials-slider owl-carousel owl-theme">
                        <?php foreach( $testimonials_list as $featured_post ):                         
                            $titlepost = get_the_title( $featured_post->ID );
                            $position = get_field( 'position', $featured_post->ID );
                            $content = $featured_post->post_content;  ?>
                            <div class="item w-full">
                                <div class="h-full w-full flex flex-col gap-[32px]">
                                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="24" viewBox="0 0 44 24" fill="none">
                                    <path d="M12.6575 0H22.3014L14.9479 24H0L12.6575 0ZM34.3562 0H44L36.6466 24H21.6986L34.3562 0Z" fill="#B2C2B1"/>
                                </svg>
                                <?php if ($content) : ?>
                                    <div class="font-text-font <?php echo $description_color;?>"><?php echo wp_kses_post($content); ?></div>
                                <?php endif; ?>  
                                <div class="relative flex flex-col gap-[32px]">
                                    <div class="w-full h-[3px] bg-primary-light absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 z-[1]"></div>
                                    <?php if ($titlepost || $position) : ?>
                                    <div class="font-text-font text-right ps-5 w-fit ms-auto z-[1] <?php echo $description_color;?>" <?php if($bg_color):?> style="background-color: <?php echo $bg_color;?>" <?php endif; ?>><?php echo $titlepost; ?><?php if($position): echo ', '.$position; endif; ?> </div>
                                    <?php endif; ?>
                                </div>  
                                </div>                         
                          </div>
                        <?php endforeach; ?>       
                    </div>
                </div>
            <?php wp_reset_postdata();  endif; ?>
            <div class="w-full h-full <?php echo esc_attr($content_width); ?> flex-1 flex flex-col justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">
                <div class="h-100 lg:pt-[20px] lg:pb-[20px]">
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
                    <div class="font-text-font <?php echo $description_color;?>">
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
            </div>
        </div>
    </div>
</section>

<?php }
?>

