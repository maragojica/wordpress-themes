<?php       
if (have_rows('video_lightbox')) :          
    while (have_rows('video_lightbox')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $section_bg_color = get_sub_field('section_bg_color');
        $image = get_sub_field('video_poster');
        $video_caption = get_sub_field('video_caption'); 
        $video_type = get_sub_field('video_type');         
        $margin_top_desktop = get_sub_field('margin_top_desktop'); 
        $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
        $margin_top_mobile = get_sub_field('margin_top_mobile'); 
        $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-video wow fadeIn flex w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if(!empty($image)): ?>style="background-image: linear-gradient(to bottom, <?php echo $section_bg_color; ?>, <?php echo $section_bg_color; ?>), url('<?php echo esc_url($image); ?>');"<?php endif; ?> data-wow-duration="0.8s" data-wow-delay="0.2s">
            <div class="container">
            <?php if ($video_caption) : ?>
                    <div class="cl-white title-video-lightbox text-uppercase mt-10px mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $video_caption ?></div>
                <?php endif; ?>
                <div class="btn-play bounce2">
                    <a class="w-100 h-100" href="#modal-media-video" uk-toggle tabindex="0" aria-label="Play Video" title="Play Video">
                    <svg xmlns="http://www.w3.org/2000/svg" width="81" height="79" viewBox="0 0 81 79" fill="none">
                        <path d="M31.75 55.2053L56.4976 39.5047L31.75 23.8041V55.2053ZM40.6399 79.0095C35.1172 79.0095 29.9249 77.9729 25.0631 75.8997C20.2013 73.8264 15.9722 71.0127 12.3758 67.4586C8.77939 63.9045 5.93226 59.7252 3.83435 54.9206C1.73645 50.1159 0.6875 44.9822 0.6875 39.5194C0.6875 34.0566 1.73545 28.9206 3.83136 24.1115C5.92734 19.3024 8.77185 15.1191 12.3649 11.5616C15.9579 8.00421 20.1831 5.18793 25.0403 3.11276C29.8976 1.03759 35.0875 0 40.6101 0C46.1328 0 51.3251 1.0366 56.1869 3.10979C61.0487 5.18306 65.2778 7.99674 68.8742 11.5509C72.4706 15.105 75.3177 19.2843 77.4156 24.0889C79.5135 28.8935 80.5625 34.0273 80.5625 39.49C80.5625 44.9529 79.5145 50.0888 77.4186 54.898C75.3227 59.7071 72.4782 63.8904 68.8851 67.4479C65.2921 71.0052 61.0669 73.8215 56.2097 75.8967C51.3524 77.9719 46.1625 79.0095 40.6399 79.0095ZM40.625 74.62C50.5354 74.62 58.9297 71.2182 65.8078 64.4147C72.6859 57.6111 76.125 49.3078 76.125 39.5047C76.125 29.7017 72.6859 21.3984 65.8078 14.5948C58.9297 7.79121 50.5354 4.38941 40.625 4.38941C30.7146 4.38941 22.3203 7.79121 15.4422 14.5948C8.56406 21.3984 5.125 29.7017 5.125 39.5047C5.125 49.3078 8.56406 57.6111 15.4422 64.4147C22.3203 71.2182 30.7146 74.62 40.625 74.62Z" fill="white"/>
                    </svg>
                    </a>
                </div>
            </div> 
            <div id="modal-media-video" class="uk-flex-top" uk-modal>
                <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                    <button class="uk-modal-close-outside" type="button" uk-close></button>
                    <?php if($video_type['value'] == "file"){ 
                        $videomp4 = get_sub_field('video_mp4'); ?>
                    <video src="<?php echo $videomp4['url'];?>" width="1920" height="1080" controls playsinline uk-video></video>
                    <?php }elseif( $video_type['value'] == "youtube"){ 
                        $youtube_id = get_sub_field('youtube_id'); ?>                        
                            <iframe width="1920" height="1080" uk-video uk-responsive src="https://www.youtube.com/embed/<?php echo $youtube_id;?>?autoplay=1&loop=1&autopause=0&muted=1&playsinline=0"   allow="autoplay" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <?php }elseif( $video_type['value'] == "vimeo"){ 
                        $vimeo_id = get_sub_field('vimeo_id') ?>       
                        <iframe src="https://player.vimeo.com/video/<?php echo $vimeo_id;?>?autoplay=1&muted=1" width="1920" height="1080" frameborder=“0”  allow=fullscreen allow=autoplay uk-video uk-responsive></iframe>
                           
                    <?php } ?>     
                </div>
            </div> 
        </section>
<?php              
            endwhile;
        endif; ?>

