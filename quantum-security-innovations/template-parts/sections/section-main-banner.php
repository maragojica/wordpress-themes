<?php
if (have_rows('main_banner')) {
    while (have_rows('main_banner')) {
        the_row(); 
        $banner_type = get_sub_field('banner_type'); ?>
        <section class="page-main-hero bg-ligth flex p-0 m-0">
            <div class="container-fluid pe-0 w-100 ps-contain">
                <div class="row middle-xs">
                    <div class="col-xs-12 col-lg-5 col-xl-4 pe-lg-0">
                      <div class="box-info-banner flex col w-100 h-100 gap-05">
                      <?php $headline = get_sub_field('headline');
                        $subheadline = get_sub_field('subheadline');    
                        $description = get_sub_field('description');              
                        $cta = get_sub_field('cta_button'); ?>
                         <?php if($subheadline): ?>
                            <span class="subheading cl-green text-uppercase mt-0 m-0 animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo $subheadline; ?></span>
                        <?php endif; ?> 
                        <?php if($headline): ?>
                            <h1 class="cl-black text-uppercase mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="2.75s"><?php echo $headline; ?></h1>
                        <?php endif; ?>      
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-black animate__animated" data-animation="fadeBottom" data-duration="3s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                  
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper green animate__animated" data-animation="fadeBottom" data-duration="3.75s">
                                    <a tabindex="0" class="button cl-green cl-white-h bg-green-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>
                      </div>
                    </div>
                    <div class="col-xs-12 col-lg-7 col-xl-8 ps-0">
                        <div class="media-banner relative shape-main-banner over-hide w-100 h-100 animate__animated" data-animation="fadeRight" data-duration="1s">
                        <?php if($banner_type['value'] == "image"){ $banner_image = get_sub_field('banner_image'); ?>
                            <?php if ( !empty($banner_image)) : 
                                $srcset = wp_get_attachment_image_srcset($banner_image['ID']);
                                $sizes = wp_get_attachment_image_sizes($banner_image['ID'], 'full'); ?>                
                                <img class="fit-cover-center w-100 h-100 parallax-image" src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" height="1080" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
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
