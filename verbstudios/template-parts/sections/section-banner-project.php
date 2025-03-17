<?php
$project_location = get_field('project_location'); 
if (have_rows('internal_banner')) {
    while (have_rows('internal_banner')) {
    the_row(); 
    $section_id = get_sub_field('section_id'); 
    $bg_overlay = get_sub_field('bg_overlay');
    $banner_type = get_sub_field('banner_type'); 
    $video_type = get_sub_field('video_type'); 
    $vertical_video = get_sub_field('vertical_video'); 
    $banner_image = get_sub_field('banner_image');       
    $banner_video_mp4 = get_sub_field('banner_video_mp4');  
    $banner_video_ogg = get_sub_field('banner_video_ogg');    
    $banner_video_webm = get_sub_field('banner_video_webm');
    $headline = get_sub_field('headline');
    $subheadline = get_sub_field('subheadline');
    $description = get_sub_field('description');
    $margin_size = get_sub_field('margin_size'); 
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="page-internal-hero flex w-margin <?php if($margin_size): echo $margin_size['value']; endif; ?> <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($banner_type['value'] == "image" && !empty($banner_image)): ?>style="background: url(<?php echo esc_url($banner_image['url']); ?>)"<?php endif; ?>>            
        <?php if($banner_type['value'] == "video" && $video_type['value'] == "file"){  ?> 
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
            <?php }elseif($banner_type['value'] == "video" && $video_type['value'] == "youtube"){ $youtube_id = get_sub_field('banner_youtube_video'); ?>  
                <div class="video-bg-player youtube-desk <?php if($vertical_video): ?> hide-lg <?php endif; ?>" data-video="<?php echo $youtube_id;?>">
                    <div class="video-bg">
                        <div id="yt-player"></div>
                    </div>
                </div>
                <?php if($vertical_video): $youtube_id_mobile = get_sub_field('banner_youtube_video_mobile'); ?> 
                <div class="video-bg-player youtube-mv <?php if($youtube_id_mobile): ?> show-lg <?php endif; ?>" data-video="<?php echo $youtube_id_mobile;?>">
                    <div class="video-bg">
                        <div id="yt-player-mv"></div>
                    </div>
                </div>
                 <?php endif; ?>   
                <?php } ?>
            <div class="overlay flex middle-xs" <?php if( $bg_overlay ): ?> style="background-color: <?php echo $bg_overlay; ?>" <?php endif; ?>> 
                <div class="container">
                    <div class="row middle-xs">
                        <div class="col-xs-12 col-lg-9 col-xl-7">
                        <div class="box-banner text-lg-start text-center w-100 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.1s"> 
                                <?php if ($project_location) : ?>
                                    <div class="subheadline cl-white pb-10px text-uppercase  wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $project_location; ?></div>
                                <?php endif; ?> 
                                <?php if ($headline) : ?>
                                    <h1 class="cl-white mt-0 mb-10px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h1>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <div class="dp-2 cl-white wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                                <?php endif; ?>                                                    
                            </div>
                        </div>
                    </div>                                    
                </div>
            </div>
            <div class="banner-btn">
               <div class="container">
               <?php if (have_rows('button_list')) {  ?> 
                <div class="button-list-info wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                <?php while (have_rows('button_list')) { 
                    the_row(); $cta = get_sub_field('button_cta'); ?>
                <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                    ?>     
                        <div class="cta-btn">                               
                        <a tabindex="0" class="button white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                        </div>
                        <?php endif; ?>
                <?php } ?>
                </div>
                <?php } ?> 
               </div>
            </div>
    </section>         
<?php }
} ?>