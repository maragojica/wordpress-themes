<?php 
if (have_rows('testimonials')) :          
    while (have_rows('testimonials')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $testimonials_list = get_sub_field('testimonials_list');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-testimonials <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row justify-center"> 
                <?php if($headline ||  $subheading): ?>
                <div class="col-xs-12 col-lg-8 col-xl-8 text-center">   
                  <?php if ($subheadline) : ?>
                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?>                     
                </div>
                <?php endif; ?>               
            </div>  
            <?php if ( $testimonials_list ): $animation_delay = 0.1; ?>
                    <div class="testimonials-slider owl-carousel owl-theme m-t3"> 
                        <?php foreach( $testimonials_list as $featured_testimonial ):    

                        // Fetch the sub-fields   
                        $title = get_the_title( $featured_testimonial->ID );                      
                        $description = $featured_testimonial->post_content;
                        $duration = $animation_delay . 's'; ?>
                         <div class="slide-testimonials">
                            <div class="box-testimonials middle-xs w-100 h-100 wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">                               
                            <svg class="icon-quote m-b2" xmlns="http://www.w3.org/2000/svg" width="37" height="29" viewBox="0 0 37 29" fill="none">
                            <path d="M14.921 15.7083V29H0V16.4132C0 12.4861 0.100823 7.85416 3.62943 4.22917C5.94823 1.7118 9.98098 0 14.7194 0H14.921V6.44444H14.7194C12.2998 6.44444 10.3842 7.1493 9.17441 8.25694C7.3597 9.96875 7.15809 12.3854 7.15809 14.2986V15.7083H14.921ZM37 15.7083V29H22.079V16.4132C22.079 12.7882 22.2806 7.85416 25.7084 4.22917C28.0272 1.7118 32.0599 0 36.7983 0H37V6.44444H36.7983C34.3787 6.44444 32.4632 7.1493 31.2534 8.25694C29.4387 9.96875 29.237 12.3854 29.237 14.2986V15.7083H37Z" fill="#3659F4"/>
                            </svg>                                          
                            <?php if ($description) : ?>
                                <div class="testimonials-content dp-1 cl-black"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                            <?php if ($title) : ?>
                                <div class="testimonial-name w-100 text-uppercase bg-navy cl-white mt-0 mb-0"><?php echo esc_html($title); ?></div>
                            <?php endif; ?>   
                            </div>
                         </div>
                        <?php $animation_delay += 0.10; endforeach;; ?>
                    </div>
                <?php endif; ?>  
            <div class="row justify-center mt-lg-2">                
                <div class="col-xs-12 col-lg-8 col-xl-6 text-center">                     
                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info justify-center mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); $cta = get_sub_field('button_cta'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>     
                                <div class="cta-btn">                               
                                <a tabindex="0" class="button blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                </div>
                                <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>  
                </div>                          
            </div>                                                   
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  