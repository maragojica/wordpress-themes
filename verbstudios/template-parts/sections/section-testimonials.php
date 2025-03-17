<?php
if (have_rows('testimonials')): 
    while (have_rows('testimonials')) :
        the_row(); 
        $section_id = get_sub_field('section_id');
        $headline = get_sub_field('heading'); 
        $subheadline = get_sub_field('subheading'); 
        $testimonials_list = get_sub_field('testimonials_list');
        $padding_size = get_sub_field('padding_size'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');       
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
         <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-testimonials <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">
            <div class="row middle-xs justify-center">     
            <div class="col-xs-12 col-lg-5 text-lg-start text-center">                      
                <?php if ($subheadline) : ?>
                        <div class="subheadline cl-l-orange pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-10px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>                       
                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info start-xs mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>     
                                <div class="cta-btn">                               
                                <a tabindex="0" class="button <?php echo $button_color;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                </div>
                                <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>                                  
                    </div>                  
               <div class="col-xs-12 col-lg-7 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">                    
                    <?php if ( $testimonials_list ): ?>
                    <div class="testimonials_slider">
                        <?php  foreach( $testimonials_list as $featured_testimonial ):   

                            // Fetch the sub-fields   
                            $title = get_the_title( $featured_testimonial->ID );                      
                            $description = $featured_testimonial->post_content; ?>
                        <div class="service_slide">
                            <div class="box-services-slide">
                            <?php if ($description) : ?>
                                <div class="dp-1 cl-black"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                            <?php if ($title) : ?>
                                <div class="dp-1 cl-black text-right p-t2 w-100"><strong><?php echo esc_html($title); ?></strong></div>
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
<?php
 endwhile;
endif;
?>