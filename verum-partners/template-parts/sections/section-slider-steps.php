<?php       
if (have_rows('slider_steps')) :          
    while (have_rows('slider_steps')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $section_bg_color = get_sub_field('section_bg_color');    
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');       
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>       
        <section <?php if($section_id): ?> id="<?php echo esc_attr($section_id); ?>" <?php endif; ?> class="section-info-text-wbg <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($section_bg_color): ?>style="background-color: <?php echo esc_attr($section_bg_color); ?>;"<?php endif; ?>>
      
        <?php       
        if (have_rows('slider')) :  ?>
         <div class="slides-steps owl-carousel owl-theme">        
           <?php $i = 1; $count = $i;
           while (have_rows('slider')) : the_row(); 
            $image_position = get_sub_field('media_position');
            $media_type = get_sub_field('media_type');
            $bg_media = get_sub_field('bg_media');
            $image = get_sub_field('image');
            $videomp4 = get_sub_field('video');  
            $heading = get_sub_field('heading');    
            $slider_heading = get_sub_field('slider_heading');     
            $description = get_sub_field('description');
            $cta = get_sub_field('button_cta'); 
            $reverse_mobile = get_sub_field('reverse_mobile'); 
            if($i < 10 ): $count = '0' . $i; endif;
                ?>
               <div class="slide" data-dot="">
                     <div class="container-fluid w-100 <?php echo ($image_position['value'] == "right") ? ' pe-lg-0 ps-contain' : ' ps-lg-0 pe-contain'; ?>">
                        <div class="row middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; }else{ echo ' normal'; } if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">     
                        <div class="col-img col-xs-12 col-lg-6 col-xxl-7 mb-lg-0 mt-lg-0 <?php echo ($reverse_mobile) ? 'm-t2' : 'm-b2'; ?>">
                            <div class="media-content sm-h wow fadeInUp" data-wow-duration="0.2s" data-wow-delay="0.2s" <?php if(!empty($bg_media)): ?>style="background-image: url(<?php echo esc_url($bg_media['url']); ?>);"<?php endif; ?>>
                                <?php if($slider_heading): ?>
                                    <div class="slide-indicator">
                                        <span><?php echo $slider_heading;?></span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="204" height="6" viewBox="0 0 204 6" fill="none">
                                            <path d="M0.613249 3L3.5 5.88675L6.38675 3L3.5 0.113249L0.613249 3ZM203.887 3L201 0.113249L198.113 3L201 5.88675L203.887 3ZM3.5 3.5H201V2.5H3.5V3.5Z" fill="#EAEADB"/>
                                        </svg>
                                        <span><?php echo $count;?></span>
                                    </div>
                                <?php endif; ?>    
                                <div class="media">
                                <?php if($media_type['value'] == "image"){ ?>
                                    <?php if ( !empty($image)) : 
                                            $srcset = wp_get_attachment_image_srcset($image['ID']);
                                            $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                        <img class="img-fluid w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="830" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                    <?php endif; ?>   
                                <?php }elseif($media_type['value'] == "video"){ 
                                        ?> 
                                    <video class="featured-video" autoplay loop muted playsinline style="pointer-events: none;">
                                        <?php if($videomp4): ?>
                                        <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                        <?php endif; ?>
                                    </video>                     
                                <?php } ?> 
                                </div>                      
                            </div> 
                        </div>               
                            <div class="col-info col-xs-12 col-lg-6 col-xxl-5 <?php echo ($image_position['value'] == "right") ? 'pe-sp' : 'ps-sp'; ?>">                      
                                <?php if ($heading) : ?>
                                    <h2 class="text-uppercase cl-green mt-0 mb-10px"><?php echo $heading; ?></h2>
                                <?php endif; ?>
                                <?php if ($description) : ?>
                                    <div class="dp-1 cl-off-black" ><?php echo wp_kses_post($description); ?></div>
                                <?php endif; ?>  
                                <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                                    <a tabindex="0" class="cta-button cl-orange cl-green-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                    <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                        <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                                    </svg> 
                                    <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                        <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                                    </svg>
                                    </a> 
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>            
              </div>
            <?php $i++; endwhile; ?>
            </section>     
           <?php endif; ?>     
       </section>             
<?php  endwhile;
endif; ?>

