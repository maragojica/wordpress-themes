<?php 
if (have_rows('info_columns_bg')) :          
    while (have_rows('info_columns_bg')) : the_row();
    $section_id = get_sub_field('section_id');
    $headingsection = get_sub_field('section_headline');
    $bg_image = get_sub_field('bg_section_image');
    $margin_top_desktop = get_sub_field('margin_top_desktop'); 
    $margin_bottom_desktop = get_sub_field('margin_bottom_desktop');        
    $margin_top_mobile = get_sub_field('margin_top_mobile'); 
    $margin_bottom_mobile = get_sub_field('margin_bottom_mobile');
    $columns = get_sub_field('columns_number');  
    $columnsnumber = "col-lg-12";
            switch ($columns['value']) {
                case "two":
                    $columnsnumber = "col-md-6";
                    break;
                case "three":
                    $columnsnumber = "col-md-6 col-lg-4";
                    break;
                case "four":
                    $columnsnumber = "col-md-6 col-lg-3";
                    break;                    
                case "five":
                    $columnsnumber = "col-md-6 col-lg";
                    break;
            }?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-list-bg w-margin <?php if(!$margin_top_desktop): echo ' mt-0'; endif; if(!$margin_bottom_desktop): echo ' mb-0'; endif; if(!$margin_top_mobile): echo ' m-mv-t0'; endif; if(!$margin_bottom_mobile): echo ' m-mv-b0'; endif; ?>" <?php if( !empty($bg_image) ): ?>style="background: url(<?php echo esc_url($bg_image['url']); ?>)"<?php endif; ?>>            
    <div class="container p-lg-t2 p-lg-b2"> 
     <?php if( $headingsection ): ?>
        <div class="row p-lg-b3 p-b1">
            <div class="col-xs-12 text-center">
            <?php if ($headingsection) : ?>
                <h2 class="text-uppercase cl-white mt-0 mb-0 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $headingsection; ?></h2>
            <?php endif; ?>           
            </div>
        </div>
        <?php endif; ?> 
        <div class="info-list-row row justify-center">
            <?php 
            if (have_rows('info_content')):  $animation_delay = 0.1;
            while (have_rows('info_content')): the_row();                
                $heading = get_sub_field('title'); 
                $text = get_sub_field('text'); 
                $cta = get_sub_field('button_cta'); 
                $duration = $animation_delay . 's'; ?>
                <div class="col-xs-12 mb-lg-2 m-b3 <?php echo $columnsnumber;?> wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="<?php echo esc_attr($duration); ?>" >
                    <div class="info-list-col w-100 h-100 pe-xl-3 ps-xl-3 text-center">                       
                    <?php if ( $heading ) :   ?> 
                            <h3 class="cl-white text-center text-uppercase mb-10px"><?php echo $heading;?></h3>
                        <?php endif; ?> 
                        <?php if ($text) : ?>
                            <div class="dp-1 cl-white"><?php echo wp_kses_post($text); ?></div>
                        <?php endif; ?>                       
                           <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>  
                        <div class="m-lg-t1">
                            <a tabindex="0" class="cta-button cl-white cl-orange-h wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.3s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                            <?php echo esc_html( $link_title ); ?>
                                <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#FFFFFF"/>
                                </svg> 
                                <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                    <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
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
</section>
<?php              
    endwhile;
endif; ?>   
