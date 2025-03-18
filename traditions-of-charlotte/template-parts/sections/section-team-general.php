<?php 
if (have_rows('info_team_general')) :          
    while (have_rows('info_team_general')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_color_section = get_sub_field('section_bg_color');  
    $headline = get_sub_field('heading');  
    $description = get_sub_field('description'); 
    $list_our_designers = get_sub_field('list_our_designers');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');   
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>

<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-team-general <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
    <div class="container"> 
          <div class="row justify-center">
                <div class="col-xs-12 col-lg-6 text-center">            
                    <?php if ($headline) : ?>
                        <h2 class="cl-forest-green text-center m-t0 mb-10px wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>  
                    <?php if ($description) : ?>
                    <div class="dp-1 m-b10 cl-forest-green wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.3s"><?php echo wp_kses_post($description); ?></div>
                  <?php endif; ?>           
                </div>
            </div>
          <?php if (have_rows('list_our_team')) :   ?>
            <div class="row row-info-box wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s">
                <?php while (have_rows('list_our_team')) : the_row();
                    $name = get_sub_field('name');  
                    $photo = get_sub_field('photo'); 
                    $content = get_sub_field('description');  ?>
                    <div class="col-xs-12 col-sm-6 col-lg-6 col-xl-4 m-t2">
                       <div class="col-team">
                       <div class="box-team-design">                        
                        <?php if (!empty($photo)) : 
                                    $srcset = wp_get_attachment_image_srcset($photo['ID']);
                                    $sizes = wp_get_attachment_image_sizes($photo['ID'], 'full'); ?>                
                                <img class="team-img w-100 h-100 fit-cover-center" src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" height="380" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>"/>                            
                          <?php endif; ?>  
                        </div>   
                        <?php if($name): ?><h3 class="cl-sage m-t20 mb-10px"><?php echo $name; ?></h3><?php endif; ?>
                            <?php if ($content ) : ?>
                                <div class="dp-1 m-b10 cl-forest-green"><?php echo wp_kses_post( $content ); ?></div>
                            <?php endif; ?>
                       </div>                            
                     </div>                    
                  <?php   endwhile; ?>                    
           </div>     
            <?php endif; ?>                
     </div> 
</section>
<?php              
    endwhile;
endif; ?>   
