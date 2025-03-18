<?php
if (have_rows('internal_banner')) {
    while (have_rows('internal_banner')) {
        the_row(); 
        $banner_type = get_sub_field('banner_type'); 
        $bg_graphic  = get_sub_field('bg_shape');
        $bg_color = get_sub_field('bg_color');?>
        <section class="page-internal-hero flex p-0 m-0 animate__animated" data-animation="fadeIn" data-duration="1s" <?php if($bg_color){ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
        <?php if(!empty(!empty($bg_graphic))): 
             $srcset = wp_get_attachment_image_srcset($bg_graphic['ID']);
             $sizes = wp_get_attachment_image_sizes($bg_graphic['ID'], 'full');  ?>
           <img class="hero-shape animate__animated" data-animation="fadeIn" data-duration="4.75s" src="<?php echo esc_url($bg_graphic['url']); ?>" alt="<?php echo esc_attr($bg_graphic['alt']); ?>" height="500" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" />        
        <?php endif; ?>           
            <div class="container-fluid pe-lg-0 w-100 ps-contain">
                <div class="row middle-xs">
                    <div class="col-xs-12 col-lg-5 col-xl-4 pe-lg-0">
                      <div class="box-info-banner flex col w-100 h-100 gap-05">
                      <?php $headline = get_sub_field('headline');
                        $subheadline = get_sub_field('subheadline');    
                        $description = get_sub_field('description');              
                        $cta = get_sub_field('cta_button'); ?>
                         <?php if($subheadline): ?>
                            <span class="subheading cl-white text-uppercase mt-0 m-0 animate__animated" data-animation="fadeBottom" data-duration="2.75s"><?php echo $subheadline; ?></span>
                        <?php endif; ?> 
                        <?php if($headline): ?>
                            <h1 class="cl-white text-uppercase mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="3s"><?php echo $headline; ?></h1>
                        <?php endif; ?>      
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-white animate__animated" data-animation="fadeBottom" data-duration="3.75s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                  
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper m-t1 white animate__animated" data-animation="fadeBottom" data-duration="4s">
                                <a tabindex="0" class="button cl-white cl-black-h bg-white-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-xs-12 col-lg-7 col-xl-8 pe-0 ps-0">
                        <div class="media-banner relative shape-main-banner over-hide w-100 h-100 animate__animated" data-animation="fadeRight" data-duration="12s">
                        <?php if($banner_type['value'] == "image"){ $banner_image = get_sub_field('banner_image'); ?>
                            <?php if ( !empty($banner_image)) : 
                                $srcset = wp_get_attachment_image_srcset($banner_image['ID']);
                                $sizes = wp_get_attachment_image_sizes($banner_image['ID'], 'full'); ?>                
                                <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" height="500" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>  
                        <?php }elseif($banner_type['value'] == "video"){ 
                            $videomp4 = get_sub_field('banner_video'); ?> 
                            <video class="bg-video" autoplay loop muted playsinline style="pointer-events: none;">
                                <?php if($videomp4): ?>
                                <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                <?php endif; ?>
                            </video>                     
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>         
        </section>           
<?php }
} ?>
