<?php 
if (have_rows('general_services')) :          
    while (have_rows('general_services')) : the_row();
if (have_rows('section_list')) :          
    while (have_rows('section_list')) : the_row();
    $section_id = get_sub_field('section_id');
    $heading = get_sub_field('heading');
    $subheading = get_sub_field('subheading');
    $description = get_sub_field('description');          
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-list <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container">     
        <div class="row justify-center"> 
            <?php if($heading ||  $subheading): ?>
                <div class="col-xs-12 col-lg-8 col-xl-8 text-center">
                <?php if ($subheading) : ?>
                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheading; ?></div>
                    <?php endif; ?>      
                    <?php if ($heading) : ?>
                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $heading; ?></h2>
                    <?php endif; ?>  
                </div>
                <?php endif; ?>  
                <?php if($description): ?>
                <div class="col-xs-12 col-lg-8 col-xl-6 text-center">                    
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?> 
                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info justify-center mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); $cta = get_sub_field('button_cta'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>     
                                <div class="cta-btn">                               
                                <a tabindex="0" class="button blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                </div>
                                <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>  
                </div>
                <?php endif; ?>               
          </div>  
         
            <?php 
            if (have_rows('boxes_list')):  ?>
            <div class="info-list-row row text-center justify-center wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s">
             <?php  while (have_rows('boxes_list')): the_row();                
                $title = get_sub_field('title'); 
                $image = get_sub_field('image');
                $cta = get_sub_field('cta');  ?>
                <div class="col-xs-12 col-md-6 col-lg-4 m-t2 wow fadeInUp" >
                      <div class="box-resources middle-xs w-100 h-100"> 
                            <?php if ($title) : ?>
                                <div class="box-header-resources">
                                    <?php if ( !empty($image) ) : 
                                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                        <div class="box-img-resource m-b2"><img class="fit-contain-center w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="409" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>" /></div>                            
                                    <?php endif; ?> 
                                    <h3 class="cl-white text-uppercase m-t0 m-b0 text-center cl-navy"><?php echo wp_kses_post($title); ?></h3>
                                </div>
                            <?php endif; ?> 
                            <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self';  ?>                                
                            <div class="box-link-simple w-100 bg-navy">                               
                                <a tabindex="0" class="simple-link link-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                            </div>
                            <?php endif; ?>  
                    </div>                      
                </div>
            <?php endwhile; ?>
            </div> 
        <?php  endif;?>
                                    
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
<?php              
    endwhile;
endif; ?>  
