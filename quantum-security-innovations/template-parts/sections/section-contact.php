<?php
if (have_rows('contact')) {
    while (have_rows('contact')) {
        the_row(); 
        $media_type = get_sub_field('media_type'); ?>
        <section class="section-contact bg-green flex p-0 m-0">
            <div class="container-fluid pe-0 w-100 pe-contain">
                <div class="row middle-xs">                   
                    <div class="col-xs-12 col-lg-7 ps-0">
                        <div class="media-banner relative shape-contact over-hide w-100 h-100">
                        <?php if($media_type['value'] == "image"){ $banner_image = get_sub_field('image'); ?>
                            <?php if ( !empty($banner_image)) : 
                                $srcset = wp_get_attachment_image_srcset($banner_image['ID']);
                                $sizes = wp_get_attachment_image_sizes($banner_image['ID'], 'full'); ?>                
                                <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($banner_image['url']); ?>" alt="<?php echo esc_attr($banner_image['alt']); ?>" height="1080" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <?php endif; ?>  
                        <?php }elseif($media_type['value'] == "video"){ 
                            $videomp4 = get_sub_field('video'); ?> 
                            <video class="bg-video" autoplay loop muted playsinline style="pointer-events: none;">
                                <?php if($videomp4): ?>
                                <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                <?php endif; ?>
                            </video>                     
                        <?php } ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-5 pe-lg-0 col-contact">
                      <div class="box-info-contact flex col w-100 h-100 gap-05">
                      <?php $headline = get_sub_field('headline');
                        $subheadline = get_sub_field('subheadline');    
                        $description = get_sub_field('description');              
                        $cta = get_sub_field('cta_button'); ?>
                         <?php if($subheadline): ?>
                            <span class="subheading cl-white text-uppercase mt-0 m-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheadline; ?></span>
                        <?php endif; ?> 
                        <?php if($headline): ?>
                            <h2 class="contact-headline cl-white text-uppercase mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $headline; ?></h1>
                        <?php endif; ?>      
                        <?php if ($description) : ?>
                            <div class="dp-1 dp-2 cl-white animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>                  
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper white animate__animated" data-animation="fadeBottom" data-duration="2.75s">
                                <a tabindex="0" class="button cl-white cl-green-h bg-white-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>
                      </div>
                    </div>
                </div>
            </div>         
        </section>           
<?php }
} ?>
