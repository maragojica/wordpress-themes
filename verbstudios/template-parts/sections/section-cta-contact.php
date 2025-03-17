<?php       
if (have_rows('contact')) :          
    while (have_rows('contact')) : the_row();

        // Fetch the sub-fields      
        $show_contact = get_sub_field('show_contact');
        $bg_color = get_sub_field('bg_color');
        $section_id = get_sub_field('section_id');
        $image_position = get_sub_field('media_position');
        $media_type = get_sub_field('media_type');       
        $image = get_sub_field('image');
        $videomp4 = get_sub_field('video_mp4');  
        $video_ogg = get_sub_field('video_OGG'); 
        $video_webm = get_sub_field('video_webm'); 
        $poster = get_sub_field('video_poster'); 
        $video_type = get_sub_field('video_type');
        $headline = get_sub_field('headline'); 
        $subheadline = get_sub_field('subheadline');        
        $description = get_sub_field('description');  
        $margin_size = get_sub_field('margin_size'); 
        $margin_top_desktop = get_sub_field('margin_top_desktop'); 
        $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
        $margin_top_mobile = get_sub_field('margin_top_mobile'); 
        $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
      
        if($show_contact): ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-cta-contact flex w-margin p-t0 p-b0 <?php if($margin_size): echo $margin_size['value']; endif; ?> <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" >
            <div class="container">
            <div class="row <?php if($image_position['value'] == "right"){ echo ' reverse'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } }else{ echo ' normal'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } } ?>">      
            <div class="col-img col-xs-12 col-lg-7 col-xl-8 mb-lg-0 mt-lg-0">
                    <div class="media-content wow <?php echo ($image_position['value'] == "right") ? ' fadeInRight' : ' fadeInLeft'; ?>" data-wow-duration="0.3s" data-wow-delay="0.2s">
                           <?php if($media_type['value'] == "image"){ ?>
                            <?php if ( !empty($image)) : 
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="492" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>   
                        <?php }elseif($media_type['value'] == "video"){   ?>   
                             
                            <video class="featured-video" autoplay loop muted playsinline style="pointer-events: none;">
                                    <?php if($videomp4): ?>
                                    <source src="<?php echo $videomp4; ?>" type="video/mp4">
                                    <?php endif; ?>
                                    <?php if($video_ogg): ?>
                                    <source src="<?php echo $video_ogg; ?>" type="video/ogg">
                                    <?php endif; ?>
                                    <?php if($video_webm): ?>
                                    <source src="<?php echo $video_webm; ?>" type="video/webm">
                                    <?php endif; ?>
                                </video>             
                        <?php } ?>    
                                                                
                    </div> 
                  </div>               
                    <div class="col-info col-xs-12 col-lg-5 col-xl-4 <?php echo ($image_position['value'] == "right") ? 'pe-lg-0' : 'ps-lg-0'; ?>">                      
                       <div class="box-cta-contact w-100 h-100 wow fadeIn" <?php if($bg_color){ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
                       <?php if ($subheadline) : ?>
                            <div class="subheadline cl-l-orange pb-17px text-uppercase" ><?php echo $subheadline; ?></div>
                        <?php endif; ?>      
                        <?php if ($headline) : ?>
                            <h2 class="cl-white mt-0 mb-10px"><?php echo $headline; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-white" ><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>      
                        <?php if (have_rows('button_list')) {  ?> 
                            <div class="button-list-info start-xs mt-20px" >  
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
            </div>            
        </section>
<?php              
        endif;
            endwhile;
        endif; ?>

