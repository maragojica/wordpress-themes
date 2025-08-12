<?php
$content_block = get_field('content_block_testimonials');
if ($content_block) {
    
    $bg_image_section = $content_block['bg_image_section']; 
    $heading = $content_block['heading'];        
    $heading_color = $content_block['heading_color'];  
    $testimonials_list = $content_block['testimonials'];
    
    $add_top_shape = $content_block['add_top_shape'];     
    $add_bottom_shape = $content_block['add_bottom_shape'];   
     $add_margin_top = $content_block['add_margin_top'];  


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
       
 
    $heading_color_class = '';
    if ($heading_color === "blue") {
        $heading_color_class = 'text-tertiary';
    } else {
        $heading_color_class = 'text-secondary';
    }
   
?>

<section class="testimonials max-w-full relative bg-cover bg-center bg-no-repeat py-[2em] lg:py-[85px] px-[2em] lg:px-[85px] <?php echo esc_attr($className); ?>  <?php if($add_top_shape &&  $add_margin_top): ?> sm:top-[15px] md:mt-[25px] lg:mt-[50px] add-top-shape <?php endif;?> <?php if($add_bottom_shape):?> lg:mb-[43px]  <?php endif;?>" <?php echo $anchor_attr; ?> <?php if(!empty($bg_image_section)): ?> style="background-image: linear-gradient(0deg, rgba(0, 46, 93, 0.5), rgba(0, 46, 93, 0.5)), url('<?php echo esc_url($bg_image_section['url']); ?>');" <?php endif; ?>>
   <?php if($add_top_shape): ?>       
     <div class="absolute left-0 top-0 sm:top-[-30px] md:top-[-50px] lg:top-[-100px] z-[2] w-full h-fit top-shape-wave">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/layer_top_fullwidth.svg'); ?>" alt="Top Shape Wave" class="w-full h-fit object-contain lg:block hidden"  data-aos="fade-in">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/layer_top_fullwidth_mv.svg'); ?>" alt="Top Shape Wave" class="w-full h-fit object-contain lg:hidden block"  data-aos="fade-in">
     </div>
    <?php endif; ?>
    <div class="w-full bg-primary relative z-[1] <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>">
        <div class="container mx-auto relative z-[10]">     
        <?php if($heading) : ?>
            <div class="w-full text-center">
              <h2 class="<?php echo $heading_color_class; ?> mb-[20px] lg:mb-[40px]" data-aos="fade-up">
                    <?php echo $heading; ?>
                </h2> 
            </div>
         <?php endif;?>  
       <div class="mx-auto lg:max-w-[840px]">
           <?php if($testimonials_list): ?>
               <div class="swiper-container swiper testimonials-slider" id="testimonials-slider">
                    <div class="swiper-wrapper">
                        <?php foreach( $testimonials_list as $featured_post ):                         
                            $titlepost = get_the_title( $featured_post->ID );
                            $content = $featured_post->post_content;  ?>
                            <div class="swiper-slide w-full">
                                    <div class="h-full w-full flex flex-col text-center">                                                                         
                                        <?php if ($content) : ?>
                                            <div class="text-white lg:max-w-[840px]"><?php echo wp_kses_post($content); ?></div>
                                        <?php endif; ?>                                                                     
                                        <?php if ($titlepost) : ?>
                                        <div class="subheadline text-white uppercase mt-[1rem] lg:mt-[30px]" >-<?php echo $titlepost; ?></div>
                                        <?php endif; ?>                                                                                                  
                                    </div>                         
                            </div>
                           <?php endforeach; ?>  
                      </div>    
                     <div class="swiper-pagination-testimonials text-center mt-5"></div> 
                </div>  
            <?php endif; ?>  
        </div>  
    </div>
    </div>
     <?php if($add_bottom_shape): ?>       
     <div class="absolute left-0 bottom-0 sm:bottom-[-30px] md:bottom-[-50px] z-[2] w-full h-fit object-contain bottom-shape-wave">      
      <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/layer_bottom_fullwidth_right.svg'); ?>" alt="Bottom Shape Wave" class="w-full h-fit object-contain lg:hidden block"  data-aos="fade-in">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/shapes/layer_bottom_fullwidth_right_mv.svg'); ?>" alt="Bottom Shape Wave" class="w-full h-fit object-contain lg:block hidden"  data-aos="fade-in">
    </div>
      <?php endif; ?>   
</section>

<?php }
?>
