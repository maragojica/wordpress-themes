<?php 
if (have_rows('list_images')) :          
    while (have_rows('list_images')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('heading');  
    $description = get_sub_field('description');
    $gallery = get_sub_field('gallery');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-our-work <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
         <div class="container special-container">   
         <?php 
           $i = 1; if( $gallery ): $animation_delay = 1;  ?>
                <div class="row">                   
                    <?php foreach( $gallery as $image ): $duration = $animation_delay . 's'; ?>
                        <div class="col-xs-12 col-lg-4 <?php if($i > 1): ?> hide-tb <?php endif; ?>mb-2 wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                        <?php if(!empty($image)): 
                            $srcset = wp_get_attachment_image_srcset($image['ID']);
                            $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                            <div class="media-work"><img class="img-fluid w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="568" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/></div>                            
                        <?php endif; ?> 
                    </div>
                    <?php $animation_delay += 0.25; $i++; endforeach; ?>                   
                </div>
            <?php endif; ?>           
       </div>         
       <div class="container">
       <div class="row center-xs p-lg-t4">
                <div class="col-xs-12 col-lg-6 text-center">            
                    <?php if ($headline) : ?>
                        <h2 class="cl-white m-t0 m-b0 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 m-b30 cl-white wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?> 
                <?php if (have_rows('button_list')) {   ?>
                            <div class="button-list center-xs">
                                <?php while (have_rows('button_list')) {
                                the_row(); ?>
                                <?php $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color');
                                    if( $cta ):
                                        $link_url = $cta['url'];
                                        $link_title = $cta['title'];
                                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                                    
                                    <a tabindex="0" class="btn <?php echo $button_color;?> hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                             
                                    <?php endif; ?>
                                <?php } ?>
                            </div>
                        <?php } ?>  
                </div>
             </div>  
       </div>    
</section>

<?php              
    endwhile;
endif; ?>  