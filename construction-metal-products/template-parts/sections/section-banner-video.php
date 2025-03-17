<?php
if (have_rows('video_banner')) {
    while (have_rows('video_banner')) {
    the_row(); 
    $section_id = get_sub_field('section_id'); 
    $bg_overlay = get_sub_field('section_bg_color');
    $banner_type = get_sub_field('video_type'); 
    $banner_image = get_sub_field('banner_image');       
    $banner_video_mp4 = get_sub_field('banner_video_mp4');  
    $banner_video_ogg = get_sub_field('banner_video_ogg');    
    $banner_video_webm = get_sub_field('banner_video_webm');    
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-banner-video flex w-margin <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?> wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s" <?php if($banner_type['value'] == "image" && !empty($banner_image)): ?>style="background: url(<?php echo esc_url($banner_image['url']); ?>)"<?php endif; ?>>            
        <?php if($banner_type['value'] == "video"){  ?> 
                <video class="featured-video" autoplay loop muted playsinline style="pointer-events: none;">
                    <?php if($banner_video_mp4): ?>
                    <source src="<?php echo $banner_video_mp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                    <?php if($banner_video_ogg): ?>
                    <source src="<?php echo $banner_video_ogg['url']; ?>" type="video/ogg">
                    <?php endif; ?>
                    <?php if($banner_video_webm): ?>
                    <source src="<?php echo $banner_video_webm['url']; ?>" type="video/webm">
                    <?php endif; ?>
                </video>                     
            <?php } ?>    
            <div class="overlay flex align-items-center" <?php if( $bg_overlay ): ?> style="background-color: <?php echo $bg_overlay; ?>" <?php endif; ?>></div>
    </section>         
<?php }
} ?>