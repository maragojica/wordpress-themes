<?php       
if (have_rows('video_lightbox')) :          
    while (have_rows('video_lightbox')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $section_bg_color = get_sub_field('section_bg_color');        
        $image_position = get_sub_field('media_position');        
        $image = get_sub_field('video_poster');
        $videomp4 = get_sub_field('video');  
        $video_description = get_sub_field('video_description'); 
        $heading = get_sub_field('heading');        
        $description = get_sub_field('description'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-video <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?>>
            <div class="container">
                <div class="row middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; }else{ echo ' normal'; } if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">     
                  <div class="col-img col-xs-12 col-lg-7 mb-lg-0 mt-lg-0 <?php echo ($reverse_mobile) ? 'm-t2' : 'm-b5'; ?>">                                      
                        <?php if ( !empty($image)) : 
                                $srcset = wp_get_attachment_image_srcset($image['ID']);
                                $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>     
                            <div class="box-video wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">              
								<a class="w-100 h-100" href="#modal-media-video" uk-toggle tabindex="0" aria-label="Play Video" title="Play Video"> 
									<img class="w-100 img-fluid border-5" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="526" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>  
								</a>                         
                            <div class="btn-play">
                                <a class="w-100 h-100" href="#modal-media-video" uk-toggle tabindex="0" aria-label="Play Video" title="Play Video">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="88" height="88" viewBox="0 0 88 88" fill="none">
                                        <path d="M54.74 42.1925C55.9621 42.9801 55.9621 44.7671 54.74 45.5548L40.8188 54.5267C39.4879 55.3845 37.7354 54.429 37.7354 52.8456L37.7354 34.9016C37.7354 33.3183 39.4879 32.3628 40.8188 33.2205L54.74 42.1925Z" stroke="white" stroke-width="2"/>
                                        <circle cx="43.8735" cy="43.8735" r="42.8735" stroke="white" stroke-width="2"/>
                                        <circle cx="43.8734" cy="43.8735" r="33.8203" stroke="white" stroke-width="2"/>
                                        <path d="M69.3371 43.8736C69.3371 57.9491 58.0802 69.337 44.2219 69.337C30.3636 69.337 19.1067 57.9491 19.1067 43.8736C19.1067 29.798 30.3636 18.4102 44.2219 18.4102C58.0802 18.4102 69.3371 29.798 69.3371 43.8736Z" stroke="white" stroke-width="2"/>
                                    </svg>
                                </a>
                            </div>
                            </div> 
                            <?php endif; ?> 
                        <?php if ($video_description) : ?>
                        <div class="p-t1 dp-1 cl-orange main-description video-description wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo wp_kses_post($video_description); ?></div>
                    <?php endif; ?> 
                  </div>               
                    <div class="col-info col-xs-12 col-lg-5 <?php echo ($image_position['value'] == "right") ? 'pe-lg-3' : 'ps-lg-3'; ?>">                      
                        <?php if ($heading) : ?>
                            <h2 class="text-uppercase cl-green mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>   
            <?php if( $videomp4 ): ?>  
            <div id="modal-media-video" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-outside" type="button" uk-close></button>
                    <video src="<?php echo $videomp4['url'];?>" width="1920" height="1080" controls playsinline uk-video></video>
                </div>
            </div>  
            <?php endif; ?>   
        </section>
<?php              
            endwhile;
        endif; ?>

