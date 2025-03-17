<?php       
if (have_rows('info')) :          
    while (have_rows('info')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $section_bg_color = get_sub_field('section_bg_color'); 
        $heading = get_sub_field('heading');        
        $description = get_sub_field('description');
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');       
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?>>
            <div class="container">
                <div class="row middle-xs"> 
                    <div class="col-xs-12">                      
                        <?php if ($heading) : ?>
                            <h2 class="text-uppercase cl-green mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                        
                    </div>
                </div>
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

