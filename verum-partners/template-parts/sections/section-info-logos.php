<?php 
if (have_rows('info_logos')) :          
    while (have_rows('info_logos')) : the_row();
    $section_id = get_sub_field('section_id');
    $heading = get_sub_field('section_headline');
    $description = get_sub_field('section_description');          
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');    ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-list <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container"> 
    <?php if($heading || $description): ?>
        <div class="row p-lg-b3 p-b2 center-xs">
            <div class="col-xs-12 col-lg-7 text-center">
            <?php if ($heading) : ?>
                <h2 class="text-uppercase cl-green mt-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $heading; ?></h2>
            <?php endif; ?>
            <?php if ($description) : ?>
                <div class="main-description dp-1 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo wp_kses_post($description); ?></div>
            <?php endif; ?> 
            </div>
        </div>
        <?php endif; ?> 
        <div class="row center-xs">
        <div class="col-xs-12 col-lg-7 text-center">
			<?php  $main_logo = get_sub_field('main_logo'); 
                $main_logo_link = get_sub_field('main_logo_link'); 
			    if($main_logo): ?>
			  <div class="info-list-row row center-xs mb-lg-2">
				   <div class="col-xs-12 mb-lg-0 m-b2 col-lg-6 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="<?php echo esc_attr($duration); ?>" >
                    <div class="info-list-col info-list-portal middle-xs w-100 h-100 pe-xl-3 ps-xl-3">                       
                        <?php if ( !empty($main_logo)) :   ?> 
                            <img class="fit-contain-center info-logo-portal" src="<?php echo esc_url($main_logo['url']); ?>" alt="<?php echo esc_attr($main_logo['alt']); ?>" height="66" width="300"/>   
                        <?php endif; ?> 
                           <?php if( $main_logo_link ):
                            $link_url = $main_logo_link['url'];
                            $link_title = $main_logo_link['title'];
                            $link_target = $main_logo_link['target'] ? $main_logo_link['target'] : '_self'; ?>    
                         <div class="m-t1">
                            <a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
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
			 <?php endif; ?>
        <div class="info-list-row row center-xs">
            <?php 
            if (have_rows('info_content')):  $animation_delay = 0.1;
            while (have_rows('info_content')): the_row();                
                $image = get_sub_field('image'); 
                $cta = get_sub_field('button_cta');       
                $duration = $animation_delay . 's'; ?>
                <div class="col-xs-12 mb-lg-0 m-b2 col-lg-6 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="<?php echo esc_attr($duration); ?>" >
                    <div class="info-list-col info-list-portal middle-xs w-100 h-100 pe-xl-3 ps-xl-3">                       
                        <?php if ( !empty($image)) :   ?> 
                            <img class="fit-contain-center info-logo-portal" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" height="66" width="300"/>   
                        <?php endif; ?> 
                           <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                         <div class="m-t1">
                            <a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
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
            <?php $animation_delay += 0.1; endwhile; 
            endif;?>
        </div> 
    </div>         
        </div>  
    </div> 
</section>
<?php              
    endwhile;
endif; ?>   
