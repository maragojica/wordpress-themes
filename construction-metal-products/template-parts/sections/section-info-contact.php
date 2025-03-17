<?php if (have_rows('info_contact')):  
     while (have_rows('info_contact')) :
        the_row(); 
        $section_id = get_sub_field('section_id'); 
        $headline = get_sub_field('heading');
        $subheading = get_sub_field('subheading');  
        $description = get_sub_field('description');  
        $gravity_form = get_sub_field('gravity_form'); 
        $padding_top_desktop = get_sub_field('padding_top_desktop'); 
        $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
        $padding_top_mobile = get_sub_field('padding_top_mobile'); 
        $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
        <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-info-contact <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">            
            <div class="container"> 
                <div class="row">                    
                    <div class="col-xs-12 col-lg-6">                           
                        <?php if (have_rows('list_info')):  $animation_delay = 0.1; ?>   
                            <div class="row">
                            <?php  while (have_rows('list_info')): the_row(); 
                            $heading_contact = get_sub_field('heading_contact');                             
                            $duration = $animation_delay . 's'; ?>
                             <div class="col-xs-12 col-md-12 m-b2">    
                                 <?php if($heading_contact): ?>
                                    <h3 class="cl-blue text-uppercase m-t0 mb-10px"><?php echo $heading_contact; ?></h3>
                                  <?php endif; ?>   
                                  <?php if (have_rows('list_icons')): 
                                    while (have_rows('list_icons')): the_row(); 
                                    $icon = get_sub_field('icon');                           
                                    $text = get_sub_field('text'); ?>                           
                                        <div class="box-info-contact position-relative wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
                                            <?php if ( !empty($icon)) : ?>                
                                                <img class="icon-info" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="15" heigth="12" />                            
                                            <?php endif; ?>
                                            <?php if ($text) : ?>
                                                <div class="dp-1 cl-black"><?php echo wp_kses_post($text); ?></div>
                                             <?php endif; ?>
                                        </div>
                                  <?php endwhile; endif; ?>    
                               </div>                           
                            <?php $animation_delay += 0.10; endwhile; ?>      
                            </div>                         
                        <?php endif; ?>               
                    </div>
                    <?php if($gravity_form ): ?>  
                     <div class="col-xs-12 col-lg-6">                  
                        <div id="contact-form" class="box-contact-form wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.1s">
                            <?php if ($subheading) : ?>
                            <div class="subheadline cl-blue pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s"><?php echo $subheading; ?></div>
                            <?php endif; ?>      
                            <?php if ($headline) : ?>
                                <h2 class="cl-black mt-0 mb-0 text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                            <?php endif; ?> 
                            <?php if ($description) : ?>
                                    <div class="dp-1 cl-black pb-17px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                                <?php endif; ?>                 
                            <?php echo $gravity_form; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>                         
            </div> 
        </section>
    <?php 
     endwhile;
endif;
?>
