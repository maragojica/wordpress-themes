<?php       
if (have_rows('back_forth_content')) :          
    while (have_rows('back_forth_content')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $section_bg_color = get_sub_field('section_bg_color');
        $image_position = get_sub_field('media_position');
        $media_size = get_sub_field('media_size');
        $media_type = get_sub_field('media_type');       
        $image = get_sub_field('image');
        $videomp4 = get_sub_field('video_mp4');  
        $video_ogg = get_sub_field('video_OGG'); 
        $video_webm = get_sub_field('video_webm'); 
        $poster = get_sub_field('video_poster'); 
        $video_type = get_sub_field('video_type');
        $headline = get_sub_field('heading'); 
        $subheadline = get_sub_field('subheading');        
        $description = get_sub_field('description');  
        $padding_size = get_sub_field('padding_size'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?> class="section-back-forth-contain <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
            <div class="container">
            <div class="row middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } }else{ echo ' normal'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } } ?>">      
            <div class="col-img col-xs-12 col-lg-6 mb-lg-0 mt-lg-0">
                    <div class="media-content <?php echo $media_size['value']; ?> wow <?php echo ($image_position['value'] == "right") ? ' fadeInRight' : ' fadeInLeft'; ?>" data-wow-duration="0.7s" data-wow-delay="0.2s">
                           <?php if($media_type['value'] == "image"){ ?>
                            <?php if ( !empty($image)) : 
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="651" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>   
                        <?php }elseif($media_type['value'] == "video"){   ?>   
                             
                             <?php if($video_type['value'] == "file"){  ?>   

                                <video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>>  
                                    <?php if($videomp4): ?>
                                        <source src="<?php echo $videomp4; ?>" type="video/mp4">
                                    <?php endif; ?>   
                                    <?php if($video_ogg): ?>
                                        <source src="<?php echo $video_ogg; ?>" type="video/ogg">
                                    <?php endif; ?>
                                    <?php if($video_webm): ?>
                                        <source src="<?php echo $video_webm; ?>" type="video/webm">
                                    <?php endif; ?>                              
                                    Your browser does not support the video tag.
                                </video>  

                                <?php }elseif($video_type['value'] == "youtube"){ 

                                    $youtube_id = get_sub_field('youtube_id');  ?>   
                                    <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube_id;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>></div>

                                    <?php }elseif($video_type['value'] == "vimeo"){  
                                        $vimeo_id = get_sub_field('vimeo_id'); ?>   
                                        <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo_id;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>></div>
                                <?php } ?>  
                        <?php }elseif($media_type['value'] == "slider_images"){ ?>   
                          <?php  $image_slider = get_sub_field('slider_images');
                            if( $image_slider ): ?> 
                            <div class="w-100 h-100 uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: pull; autoplay: true; autoplay-interval: 3000;">

                                <div class="uk-slideshow-items w-100 h-100">
                                <?php foreach( $image_slider as $image ): ?>
                                    <div>
                                        <img uk-cover src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    </div>
                                <?php endforeach; ?>
                                </div>

                                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
                                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
                                        
                                </div>
                         <?php endif; } ?>    
                                                                
                    </div> 
                  </div>               
                    <div class="col-info col-xs-12 col-lg-6 <?php echo ($image_position['value'] == "right") ? 'pe-lg-4' : 'ps-lg-4'; ?>">                      
                                <?php if ($subheadline) : ?>
                                        <div class="subheadline text-uppercase cl-navy pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                                    <?php endif; ?>      
                                    <?php if ($headline) : ?>
                                        <h2 class="cl-sage text-uppercase mt-0 mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                        <div class="dp-1 cl-navy wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                                    <?php endif; ?>      
                                    <?php if (have_rows('button_list')) {  ?> 
                                <div class="button-list-info start-xs m-t2 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">  
                                <?php while (have_rows('button_list')) { 
                                    the_row(); $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color'); ?>
                                <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                    ?>     
                                    <div class="cta-btn <?php echo $button_color;?>">                               
                                    <a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" class="relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden text-navy-600 transition-all duration-150 ease-in-out hover:pl-10 hover:pr-6 <?php echo $button_color;?> group">
                                        <span class="absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-600 group-hover:h-full"></span>
                                        <span class="box-svg absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12">                                       
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="8" viewBox="0 0 26 8" fill="none">
                                            <path d="M25.3536 4.35355C25.5488 4.15829 25.5488 3.84171 25.3536 3.64645L22.1716 0.464466C21.9763 0.269204 21.6597 0.269204 21.4645 0.464466C21.2692 0.659728 21.2692 0.976311 21.4645 1.17157L24.2929 4L21.4645 6.82843C21.2692 7.02369 21.2692 7.34027 21.4645 7.53553C21.6597 7.7308 21.9763 7.7308 22.1716 7.53553L25.3536 4.35355ZM0 4.5H25V3.5H0V4.5Z" fill="#516456"/>
                                        </svg>
                                        </span>
                                        <span class="box-svg absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="8" viewBox="0 0 26 8" fill="none">
                                            <path d="M25.3536 4.35355C25.5488 4.15829 25.5488 3.84171 25.3536 3.64645L22.1716 0.464466C21.9763 0.269204 21.6597 0.269204 21.4645 0.464466C21.2692 0.659728 21.2692 0.976311 21.4645 1.17157L24.2929 4L21.4645 6.82843C21.2692 7.02369 21.2692 7.34027 21.4645 7.53553C21.6597 7.7308 21.9763 7.7308 22.1716 7.53553L25.3536 4.35355ZM0 4.5H25V3.5H0V4.5Z" fill="#fff"/>
                                        </svg>
                                        </span>
                                        <span class="link-button relative w-full text-left transition-colors duration-200 ease-in-out"><?php echo esc_html( $link_title ); ?></span>
                                    </a>                               
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

