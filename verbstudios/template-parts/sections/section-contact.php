<?php       
if (have_rows('info_contact')) :          
    while (have_rows('info_contact')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $image_position = get_sub_field('form_position');
        $media_size = get_sub_field('media_size');
        $gravity_form = get_sub_field('gravity_form'); 
        $headline = get_sub_field('heading'); 
        $subheadline = get_sub_field('subheading');        
        $description = get_sub_field('description');  
        $padding_size = get_sub_field('padding_size'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-contact <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
            <div class="container">
            <div class="row middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } }else{ echo ' normal'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } } ?>">      
            <div class="col-img col-xs-12 col-lg-6 mb-lg-0 mt-lg-0">
                    <?php if($gravity_form ): ?> 
                        <div id="contact-form" class="box-contact-form bg-black wow <?php echo ($image_position['value'] == "right") ? ' fadeInRight' : ' fadeInLeft'; ?>" data-wow-duration="0.3s" data-wow-delay="0.2s">
                           <?php echo $gravity_form; ?>
                    </div>
                   <?php endif; ?> 
            </div>               
            <div class="col-info col-xs-12 col-lg-6 <?php echo ($image_position['value'] == "right") ? 'pe-lg-4 ps-lg-4' : 'pe-lg-4 ps-lg-4'; ?>">                      
                   <?php if ($subheadline) : ?>
                        <div class="subheadline cl-l-orange pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-10px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?>      
                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info start-xs mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>     
                                <div class="cta-btn">                               
                                <a tabindex="0" class="button <?php echo $button_color;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                </div>
                                <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>                                  
                    </div>
                </div>
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

