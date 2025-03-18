<?php       
if (have_rows('internal_banner')) :          
    while (have_rows('internal_banner')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');      
        $bg_graphic  = get_sub_field('section_bg_image');
         $bg_color = get_sub_field('section_bg_color');    
        $media_position = get_sub_field('media_position');
        $media_type = get_sub_field('media_type');       
        $image = get_sub_field('image');
        $videomp4 = get_sub_field('video');  
        $video_ogg = get_sub_field('video_OGG'); 
        $video_webm = get_sub_field('video_webm'); 
        $headline = get_sub_field('headline');  
        $description = get_sub_field('description');   
        $margin_top_desktop = get_sub_field('margin_top_desktop'); 
        $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $margin_top_mobile = get_sub_field('margin_top_mobile'); 
        $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-internal-banner w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($bg_color){ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
            <?php if(!empty($bg_graphic)): 
                $srcset = wp_get_attachment_image_srcset($bg_graphic['ID']);
                $sizes = wp_get_attachment_image_sizes($bg_graphic['ID'], 'full'); ?>                
                <img class="shape-bg img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($bg_graphic['url']); ?>" alt="<?php echo esc_attr($bg_graphic['alt']); ?>" height="435" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
            <?php endif; ?>    
            <div class="shape-container container-fluid w-100 ps-0 pe-0<?php echo ($media_position['value'] == "right") ? ' ps-contain' : ' pe-contain'; ?>">
                <div class="row middle-xs <?php if($media_position['value'] == "right"){ echo ' normal'; }else{ echo ' reverse'; } if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">     
                <div class="col-info col-xs-12 col-lg-4 <?php echo ($media_position['value'] == "right") ? 'pe-lg-6' : 'ps-lg-6'; ?>">                      
                       
                            <?php if ($headline) : ?>
                                <h1 class="cl-white m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h1>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="dp-1 m-b30 cl-white wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
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
                  <div class="col-img col-xs-12 col-lg-8 mb-lg-0 mt-lg-0">
                    <div class="media-content wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
                           <?php if($media_type['value'] == "image"){ ?>
                            <?php if ( !empty($image)) : 
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="435" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>   
                        <?php }elseif($media_type['value'] == "video"){ 
                                ?> 
                            <video class="featured-video" autoplay loop muted playsinline style="pointer-events: none;">
                                <?php if($videomp4): ?>
                                <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
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
                  
                </div>
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

