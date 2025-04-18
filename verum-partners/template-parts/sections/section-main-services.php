<?php 
if (have_rows('main_services')) :          
    while (have_rows('main_services')) : the_row();
    $section_id = get_sub_field('section_id');
    $heading = get_sub_field('section_headline');
    $description = get_sub_field('section_description');          
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  
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
            }  ?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-list <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
    <div class="container"> 
    <?php if($heading || $description): ?>
        <div class="row p-lg-b3 center-xs">
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
        <div class="col-xs-12 col-lg-9 text-center">
        <div class="info-list-row row center-xs">
            <?php 
            if (have_rows('info_content')):  $animation_delay = 0.1;
            while (have_rows('info_content')): the_row();                
                $title = get_sub_field('title'); 
                $text = get_sub_field('text');
                $cta = get_sub_field('button_cta');       
                $duration = $animation_delay . 's'; ?>
                <div class="col-xs-12 <?php echo $columnsnumber;?> m-t2 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="<?php echo esc_attr($duration); ?>" >
                    <div class="info-list-col profile-list middle-xs w-100 h-100 pe-xl-3 ps-xl-3">                       
                        <?php if ( $title ) :   ?> 
                            <h3 class="cl-green text-center text-uppercase mb-0"><?php echo $title;?></h3>
                        <?php endif; ?> 
                        <?php if ($text) : ?>
                            <div class="dp-1 cl-off-black"><?php echo wp_kses_post($text); ?></div>
                        <?php endif; ?>
                           <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                         <div class="m-t1">
                            <a tabindex="0" class="cta-button cl-orange cl-green-h wow fadeInUp"  data-wow-duration="0.8s" data-wow-delay="0.8s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
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
