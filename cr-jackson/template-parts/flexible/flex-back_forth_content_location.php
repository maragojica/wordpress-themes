<?php       
if (have_rows('back_forth_content_location')) :          
    while (have_rows('back_forth_content_location')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $section_bg_color = get_sub_field('section_bg_color'); 
        $image_position = get_sub_field('map_position');
        $heading = get_sub_field('heading'); 
        $subheading = get_sub_field('subheading');        
        $description = get_sub_field('description');
        $hot_spot_image = get_sub_field('hot_spot_image');
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-back-forth-text <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?>>
            <div class="container">
            <div class="row middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } }else{ echo ' normal'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } } ?>">     
                  <div class="col-img col-xs-12 col-lg-8 mb-lg-0 mt-lg-0">                   
                          <?php if(!empty($hot_spot_image)): ?>
                           <div class="map-box wow <?php echo ($image_position['value'] == "right") ? ' fadeInRight' : ' fadeInLeft'; ?>" data-wow-duration="0.8s" data-wow-delay="0.2s">
                           <div class="lg-container">
                           <?php if ( !empty($hot_spot_image)) : 
                                    $srcset = wp_get_attachment_image_srcset($hot_spot_image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($hot_spot_image['ID'], 'full'); ?>                
                                <img class="lg-image" src="<?php echo esc_url($hot_spot_image['url']); ?>" alt="<?php echo esc_attr($hot_spot_image['alt']); ?>" height="766" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>   
                            <?php if (have_rows('hot_spot_items')) : 
                               while (have_rows('hot_spot_items')) : the_row(); 
                               $icon = get_sub_field('icon');
                               $location_type = get_sub_field('location_type');
                               $hot_spot_title = get_sub_field('hot_spot_title');
                               $hot_spot_text = get_sub_field('hot_spot_text');
                               $hot_spot_position_top_value = get_sub_field('hot_spot_position_top_value');
                               $hot_spot_position_left_value = get_sub_field('hot_spot_position_left_value'); 
                               $popup_position_desktop = get_sub_field('popup_position_desktop'); ?>                          

                              <div style="top: <?php echo $hot_spot_position_top_value;?>%; left: <?php echo $hot_spot_position_left_value;?>%;" class="lg-hotspot lg-hotspot--<?php echo $popup_position_desktop;?>">
                                <div class="lg-hotspot__button <?php if($location_type): echo $location_type['value']; endif; ?>"  <?php if ( !empty($icon)) :  ?> style="background-image: url(<?php echo esc_url($icon['url']); ?>)" <?php endif; ?>>                               
                                </div>
                                <div class="lg-hotspot__label">
                                  <?php if($hot_spot_title): ?><h4><?php echo $hot_spot_title;?></h4><?php endif; ?>
                                  <?php if($hot_spot_text): ?>  
                                  <?php echo $hot_spot_text;?>
                                  <?php endif; ?>
                                </div>
                              </div>
                              <?php endwhile; endif; ?>                          
                            </div> 
                          </div>
                          <?php endif; ?> 
                  </div>               
                    <div class="col-info col-xs-12 col-lg-4">                      
                    <?php if ($subheading) : ?>
                        <div class="subheadline cl-orange text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheading; ?></div>
                    <?php endif; ?>
                    <?php if ($heading) : ?>
                      <h3 class="cl-blue text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $heading; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                       <div class="dp-1 m-b30 cl-blue wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                      <?php endif; ?>                        
                    </div>
                </div>
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

