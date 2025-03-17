<?php 
        // Fetch the sub-fields        
         
        $description = get_field('content'); 
        $email = get_field('email');
        $linkedin = get_field('linkedin');  
        $cta = get_field('back_button');?>
        <section class="section-info">
            <div class="container p-lg-t2 p-t4">
                <div class="row"> 
                   <div class="col-xs-12 col-lg-5 m-b2">
                       <div class="team-sidebar">
                       <div class="team-box"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'team-img w-100 h-100 fit-cover-center' ) ); ?></div>
                   <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                      <div class="m-t2 hide-lg">                        
                        <a tabindex="0" class="simple-link link-navy wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                         <?php echo esc_html( $link_title ); ?>                            
                         </a>                        
                      </div> 
                <?php endif; ?>  
                       </div>
                   </div>
                    <div class="col-xs-12 col-lg-7">   
                        <h2 class="cl-navy mt-0 mt-lg-1 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo the_title(); ?></h2>
                                            
                        <div class="list-social m-t1 m-b1">
                        <?php if( $linkedin ):
                            $link_url = $linkedin['url'];
                            $link_title = $linkedin['title'];
                            $link_target = $linkedin['target'] ? $linkedin['target'] : '_self'; ?>
                                    <a tabindex="0" class="cta-social-member wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.7s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="22" viewBox="0 0 21 22" fill="none">
                                    <path d="M0 1.57143C0 0.741107 0.695133 0.0671387 1.55203 0.0671387H19.448C20.3052 0.0671387 21 0.741107 21 1.57143V19.5631C21 20.3937 20.3052 21.0671 19.448 21.0671H1.55203C0.695215 21.0671 0 20.3937 0 19.5633V1.57118V1.57143Z" fill="#5C7690"/>
                                    <path d="M6.38041 17.6413V8.18701H3.23796V17.6413H6.38074H6.38041ZM4.80984 6.89641C5.90545 6.89641 6.58754 6.17043 6.58754 5.26317C6.56704 4.33523 5.90545 3.62952 4.83068 3.62952C3.75517 3.62952 3.05273 4.33523 3.05273 5.26309C3.05273 6.17035 3.73458 6.89633 4.78925 6.89633H4.8096L4.80984 6.89641ZM8.11981 17.6413H11.262V12.3622C11.262 12.08 11.2825 11.797 11.3655 11.5955C11.5926 11.0307 12.1096 10.4461 12.9779 10.4461C14.1147 10.4461 14.5698 11.313 14.5698 12.584V17.6413H17.7119V12.2205C17.7119 9.31666 16.1618 7.96536 14.0944 7.96536C12.3994 7.96536 11.6549 8.91274 11.2413 9.558H11.2623V8.18734H8.11997C8.16098 9.07426 8.11972 17.6416 8.11972 17.6416L8.11981 17.6413Z" fill="white"/>
                                    </svg>
                                    </a>                                                  
                             <?php endif; ?>  
                             <?php if( $email ):
                            $link_url = $email['url'];
                            $link_title = $email['title'];
                            $link_target = $email['target'] ? $email['target'] : '_self'; ?> 
                                    <a tabindex="0" class="cta-social-member wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.7s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="22" height="22" viewBox="0 0 22 22">
                                    <image width="22" height="22" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAAbUlEQVQ4je3VsQ2AIBBG4f8oDCUDWjCCNLZS2hE3gM3YQEoK4xlMnEBMLO4N8LWPAGCct4WILTp1Mm9kp2COgfZeaIuArKBheqJP6gsUAgsssMAC/weOq8sAp54og9M905b1wdT6flNao0TvygWnghkMO4JwDQAAAABJRU5ErkJggg=="/>
                                    <image id="mail" x="3" y="5" width="16" height="13" xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAANCAYAAACgu+4kAAAArElEQVQoka2SYQ3CMBBGHzPAJEwCEooDLKCAoABQgIU5AAfMARI6B8zBR45cw1hYsxFecj96991b1nQhCaACAvNpkiC6ZC5N4YtWJ2tMFNTA1faKXnMJrIEt0I4stp7ZA+WrI6nSm5ufrWp9cpRUSgqSok/iUJA42N14+OIZWz4PcqMC+VeCi3aSHt8yOUHinpnFYuSy+qxywymCLH8RdF6/0KWnbP+5mW2A+gnQmQUZUy42PwAAAABJRU5ErkJggg=="/>
                                    </svg>
                                    </a>                                             
                             <?php endif; ?> 
                        </div>
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-navy wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>  
                        <?php if( $cta ):
                    $link_url = $cta['url'];
                    $link_title = $cta['title'];
                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                      <div class="m-t2 show-lg">                        
                        <a tabindex="0" class="simple-link link-navy wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                         <?php echo esc_html( $link_title ); ?>                            
                         </a>                        
                      </div> 
                <?php endif; ?> 
                    </div>
                </div>
            </div>            
        </section>


