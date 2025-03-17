<?php 
if (have_rows('awards')) :          
    while (have_rows('awards')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_graphic  = get_sub_field('section_bg_image');    
    $bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('section_headline');  
    $subheading = get_sub_field('section_subheading'); 
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-awards p-t0 p-b0 w-margin <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
         <div class="container">        
            <div class="row"> 
                <?php if($headline ||  $subheading): ?>
                <div class="col-xs-12 col-lg-12 m-b2 mb-lg-3">   
                  <?php if ($subheading) : ?>
                        <div class="subheadline cl-orange text-uppercase m-b1 cl-orange wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheading; ?></div>
                    <?php endif; ?>                  
                    <?php if ($headline) : ?>
                        <h3 class="cl-white text-uppercase mt-0 mb-0 wow fadeInUp" data-wow-duration="0.8" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                    <?php endif; ?> 
                </div>
                <?php endif; ?>               
            </div>  
            <?php if (have_rows('awards_list')) { ?>
                    <div class="awards-slider owl-carousel owl-theme">
                        <?php while (have_rows('awards_list')) {
                            the_row();  
                            $headline = get_sub_field('heading'); 
                            $cta = get_sub_field('link');                        
                            $award_type = get_sub_field('award_type'); 
                            $logo = get_sub_field('Logo');    
                            $image = get_sub_field('image');                     
                            $video_type = get_sub_field('video_type');                   
                            $poster = get_sub_field('poster'); ?>
                            <div class="slide-award">                               
                                <div class="card-media">
                                <?php if($award_type['value'] == "image" && !empty($image)): ?>
                                        <?php if (!empty($image)): ?>                           
                                            <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                                            $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                            <img class="img-fluid w-100 h-100 fit-cover-center"  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="253" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                        <?php endif; ?> 
                                    <?php endif; ?>
                                    <?php if($award_type['value'] == "logo" && !empty($logo)): ?>
                                        <?php if (!empty($logo)): ?>                           
                                            <?php $srcset = wp_get_attachment_image_srcset($logo['ID']);
                                            $sizes = wp_get_attachment_image_sizes($logo['ID'], 'full'); ?>                
                                            <div class="box-logo-award bg-gray"><img class="img-fluid w-100 h-100 fit-contain-center"  src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="184" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/></div>                            
                                        <?php endif; ?> 
                                    <?php endif; ?>
                                    <?php if( $award_type['value'] == "video" ){ ?> 

                                        <?php if($video_type['value'] == "file"){ 

                                            $videomp4 = get_sub_field('video_mp4');  ?>   

                                            <video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>>  
                                                <?php if( $videomp4 ): ?>
                                                    <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                                <?php endif; ?>     
                                                Your browser does not support the video tag.
                                            </video>  

                                            <?php }elseif($video_type['value'] == "youtube"){ 

                                                $youtube_id = get_sub_field('youtube_id');  ?>   
                                                <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube_id;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>></div>
                                            
                                                <?php }elseif($video_type['value'] == "vimeo"){  
                                                    $vimeo_id = get_sub_field('vimeo_id'); ?>   
                                                    <div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo_id;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>></div>
                                            <?php } ?>              
                                        <?php } ?> 
                                </div>
                                <div class="card-footer">
                                    <?php if( $headline ): ?>
                                        <h4 class="cl-blue text-uppercase m-t0 m-b0 text-center">
                                        <?php if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                                                <a tabindex="0" class="cl-blue cl-orange-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">                            
                                            <?php endif; ?>
                                            <?php echo $headline;?>
                                            <?php if( $cta ): ?>
                                                </a>
                                            <?php endif; ?>
                                            
                                        </h4>
                                    <?php endif; ?>    
                                </div>                                                 
                            </div>
                        <?php } ?>                 
                    </div>   
                <?php } ?>                                           
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  