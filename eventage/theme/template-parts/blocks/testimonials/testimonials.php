<?php
$content_block = get_field('content_testimonials');
if ($content_block) {
    
    $heading = $content_block['heading'];  
    $subheading = $content_block['subheading'];       
    $testimonials_list = $content_block['testimonials_list'];

 

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

     //Container Full
     $container_classes = 'h-full flex flex-col lg:flex-row items-center ';
     $content_width = 'lg:w-1/3';
     $image_width = 'lg:w-2/3';   
    
?>

<section class="testimonials-section max-w-full relative bg-black <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">    
       <div class="<?php echo esc_attr($container_classes); ?> xl:gap-x-[80px]">
         <div class="w-full <?php echo esc_attr($content_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.1s" >
           <?php if ($subheading) : ?>
                <h6 class="text-primary mb-[10px] w-100 animate__animated" data-animation="fadeIn" data-duration="1.1s"><?php echo esc_html($subheading); ?></h6>
            <?php endif; ?>
            <?php if($heading): ?>
            <h3 class="text-white uppercase mb-0 animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $heading; ?>
            </h3>  
            <?php endif; ?>
         </div>  
          <div class="w-full <?php echo esc_attr($image_width); ?> animate__animated" data-animation="fadeIn" data-duration="1.1s" >
          <?php if ( $testimonials_list ): ?>
                    <div class="testimonials_slider">
                        <?php  foreach( $testimonials_list as $featured_testimonial ):   

                            // Fetch the sub-fields   
                            $title = get_the_title( $featured_testimonial->ID );                      
                            $description = $featured_testimonial->post_content; ?>
                        <div class="service_slide">
                            <div class="box-services-slide">
                            <?php if($description): ?>
                                    <div class="text-black animate__animated" data-animation="fadeIn" data-duration="1.3s" >                 
                                        <?php echo $description; ?>                   
                                    </div>
                            <?php endif; ?> 
                            <?php if ($title) : ?>
                                <h6 class="text-primary text-right pt-[1em] lg:pt-[2em] mb-0 w-full text-right animate__animated" data-animation="fadeIn" data-duration="1.4s"><?php echo esc_html($title); ?></h6>
                            <?php endif; ?>
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

