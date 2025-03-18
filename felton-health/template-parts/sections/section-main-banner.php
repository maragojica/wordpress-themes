<?php
if (have_rows('main_banner')) {
    while (have_rows('main_banner')) {
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
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="page-main-banner flex w-margin <?php if($margin_size): echo $margin_size['value']; endif; ?> <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($banner_type['value'] == "image" && !empty($banner_image)): ?>style="background: url(<?php echo esc_url($banner_image['url']); ?>)"<?php endif; ?>>            
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
                    <div class="row middle-xs center-xs">
                        <div class="col-xs-12 col-lg-9 col-xl-8 text-center">                        
                            <?php if ($headline) : ?>
                                <h1 class="cl-white text-uppercase mt-0 mb-0 pb-17px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h1>
                            <?php endif; ?>
                            <?php if ($subheadline) : ?>
                                    <div class="subheadline cl-white pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                                <?php endif; ?>   
                            <?php if ($description) : ?>
                                <div class="dp-1 cl-white wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.6s"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?>  
                            <?php if (have_rows('button_list')) {  ?> 
                                <div class="button-list-info center-xs m-t1 m-lg-t2 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">  
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
            </div>          
    </section>         
<?php }
} ?>