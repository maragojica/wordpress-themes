<?php       
if (have_rows('testimonials')) :          
    while (have_rows('testimonials')) : the_row();
        // Fetch the sub-fields       
       
        $heading  = get_sub_field('heading');
        $subheadline  = get_sub_field('subheading');
        $add_padding_top = get_sub_field('add_padding_top'); 
        $add_padding_bottom = get_sub_field('add_padding_bottom');
        $testimonials_list = get_sub_field('testimonials_list'); ?>
        <section class="section-testimonials <?php if( !$add_padding_top ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom ): ?> p-b0<?php endif; ?>">
            <div class="container">
                <?php if($heading || $subheadline): ?>
                <div class="row center-xs m-b3">                    
                    <div class="col-xs-12 col-lg-7">                        
                        <?php if($subheadline): ?>
                            <span class="subheading cl-green text-uppercase mt-0 m-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheadline; ?></span>
                        <?php endif; ?> 
                        <?php if ($heading) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?>   
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( $testimonials_list ): $animation_delay = 1; ?>
                    <div class="row center-xs"> 
                        <?php foreach( $testimonials_list as $featured_testimonial ):    

                        // Fetch the sub-fields   
                        $title = get_the_title( $featured_testimonial->ID );                      
                        $description = $featured_testimonial->post_content;
                        $duration = $animation_delay . 's'; ?>
                         <div class="col-testimonials col-xs-12 col-md-6 col-lg-4 p-b2 p-lg-b0">
                            <div class="box-testimonials middle-xs w-100 h-100 animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">  
                            <svg class="icon-quote m-b1" width="39" height="25" viewBox="0 0 39 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.9529 0L12.6794 11.2543H17.2265V25H0V10.8247L3.67265 0H14.9529ZM36.7265 0L34.4529 11.2543H39V25H21.7735V10.8247L25.4462 0H36.7265Z" fill="#005B29"/>
                            </svg>                                             
                            <?php if ($description) : ?>
                                <div class="testimonials-content dp-1 dp-2 cl-black"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                            <?php if ($title) : ?>
                                <span class="testimonial-name text-uppercase cl-green mt-0 mb-0"><?php echo esc_html($title); ?></span>
                            <?php endif; ?>   
                            </div>
                         </div>
                        <?php $animation_delay += 0.75; endforeach;; ?>
                    </div>
                <?php endif; ?>                
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

