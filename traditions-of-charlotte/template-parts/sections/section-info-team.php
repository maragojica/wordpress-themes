<?php 
        // Fetch the sub-fields        
         
        $description = get_field('description'); 
        $position = get_field('position');
        $phone = get_field('phone');
        $email = get_field('email');
        $instagram = get_field('instagram');  ?>
        <section class="section-info">
            <div class="container">
                <div class="row middle-xs"> 
                   <div class="col-xs-12 col-lg-5 mb-lg-0 m-b2">
                       <div class="team-sidebar">
                       <div class="team-box wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'team-img w-100 h-100 fit-cover-center' ) ); ?></div>                 
                       </div>
                   </div>
                    <div class="col-xs-12 col-lg-7 ps-lg-4 pe-lg-5">   
                        <h2 class="cl-sage mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo the_title(); ?></h2>
                         <?php if( $position ): ?>
                            <div class="dp-2 cl-burnt-mauve wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo wp_kses_post($position); ?></div>
                           <?php endif; ?>                    
                        <div class="list-social m-t1 m-b1">
                        <?php if( $phone ):
                            $link_url = $phone['url'];
                            $link_title = $phone['title'];
                            $link_target = $phone['target'] ? $phone['target'] : '_self'; ?> 
                                    <a tabindex="0" class="cta-social-member wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.7s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M16.95 18C14.8667 18 12.8083 17.5458 10.775 16.6375C8.74167 15.7292 6.89167 14.4417 5.225 12.775C3.55833 11.1083 2.27083 9.25833 1.3625 7.225C0.454167 5.19167 0 3.13333 0 1.05C0 0.75 0.1 0.5 0.3 0.3C0.5 0.1 0.75 0 1.05 0H5.1C5.33333 0 5.54167 0.0791667 5.725 0.2375C5.90833 0.395833 6.01667 0.583333 6.05 0.8L6.7 4.3C6.73333 4.56667 6.725 4.79167 6.675 4.975C6.625 5.15833 6.53333 5.31667 6.4 5.45L3.975 7.9C4.30833 8.51667 4.70417 9.1125 5.1625 9.6875C5.62083 10.2625 6.125 10.8167 6.675 11.35C7.19167 11.8667 7.73333 12.3458 8.3 12.7875C8.86667 13.2292 9.46667 13.6333 10.1 14L12.45 11.65C12.6 11.5 12.7958 11.3875 13.0375 11.3125C13.2792 11.2375 13.5167 11.2167 13.75 11.25L17.2 11.95C17.4333 12.0167 17.625 12.1375 17.775 12.3125C17.925 12.4875 18 12.6833 18 12.9V16.95C18 17.25 17.9 17.5 17.7 17.7C17.5 17.9 17.25 18 16.95 18Z" fill="#6F6159"/>
                                    </svg>
                                    </a>                                             
                             <?php endif; ?> 
                        <?php if( $email ):
                            $link_url = $email['url'];
                            $link_title = $email['title'];
                            $link_target = $email['target'] ? $email['target'] : '_self'; ?> 
                                    <a tabindex="0" class="cta-social-member wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.7s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16" fill="none">
                                    <path d="M2 16C1.45 16 0.979167 15.8042 0.5875 15.4125C0.195833 15.0208 0 14.55 0 14V2C0 1.45 0.195833 0.979167 0.5875 0.5875C0.979167 0.195833 1.45 0 2 0H18C18.55 0 19.0208 0.195833 19.4125 0.5875C19.8042 0.979167 20 1.45 20 2V14C20 14.55 19.8042 15.0208 19.4125 15.4125C19.0208 15.8042 18.55 16 18 16H2ZM10 9L18 4V2L10 7L2 2V4L10 9Z" fill="#6F6159"/>
                                    </svg>
                                    </a>                                             
                             <?php endif; ?> 
                        <?php if( $instagram ):
                            $link_url = $instagram['url'];
                            $link_title = $instagram['title'];
                            $link_target = $instagram['target'] ? $instagram['target'] : '_self'; ?>
                                    <a tabindex="0" class="cta-social-member wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.7s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <path d="M8.00178 3.8978C5.73162 3.8978 3.9005 5.72933 3.9005 8C3.9005 10.2707 5.73162 12.1022 8.00178 12.1022C10.2719 12.1022 12.1031 10.2707 12.1031 8C12.1031 5.72933 10.2719 3.8978 8.00178 3.8978ZM8.00178 10.667C6.53475 10.667 5.33541 9.47094 5.33541 8C5.33541 6.52906 6.53118 5.33304 8.00178 5.33304C9.47239 5.33304 10.6682 6.52906 10.6682 8C10.6682 9.47094 9.46882 10.667 8.00178 10.667ZM13.2274 3.73C13.2274 4.26197 12.7991 4.68682 12.2708 4.68682C11.739 4.68682 11.3142 4.2584 11.3142 3.73C11.3142 3.20161 11.7426 2.77318 12.2708 2.77318C12.7991 2.77318 13.2274 3.20161 13.2274 3.73ZM15.9438 4.7011C15.8831 3.41939 15.5904 2.28406 14.6516 1.34866C13.7165 0.413254 12.5814 0.120495 11.2999 0.0562312C9.97925 -0.0187437 6.02075 -0.0187437 4.70006 0.0562312C3.4222 0.116925 2.28712 0.409684 1.34835 1.34509C0.409593 2.28049 0.120468 3.41582 0.0562186 4.69753C-0.0187395 6.01852 -0.0187395 9.97791 0.0562186 11.2989C0.116899 12.5806 0.409593 13.7159 1.34835 14.6513C2.28712 15.5867 3.41863 15.8795 4.70006 15.9438C6.02075 16.0187 9.97925 16.0187 11.2999 15.9438C12.5814 15.8831 13.7165 15.5903 14.6516 14.6513C15.5868 13.7159 15.8795 12.5806 15.9438 11.2989C16.0187 9.97791 16.0187 6.02209 15.9438 4.7011ZM14.2376 12.7163C13.9592 13.416 13.4202 13.9551 12.717 14.2372C11.664 14.6549 9.16542 14.5585 8.00178 14.5585C6.83815 14.5585 4.33597 14.6513 3.28656 14.2372C2.58695 13.9587 2.04796 13.4196 1.76598 12.7163C1.34835 11.6631 1.44473 9.1639 1.44473 8C1.44473 6.8361 1.35192 4.33337 1.76598 3.28372C2.04439 2.58396 2.58338 2.04485 3.28656 1.7628C4.33954 1.34509 6.83815 1.44148 8.00178 1.44148C9.16542 1.44148 11.6676 1.34866 12.717 1.7628C13.4166 2.04128 13.9556 2.58039 14.2376 3.28372C14.6552 4.33694 14.5588 6.8361 14.5588 8C14.5588 9.1639 14.6552 11.6666 14.2376 12.7163Z" fill="#6F6159"/>
                                    </svg>
                                    </a>                                                  
                             <?php endif; ?>  
                           
                        </div>
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-forest-green wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                    </div>
                </div>
            </div>            
        </section>


