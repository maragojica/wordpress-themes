<?php if ( have_rows( 'contact_info' ) ): ?>
    
    <?php while( have_rows('contact_info') ): the_row();
    $section_id = get_sub_field('section_id'); 
    $section_bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('heading');   
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); 
    $map_shortcode = get_sub_field('map_shortcode');?>
    
<section class="section-contact-map w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if( $section_id): ?> id="<?php echo  $section_id;?>" <?php endif; ?> <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?>>
    <div class="container-fluid w-100 pe-contain ps-lg-0 ">
        <div class="row middle-xs">  
        <div class="col-img col-xs-12 col-lg-7 mb-lg-0 mt-lg-0 pe-lg-0 ps-lg-0">
            <?php if( $map_shortcode ): ?>
            <div class="box-map">
              <?php echo $map_shortcode; ?>
            </div> 
            <?php endif; ?>          
        </div>
        <div class="col-xs-12 col-lg-5 ps-lg-6">
           <div class="col-content w-100 h-100">
              <?php if ($headline) : ?>
                    <h2 class="cl-white m-t0 mb-lg-20px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                <?php endif; ?>                       
                <?php if (have_rows('list_icons')) :  
                while (have_rows('list_icons')) : the_row(); $icon = get_sub_field('icon'); $text = get_sub_field('text'); ?>
                    <div class="contact-info wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                        <?php if ( !empty($icon)) :   ?> 
                        <img class="icon-contact" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" height="15" width="15"/>   
                        <?php endif; ?>  
                        <?php if ($text) : ?>
                            <div class="dp-2 cl-white"><?php echo wp_kses_post($text); ?></div>
                        <?php endif; ?>                       
                    </div>  
                <?php  endwhile;
                endif; ?>  
                <?php if (have_rows('button_list')) {   ?>
                    <div class="button-list center-xs start-lg">
                        <?php while (have_rows('button_list')) {
                        the_row(); ?>
                        <?php $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color');
                            if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                                    
                            <a tabindex="0" class="btn <?php echo $button_color;?> hover-slide-right wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                             
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                <?php } ?>  
           </div>
        </div>        
        </div>
    </div>  
</section>
<?php endwhile; ?>
    <?php endif; ?>