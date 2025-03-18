<?php 
if (have_rows('back_forth_simple_medium')) :          
    while (have_rows('back_forth_simple_medium')) : the_row();
    
    $section_id = get_sub_field('section_id');
    $bg_color_section = get_sub_field('bg_color');
    $image_position = get_sub_field('media_position');
    $media_type = get_sub_field('media_type');       
    $image = get_sub_field('image');
    $videomp4 = get_sub_field('video_mp4');  
    $video_ogg = get_sub_field('video_OGG'); 
    $video_webm = get_sub_field('video_webm'); 
    $headline = get_sub_field('heading');            
    $description = get_sub_field('description');
    $form_shortcode = get_sub_field('form_shortcode');    
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $reverse_mobile = get_sub_field('reverse_mobile'); 
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
 <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-back-forth-full md <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
            <div class="container-fluid w-100 pe-lg-0 ps-lg-0">
            <div class="row middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } }else{ echo ' normal'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } } ?>">      
            <div class="col-img col-xs-12 col-lg-6 mb-lg-0 mt-lg-0 pe-lg-0 ps-lg-0">
                    <div class="media-back-forth wow <?php echo ($image_position['value'] == "right") ? ' fadeInRight' : ' fadeInLeft'; ?>" data-wow-duration="0.8s" data-wow-delay="0.2s">
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
                    <div class="col-xs-12 col-lg-6 <?php echo ($image_position['value'] == "right") ? 'pe-lg-6 ps-contain' : 'ps-lg-6 pe-contain'; ?>">   
                         <div class="col-content w-100 h-100">
                         <?php if ($headline) : ?>
                            <h2 class="cl-white m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 m-b30 cl-white wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?> 
                        <?php if (have_rows('button_list')) {   ?>
                                <div class="button-list center-xs start-lg">
                                    <?php while (have_rows('button_list')) {
                                    the_row(); ?>
                                    <?php $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color');
                                        if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                                    
                                        <a tabindex="0" class="btn <?php echo $button_color;?> hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                             
                                        <?php endif; ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>   
                            <?php if(get_sub_field('add_form')): ?>
                                <?php if($form_shortcode): ?>
                                    <div class="gravity-form gravity-join wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $form_shortcode;?></div>
                                <?php endif; ?> 
                            <?php endif; ?> 
                         </div>     
                     </div>
                </div>
            </div>            
        </section>
<?php              
    endwhile;
endif; ?>