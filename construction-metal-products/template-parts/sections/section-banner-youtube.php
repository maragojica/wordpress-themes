
<?php
if (have_rows('video_banner_youtube')) {
    while (have_rows('video_banner_youtube')) {
    the_row(); 
    $section_id = get_sub_field('section_id'); 
    $bg_overlay = get_sub_field('section_bg_color');         
    $youtube_id = get_sub_field('youtube_id');
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="video-bg-container flex w-margin <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?> wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.1s">            
        <div class="video-bg-player" data-video="<?php echo $youtube_id;?>">
            <div class="video-bg">
                <div id="yt-player"></div>
            </div>
        </div>
       <div class="video-bg-overlay overlay flex align-items-center" <?php if( $bg_overlay ): ?> style="background-color: <?php echo $bg_overlay; ?>" <?php endif; ?> ></div>
    </section>         
<?php }
} ?>