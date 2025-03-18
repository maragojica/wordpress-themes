<?php       
if (have_rows('back_forth_media_list')) :          
    while (have_rows('back_forth_media_list')) : the_row();
        $section_id = get_sub_field('section_id');
        $heading = get_sub_field('heading'); 
        $description = get_sub_field('description'); 
        $media_type = get_sub_field('media_type');
        $image_position = get_sub_field('media_position'); 
        $image = get_sub_field('image');
        $video_type = get_sub_field('video_type');        
        $poster = get_sub_field('video_poster');                    
        $cta = get_sub_field('button_cta'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $reverse_mobile = get_sub_field('reverse_mobile'); 
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-back-forth <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>"">
            <div class="container">              
                <div class="row row-back-forth middle-xs <?php if($image_position['value'] == "right"){ echo ' reverse'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } }else{ echo ' normal'; if($reverse_mobile){ echo ' columnr-reverse-mv'; } } ?>">     

                    <div class="col-xs-12 col-lg-6 mb-lg-0 mt-lg-0 col-img">

                        <div class="media-content animate__animated" data-animation="<?php echo ($image_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>" data-duration="2s">

                            <?php if( $media_type['value'] == "image" ){ ?>

                                <?php if ($image): ?>                           
                                    <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                    <img class="img-fluid w-100"  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="796" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                <?php endif; ?> 

                            <?php }elseif( $media_type['value'] == "video" ){ ?> 

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
                    </div>               
                    <div class="col-xs-12 col-lg-6 <?php echo ($image_position['value'] == "right") ? 'pe-lg-3' : 'ps-lg-3'; ?>">
                        <?php if($heading): ?>
                                <h2 class="mb-30 mt-0 cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s"><?php echo $heading; ?></h2>
                            <?php endif; ?> 
                            <?php if($description): ?>
                                <div class="dp-1 mt-0 cl-dark animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>  
                           <?php $accordeon = get_sub_field('accordeon');
								if ( have_rows( 'accordeon' ) ): $count = count($accordeon); ?>
                                <div class="accordeon-content m-t2  animate__animated fadeBottom" data-animation="fadeBottom" data-duration="3s">
                                <?php while( have_rows('accordeon') ): the_row(); 
                                    $title = get_sub_field('question'); 
                                    $text = get_sub_field('answers'); ?>
                                    <div class="box-accordeon">
                                        <?php if($title): ?>
                                            <button class="accordion cl-dark <?php if($count == 1): ?> active <?php endif;?>" title="Accordeon"><?php echo $title; ?></button>
                                        <?php endif; ?>
                                        <div class="panel" <?php if($count == 1): ?> style="max-height: max-content;" <?php endif;?>>
                                        <?php if ($text) : ?>
                                                <div class="dp-1 cl-dark"><?php echo wp_kses_post($text); ?></div>
                                            <?php endif; ?>   
                                        </div>
                                        </div> 
                                    <?php endwhile; ?>
                                  </div>
                                <?php endif; ?>   
                                <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                    <div class="m-t2"> 
                                        <a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="3.5s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                            <button class="button cta-btn bg-black cl-white bg-blue-h"><?php echo esc_html( $link_title ); ?></button> 
                                        </a> 
                                    </div>
                                <?php endif; ?>
                    </div>
                </div>               
            </div>            
        </section>
<?php endwhile;
endif; ?>

