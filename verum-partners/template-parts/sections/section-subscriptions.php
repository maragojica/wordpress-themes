<?php       
if (have_rows('subscription')) :          
    while (have_rows('subscription')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');       
        $heading = get_sub_field('heading');        
        $description = get_sub_field('description');
        $gravity_form = get_sub_field('gravity_form');       
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');       
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-subscriptions <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
            <div class="container">
                <div class="row middle-xs center-xs">
                    <div class="col-xs-12 col-lg-7">                      
                        <?php if ($heading) : ?>
                            <h2 class="text-uppercase cl-green mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>  
                        <?php if($gravity_form): ?>
                            <div class="gravity-form center-form orange-arrow mt-lg-0 m-t2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $gravity_form;?></div>
                         <?php endif; ?> 
                    </div>
                </div>
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

