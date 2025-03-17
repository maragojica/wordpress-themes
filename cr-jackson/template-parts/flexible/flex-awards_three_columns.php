<?php       
if (have_rows('section_awards')) :          
    while (have_rows('section_awards')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');        
        $heading = get_sub_field('heading'); 
        $subheading = get_sub_field('subheading');        
        $description = get_sub_field('description'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');       
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-awards-three <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" >
            <div class="container"> 
                <div class="row center-xs">
                    <div class="col-xs-12 col-lg-8 text-center">
                        <?php if ($subheading) : ?>
                                <div class="subheadline text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheading; ?></div>
                                <?php endif; ?>
                                <?php if ($heading) : ?>
                                <h3 class="cl-blue text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s"><?php echo $heading; ?></h2>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="dp-1 m-b30 cl-blue wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                    </div>    
                </div> 
                <?php  if (have_rows('awards_list')): ?>       
                  <div class="row justify-center m-lg-t3 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">    
                    <?php while (have_rows('awards_list')): the_row();
                    $image = get_sub_field('logo');
					$heading = get_sub_field('text'); ?> 
                    <div class="col-xs-12 col-lg-4 m-lg-t0 m-t1">
                            <?php if ( !empty($image)) : 
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                              <div class="box-logo-award-slide"><img class="img-fluid logo-award-th" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="187" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/></div>                            
                            <?php endif; ?>  
                            <?php if ($heading) : ?>
                            <div class="dp-1 text-center m-b30 cl-blue"><?php echo wp_kses_post($heading); ?></div>
                        <?php endif; ?>   
                    </div> 
                   <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

