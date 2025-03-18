 <?php 
if (have_rows('testimonials')) :          
    while (have_rows('testimonials')) : the_row();
    $section_id = get_sub_field('section_id');   
    $section_bg_color = get_sub_field('section_bg_color');    
    $padding_size = get_sub_field('padding_size'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');
    $testimonials_list = get_sub_field('testimonials_list');  ?>  
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?> class="section-testimonials-slider <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
        <div class="container position-relative">    
            <div class="testimonial-interior text-center"> 
                <div class="quote-icon wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.2s"">
                    <svg xmlns="http://www.w3.org/2000/svg" width="108" height="99" viewBox="0 0 108 99" fill="none">
                      <path d="M0 52.3019L20.9272 0H44.0969L28.775 52.3019H43.3493V99H0V52.3019ZM64.2769 52.3019L84.8303 0H108L92.6781 52.3019H107.252V99H64.2769V52.3019Z" fill="#8799B0" fill-opacity="0.3"/>
                    </svg>
                </div>
                <?php if ( $testimonials_list ): ?>
                <div class="testimonials-slider">
                <?php foreach( $testimonials_list as $featured_testimonial ):                
                        $name = get_the_title( $featured_testimonial->ID );
                        $content = $featured_testimonial->post_content;;  
                        ?>
                    <div class="testimonials-slide">
                       
                        <?php if($content): ?>
                            <div class="dp-2 cl-sage wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $content; ?></div>
                        <?php endif; ?>
                        <?php if($name): ?>
                            <div class="dp-2 cl-sage p-t2 text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?=$name; ?></div>
                        <?php endif; ?>   
                    </div>                       
                    <?php endforeach; ?>
                </div>
                <button aria-label="Previous" class="glider-prev wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay="0.2s">       
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 11 18" fill="none">
                    <path d="M8.91892 18L0 9L8.91892 0L11 2.1L4.16216 9L11 15.9L8.91892 18Z" fill="#8799B0"/>
                    </svg>
                </button>
                <button aria-label="Next" class="glider-next wow fadeInRight" data-wow-duration="0.6s" data-wow-delay="0.2s">           
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="18" viewBox="0 0 11 18" fill="none">
                <path d="M2.08108 -7.79717e-07L11 9L2.08108 18L1.83588e-07 15.9L6.83784 9L1.39002e-06 2.1L2.08108 -7.79717e-07Z" fill="#8799B0"/>
                </svg>
                </button>
            </div>          
        <?php endif; ?>
        </div>   
    </section>
    <?php endwhile; ?>
    <?php endif; ?>