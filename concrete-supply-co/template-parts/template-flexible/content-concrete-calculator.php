<?php  $section_id = get_sub_field('section_id');
       $heading = get_sub_field('headline');
        $subheading     = get_sub_field('subheadline');
        $description = get_sub_field('description');  ?>
        <section class="section-concrete-calculator" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?>>
            <div class="container">
                <div class="row align-items-center">                    
                    <div class="col-xs-12 col-md-6">
                        <?php if ($subheading) : ?>
                            <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheading; ?></span>
                        <?php endif; ?>
                        <?php if ($heading) : ?>
                            <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                        <?php endif; ?>   
                        <?php if ($description) : ?>
                            <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?>
                        <?php if (have_rows('buttons')) : ?>
                            <div class="flex flex-row-lg flex-column gap-1 p-t2 justify-center align-items-center">
                                <?php  while (have_rows('buttons')) : the_row();

                                // Fetch the sub-fields        
                                $cta = get_sub_field('button_cta'); ?>
                                <?php if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                                    <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                                </div>
                             <?php endif; 
                               endwhile; ?>
                            </div>
                        <?php endif; ?>                                            
                    </div>
                    <div class="col-xs-12 col-md-6 animate__animated" data-animation="fadeRight" data-duration="2.5s">                           
                         <div class="calculator-container">
                         <div class="calculator-main">
                            <div class="calculator-title">
                                <h6>Choose a shape</h6>
                            </div>
                            <div class="shape-list">
                            </div>
                         </div>
                        <div class="shape-info">
                        <button class="back-shape" title="Show Shape List">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                            <rect y="50" width="50" height="50" transform="rotate(-90 0 50)" fill="black"/>
                            <mask id="mask0_569_67" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="8" y="11" width="30" height="30">
                                <rect x="8.99976" y="40.0002" width="29" height="29" transform="rotate(-90 8.99976 40.0002)" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_569_67)">
                                <path d="M29.6054 26.7058L29.6054 24.2891L24.6249 24.2891L26.5222 22.3558L24.862 20.6641L20.1187 25.4975L24.862 30.3308L26.5222 28.6391L24.6249 26.7058L29.6054 26.7058ZM36.7204 25.4975C36.7204 27.169 36.4091 28.7398 35.7866 30.21C35.164 31.6801 34.3191 32.9589 33.2518 34.0464C32.1846 35.1339 30.9296 35.9949 29.4868 36.6292C28.044 37.2636 26.5024 37.5808 24.862 37.5808C23.2216 37.5808 21.68 37.2636 20.2373 36.6292C18.7945 35.9949 17.5395 35.1339 16.4722 34.0464C15.405 32.9589 14.5601 31.6801 13.9375 30.21C13.3149 28.7398 13.0037 27.169 13.0037 25.4975C13.0037 23.8259 13.3149 22.2551 13.9375 20.785C14.5601 19.3148 15.405 18.036 16.4722 16.9485C17.5395 15.861 18.7945 15.0001 20.2373 14.3657C21.68 13.7313 23.2216 13.4141 24.862 13.4141C26.5024 13.4141 28.044 13.7313 29.4868 14.3657C30.9296 15.0001 32.1846 15.861 33.2518 16.9485C34.3191 18.036 35.164 19.3148 35.7866 20.785C36.4091 22.2551 36.7204 23.8259 36.7204 25.4975ZM34.3487 25.4975C34.3487 22.7989 33.4297 20.5131 31.5917 18.6402C29.7536 16.7673 27.5104 15.8308 24.862 15.8308C22.2137 15.8308 19.9705 16.7673 18.1324 18.6402C16.2944 20.5131 15.3753 22.7989 15.3753 25.4975C15.3753 28.1961 16.2944 30.4819 18.1324 32.3548C19.9705 34.2277 22.2137 35.1641 24.862 35.1641C27.5104 35.1641 29.7536 34.2277 31.5917 32.3548C33.4297 30.4819 34.3487 28.1961 34.3487 25.4975Z" fill="white"/>
                            </g>
                            </svg>
		                </button>
                            <div class="shape-title">                            
                            </div>
                            <div class="calculator-box">
                            <div class="selected-shape-image">
                            </div>
                            <div class="concrete-calculator-form" style="display:none;">
                            </div>
                        </div>
                        <div class="cubic-footage-result" style="display:none;">
                            <div class="total-cubic"></div>
                            <div class="total-unit">Cubic Yard</div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>            
        </section>

