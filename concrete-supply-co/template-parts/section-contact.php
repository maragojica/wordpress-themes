<?php

if (have_rows('contact')) :

    // Loop through the rows of data
    while (have_rows('contact')) : the_row();      

                // Fetch the sub-fields
                $media_position = get_sub_field('media_position');
                $media_type = get_sub_field('media_type');
                $image  = get_sub_field('image');
                $videomp4 = get_sub_field('video');
                $heading = get_sub_field('heading');
                $subheading  = get_sub_field('subheading');
                $description = get_sub_field('description'); 
                $cta = get_sub_field('button_cta');  ?>
                <section class="section-contact position-relative">
                    <div class="container">
                        <div class="row middle-xs row-0 <?php echo ($media_position['value'] == "right") ? 'justify-end-lg' : 'justify-start-lg'; ?>">                       
                            <div class="col-xs-12 col-lg-9 col-0">
                                 <div class="box-media animate__animated" data-animation="<?php echo ($media_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>" data-duration="2s">
                                 <?php if($media_type['value'] == "image"){ ?>
                                    <?php if ( !empty($image)) : 
                                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                        <img class="fit-cover-center w-100 h-100 parallax-image" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="648" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />                            
                                    <?php endif; ?>   
                                <?php }elseif($media_type['value'] == "video"){ 
                                     ?> 
                                    <video id="background-video" autoplay loop muted>
                                        <?php if($videomp4): ?>
                                        <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                        <?php endif; ?>
                                    </video>                     
                                <?php } ?>                                    
                                 </div>                            
                            </div>                                                   
                        </div>
                    </div>                        
                    <div class="overlay overlay-contact flex middle-xs">
                        <div class="container">
                            <div class="row row-0 <?php echo ($media_position['value'] == "right") ? 'justify-start-lg' : 'justify-end-lg'; ?>">
                                <div class="col-xs-12 col-lg-7 col-xl-6 col-0">
                                    <div class="box-info bg-lightgray animate__animated" data-animation="<?php echo ($media_position['value'] == "right") ? 'fadeLeft' : 'fadeRight';?>" data-duration="1s">
                                    <?php if ($subheading) : ?>
                                        <span class="section-subtitle text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="2.75s"><?php echo esc_html($subheading); ?></span>
                                    <?php endif; ?>
                                    <?php if ($heading) : ?>
                                        <h2 class="section-title text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="3s"><?php echo esc_html($heading); ?></h2>
                                    <?php endif; ?>
                                    <?php if ($description) : ?>
                                        <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="3.75s"><?php echo wp_kses_post($description); ?></div>
                                    <?php endif; ?>
                                    <?php if( $cta ):
                                        $link_url = $cta['url'];
                                        $link_title = $cta['title'];
                                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                        <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="4.5s">
                                            <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                                        </div>
                                    <?php endif; ?>                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                </section>
            <?php
    endwhile;
endif;
?>