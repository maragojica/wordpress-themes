<?php   $graphic_process_desktop = get_field('graphic_process_desktop');
        $graphic_process_mobile = get_field('graphic_process_mobile');   
if ( !empty($graphic_process_desktop) || !empty($graphic_process_mobile )) : ?>
<section class="section-graphic-process wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
<div class="container">
    <div class="row content-center center-xs">     
        <div class="col-xs-12">
        <?php if ( !empty($graphic_process_desktop)) : 
            $srcset = wp_get_attachment_image_srcset($graphic_process_desktop['ID']);
            $sizes = wp_get_attachment_image_sizes($graphic_process_desktop['ID'], 'full'); ?>                
            <img class="img-fluid process-desktop hide-lg" src="<?php echo esc_url($graphic_process_desktop['url']); ?>" alt="<?php echo esc_attr($graphic_process_desktop['alt']); ?>" height="978" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
        <?php endif; ?> 
        <?php if ( !empty($graphic_process_mobile)) : 
            $srcset = wp_get_attachment_image_srcset($graphic_process_mobile['ID']);
            $sizes = wp_get_attachment_image_sizes($graphic_process_mobile['ID'], 'full'); ?>                
            <img class="img-fluid process-mobile show-lg" src="<?php echo esc_url($graphic_process_mobile['url']); ?>" alt="<?php echo esc_attr($graphic_process_mobile['alt']); ?>" height="7111" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
        <?php endif; ?> 
        </div>
    </div>
</div>            
</section>
<?php endif; ?>
