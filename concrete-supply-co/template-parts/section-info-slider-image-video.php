<?php
// Check if the current page has the "back_and_forth" group
if (have_rows('slider_info')) :

    // Loop through the rows of data
    while (have_rows('slider_info')) : the_row(); 
            
                $row_id       = get_sub_field('row_id');               
                $slider_position = get_sub_field('slider_position');                
                $heading     = get_sub_field('heading');
                $subheading     = get_sub_field('subheading');
                $description = get_sub_field('description');
                $cta = get_sub_field('button_cta'); 
                $reverse_mobile = get_sub_field('reverse_mobile'); 
                $padding_top_mobile = get_sub_field('padding_top_mobile'); 
                $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');?>
                <section <?php if($row_id): ?> id="<?php echo $row_id;?>" <?php endif;?> class="back-and-forth-row <?php echo ($slider_position['value'] == "right") ? 'reverse' : 'normal'; if($reverse_mobile): echo ' back-and-forth-reverse-mv'; endif; if($padding_top_mobile): echo ' back-and-forth-top-mv'; endif; if($padding_bottom_mobile): echo ' back-and-forth-bottom-mv'; endif; ?> ">
                    <div class="container-fluid content-back-forth">
                    <div class="row middle-xs row-back-forth <?php echo ($slider_position['value'] == "right") ? 'reverse' : ''; if($reverse_mobile): echo ' column-reverse-mv'; endif; ?>">
                        <div class="col-xs-12 col-lg-6 ps-0 pe-0 w-100 position-relative">   
                            <?php if (have_rows('content_slides')) : ?> 
                                <div class="media-slider position-relative">     
                                    <?php  while (have_rows('content_slides')) : the_row(); 
                                     $media_type = get_sub_field('media_type');
                                     $image       = get_sub_field('image');
                                     $videomp4       = get_sub_field('video'); ?>                 
                                    <div class="back-and-forth-media animate__animated" data-animation="<?php echo ($slider_position['value'] == "right") ? 'fadeRight' : 'fadeLeft';?>" >
                                        <?php if($media_type['value'] == "image"){ ?>
                                            <?php if ( !empty($image)) : 
                                                 $srcset = wp_get_attachment_image_srcset($image['ID']);
                                                 $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                                                <img class="img-fluid" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="648" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                                            <?php endif; ?>   
                                        <?php }elseif($media_type['value'] == "video"){ 
                                                ?> 
                                            <video id="background-video" autoplay loop muted playsinline style="pointer-events: none;">
                                                <?php if($videomp4): ?>
                                                <source src="<?php echo $videomp4['url']; ?>" type="video/mp4">
                                                <?php endif; ?>
                                            </video>                     
                                        <?php } ?> 
                                    </div>   
                                    <?php  endwhile; ?> 
                                 </div>  
                            <?php endif; ?>   
                            <button aria-label="Previous" class="glider-prev glider-prev-media animate__animated" data-animation="fadeLeft">       
                            <svg xmlns="http://www.w3.org/2000/svg" width="61" height="16" viewBox="0 0 61 16" fill="none">
                            <path d="M0.292889 7.29317C-0.0976333 7.6837 -0.0976296 8.31686 0.292896 8.70739L6.65689 15.0713C7.04741 15.4618 7.68058 15.4618 8.0711 15.0713C8.46162 14.6808 8.46162 14.0476 8.07109 13.6571L2.41422 8.00027L8.07104 2.34339C8.46156 1.95286 8.46156 1.3197 8.07103 0.929175C7.68051 0.538652 7.04734 0.538655 6.65682 0.929182L0.292889 7.29317ZM60.5 6.99999L0.999996 7.00028L1 9.00028L60.5 8.99999L60.5 6.99999Z" fill="white"/>
                            </svg>
                            </button>
                            <button fill="#ffffff" aria-label="Next" class="glider-next glider-next-media animate__animated" data-animation="fadeRight">           
                            <svg xmlns="http://www.w3.org/2000/svg" width="61" height="16" viewBox="0 0 61 16" fill="none">
                            <path d="M60.2071 8.70707C60.5976 8.31654 60.5976 7.68338 60.2071 7.29286L53.8431 0.928925C53.4526 0.538403 52.8194 0.538406 52.4289 0.928932C52.0384 1.31946 52.0384 1.95262 52.4289 2.34315L58.0858 7.99997L52.429 13.6569C52.0384 14.0474 52.0384 14.6805 52.429 15.0711C52.8195 15.4616 53.4527 15.4616 53.8432 15.0711L60.2071 8.70707ZM4.75923e-06 9.00025L59.5 8.99997L59.5 6.99997L-4.75923e-06 7.00025L4.75923e-06 9.00025Z" fill="white"/>
                            </svg>
                            </button>                       
                        </div>
                        <div class="col-xs-12 col-lg-6 col-justify-center col-text">
                            <?php if ($subheading) : ?>
                                <span class="section-subtitle text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($subheading); ?></span>
                            <?php endif; ?>
                            <?php if ($heading) : ?>
                                <h2 class="section-title text-uppercase cl-blue mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo esc_html($heading); ?></h2>
                            <?php endif; ?>
                            <?php if ($description) : ?>
                                <div class="description cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                            <?php endif; ?>
                            <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                            <div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="2.5s">
                                <a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                            </div>
                        <?php endif; ?>
                        </div>
                        </div>
                    </div>                    
                </section>
            <?php  
    endwhile;
endif;
?>
