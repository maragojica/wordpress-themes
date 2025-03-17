<?php 
if (have_rows('info_columns_boxes')) :          
    while (have_rows('info_columns_boxes')) : the_row();
    $section_id = get_sub_field('section_id');   
    $bg_color_section = get_sub_field('bg_section_color');
    $headline = get_sub_field('heading'); 
    $subheadline = get_sub_field('subheading');        
    $description = get_sub_field('description');  
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');  
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-info-boxes <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
         <div class="container">        
            <div class="row justify-center">                
                <div class="col-xs-12 col-xl-9 text-center wow fadeInUp" data-wow-duration="0.8" data-wow-delay="0.2s">                    
                    <?php if ($subheadline) : ?>
                            <div class="subheadline cl-slate-blue pb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                        <?php endif; ?>      
                        <?php if ($headline) : ?>
                            <h2 class="cl-navy mt-0 mb-20px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s"><?php echo $headline; ?></h2>
                        <?php endif; ?>
                        <?php if ($description) : ?>
                            <div class="dp-1 cl-navy wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s"><?php echo wp_kses_post($description); ?></div>
                        <?php endif; ?> 
                </div>                              
            </div>   
            <?php if (have_rows('boxes_list')) :  $animation_delay = 0.5; ?>
            <div class="row justify-center m-t2"> 
              <?php  while (have_rows('boxes_list')) : the_row();
                    $title = get_sub_field('title');       
                    $text = get_sub_field('text');                                         
                    $duration = $animation_delay . 's'; ?>
                    <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4 m-lg-b1 m-b2 col-info wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                        <div class="box-card-info">
                            <div class="flip box-info list-info-card text-center bg-slate-blue">
                                <?php if($title): ?>
                                <div class="front-box h-100"><h3 class="cl-white m-b0"><?php echo $title; ?></h3></div>
                                <?php endif; ?>
                                <?php if($text): ?>
                                    <div class="back-box h-100"><div class="dp-1 cl-white"><?php echo $text; ?></div></div>
                                <?php endif; ?>    
                            </div>                         
                        </div>
                     </div> 
                        <?php $animation_delay += 0.25; endwhile; ?>
                   </div>      
              <?php endif; ?>  
            <div class="row justify-center">                
                <div class="col-xs-12 col-xl-9 wow fadeInUp" data-wow-duration="0.8" data-wow-delay="0.3s">  
                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info justify-center m-t3 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s">  
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
                     <?php } ?>  
                </div>                              
            </div>                                          
       </div>             
</section>
<?php              
    endwhile;
endif; ?>  