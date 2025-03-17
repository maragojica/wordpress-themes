<?php  $headline = get_field('heading');    ?>
        <section class="section-history p-b0">            
            <div class="container position-relative"> 
                <div class="row center-xs">                    
                    <div class="col-xs-12 col-lg-7">                       
                        <?php if ($headline) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 p-lg-b2 p-b1 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($headline); ?></h2>
                        <?php endif; ?>                                          
                    </div>
                </div>                
                <?php 
                if (have_rows('slider_history')):  ?>
                    <div class="history-slider">
                            <?php while (have_rows('slider_history')): the_row(); 
                            $image = get_sub_field('image');
                            $subheading = get_sub_field('title');
                            $description = get_sub_field('text'); ?>
                            <div class="history-slide position-relative">                                 
                                <div class="row middle-xs h-100 ms-0 me-0">
                                    <div class="col-xs-12 col-xl-6 h-100 ps-0 pe-0">
                                        <div class="box-media-history w-100 h-100 animate__animated" data-animation="fadeLeft">
                                        <?php if ( !empty($image)) : 
                                             $srcset = wp_get_attachment_image_srcset($image['ID']);
                                             $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                            <img class="fit-cover-center w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="675" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-xl-6 h-100 ps-0 pe-0">
                                        <div class="box-history">
                                        <?php if ($subheading) : ?>
                                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-2 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($subheading); ?></span>
                                        <?php endif; ?>                            
                                        <?php if ($description) : ?>
                                            <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                                        <?php endif; ?>   
                                        </div>
                                    </div>                                  
                                </div>                                 
                        </div>                
                      <?php endwhile; ?>               
                    </div>                  
               <?php endif;?>  
               <button aria-label="Previous" class="glider-prev glider-prev-history animate__animated" data-animation="fadeLeft">       
                    <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" width="61" height="16" viewBox="0 0 61 16" fill="none">
                    <path d="M0.292892 7.29289C-0.0976333 7.68341 -0.0976334 8.31658 0.292892 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6568L2.41422 7.99999L8.07107 2.34314C8.46159 1.95262 8.46159 1.31945 8.07107 0.928927C7.68054 0.538403 7.04738 0.538403 6.65685 0.928927L0.292892 7.29289ZM118 7L1 6.99999L1 8.99999L118 9L118 7Z" fill="black"/>
                    </svg>
                </button>
                <button fill="#000000" aria-label="Next" class="glider-next glider-next-history animate__animated" data-animation="fadeRight">           
                <svg xmlns="http://www.w3.org/2000/svg" width="61" height="16" viewBox="0 0 61 16" fill="none">
                <path d="M60.2071 8.70707C60.5976 8.31654 60.5976 7.68338 60.2071 7.29286L53.8431 0.928925C53.4526 0.538403 52.8194 0.538406 52.4289 0.928932C52.0384 1.31946 52.0384 1.95262 52.4289 2.34315L58.0858 7.99997L52.429 13.6569C52.0384 14.0474 52.0384 14.6805 52.429 15.0711C52.8195 15.4616 53.4527 15.4616 53.8432 15.0711L60.2071 8.70707ZM4.75923e-06 9.00025L59.5 8.99997L59.5 6.99997L-4.75923e-06 7.00025L4.75923e-06 9.00025Z" fill="black"/>
                </svg>
                </button>                
            </div> 
        </section>