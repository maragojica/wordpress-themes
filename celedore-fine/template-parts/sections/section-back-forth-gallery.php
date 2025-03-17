<?php 
if (have_rows('back_forth_gallery')) :          
    while (have_rows('back_forth_gallery')) : the_row();
$section_id = get_sub_field('section_id'); 
$media_position = get_sub_field('gallery_position');
$headline = get_sub_field('heading');
$subheadline = get_sub_field('subheading'); 
$description = get_sub_field('description');
$cta = get_sub_field('button_cta'); 
$button_color = get_sub_field('button_color');
$padding_top_desktop = get_sub_field('padding_top_desktop'); 
$padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
$reverse_mobile = get_sub_field('reverse_mobile'); 
$padding_top_mobile = get_sub_field('padding_top_mobile'); 
$padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-back-forth-gallery <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
    <div class="container">
       <div class="row middle-xs <?php if($media_position['value'] == "right"){ echo ' reverse'; }else{ echo ' normal'; } if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">        
            <div class="col-xs-12 col-lg-6 mb-lg-0 mt-lg-0 <?php echo ($reverse_mobile) ? 'm-t2' : 'm-b2'; ?>">
            <div class="grid-wrapper wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.2s">
            <?php  if (have_rows('gallery_img')) : 
                while (have_rows('gallery_img')) : the_row(); 
                $galimage = get_sub_field('image'); 
                $galpattern = get_sub_field('pattern');
                $srcset = wp_get_attachment_image_srcset($galimage['ID']);
                $sizes = wp_get_attachment_image_sizes($galimage['ID'], 'full'); ?>
                <div class="<?php echo $galpattern['value']; ?>">		
                    <a class="w-100 h-100" tab-index="0" href="<?php echo esc_url($galimage['url']); ?>" data-fancybox="gallery" data-caption="<?php echo esc_attr($galimage['alt']); ?>" aria-label="<?php echo esc_attr($galimage['alt']); ?>" title="<?php echo esc_attr($galimage['alt']); ?>">
                        <img src="<?php echo esc_url($galimage['url']); ?>" alt="<?php echo esc_attr($galimage['alt']); ?>" height="430" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>
                    </a>
                </div>           	
            <?php  endwhile; endif; ?>
             </div>
            </div>  
            <div class="col-xs-12 col-lg-6 <?php echo ($media_position['value'] == "right") ? 'pe-lg-3' : 'ps-lg-3'; ?>">                      
                <?php if ($subheadline) : ?>
                        <div class="subheadline text-uppercase m-b1 cl-slate wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>
                    <?php if ($headline) : ?>
                        <h2 class="cl-slate m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 m-b30 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?>  
                    <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            
                        <a tabindex="0" class="m-t2 btn <?php echo $button_color;?> hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                            
                <?php endif; ?>
             </div>
            
        </div>    
        
    </div>
</section>
<?php              
    endwhile;
endif; ?>

