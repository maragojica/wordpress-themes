<?php   $image = get_field('info_image');    
if ( !empty($image)) :  ?>
    <section class="section-info-image p-t0">
        <div class="container">
            <div class="row center-xs">     
                <div class="col-xs-12 col-lg-8">                                  
                    <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                    <img class="img-fluid w-100 animate__animated" data-animation="fadeBottom" data-duration="1s"  src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="404" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                     
                </div> 
            </div>
        </div>            
    </section>
<?php endif; ?>        


