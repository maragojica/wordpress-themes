<?php       
$show_social = get_field('show_social');  
if( $show_social ):     
if (have_rows('social')) :          
    while (have_rows('social')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');  
        $media_position = get_sub_field('media_position');        
        $headline = get_sub_field('heading');     
        $subheadline = get_sub_field('subheading');    
        $description = get_sub_field('description');   
        $social_shortcode = get_sub_field('social_shortcode'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-social <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
             <div class="container-fluid w-100 ps-0 pe-0 <?php echo ($media_position['value'] == "right") ? ' ps-contain' : ' pe-contain'; ?>">
                <div class="row middle-xs <?php if($media_position['value'] == "right"){ echo ' normal'; }else{ echo ' reverse'; } if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">     
                <div class="col-info col-xs-12 col-lg-3 <?php echo ($media_position['value'] == "right") ? 'pe-lg-2' : 'ps-lg-2'; ?>">    
                            <?php if ($headline) : ?>
                                <h2 class="cl-forest-green m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="dp-1 m-b30 cl-burnt-mauve bold-burnt-mauve wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                        <?php if (have_rows('button_list')) {   ?>
                                <div class="button-list center-xs start-lg">
                                    <?php while (have_rows('button_list')) {
                                    the_row(); ?>
                                    <?php $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color');
                                        if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                                    
                                        <a tabindex="0" class="btn <?php echo $button_color;?> hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                             
                                        <?php endif; ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>   
                    </div>
                  <div class="col-img col-xs-12 col-lg-9 mb-lg-0 mt-lg-0">
                    <div class="social-content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
                          <?php if($social_shortcode): echo $social_shortcode; endif; ?>                                        
                    </div> 
                  </div>               
                  
                </div>
            </div>            
        </section>
<?php              
            endwhile;
        endif; 
    endif;?>

