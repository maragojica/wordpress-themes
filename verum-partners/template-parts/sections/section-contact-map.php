<?php if ( have_rows( 'locations' ) ): ?>
    
    <?php while( have_rows('locations') ): the_row();
    $section_id = get_sub_field('section_id'); 
    $section_bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('heading'); 
    $description = get_sub_field('description');
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');   
    $contact_form_shortcode = get_sub_field('gravity_form'); 
    $map_shortcode = get_sub_field('map_shortcode');?>
    
<section class="section-contact-map w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if( $section_id): ?> id="<?php echo  $section_id;?>" <?php endif; ?> <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?>>
    <div class="container-fluid w-100 ps-lg-0 pe-contain">
        <div class="row start-xs ms-lg-t0">  
        <div class="col-xs-12 col-lg-6 ps-lg-0">
            <?php if( $map_shortcode ): ?>
            <div class="box-map">
              <?php echo $map_shortcode; ?>
            </div> 
            <?php endif; ?>          
        </div>
        <div class="col-xs-12 col-lg-6 mb-lg-0 m-t3 mt-lg-0 p-lg-s5">
           <div class="box-info-map">
           <?php if ($headline) : ?>
                <h1 class="text-uppercase cl-green mt-0 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h1>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="dp-1 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo wp_kses_post($description); ?></div>
            <?php endif; ?>  
            <?php if (have_rows('social_links')): ?>
                <div class="social-box mt-lg-0 m-t1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
                    <?php while (have_rows('social_links')): the_row();  
                     $icon = get_sub_field('icon'); 
                     $cta = get_sub_field('link'); ?>
                      <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>  
                            <a tabindex="0" class="link-social" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php if ( !empty($icon)) :   ?> 
                                <img class="icon-social" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" height="27" width="27"/>   
                            <?php endif; ?> 
                            </a>                                      
                    <?php endif; ?> 
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>    
            <?php if( $contact_form_shortcode): ?>
              <div class="contact-form gravity-form orange-arrow m-t2"><?php echo $contact_form_shortcode; ?></div>
            <?php endif; ?>    
           </div>
        </div>        
        </div>
    </div>  
</section>
<?php endwhile; ?>
    <?php endif; ?>