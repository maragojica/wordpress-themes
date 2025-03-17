<?php

if (have_rows('contact')) :

    // Loop through the rows of data
    while (have_rows('contact')) : the_row();      

                // Fetch the sub-fields
                $section_id = get_sub_field('section_id');  
                $show_contact = get_sub_field('show_contact');
                $media_position = get_sub_field('media_position');
                $media_type = get_sub_field('media_type');
                $image  = get_sub_field('image');
                $banner_video_mp4 = get_sub_field('video_mp4');  
                $banner_video_ogg = get_sub_field('video_OGG');    
                $banner_video_webm = get_sub_field('video_webm');    
                $headline = get_sub_field('headline');
                $subheadline = get_sub_field('subheadline');
                $description = get_sub_field('description');      
                $margin_top_desktop = get_sub_field('margin_top_desktop'); 
                $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
                $margin_top_mobile = get_sub_field('margin_top_mobile'); 
                $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');           
                if($show_contact): ?>
                <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-contact position-relative w-margin <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>">
                    <div class="container">
                        <div class="row w-100 middle-xs row-0 <?php echo ($media_position['value'] == "right") ? 'justify-end-lg' : 'justify-start-lg'; ?>">                       
                            <div class="col-xs-12 col-lg-9 col-0">
                                 <div class="box-media wow <?php echo ($media_position['value'] == "right") ? 'fadeInRight' : 'fadeInLeft';?>" data-wow-duration="0.3s" data-wow-delay="0.1s">
                                 <?php if($media_type['value'] == "image"){ ?>
                                    <?php if ( !empty($image)) : 
                                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                        <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="648" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />                            
                                    <?php endif; ?>   
                                <?php }elseif($media_type['value'] == "video"){ 
                                     ?> 
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
                                 </div>                            
                            </div>                                                   
                        </div>
                    </div>                        
                    <div class="overlay overlay-contact flex middle-xs">
                        <div class="container">
                            <div class="row w-100 row-0 <?php echo ($media_position['value'] == "right") ? 'justify-start-lg' : 'justify-end-lg'; ?>">
                                <div class="col-xs-12 col-lg-7 col-xl-6 col-0">
                                    <div class="box-info bg-white wow <?php echo ($media_position['value'] == "right") ? 'fadeInLeft' : 'fadeInRight';?>" data-wow-duration="0.3s" data-wow-delay="0.1s">
                                    <?php if ($subheadline) : ?>
                                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                                    <?php endif; ?>      
                                    <?php if ($headline) : ?>
                                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $description; ?></div>
                                    <?php endif; ?> 
                                    <?php if (have_rows('buttons_list')) {  ?> 
                                        <div class="button-list-info start-xs mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                                        <?php while (have_rows('buttons_list')) { 
                                            the_row(); $cta = get_sub_field('cta_button'); ?>
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
                <?php endif; ?>
            <?php
    endwhile;
endif;
?>