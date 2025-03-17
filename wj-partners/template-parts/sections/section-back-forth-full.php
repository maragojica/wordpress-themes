<?php       
if (have_rows('back_forth_full')) :          
    while (have_rows('back_forth_full')) : the_row();

        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $bg_color_section = get_sub_field('bg_color_section');
        $image_position = get_sub_field('media_position');
        $media_type = get_sub_field('media_type');       
        $image = get_sub_field('image');
        $videomp4 = get_sub_field('video_mp4');  
        $video_ogg = get_sub_field('video_OGG'); 
        $video_webm = get_sub_field('video_webm'); 
        $headline = get_sub_field('heading'); 
        $subheadline = get_sub_field('subheading');        
        $description = get_sub_field('description');  
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-back-forth-full <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
            <div class="container-fluid w-100 <?php echo ($image_position['value'] == "right") ? ' pe-lg-0 ps-contain' : ' ps-lg-0 pe-contain'; ?>">
            <div class="row middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } }else{ echo ' normal'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } } ?>">      
            <div class="col-img col-xs-12 col-lg-7 mb-lg-0 mt-lg-0 pe-lg-0 ps-lg-0">
                    <div class="media-content wow <?php echo ($image_position['value'] == "right") ? ' fadeInRight' : ' fadeInLeft'; ?>" data-wow-duration="0.8s" data-wow-delay="0.2s">
                           <?php if($media_type['value'] == "image"){ ?>
                            <?php if ( !empty($image)) : 
                                    $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); 
                                    $caption = esc_attr($image['caption']); ?>                
                                <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="850" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                <?php if($caption): ?>
                                    <div class="caption"><?php echo $caption;?></div>
                                 <?php endif; ?>   
                                <?php endif; ?>   
                        <?php }elseif($media_type['value'] == "video"){ 
                                ?> 
                            <video class="featured-video" autoplay loop muted playsinline style="pointer-events: none;">
                                <?php if($videomp4): ?>
                                <source src="<?php echo $videomp4; ?>" type="video/mp4">
                                <?php endif; ?>
                                <?php if($video_ogg): ?>
                                    <source src="<?php echo $video_ogg; ?>" type="video/ogg">
                                    <?php endif; ?>
                                    <?php if($video_webm): ?>
                                    <source src="<?php echo $video_webm; ?>" type="video/webm">
                                    <?php endif; ?>
                            </video>                     
                        <?php } ?>    
                                                                
                    </div> 
                  </div>               
                    <div class="col-info col-xs-12 col-lg-5 <?php echo ($image_position['value'] == "right") ? 'pe-xl-4' : 'ps-xl-4'; ?>">                      
                                <?php if ($subheadline) : ?>
                                        <div class="subheadline cl-slate-blue pb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                                    <?php endif; ?>      
                                    <?php if ($headline) : ?>
                                        <h2 class="cl-navy mt-0 mb-20px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                        <div class="dp-1 cl-navy wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                                    <?php endif; ?>   
                                    <?php $accordeon = get_sub_field('accordeon');
								if ( have_rows( 'accordeon' ) ): $count = count($accordeon); ?>
                                <div class="accordeon-content m-t2 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">
                                <?php while( have_rows('accordeon') ): the_row(); 
                                    $title = get_sub_field('question'); 
                                    $text = get_sub_field('answers'); ?>
                                    <div class="box-accordeon">
                                        <?php if($title): ?>
                                            <button class="accordion cl-dark <?php if($count == 1): ?> active <?php endif;?>" title="Accordeon"><?php echo $title; ?></button>
                                        <?php endif; ?>
                                        <div class="panel" <?php if($count == 1): ?> style="max-height: max-content;" <?php endif;?>>
                                        <?php if ($text) : ?>
                                                <div class="dp-1 cl-navy"><?php echo wp_kses_post($text); ?></div>
                                            <?php endif; ?>   
                                        </div>
                                        </div> 
                                    <?php endwhile; ?>
                                  </div>
                                <?php endif; ?>   
                                    <?php if (have_rows('button_list')) {  ?> 
                                        <div class="button-list-info m-t1 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">  
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
        </section>
<?php              
            endwhile;
        endif; ?>

