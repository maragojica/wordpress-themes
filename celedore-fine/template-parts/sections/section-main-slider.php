<?php if ( have_rows( 'main_slider' ) ): ?>
    <?php while( have_rows('main_slider') ): the_row();
    // Get sub field values.    
    $section_id = get_sub_field('section_id'); 
    $total = count(get_sub_field('slider'));  
    $count = $total;
    if($total < 10): $total = "0".$total; endif     
    ?>  
    <section class="section-main-slider p-t0 p-b0" <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?>>       
            <?php if ( have_rows( 'slider' ) ):  ?>
            <div class="main-slider owl-carousel owl-theme">
            <?php while( have_rows('slider') ): the_row(); 
            $slider_type = get_sub_field('slider_type');
            $slider_image = get_sub_field('slider_image');
            $slider_video = get_sub_field('slider_video');   
            $headline = get_sub_field('headline');  
            $subheadline = get_sub_field('subheadline');
            $cta = get_sub_field('button_cta');
            $description = get_sub_field('description'); ?>
                <div class="main-slide">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6">
                            <div class="media-slider">
                            <?php if($slider_type['value'] == "image"){ ?>
                                <?php if ( !empty($slider_image)) : 
                                        $srcset = wp_get_attachment_image_srcset($slider_image['ID']);
                                        $sizes = wp_get_attachment_image_sizes($slider_image['ID'], 'full'); ?>                
                                    <img class="fit-cover-center img-fluid w-100 h-100 img-main-slide" src="<?php echo esc_url($slider_image['url']); ?>" alt="<?php echo esc_attr($slider_image['alt']); ?>" height="1080" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                <?php endif; ?>   
                                <?php }elseif($slider_type['value'] == "video"){ 
                                        ?> 
                                    <video class="featured-video" autoplay loop muted playsinline style="pointer-events: none;">
                                        <?php if($slider_video): ?>
                                        <source src="<?php echo $slider_video['url']; ?>" type="video/mp4">
                                        <?php endif; ?>
                                    </video>                     
                                <?php } ?> 
                                <div class="overlay overlay-bg1"></div>                                          
                            </div> 
                        </div>
                        <div class="col-xs-12 col-lg-6 mt-lg-0 m-t3">
                            <div class="box-slider w-100 h-100">
                            <?php if ($subheadline) : ?>
                                <div class="subheadline text-uppercase m-b1 cl-slate wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                            <?php endif; ?>
                            <?php if ($headline) : ?>
                                <h2 class="cl-slate m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="dp-2 m-b30 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?>  
                            <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                             <a tabindex="0" class="btn btn-cinder-rose hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                            
                        <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endwhile; ?>
            </div>
            <style>
                .list-slider::after{
                    content: '<?php echo $total;?>';
                }
                @media (max-width: 991.98px) { 
                    .main-slider .owl-dots .owl-dot{
                        width: calc(100% / <?php echo $count;?>)
                    }
                }
            </style>
            <?php endif; ?>  
             
    </section>
       <?php endwhile; ?>
    <?php endif; ?>