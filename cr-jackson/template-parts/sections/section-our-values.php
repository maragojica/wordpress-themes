<?php       
if (have_rows('values')) :          
    while (have_rows('values')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');        
        $heading = get_sub_field('heading'); 
        $subheading = get_sub_field('subheading');        
        $description = get_sub_field('description'); 
        $bg_graphic  = get_sub_field('section_bg_image');
        $shape  = get_sub_field('shape');
        $shape_position  = get_sub_field('shape_position');
        $bg_color = get_sub_field('section_bg_color');
        $main_text_color = get_sub_field('main_text_color'); 
        $services_box_type = get_sub_field('services_box_type'); 
        $margin_top_desktop = get_sub_field('margin_top_desktop'); 
        $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
        $margin_top_mobile = get_sub_field('margin_top_mobile'); 
        $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-our-values p-t0 p-b0 w-margin <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
            <div class="container"> 
                <div class="row center-xs">
                    <div class="col-xs-12 col-lg-8 text-center">
                        <?php if ($subheading) : ?>
                                <div class="subheadline text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheading; ?></div>
                                <?php endif; ?>
                                <?php if ($heading) : ?>
                                <h3 class="<?php echo $main_text_color;?> text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s"><?php echo $heading; ?></h2>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="dp-1 m-b30 <?php echo $main_text_color;?> wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                    </div>    
                </div> 
                <?php  if (have_rows('our_values')): ?>       
                  <div class="row m-lg-t3 wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.5s">    
                    <?php while (have_rows('our_values')): the_row();
                    $title = get_sub_field('title');
					$text = get_sub_field('text'); ?> 
                    <div class="col-xs-12 col-lg-6 m-lg-t0 m-t1">                                         
                        <div class="box-values <?php echo ($services_box_type == "dark") ? ' bg-dark' : ' bg-white'; ?>">
                        <?php if ($title) : ?>
                            <h4 class="<?php echo ($services_box_type == "dark") ? ' cl-white' : ' cl-dark'; ?> text-uppercase text-center"><?php echo wp_kses_post($title); ?></h4>
                        <?php endif; ?>  
                        <?php if($text): ?>
                            <div class="dp-1 <?php echo ($services_box_type == "dark") ? ' cl-white' : ' cl-dark'; ?>"><?php echo $text;?></div>
                         <?php endif; ?>   
                        </div>                            
                    </div> 
                   <?php endwhile; ?>
                </div>
                <?php endif; ?>
                <?php if ( !empty($shape)) :  ?>                
                <img class="shape-services fluid-img <?php if($shape_position): echo $shape_position['value']; endif;?>" src="<?php echo esc_url($shape['url']); ?>" alt="<?php echo esc_attr($shape['alt']); ?>" width="208" height="22" />                            
            <?php endif; ?>  
            </div>            
        </section>
<?php              
endwhile;
endif; ?>

