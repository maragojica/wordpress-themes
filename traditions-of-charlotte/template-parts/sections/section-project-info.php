<?php 
if (have_rows('project_info')) :          
    while (have_rows('project_info')) : the_row();
    
    $section_id = get_sub_field('section_id');  
    $headline = get_sub_field('heading');            
    $description = get_sub_field('description'); 
    $gallery = get_sub_field('project_slider');   
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $reverse_mobile = get_sub_field('reverse_mobile'); 
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
     <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-project-info <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" >
            <div class="container w-100">
            <div class="row middle-xs">      
            <div class="col-xs-12 col-lg-5 pe-lg-3">
                <?php if ($headline) : ?>
                    <h2 class="cl-forest-green m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 m-b30 cl-forest-green wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
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
                  </div>               
                   <div class="col-xs-12 col-lg-7 col-gallery">   
                   <?php if($gallery): ?>
                    <div class="slide-products wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">             
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
                            <div class="uk-position-relative">
                                <div class="uk-slider-container uk-light">
                                    <div id="info-slide" class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m" uk-switcher="connect: #content-slide; animation: uk-animation-fade">
                                    <?php foreach( $gallery as $image ): 
                                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                                        <div>
                                           <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="90" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                                     
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="uk-hidden@s uk-light">
                                    <a class="uk-position-center-left uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                                    <a class="uk-position-center-right uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                                </div>

                                <div class="uk-visible@s">
                                    <a class="uk-position-center-left-out uk-position-small" href uk-slidenav-previous uk-slider-item="previous"></a>
                                    <a class="uk-position-center-right-out uk-position-small" href uk-slidenav-next uk-slider-item="next"></a>
                                </div>
                            </div>
                           
                        </div>
                        <div id="content-slide" class="uk-switcher" uk-lightbox="animation: fade">
                            <?php foreach( $gallery as $image ): 
                                $srcset = wp_get_attachment_image_srcset($image['ID']);
                                $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>
                            <div> 
                                <a class="uk-inline" href="<?php echo esc_url($image['url']); ?>" >
                                    <img src="<?php echo esc_url($image['url']); ?>" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" height="392" alt="<?php echo esc_attr($image['alt']); ?>"> 
                                </a>
                            </div>
                            <?php endforeach; ?>                           
                        </div>
                    </div>   
                  <?php endif; ?> 
                 </div>
                </div>
            </div>            
        </section>
<?php              
    endwhile;
endif; ?>