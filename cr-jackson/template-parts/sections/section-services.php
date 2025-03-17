<?php 
if (have_rows('info_columns')) :          
    while (have_rows('info_columns')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_graphic  = get_sub_field('section_bg_image');
    $shape  = get_sub_field('shape');
    $shape_position  = get_sub_field('shape_position');
    $bg_color = get_sub_field('section_bg_color');
    $headline = get_sub_field('section_headline');  
    $description = get_sub_field('description'); 
    $main_text_color = get_sub_field('main_text_color'); 
    $services_box_type = get_sub_field('services_box_type'); 
    $services_list = get_sub_field('info_content');
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile'); 
    
if( $services_list ): $animation_delay = 0.5; ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-services p-t0 p-b0 w-margin <?php if(!$margin_top_desktop): echo ' m-t0'; endif; if(!$margin_bottom_desktop): echo ' m-b0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if($bg_color && !empty($bg_graphic)){ ?>style="background: linear-gradient(<?php echo $bg_color;?>, <?php echo $bg_color;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php } else{ ?>style="background-color: <?php echo $bg_color;?>"<?php } ?>>
         <div class="container">        
            <div class="row justify-center"> 
                <?php if($headline ||  $description): ?>
                <div class="col-xs-12 col-lg-6 col-xl-3 m-b2 mb-lg-3 col-service wow fadeInUp" data-wow-duration="0.8" data-wow-delay="0.2s">
                    <div class="title-service h-100">
                        <?php if ($headline) : ?>
                            <h3 class="<?php echo $main_text_color;?> text-uppercase mt-0 mb-0"><?php echo $headline; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 m-b30 <?php echo $main_text_color;?>"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                    </div>
                </div>
                <?php endif; ?>
                <?php if( $services_list ):
                    foreach( $services_list as $service ):  
                        $title = get_the_title( $service->ID );                                               
                        $duration = $animation_delay . 's'; ?>
                        <div class="col-xs-12 col-sm-6 col-lg-6 col-xl-3 m-b1 mb-lg-3 col-service wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                            <div class="box-service<?php echo ($services_box_type == "dark") ? ' bg-dark' : ' bg-white'; ?>">
                                <a class="w-100 h-100" tabindex="0"  href="<?php echo esc_url( get_permalink($service->ID) ); ?>" aria-label="<?php echo esc_html( $title ); ?>" title="<?php echo esc_html( $title ); ?>">  
                                    <div class="header-services">                                   
                                        <h4 class="<?php echo ($services_box_type == "dark") ? ' cl-white' : ' cl-blue'; ?> text-uppercase m-t0 m-b0"><?php echo $title;?></h4>
                                    </div> 
									<div class="link-services">
										<svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="63" height="16" viewBox="0 0 63 16" fill="none">
                                        <path d="M62.7071 8.70711C63.0976 8.31658 63.0976 7.68342 62.7071 7.29289L56.3431 0.928932C55.9526 0.538408 55.3195 0.538408 54.9289 0.928932C54.5384 1.31946 54.5384 1.95262 54.9289 2.34315L60.5858 8L54.9289 13.6569C54.5384 14.0474 54.5384 14.6805 54.9289 15.0711C55.3195 15.4616 55.9526 15.4616 56.3431 15.0711L62.7071 8.70711ZM0 9H62V7H0V9Z" fill="<?php echo ($services_box_type == "dark") ? ' #FFFFFF' : ' #FB6100'; ?>"/>
                                    </svg>  
									</div>
                                                                      
                                </a> 
                            </div>                         
                        </div>
                            <?php $animation_delay += 0.25; endforeach; 
                  endif; ?>                  
            </div>  
            <?php if ( !empty($shape)) :  ?>                
                <img class="shape-services fluid-img <?php if($shape_position): echo $shape_position['value']; endif;?>" src="<?php echo esc_url($shape['url']); ?>" alt="<?php echo esc_attr($shape['alt']); ?>" width="208" height="22" />                            
            <?php endif; ?>                                 
       </div>             
</section>
<?php endif; ?>
<?php              
    endwhile;
endif; ?>  