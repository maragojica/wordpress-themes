<?php 
if (have_rows('services_list')) :          
    while (have_rows('services_list')) : the_row();
    $section_id = get_sub_field('section_id');
$heading = get_sub_field('headline');  
$image = get_sub_field('image');
$cta = get_sub_field('button_cta');
$services_list = get_sub_field('select_services');
$margin_top_desktop = get_sub_field('margin_top_desktop'); 
$margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
$margin_top_mobile = get_sub_field('margin_top_mobile'); 
$margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); 
if( $services_list ): $animation_delay = 0.5; ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-services w-margin p-t0 p-b0 <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>">
         <div class="container-fluid pe-0 ps-0">        
            <div class="row middle-xs justify-center m-e0 m-s0"> 
                <?php if( $services_list ):
                    foreach( $services_list as $service ):  
                        $title = get_the_title( $service->ID );                                               
                        $duration = $animation_delay . 's'; ?>
                        <div class="col-xs-12 col-lg-6 col-xl-3 pe-0 ps-0 col-service wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                            <div class="box-service">
                                <?php echo get_the_post_thumbnail( $service->ID, 'full', array( 'class'  => 'service-img w-100 h-100 fit-cover-center' ) ); ?>
                                <div class="overlay overlay-serv">                               
                                <div class="header-services">
                                   <div class="line-services"></div> 
                                  <h3 class="cl-white text-uppercase m-t0 m-b0"><?php echo $title;?></h3>  
                                  <div class="m-t1 box-link-service">    
                                  <a class="btn btn-cinder-rose hover-slide-right" tabindex="0"  href="<?php echo esc_url( get_permalink($service->ID) ); ?>" aria-label="<?php echo esc_html( $title ); ?>" title="<?php echo esc_html( $title ); ?>">  
                                    <span>Learn More</span>
                                  </a>  
                                  </div>  
                                    </div> 
                                                         
                                 </div>
                            </div>                         
                        </div>
                            <?php $animation_delay += 0.25; endforeach; 
                  endif; ?> 
                  <?php if( !empty($image)): ?>
                    <div class="col-xs-12 col-lg-6 col-xl-3 pe-0 ps-0 col-service wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                        <div class="box-service">
                        <?php $srcset = wp_get_attachment_image_srcset($image['ID']);
                            $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                            <img class="service-img w-100 h-100 fit-cover-center" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="590" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                            <div class="overlay overlay-serv">                                
                                <div class="header-services">
                                <div class="line-services"></div> 
                                <?php if($heading): ?>
                                    <h3 class="cl-white text-uppercase m-t0 m-b0"><?php echo $heading;?></h3>   
                                <?php endif; ?> 
                                <?php if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>  
                                   <div class="m-t2 mt-lg-1 box-link-service">                          
                                     <a tabindex="0" class="btn btn-cinder-rose hover-slide-right" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span><?php echo esc_html( $link_title ); ?></span></a>                            
                                   </div>
                                     <?php endif; ?> 
                                </div>
                                                         
                                </div>
                        </div>
                    </div>
                   <?php endif; ?> 
            </div>                             
       </div>             
</section>
<?php endif; ?>
<?php              
    endwhile;
endif; ?>  