<?php
if (have_rows('media_banner_full')) {
    while (have_rows('media_banner_full')) {
    the_row(); 
    $section_id = get_sub_field('section_id'); 
    $bg_overlay = get_sub_field('section_bg_color');
    $headline = get_sub_field('heading'); 
    $subheadline = get_sub_field('subheading');        
    $description = get_sub_field('description');
    $banner_type = get_sub_field('video_type'); 
    $banner_image = get_sub_field('banner_image');       
    $banner_video_mp4 = get_sub_field('banner_video_mp4');  
    $banner_video_ogg = get_sub_field('banner_video_ogg');    
    $banner_video_webm = get_sub_field('banner_video_webm');    
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-banner-media flex w-margin <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?> wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.2s" <?php if($banner_type['value'] == "image" && !empty($banner_image)): ?>style="background: url(<?php echo esc_url($banner_image['url']); ?>)"<?php endif; ?>>            
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
            <div class="overlay flex align-items-center" <?php if( $bg_overlay ): ?> style="background-color: <?php echo $bg_overlay; ?>" <?php endif; ?>>
                <div class="container">
                        <div class="row justify-center middle-xs">
                            <div class="col-xs-12 col-lg-7 col-xl-6">
                            <div class="box-banner text-center w-100 wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s">          
                            <?php if ($subheadline) : ?>
                                    <div class="subheadline cl-white head-shadow pb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                                <?php endif; ?>      
                                <?php if ($headline) : ?>
                                    <h2 class="cl-white mt-0 mb-20px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <div class="dp-1 cl-white mb-25px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                                <?php endif; ?>   
                                <?php if (have_rows('button_list')) {  ?> 
                                    <div class="button-list-info justify-center wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">  
                                    <?php while (have_rows('button_list')) { 
                                        the_row(); $cta = get_sub_field('button_cta'); ?>
                                    <?php if( $cta ):
                                        $link_url = $cta['url'];
                                        $link_title = $cta['title'];
                                        $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                        ?>     
                                        <div class="cta-btn">                               
                                        <a tabindex="0" class="button blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                        </div>
                                        <?php endif; ?>
                                    <?php } ?>
                                    </div>
                                    <?php } ?>                                                                      
                            </div>
                            </div>    
                        </div>                                    
                    </div>  
            </div>
    </section>         
<?php }
} ?>