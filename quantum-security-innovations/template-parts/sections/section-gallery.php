<?php $gallery_team = get_field('gallery_team'); 
$add_padding_top = get_field('add_padding_top_gallery'); 
$add_padding_bottom = get_field('add_padding_bottom_gallery');
$full_width = get_field('full_width_gallery');
$cover_gallery_image = get_field('cover_gallery_image');
if ( $gallery_team ) { 
    if($full_width){
    $pattern = array('25', '40', '20', '20', '20', '20', '20', '20', '40', '25');
    } else{
        $pattern = array('30', '50', '30', '50', '50');
    }
    $counter = 0; 
    $animation_delay = 1; 
    $duration = $animation_delay . 's'; ?>
    <section class="section-gallery<?php if( !$add_padding_top ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom ): ?> p-b0<?php endif; ?>">      
        <?php if(!($full_width)): ?>
            <div class="container">
        <?php endif; ?>        
            <div class="row-gall">
                 <?php foreach( $gallery_team as $gallery ): 
                    $srcset = wp_get_attachment_image_srcset($gallery['ID']);
                    $sizes = wp_get_attachment_image_sizes($gallery['ID'], 'full'); 
                    $class = 'gall-block-' . $pattern[$counter % count($pattern)]; ?>
                  <div class="gall column <?php echo $class; ?> ps-0 pe-0 animate__animated" data-animation="fadeIn" data-duration="<?php echo esc_attr($duration); ?>">
                     <div class="card-image ih-item square effect6 from_top_and_bottom">
                         <a tab-index="0" href="<?php echo esc_url($gallery['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_html($gallery['caption']); ?>" aria-label="<?php echo esc_attr($gallery['alt']); ?>" title="<?php echo esc_attr($gallery['alt']); ?>">
                            <div class="img"><img class="img-fluid w-100 <?php if($cover_gallery_image){ ?>fit-cover-center<?php }else{?> fit-contain-center <?php } ?>" src="<?php echo esc_url($gallery['url']); ?>" alt="<?php echo esc_attr($gallery['alt']); ?>" height="304" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"></div>                           
                         </a>                                            
                     </div>                    
                 </div>
                <?php $counter++; $animation_delay += 0.75; endforeach; ?>
            </div>      
        <?php if(!($full_width)): ?>
            </div>
        <?php endif; ?>    
    </section>
<?php } ?>    