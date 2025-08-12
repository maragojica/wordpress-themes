<?php
$content_block = get_field('content_block_testimonials');
if ($content_block) {
    
    $heading = $content_block['heading'];   
    $image = $content_block['image'];    
    $bg_graphic = $content_block['bg_graphic'];  
    $testimonials_list = $content_block['testimonials'];
    
    $reverse_desktop = in_array('yes', $content_block['reverse_order_desktop']);
    $reverse_mobile = in_array('yes', $content_block['reverse_order_mobile']);
    $alignment = $content_block['vertical_alignment'];

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Spacing Settings
    $spacing = $content_block['spacing'];
    $spacing_top_desktop = $content_block['spacing_top_desktop'];
    $spacing_bottom_desktop = $content_block['spacing_bottom_desktop'];
    $spacing_top_mobile = $content_block['spacing_top_mobile'];
    $spacing_bottom_mobile = $content_block['spacing_bottom_mobile'];

    $spacing_class = '';
    switch ($spacing) {
        case 'small':
            $spacing_class = 'padding-small';
            break;
        case 'medium':
            $spacing_class = 'padding-medium';
            break;
        case 'large':
            $spacing_class = 'padding-large';
            break;
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;    
       
 
    $container_classes = 'h-full flex flex-col md:flex-row ' . ($reverse_desktop ? 'md:flex-row-reverse ' : '') . ($reverse_mobile ? 'flex-col-reverse ' : '') . ($alignment === 'middle' ? 'items-center' : ($alignment === 'bottom' ? 'items-end' : ($alignment === 'top' ? 'items-start' : 'items-stretch')));
    $heading_width = 'w-full md:w-2/5'; 
    $content_width = 'w-full md:w-3/5';      
    $btn_align = 'justify-start';
   
?>
<section class="testimonials-slider-section max-w-full  <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?> <?php echo esc_attr($className); ?>" <?php echo $anchor_attr; ?>>
<div class="max-w-full relative bg-[#00194C]" >   
    <?php if ( !empty($bg_graphic)) : 
            $srcset = wp_get_attachment_image_srcset($bg_graphic['ID']);
            $sizes = wp_get_attachment_image_sizes($bg_graphic['ID'], 'full'); ?>                
        <img class="img-fluid w-full h-full object-center object-cover absolute top-0 left-0" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="800" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
    <?php endif; ?> 
    <div class="w-full mx-auto <?php if($reverse_desktop){ echo " pr-contain not-rp";}else{ echo " pl-contain not-lp";} ?>">     
       <div class="relative <?php echo esc_attr($container_classes); ?> ">        
       <?php if ($heading) : ?>
                <div class="absolute top-0 left-0 w-fit z-[2] bg-[#0066CA] px-[15px] py-[16px] lg:px-[25px] lg:py-[22px] text-white uppercase text-sub text-center" data-aos="fade-up">   
                    <?php echo $heading; ?>
                </div>
              <?php endif; ?>   
          <div class="h-full <?php echo esc_attr($heading_width); ?> <?php if($reverse_desktop){ ?> md:pl-[50px] lg:pl-[80px] <?php }else{ ?> md:pr-[50px] lg:pr-[80px] <?php } ?>" data-aos="fade-up" >
           
            <div class="w-full h-full flex flex-col justify-center items-center md:pt-[3em] <?php if($reverse_mobile){ ?> pt-[3em] <?php }else{ ?> pt-[100px] <?php } ?> md:pb-0 pb-[3em]">
            <?php if($testimonials_list): $count = count($testimonials_list); 
				     if($count > 1 ){ ?>
                    <div class="swiper-container w-full h-full md:px-0 px-[1.5rem] testimonials-slider" id="testimonials-slider">
                    <div class="swiper-wrapper">
                            <?php foreach( $testimonials_list as $featured_post ):                         
                                $titlepost = get_the_title( $featured_post->ID );
                                $position = get_field( 'position', $featured_post->ID );
                                $content = $featured_post->post_content;  ?>
                            <div class="swiper-slide w-full">
                                    <div class="h-full w-full flex flex-col"> 
                                    <svg class="mb-[1rem] lg:mb-[46px] lg:max-w-[56px] lg:h-[37px] max-w-[40px] h-[27px]" xmlns="http://www.w3.org/2000/svg" width="56" height="37" viewBox="0 0 56 37" fill="none">
                                    <path d="M10.484 0H22.6301L20.8402 37H0L10.484 0ZM43.8539 0H56L54.21 37H33.3699L43.8539 0Z" fill="#0066CA"/>
                                    </svg>                                       
                                        <?php if ($content) : ?>
                                            <div class="text-white text-sub-medium"><?php echo wp_kses_post($content); ?></div>
                                        <?php endif; ?>                                                                     
                                        <?php if ($titlepost || $position) : ?>
                                        <div class="text-white text-sub mt-[1rem] lg:mt-[43px]" ><?php echo $titlepost; ?><?php if($position): echo ', '.$position; endif; ?> </div>
                                        <?php endif; ?>                                                                                                  
                                    </div>                         
                            </div>
                            <?php endforeach; ?>  
                        </div>    
                        <div class="flex items-center gap-3 pt-[50px]">
                        <div class="testimonials-slider-prev swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16" fill="none">
                            <path d="M0.542892 8.70707C0.152369 8.31655 0.152369 7.68338 0.542894 7.29286L6.90686 0.928906C7.29739 0.538382 7.93055 0.538383 8.32108 0.928908C8.7116 1.31943 8.7116 1.9526 8.32107 2.34312L2.66421 7.99997L8.32106 13.6568C8.71159 14.0474 8.71158 14.6805 8.32106 15.071C7.93053 15.4616 7.29737 15.4616 6.90685 15.071L0.542892 8.70707ZM29.5 8L29.5 9L1.25 8.99997L1.25 7.99997L1.25 6.99997L29.5 7L29.5 8Z" fill="white"/>
                            </svg>
                        </div> 
                        <div class="testimonials-slider-next swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="16" viewBox="0 0 30 16" fill="none">
                            <path d="M28.9571 7.29293C29.3476 7.68345 29.3476 8.31662 28.9571 8.70714L22.5931 15.0711C22.2026 15.4616 21.5694 15.4616 21.1789 15.0711C20.7884 14.6806 20.7884 14.0474 21.1789 13.6569L26.8358 8.00003L21.1789 2.34317C20.7884 1.95264 20.7884 1.31948 21.1789 0.928955C21.5695 0.538432 22.2026 0.538433 22.5932 0.928957L28.9571 7.29293ZM0 7.99999L1.86643e-06 6.99999L28.25 7.00003L28.25 8.00003L28.25 9.00003L-1.86643e-06 8.99999L0 7.99999Z" fill="white"/>
                            </svg>
                        </div>
                       
                        </div>  
                    </div>  
				  <?php }else{ ?>
						 <?php foreach( $testimonials_list as $featured_post ):                         
                                $titlepost = get_the_title( $featured_post->ID );
                                $position = get_field( 'position', $featured_post->ID );
                                $content = $featured_post->post_content;  ?>
				
				 <div class="w-full w-full h-full md:px-0 px-[1.5rem]">
                                    <div class="h-full w-full flex flex-col"> 
                                    <svg class="mb-[1rem] lg:mb-[46px] lg:max-w-[56px] lg:h-[37px] max-w-[40px] h-[27px]" xmlns="http://www.w3.org/2000/svg" width="56" height="37" viewBox="0 0 56 37" fill="none">
                                    <path d="M10.484 0H22.6301L20.8402 37H0L10.484 0ZM43.8539 0H56L54.21 37H33.3699L43.8539 0Z" fill="#0066CA"/>
                                    </svg>                                       
                                        <?php if ($content) : ?>
                                            <div class="text-white text-sub-medium"><?php echo wp_kses_post($content); ?></div>
                                        <?php endif; ?>                                                                     
                                        <?php if ($titlepost || $position) : ?>
                                        <div class="text-white text-sub mt-[1rem] lg:mt-[43px]" ><?php echo $titlepost; ?><?php if($position): echo ', '.$position; endif; ?> </div>
                                        <?php endif; ?>                                                                                                  
                                    </div>                         
                            </div>
				  <?php endforeach; ?>  
					 
                  <?php } endif; ?>  
            </div>                               
            </div>            
            <div class="<?php echo esc_attr($content_width); ?>" <?php if($reverse_desktop){ ?> data-aos="fade-left" <?php }else{ ?> data-aos="fade-right" <?php } ?> >  
                     <?php if ( !empty($image)) : 
                        $srcset = wp_get_attachment_image_srcset($image['ID']);
                        $sizes = wp_get_attachment_image_sizes($image['ID'], 'full'); ?>                
                    <img class="img-fluid w-full h-full object-center object-cover" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="800" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                <?php endif; ?>    
            </div>           
        </div>  
    </div>
 </div>
</section>
<?php }
?>

