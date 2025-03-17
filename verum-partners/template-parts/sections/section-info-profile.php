<?php 
if (have_rows('info_profile_content')) :          
    while (have_rows('info_profile_content')) : the_row();  
        // Fetch the sub-fields      
        $section_id = get_sub_field('section_id');
        $heading = get_sub_field('heading'); 
        $description = get_sub_field('description'); 
        $cta = get_sub_field('button_cta'); 
        $maincta = get_sub_field('main_button_cta'); 
        $title_list_id = get_sub_field('title_sidebar'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?> 
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-blog <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
            <div class="container">
                <div class="row row-post justify-center"> 
                    <div class="col-xs-12 col-lg-8"> 
                       <?php if ($heading) : ?>
                            <h3 class="text-uppercase cl-green p-lg-t2 mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.1s"><?php echo $heading; ?></h3>
                        <?php endif; ?> 
                        <?php if($description): ?>
                        <div class="dp-1 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $description; ?></div>           
                        <?php endif; ?>        
                        <?php if( $maincta ):
                            $link_url = $maincta['url'];
                            $link_title = $maincta['title'];
                            $link_target = $maincta['target'] ? $maincta['target'] : '_self'; ?>     
                            <div class="m-t2 m-b1">                       
                               <a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>
                             <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                            </svg> 
                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                            </svg>
                            </a> 
                        </div>
                        <?php endif; ?>                            
                    </div>
                    <?php if (have_rows('list_sidebar')) :  ?>
                    <div class="col-xs-12 col-lg-4 m-b2 ps-lg-2 pt-lg-0 p-t3">
                        <div class="single-sidebar">
                        <?php if ($title_list_id) : ?>
                            <h3 class="text-uppercase cl-green mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $title_list_id; ?></h3>
                        <?php endif; ?>  
                        <?php   while (have_rows('list_sidebar')) : the_row(); 
                          $service = get_sub_field('service');   ?>                  
                          <div class="side-link">
                          <?php if( $service ):
                            $link_url = $service['url'];
                            $link_title = $service['title'];
                            $link_target = $service['target'] ? $service['target'] : '_self'; ?>     
                            <div class="m-t1 m-b1">                       
                               <a tabindex="0" class="cl-orange-h cl-green wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>                            
                            </a> 
                        </div>
                        <?php endif; ?>
                          </div>        
                          <?php              
                           endwhile; ?>     
                            <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>     
                            <div class="m-t3 m-b1">                       
                               <a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>
                             <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                            </svg> 
                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                            </svg>
                            </a> 
                        </div>
                        <?php endif; ?>             
                        </div>                        
                    </div>
                    <?php endif; ?>
                </div>
            </div>            
        </section>
        <?php              
    endwhile;
endif; ?>  
