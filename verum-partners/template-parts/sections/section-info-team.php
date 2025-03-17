<?php       
if (have_rows('member_info')) :          
    while (have_rows('member_info')) : the_row();

        // Fetch the sub-fields         
        $heading = get_sub_field('headline');        
        $description = get_sub_field('content'); 
        $position = get_sub_field('position');
        $linkedin = get_sub_field('linkedin');  
        $cta = get_sub_field('button_cta');?>
        <section class="section-info">
            <div class="container">
                <div class="row"> 
                   <div class="col-xs-12 col-lg-4 m-b2">
                       <div class="team-sidebar">
                       <div class="team-box"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'team-img w-100 h-100 fit-cover-center' ) ); ?></div>
                   <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                      <div class="m-t2 hide-lg">                        
                        <a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
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
                    <div class="col-xs-12 col-lg-8 ps-lg-3">                      
                        <?php if ($heading) : ?>
                            <h2 class="text-uppercase cl-green mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $heading; ?></h2>
                        <?php endif; ?>
                        <?php if ($position) : ?>
                            <div class="dp-1 cl-orange wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo wp_kses_post($position); ?></div>
                        <?php endif; ?>  
                        <?php if( $linkedin ):
                            $link_url = $linkedin['url'];
                            $link_title = $linkedin['title'];
                            $link_target = $linkedin['target'] ? $linkedin['target'] : '_self'; ?>                         
                                <div class="m-t1 m-b1">
                                    <a tabindex="0" class="cta-social-member wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.7s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                        <path d="M0 1.50429C0 0.673969 0.695133 0 1.55203 0H19.448C20.3052 0 21 0.673969 21 1.50429V19.496C21 20.3265 20.3052 21 19.448 21H1.55203C0.695215 21 0 20.3266 0 19.4962V1.50404V1.50429Z" fill="#024325"/>
                                        <path d="M6.3809 17.5741V8.11987H3.23845V17.5741H6.38123H6.3809ZM4.81033 6.82927C5.90594 6.82927 6.58803 6.1033 6.58803 5.19603C6.56752 4.26809 5.90594 3.56238 4.83117 3.56238C3.75566 3.56238 3.05322 4.26809 3.05322 5.19595C3.05322 6.10321 3.73507 6.82919 4.78974 6.82919H4.81009L4.81033 6.82927ZM8.12029 17.5741H11.2625V12.295C11.2625 12.0128 11.283 11.7299 11.366 11.5284C11.5931 10.9636 12.1101 10.3789 12.9784 10.3789C14.1152 10.3789 14.5702 11.2458 14.5702 12.5169V17.5741H17.7124V12.1533C17.7124 9.24952 16.1623 7.89822 14.0949 7.89822C12.3999 7.89822 11.6554 8.8456 11.2418 9.49086H11.2627V8.1202H8.12046C8.16147 9.00712 8.12021 17.5745 8.12021 17.5745L8.12029 17.5741Z" fill="white"/>
                                    </svg>
                                    </a> 
                                </div>                    
                             <?php endif; ?>  
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>   
                        <?php if (have_rows('info_list')) : 
                            while (have_rows('info_list')) : the_row(); 
                            $heading = get_sub_field('heading');        
                            $info = get_sub_field('info');  ?>   
                            <div class="row">
                                <div class="col-xs-12 col-lg-8">
                                <div class="member-info m-t3">
                                <?php if ($heading) : ?>
                                  <h3 class="text-uppercase cl-green mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $heading; ?></h3>
                              <?php endif; ?>
                            <?php if ($info) : ?>
                                <div class="dp-1 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo wp_kses_post($info); ?></div>
                            <?php endif; ?> 
                            </div>
                                </div>
                            </div>     
                       <?php endwhile; endif; ?>       
                       <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                      <div class="m-t2 show-lg text-center">                        
                        <a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.4s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
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
            </div>            
        </section>
<?php              
            endwhile;
        endif; ?>

