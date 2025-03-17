<?php
// Check if the current page has the "info_text_image_video" group
if (have_rows('info_text_image_video')) :

    // Loop through the rows of data
    while (have_rows('info_text_image_video')) : the_row();       

        // Fetch the sub-fields
        $section_id = get_sub_field('section_id');               
        $media_position = get_sub_field('media_position'); 
        $media_type = get_sub_field('media_type');        
        $image  = get_sub_field('image'); 
        $poster = get_sub_field('video_poster');
        $video_source = get_sub_field('video_source');
        $captions = get_sub_field('video_captions');
        $local = get_sub_field('video_local');
        $videomp4 = get_sub_field('video'); 
        $videoogg = get_sub_field('video_ogg');
        $videowebm = get_sub_field('video_webm');
        $youtube = get_sub_field('youtube_id');
        $vimeo = get_sub_field('vimeo_id'); 
        $heading = get_sub_field('heading');
        $subheading = get_sub_field('subheading');
        $description = get_sub_field('description');
        $cta = get_sub_field('button_cta'); 
        $reverse_mobile = get_sub_field('reverse_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-info-text-image back-and-forth-row <?php echo ($media_position['value'] == "right") ? 'reverse' : 'normal'; ?>">
            <div class="container-fluid content-back-forth">
            <div class="row middle-xs row-back-forth <?php echo ($media_position['value'] == "right") ? 'reverse' : ''; if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">
                <div class="col-xs-12 col-lg-6 ps-0 pe-0 w-100">
                <div class="back-and-forth-video w-100 <?php if($media_type['value'] == "video" && ($video_source['value'] == "youtube" || $video_source['value'] == "vimeo")): ?> h-video <?php endif; ?> animate__animated" data-animation="<?php echo ($media_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>">
                        <?php if($media_type['value'] == "image"){ ?>
                            <?php if ( !empty($image)) : 
                                $srcset = wp_get_attachment_image_srcset($image['ID']);
                                $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                <img class="img-fluid parallax-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="792" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>   
                        <?php }elseif($media_type['value'] == "video"){  ?> 
                                <?php if( $video_source['value'] == "file" || $video_source['value'] == "local" ): ?>
                            <video class="player" autoplay loop muted playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>>
                                <?php if($video_source['value'] == "local" && $local){ ?>
                                    <source src="<?php echo $local; ?>" type="video/mp4">
                                <?php }else{ ?>
                                    <?php if( $videomp4 ): ?>
                                        <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                    <?php endif; ?>
                                    <?php if( $videoogg ): ?>
                                        <source src="<?php echo $videoogg['url']; ?>" type="video/ogg">
                                    <?php endif; ?>
                                    <?php if( $videowebm ): ?>
                                        <source src="<?php echo $videowebm['url']; ?>" type="video/webm">
                                    <?php endif; ?>
                                    Your browser does not support the video tag.
                                <?php } ?>
                                <?php if( $captions ): ?>
                                    <!-- Captions are optional -->
                                    <track kind="captions" label="English captions" src="<?php echo $captions['url']; ?>" srclang="en" default />
                                <?php endif; ?>
                            </video>
                            <?php endif; ?>
                            <?php if( $video_source['value'] == "youtube" ): ?>
                                <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                            <?php endif; ?>
                            <?php if( $video_source['value'] == "vimeo" ): ?>
                                <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster['url']); ?>" <?php endif; ?>></div>
                            <?php endif; ?>                          
                                             
                        <?php } ?> 
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6 col-justify-center col-text">
                    <?php if ($subheading) : ?>
                        <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($subheading); ?></span>
                    <?php endif; ?>
                    <?php if ($heading) : ?>
                        <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($heading); ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?>
                    <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                    <div class="button-wrapper blue m-b2 animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                        <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                    </div>
                <?php endif; ?>
                </div>
                </div>
            </div>                    
        </section>
    <?php              
    endwhile;
endif; ?>
