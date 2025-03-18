<?php 
$show_mansory = get_field('show_mansory');  
if( $show_mansory ):    
if (have_rows('mansory_work')) :          
    while (have_rows('mansory_work')) : the_row();
$section_id = get_sub_field('section_id'); 
$media_position = get_sub_field('gallery_position');
$headline = get_sub_field('heading');
$description = get_sub_field('description');
$padding_top_desktop = get_sub_field('padding_top_desktop'); 
$padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
$reverse_mobile = get_sub_field('reverse_mobile'); 
$padding_top_mobile = get_sub_field('padding_top_mobile'); 
$padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-mansory-work <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
    <div class="container">
        <div class="row justify-center">
                <div class="col-xs-12 col-lg-7 text-center">            
                    <?php if ($headline) : ?>
                        <h2 class="cl-sage text-center m-t0 m-b30 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 m-b30 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                   <?php endif; ?>                
                </div>
                <div class="col-xs-12 col-lg-12">
                <?php  if (have_rows('gallery_img')) : ?>
                <div class="mansory-wrapper">
                    <?php  while (have_rows('gallery_img')) : the_row(); 
                $galimage = get_sub_field('image'); 
                $galpattern = get_sub_field('pattern');
                $srcset = wp_get_attachment_image_srcset($galimage['ID']);
                $sizes = wp_get_attachment_image_sizes($galimage['ID'], 'full'); ?>
                    <div class="<?php echo $galpattern['value']; ?>">
                    <a class="w-100 h-100" tab-index="0" href="<?php echo esc_url($galimage['url']); ?>" data-fancybox="gallery" aria-label="<?php echo esc_attr($galimage['alt']); ?>" title="<?php echo esc_attr($galimage['alt']); ?>">
                        <img src="<?php echo esc_url($galimage['url']); ?>" alt="<?php echo esc_attr($galimage['alt']); ?>" height="430" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>
                    </a>
                    </div>
                    <?php  endwhile; ?>
                </div>    
                <?php endif; ?>                 
                </div>
                      
                  
                <?php if (have_rows('button_list')) {   ?>
                    <div class="col-xs-12 col-lg-7 text-center m-t4 m-b4">   
                            <div class="button-list center-xs">
                                <?php while (have_rows('button_list')) {
                                the_row(); ?>
                                <?php $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color');
                                    if( $cta ):
                                        $link_url = $cta['url'];
                                        $link_title = $cta['title'];
                                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                                    
                                    <a tabindex="0" class="simple-link link-mauve wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                             
                                    <?php endif; ?>
                                <?php } ?>
                            </div>
                            </div>
                        <?php } ?>  
               
            </div> 
    </div>
</section>
<?php              
    endwhile;
endif; 
endif; ?>