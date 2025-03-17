<?php
if (have_rows('main_banner')) {
    while (have_rows('main_banner')) {
    the_row(); 
    $section_id = get_sub_field('section_id');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="page-main-hero p-t0 p-b0 flex">            
        <?php if (have_rows('slider')) { ?>
            <div class="main-slider owl-carousel owl-theme">
                <?php while (have_rows('slider')) {
                    the_row();                         
                    $slider_type = get_sub_field('banner_type'); 
                    $slider_image = get_sub_field('banner_image'); 
                    $banner_video_mp4 = get_sub_field('banner_video_mp4');  
                    $banner_video_ogg = get_sub_field('banner_video_ogg');    
                    $banner_video_webm = get_sub_field('banner_video_webm');
                    $bg_overlay = get_sub_field('bg_overlay');
                    $headline = get_sub_field('headline'); 
                    $subheadline = get_sub_field('subheadline');  
                    $description = get_sub_field('description');?>
                    <div class="slide" <?php if($slider_type['value'] == "image" && !empty($slider_image)): ?>style="background: url(<?php echo esc_url($slider_image['url']); ?>)"<?php endif; ?>>
                         <?php if($slider_type['value'] == "video"){  ?> 
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
                                        <div class="col-xs-12 col-xl-10">
                                        <div class="box-banner text-center w-100 wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s">          
                                        <?php if ($subheadline) : ?>
                                                <div class="subheadline cl-white head-shadow pb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                                            <?php endif; ?>      
                                            <?php if ($headline) : ?>
                                                <h1 class="cl-white head-shadow mt-0 mb-20px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h1>
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
                    </div>
                    <?php } ?>  
            </div>
        <?php } ?>  
        <?php  $next_section_id = get_sub_field('next_section_id'); 
                if($next_section_id):
                ?>  
               <!-- <a class="link-next-section wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.6s" tab-index="0" href="<?php echo esc_url(home_url('/')); ?><?php echo $next_section_id; ?>" aria-label="Next Section" title="Next Section">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="141" viewBox="0 0 12 141" fill="none">
                <path d="M6 140.773L11.7735 135L6 129.227L0.226497 135L6 140.773ZM5 0V135H7V0H5Z" fill="white"/>
                </svg>
                </a> -->
            <?php endif; ?>
    </section>         
<?php }
} ?>