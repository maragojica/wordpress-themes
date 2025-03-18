<?php
if (have_rows('banner')) {
    while (have_rows('banner')) {
        the_row(); ?>

        <section class="section-banner bg-blue mb-0 p-0" id="contact">
        <div class="banner-container w-100">
            <div class="row flex center-xs middle-xs">
                <?php 
                $heading = get_sub_field('heading');
                $description = get_sub_field('description');                
                $image = get_sub_field('image');
                ?> 
                <div class="banner-wrapper ps-contain w-100 flex row">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-6 w-100 h-100 banner-text pe-lg-5">
                        <div class="text-inner">
                        <?php if($heading): ?>
                            <h2 class="cl-white mt-0 mb-25 animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading;?></h2>
                        <?php endif; ?> 
                        <?php if($description): ?>
                            <div class="dp-2 m-b1-5 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s">
                                <?php echo $description; ?>
                            </div>
                        <?php endif; ?> 
                       <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list">  
                       <?php while (have_rows('button_list')) { 
                           the_row(); $cta = get_sub_field('cta_button'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>                                    
                                <a class="animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.5s" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <button class="button cta-btn bg-white cl-blue bg-dark-h cl-white-h"><?php echo esc_html( $link_title ); ?></button> 
                                </a> 
                        <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>
                        </div>
                    </div> 

                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6 w-100 h-100 banner-media">
                        <?php if ($image): ?>
                            <div class="banner-image w-100 h-100 animate__animated" data-animation="fadeRight" data-duration="3s">
                            <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                                    $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                    <img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="612" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            </div>
                        <?php endif; ?>
                    </div>       
                </div>                 
            </div> 
        </div>
        </section>           
<?php }
} ?>
