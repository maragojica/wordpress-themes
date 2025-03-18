<?php 
if (have_rows('team_list')) :          
    while (have_rows('team_list')) : the_row();
    $section_id = get_sub_field('section_id');   
    $section_bg_color = get_sub_field('section_bg_color'); 
    $headline = get_sub_field('heading');     
    $padding_size = get_sub_field('padding_size'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> <?php if($section_bg_color): ?>style="background-color: <?php echo $section_bg_color; ?>"<?php endif; ?> class="section-info-boxes <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container">        
            <div class="row justify-center"> 
                <div class="col-xs-12 col-lg-8 col-xl-7 text-center">                   
                    <?php if ($headline) : ?>
                        <h2 class="cl-sage text-uppercase mt-0 mb-10px wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?> 
                </div>                         
            </div>  
            <?php $list_team_members = get_sub_field('team_members_list'); 
           if( $list_team_members ): $animation_delay = 0.2; ?>
           <div class="row justify-center">
               <?php $i = 1; foreach( $list_team_members as $main_member ):  
                   $title = get_the_title( $main_member->ID );                  
                  $content = get_field("content", $main_member->ID); 
                  $position = get_field("position", $main_member->ID); 
                  $permalink = get_permalink( $main_member->ID );                               
                   $duration = $animation_delay . 's'; ?>
                   <div class="col-xs-12 col-md-6 col-lg-6 col-xl-4 col-team m-t2 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="<?php echo esc_attr($duration); ?>">
                       <div class="box-team-member">
                            <div class="img w-100 h-100"><?php echo get_the_post_thumbnail( $main_member->ID, 'full', array( 'class'  => 'team-img w-100 h-100 fit-cover-top' ) ); ?></div> 
                        </div>                     
                        <div class="info text-center m-t1">
                          <h3 class="cl-navy text-uppercase mt-25px m-b0"><?php echo $title;?></h3>      
                          <?php if ($position) : ?>
                                <div class="dp-2 cl-navy wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($position); ?></div>
                            <?php endif; ?>    
                          <?php if ($content) : ?>
                                <div class="dp-1 pt-17px cl-black wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($content); ?></div>
                            <?php endif; ?>                
                        </div>
                   </div>           
                     <?php $animation_delay += 0.1; $i++; endforeach; ?>
           </div>
        <?php endif; ?>                                                        
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  