<?php
if (have_rows('main_banner')) {
    while (have_rows('main_banner')) {
        the_row(); 
        $banner_type = get_sub_field('banner_type'); 
        $banner_image = get_sub_field('banner_image');
        $logo = get_sub_field('logo');
        $bg_overlay = get_sub_field('bg_overlay');
        $headline = get_sub_field('headline'); 
        $cta = get_sub_field('button_cta'); ?>
        <section class="page-main-hero p-t0 p-b0 flex" <?php if($bg_overlay && !empty($banner_image)){ ?>style="background: linear-gradient(<?php echo $bg_overlay;?>, <?php echo $bg_overlay;?>), url('<?php echo esc_url($banner_image['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_overlay;?>"<?php } ?>>            
            <?php if($banner_type['value'] == "video"){ 
                $videomp4 = get_sub_field('banner_video'); 
                $poster_video = get_sub_field('poster_video'); ?> 
                <video id="background-video" autoplay loop muted preload playsinline style="pointer-events: none;" <?php if( $poster_video ): ?> poster="<?php echo esc_url($poster_video['url']); ?>" <?php endif; ?>>
                    <?php if($videomp4): ?>
                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                    <?php endif; ?>
                </video>                     
            <?php } ?>
            <div class="overlay" <?php if( $bg_overlay ): ?> style="background-color: <?php echo $bg_overlay; ?>" <?php endif; ?>>               
                <div class="container h-100 flex flex-column center-xs center-xs text-center">
                    <div class="row">
                       <div class="col-xs-12">      
                       <?php if ( !empty($logo)) : 
                            $srcset = wp_get_attachment_image_srcset($logo['ID']);
                            $sizes = wp_get_attachment_image_sizes($logo['ID'], 'full'); ?>                
                            <img class="img-logo-banner img-fluid wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="211" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                        <?php endif; ?>                       
                           <?php if($headline): ?>
                                <h1 class="cl-white text-uppercase mt-0 mb-02 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headline; ?></h1>
                           <?php endif; ?>   
                           <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                             <a tabindex="0" class="cta-button cl-white cl-orange-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>
                             <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="white"/>
                            </svg> 
                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                            </svg>
                            </a>                            
                        <?php endif; ?>                        
                       </div>  
                    </div>        
                </div>                    
             </div>
             <?php  
                $next_section_id = get_sub_field('next_section_id'); 
                if(!empty($arrow ) && $next_section_id):
                ?>  
                <a class="link-next-section" tab-index="0" href="<?php echo esc_url(home_url('/')); ?><?php echo $next_section_id; ?>" aria-label="<?php echo esc_attr($arrow['alt']); ?>" title="<?php echo esc_attr($arrow['alt']); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="105" viewBox="0 0 10 105" fill="none">
                    <path d="M5 104.33L9.33013 100L5 95.6699L0.669873 100L5 104.33ZM4.25 0V100H5.75V0H4.25Z" fill="white"/>
                    </svg>
                </a> 
            <?php endif; ?>
            <?php  $next_section_id = get_sub_field('next_section_id'); 
                if($next_section_id):
                ?>  
                <a class="link-next-section" tab-index="0" href="<?php echo esc_url(home_url('/')); ?><?php echo $next_section_id; ?>" aria-label="Next Section" title="Next Section">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="105" viewBox="0 0 10 105" fill="none">
                <path d="M5 104.33L9.33013 100L5 95.6699L0.669873 100L5 104.33ZM4.25 0V100H5.75V0H4.25Z" fill="white"/>
                </svg>
                </a> 
            <?php endif; ?>
        </section>         
<?php }
} ?>