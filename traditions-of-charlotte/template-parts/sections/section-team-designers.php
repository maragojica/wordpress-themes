<?php 
if (have_rows('info_team_designers')) :          
    while (have_rows('info_team_designers')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_color_section = get_sub_field('section_bg_color');  
    $headline = get_sub_field('heading');  
    $description = get_sub_field('description'); 
    $list_our_designers = get_sub_field('list_our_designers');
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');   
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>

<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-team-designers <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
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
          <?php if( $list_our_designers ): ?>
            <div class="row center-xs row-info-box wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.4s">
                <?php foreach( $list_our_designers  as $post ): 
                setup_postdata($post); 
                    $title = get_the_title();   ?>
                    <div class="col-xs-12 col-sm-6 col-lg-6 col-xl-3 m-t2">
                       <div class="col-team">
                       <div class="box-team-design">
                        <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>" class="w-100">
                            <?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'team-img w-100 h-100 fit-cover-center' ) ); ?>
                        </a>    
                        </div>   
                        <h3 class="cl-sage m-t20 mb-10px"><?php echo $title; ?></h3>
                        <a tabindex="0" class="simple-link link-mauve" href="<?php the_permalink(); ?>" aria-label="Designer Portfolio" title="Designer Portfolio"><span>Designer Portfolio</span></a> 
                       </div>                            
                     </div>                    
                  <?php  endforeach; ?>                    
           </div>     
            <?php wp_reset_postdata(); endif; ?>                
     </div> 
</section>
<?php              
    endwhile;
endif; ?>   
