<?php 
if (have_rows('boxes_section')) :          
    while (have_rows('boxes_section')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); 
    $center_content = get_sub_field('center_content'); 
    $columns = get_sub_field('columns_number');
    $columnsnumber = "col-lg-12";
    switch ($columns['value']) {
        case "one":
            $columnsnumber = "col-lg-12";
            break;
        case "two":
            $columnsnumber = "col-lg-6";
            break;
        case "three":
            $columnsnumber = "col-lg-4";
            break;
        case "four":
            $columnsnumber = "col-lg-3";
            break; 
    } ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-boxes-list <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row"> 
                <?php if($headline ||  $subheading): ?>
                <div class="col-xs-12 col-lg-12 <?php if($center_content): ?>text-center <?php endif;?>">   
                  <?php if ($subheadline) : ?>
                        <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.3s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?> 
                </div>
                <?php endif; ?>               
            </div>  
            <?php if (have_rows('boxes_list')) { $animation_delay = 0.1; ?>
                    <div class="row <?php if($center_content): ?> justify-center <?php endif;?> ">
                        <?php while (have_rows('boxes_list')) {
                            the_row();  
                            $headline = get_sub_field('title'); 
                            $text = get_sub_field('text'); 
                            $cta = get_sub_field('cta'); 
                            $duration = $animation_delay . 's'; ?>
                            <div class="col-xs-12 col-md-6 <?php echo $columnsnumber;?> m-t2 wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">                               
                                <div class="box-card h-100">                               
                                <div class="card-box-info bg-navy">
                                    <?php if( $headline ): ?>
                                        <h3 class="cl-white text-uppercase m-t0 m-b0">                                        
                                            <?php echo $headline;?>   
                                        </h3>
                                        <?php if ($text) : ?>
                                          <div class="dp-1 cl-white"><?php echo wp_kses_post($text); ?></div>
                                        <?php endif; ?> 
                                    <?php endif; ?>    
                                    <?php if( $cta ):
                                            $link_url = $cta['url'];
                                            $link_title = $cta['title'];
                                            $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>    
                                            <div class="box-link-simple">                        
                                                <a tabindex="0" class="simple-link link-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">                            
                                                <?php echo esc_html( $link_title ); ?>
                                               </a>
                                             </div>   
                                  <?php endif; ?>
                                </div> 
                                </div>                                                
                            </div>
                        <?php $animation_delay += 0.10; } ?>                 
                    </div>   
                <?php } ?>          
                  
                <?php if (have_rows('button_list')) {  ?> 
                    <div class="row justify-center">
                        <div class="col-xs-12 col-lg-8 col-xl-6 text-center"> 
                            <div class="button-list-info justify-center mt-lg-2 m-t3 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                            <?php while (have_rows('button_list')) { 
                                the_row(); $cta = get_sub_field('button_cta'); ?>
                            <?php if( $cta ):
                                $link_url = $cta['url'];
                                $link_title = $cta['title'];
                                $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                                ?>     
                                    <div class="cta-btn">                               
                                    <a tabindex="0" class="button blue" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                    </div>
                                    <?php endif; ?>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>  
                
                                                   
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  