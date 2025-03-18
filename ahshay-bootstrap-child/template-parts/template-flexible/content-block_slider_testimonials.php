

<?php 
       $section_id = get_sub_field('section_id');
        ?>
         <?php if( have_rows('testimonials_slider') ): ?>       
        <section class="section-testimonials-slider pb-5 mb-lg-5 ps-md-5 pe-md-5" <?php if($section_id): ?>id="<?php echo $section_id; ?>" <?php endif; ?>>
        <div class="testimonials-carousel owl-carousel">
        <?php while( have_rows('testimonials_slider') ): the_row();

            // Get sub field values.
            $image = get_sub_field('image');             
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle'); 
            $text = get_sub_field('text');          
            ?>           
            <div class="item animated fadeIn w-100">
               <div class="box-slide-testimonials d-flex justify-content-center align-items-center" <?php if ( !empty($image)): ?> style="background-image: url(<?php echo esc_url($image['url']); ?>)" <?php endif; ?>>
                <div class="container text-center">
                     <div class="row">
                        <div class="col-md-12 cl-white">
                        <?php if($text): echo $text; endif; ?>   
                        <?php if($title): ?>
                            <div class="share-text cl-golden-yellow text-uppercase mt-4 mb-2"><?php echo $title; ?></div>
                        <?php endif; ?>
                        <?php if($subtitle): ?>
                            <div class="label-1 cl-golden-yellow text-uppercase"><?php echo $subtitle; ?></div>
                        <?php endif; ?>
                        </div>
                     </div>    
                </div>
               </div>
            </div>
            <?php endwhile; ?>
            </div>
        </section>
    <?php endif; ?>