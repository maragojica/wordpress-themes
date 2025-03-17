<?php
if (have_rows('main_banner')) {
    while (have_rows('main_banner')) {
    the_row(); 
    $section_id = get_sub_field('section_id');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="page-main-hero p-t0 p-b0 flex">            
        <?php if (have_rows('slider')) { ?>
            <div class="main-slider owl-carousel owl-theme">
                <?php while (have_rows('slider')) {
                    the_row();                         
                    $slider_type = get_sub_field('banner_type'); 
                    $slider_image = get_sub_field('banner_image');    
                    $shape = get_sub_field('shape');                     
                    $bg_overlay = get_sub_field('bg_overlay');
                    $headline = get_sub_field('headline'); 
                    $suheadline = get_sub_field('subheadline'); 
                    $cta = get_sub_field('button_cta'); ?>
                    <div class="slide" <?php if($slider_type['value'] == "image" && !empty($slider_image)): ?>style="background: url(<?php echo esc_url($slider_image['url']); ?>)"<?php endif; ?>>
                         <?php if($slider_type['value'] == "video"){   $slider_video = get_sub_field('banner_video');  ?> 
                                <video class="featured-video" autoplay loop muted playsinline style="pointer-events: none;">
                                    <?php if($slider_video): ?>
                                    <source src="<?php echo $slider_video['url']; ?>" type="video/mp4">
                                    <?php endif; ?>
                                </video>                     
                            <?php } ?>                        
                            <div class="overlay flex align-items-center" <?php if( $bg_overlay ): ?> style="background-color: <?php echo $bg_overlay; ?>" <?php endif; ?>> 
                                <div class="container">
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-lg-6 col-xl-5">
                                        <div class="box-slider w-100 h-100">  
                                            <?php if ( !empty($shape)) :  ?>                
                                                    <img class="shape-slide" src="<?php echo esc_url($shape['url']); ?>" alt="<?php echo esc_attr($shape['alt']); ?>" width="208" height="22" />                            
                                                <?php endif; ?>                                                
                                                <?php if ($headline) : ?>
                                                    <h1 class="cl-white mt-0 text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h1>
                                                <?php endif; ?>
                                                <?php if ($suheadline) : ?>
                                                    <div class="dp-2 cl-white wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($suheadline); ?></div>
                                                <?php endif; ?>                                                 
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                                       <a tabindex="0" class="btn cta-btn cta-slider wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                                    <?php endif; ?>
                            </div>
                    </div>
                    <?php } ?>  
            </div>
        <?php } ?>  
    </section>         
<?php }
} ?>