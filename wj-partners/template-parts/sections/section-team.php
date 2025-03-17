<?php 
if (have_rows('info_team')) :          
    while (have_rows('info_team')) : the_row();
    $section_id = get_sub_field('section_id');   
    $bg_color_section = get_sub_field('bg_section_color');
    $headline = get_sub_field('heading'); 
    $subheadline = get_sub_field('subheading');        
    $description = get_sub_field('description');  
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');  
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');   ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-team <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
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
            <?php $list_team_members = get_sub_field('all_team'); 
           if( $list_team_members ): $animation_delay = 0.2; ?>
           <div class="row justify-center">
               <?php $i = 1; foreach( $list_team_members as $main_member ):  
                   $title = get_the_title( $main_member->ID );                  
                  $content = get_field("content", $main_member->ID); 
                  $permalink = get_permalink( $main_member->ID );
                   $email = get_field("email", $main_member->ID);
                   $linkedin = get_field("linkedin", $main_member->ID);                  
                   $duration = $animation_delay . 's'; ?>
                   <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4 col-team m-t2 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="<?php echo esc_attr($duration); ?>">
                       <div class="box-team-member">
                           <a href="<?php echo esc_url( $permalink ); ?>" class="w-100 h-100" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>">
                              <div class="img w-100 h-100"><?php echo get_the_post_thumbnail( $main_member->ID, 'full', array( 'class'  => 'team-img w-100 h-100 fit-cover-top' ) ); ?></div>                                    
                           </a>
                         </div>                     
                        <div class="info text-center m-t1">
                          <h3 class="cl-navy mb-0"><a href="<?php echo esc_url( $permalink ); ?>" class="cl-navy" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>"><?php echo $title;?></a></h3>                       
                        </div>
                   </div>           
                     <?php $animation_delay += 0.1; $i++; endforeach; ?>
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