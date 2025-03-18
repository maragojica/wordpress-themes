<?php 
if (have_rows('info_resources')) :          
    while (have_rows('info_resources')) : the_row();
    $section_id = get_sub_field('section_id');   
    $section_bg_color = get_sub_field('section_bg_color'); 
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $padding_size = get_sub_field('padding_size'); 
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
                    $columnsnumber = "col-md-6 col-lg-6 col-xl-3";
                    break;               
            } ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?> class="section-info-boxes <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row justify-center"> 
                <div class="col-xs-12 col-lg-8 col-xl-7 text-center">
                <?php if ($subheadline) : ?>
                        <div class="subheadline text-uppercase cl-navy pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-sage text-uppercase mt-0 mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>    
                    <?php if ($description) : ?>
                            <div class="dp-1 cl-navy wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                </div>                         
            </div>  
            <?php if (have_rows('resources_list')) : ?>
                <div class="row justify-center">
                    <?php while (have_rows('resources_list')) : the_row();
                    $box_bg_color = get_sub_field('box_bg_color'); 
                    $title = get_sub_field('title'); 
                    $link = get_sub_field('link');   ?>
                    <div class="col-xs-12 <?php echo $columnsnumber;?> col-info-block mt-lg-3 m-t2">                          
                            <div class="box-info-resources h-100 w-100" <?php if($box_bg_color): ?> style="background-color: <?php echo $box_bg_color;?>;" <?php endif; ?>>  
                                <?php if( $link ):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self'; ?>   
                                        <a tabindex="0" class="cl-navy cl-sage-h no-decoration w-100 h-100" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">                            
                                        <?php if ($title) : ?>
                                            <div class="title-resource dp-2 cl-navy wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.2s">                                   
                                                <?php echo wp_kses_post($title); ?>
                                            </div>
                                        <?php endif; ?> 
                                        <div class="link-resource bg-sage">                               
                                        <svg xmlns="http://www.w3.org/2000/svg" width="46" height="12" viewBox="0 0 46 12" fill="none">
                                            <path d="M45.5303 6.53033C45.8232 6.23744 45.8232 5.76257 45.5303 5.46967L40.7574 0.696703C40.4645 0.403809 39.9896 0.403809 39.6967 0.696703C39.4038 0.989596 39.4038 1.46447 39.6967 1.75736L43.9393 6L39.6967 10.2426C39.4038 10.5355 39.4038 11.0104 39.6967 11.3033C39.9896 11.5962 40.4645 11.5962 40.7574 11.3033L45.5303 6.53033ZM-6.55671e-08 6.75L45 6.75L45 5.25L6.55671e-08 5.25L-6.55671e-08 6.75Z" fill="white"/>
                                            </svg>
                                        </div>   
                                    </a> 
                                <?php endif; ?>                              
                            </div>                            
                        </div>
                        <?php  endwhile; ?>
                    </div>
                <?php endif; ?>                                                   
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  