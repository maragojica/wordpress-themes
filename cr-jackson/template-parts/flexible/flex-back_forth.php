<?php       
if (have_rows('back_forth_simple_full')) :          
    while (have_rows('back_forth_simple_full')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $shape  = get_sub_field('shape');
        $shape_position  = get_sub_field('shape_position');
        $section_bg_color = get_sub_field('section_bg_color');        
        $image_position = get_sub_field('media_position');
        $media_type = get_sub_field('media_type');       
        $image = get_sub_field('image_back');
        $videomp4 = get_sub_field('video');  
        $heading = get_sub_field('heading'); 
        $subheading = get_sub_field('subheading');        
        $description = get_sub_field('description');        
        $cta = get_sub_field('button_cta');         
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-back-forth-full flex-back-forth-full <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?>>
            <div class="container-fluid w-100 <?php echo ($image_position['value'] == "right") ? ' pe-lg-0 ps-contain' : ' ps-lg-0 pe-contain'; ?>">
                <div class="row middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } }else{ echo ' normal'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } } ?>">     
                  <div class="col-img col-xs-12 col-lg-7 mb-lg-0 mt-lg-0">
                    <div class="media-content wow <?php echo ($image_position['value'] == "right") ? ' fadeInRight' : ' fadeInLeft'; ?>" data-wow-duration="0.8s" data-wow-delay="0.2s">
                           <?php if($media_type['value'] == "image"){ ?>
                            <?php if ( !empty($image)) : 
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="732" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>   
                        <?php }elseif($media_type['value'] == "video"){ 
                                ?> 
                            <video class="featured-video" autoplay loop muted playsinline style="pointer-events: none;">
                                <?php if($videomp4): ?>
                                <source src="<?php echo $videomp4; ?>" type="video/mp4">
                                <?php endif; ?>
                            </video>                     
                        <?php } ?>    
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                               <a tabindex="0" class="btn btn-back-forth <?php echo ($image_position['value'] == "right") ? ' btn-left' : ' btn-right'; ?> cta-btn wow <?php echo ($image_position['value'] == "right") ? ' fadeInLeft' : ' fadeInRight'; ?>" data-wow-duration="0.8s" data-wow-delay="0.4s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>                          
                            </a> 
                        <?php endif; ?>     
                        <?php if ( !empty($shape)) :  ?>                
                            <img class="shape-services fluid-img <?php if($shape_position): echo $shape_position['value']; endif;?>" src="<?php echo esc_url($shape['url']); ?>" alt="<?php echo esc_attr($shape['alt']); ?>" width="208" height="22" />                            
                        <?php endif; ?>                                     
                    </div> 
                  </div>               
                    <div class="col-info col-xs-12 col-lg-5 <?php echo ($image_position['value'] == "right") ? 'pe-lg-4' : 'ps-lg-4'; ?>">                      
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

