<?php 
if (have_rows('benefits')) :          
    while (have_rows('benefits')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_graphic  = get_sub_field('section_bg_image');   
    $bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('section_headline');  
    $subheading = get_sub_field('section_subheading');  
    $benefits_list = get_sub_field('benefits_list');
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); ?>
    

    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-benefits w-margin <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
         <div class="container">        
            <div class="row justify-center"> 
                <?php if($headline ||  $subheading): ?>
                    <div class="col-xs-12 col-lg-12 mt-lg-4 m-b2 mb-lg-4 text-center wow fadeInUp" data-wow-duration="0.8" data-wow-delay="0.2s">
                    <?php if ($subheading) : ?>
                            <div class="subheadline cl-orange text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheading; ?></div>
                        <?php endif; ?>                    
                        <?php if ($headline) : ?>
                            <h3 class="cl-white text-uppercase mt-0 mb-0"><?php echo $headline; ?></h3>
                        <?php endif; ?> 
                    </div>
                <?php endif; ?>
                </div>  
                <div class="row justify-center"> 
                <?php if( $benefits_list ): $animation_delay = 0.5;
                    while (have_rows('benefits_list')) : the_row(); 
                         $icon = get_sub_field('icon');  
                         $heading = get_sub_field('heading');                                            
                        $duration = $animation_delay . 's'; ?>
                        <div class="col-xs-12 col-sm-6 col-lg-4 col-xl-2 m-b2 mb-lg-4 col-benefits wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                        <div class="benefit-card h-100">
                          <?php if ( !empty($icon)) :  ?>                
                                <img class="icon-benefits" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" height="64" width="64"/>                            
                            <?php endif; ?> 
                            <?php if($heading): ?>
                                <span class="benefits-heading center-text cl-white"><?php echo $heading;?></span>
                            <?php endif; ?> 
                                </div>                        
                        </div>
                   <?php $animation_delay += 0.25; endwhile;
                  endif; ?>                  
            </div>                                           
       </div>             
</section>

<?php              
    endwhile;
endif; ?>