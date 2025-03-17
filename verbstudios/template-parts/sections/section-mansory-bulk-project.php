<?php 
$show_mansory = get_field('show_mansory');  
if( $show_mansory ):    
if (have_rows('masory_work')) :          
    while (have_rows('masory_work')) : the_row();
$section_id = get_sub_field('section_id'); 
$headline = get_sub_field('heading'); 
$subheadline = get_sub_field('subheading');        
$description = get_sub_field('description');  
$add_load_more = get_sub_field('add_load_more'); 
$padding_size = get_sub_field('padding_size'); 
$padding_top_desktop = get_sub_field('padding_top_desktop'); 
$padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
$reverse_mobile = get_sub_field('reverse_mobile'); 
$padding_top_mobile = get_sub_field('padding_top_mobile'); 
$padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-mansory-work <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
    <div class="container">
        <div class="row justify-center">
               <?php if ($subheadline || $headline) : ?>
                <div class="col-xs-12 col-lg-7 text-center p-b2">            
                <?php if ($subheadline) : ?>
                    <div class="subheadline cl-l-orange pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                <?php endif; ?>      
                <?php if ($headline) : ?>
                    <h2 class="cl-black mt-0 mb-10px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                <?php endif; ?>
                <?php if ($description) : ?>
                    <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                <?php endif; ?>               
                </div>
                <?php endif; ?> 
                <div class="col-xs-12 col-lg-12 wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.2s">
                <?php $gallery_bulk = get_sub_field('gallery_bulk');
                 if ($gallery_bulk) :                   
                    $pattern = array('tall', 'default', 'default', 'wide', 'default', 'default', 'default', 'tall', 'default', 'default', 'wide', 'default', 'default', 'default');
                    $counter = 0; ?>
                <div class="mansory-wrapper-bulk <?php if($add_load_more): ?> mansory-load-content-project <?php endif; ?>">
                    <?php  foreach( $gallery_bulk as $galimage ):             
                     $galpattern = $pattern[$counter % count($pattern)];   
                     $counter++;  ?>
                    <div class="<?php if($add_load_more): ?> mansory-load-item <?php endif; ?> <?php echo $galpattern; ?>">
                    <a class="w-100 h-100" tab-index="0" href="<?php echo esc_url($galimage['url']); ?>" data-fancybox="gallery" aria-label="<?php echo esc_attr($galimage['alt']); ?>" title="<?php echo esc_attr($galimage['alt']); ?>">
                        <img src="<?php echo esc_url($galimage['url']); ?>" alt="<?php echo esc_attr($galimage['alt']); ?>" />
                    </a>
                    </div>
                    <?php endforeach; ?>
                </div>    
                <?php endif; ?>                 
                </div>
                      
                <?php if(!$add_load_more): ?>  
                <?php if (have_rows('button_list')) {   ?>
                    <div class="col-xs-12 col-lg-7 text-center mt-lg-2">   
                    <div class="button-list-info center-xs mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>     
                                <div class="cta-btn">                               
                                <a tabindex="0" class="button <?php echo $button_color;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                </div>
                                <?php endif; ?>
                        <?php } ?>
                        </div>
                      </div>
                 <?php } ?>  
                <?php endif; ?>
            </div> 
    </div>
</section>
<?php              
    endwhile;
endif; 
endif; ?>