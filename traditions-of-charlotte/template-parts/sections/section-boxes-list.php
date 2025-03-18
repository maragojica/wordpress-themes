<?php 
if (have_rows('info_our_work')) :          
    while (have_rows('info_our_work')) : the_row();
    $section_id = get_sub_field('section_id');
    $bg_color_section = get_sub_field('section_bg_color');    
    $add_load_more = get_sub_field('add_load_more');  
    $headline = get_sub_field('heading');  
    $our_work = get_sub_field('our_work');
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
            }?>
<section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-boxes-list <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
    <div class="container"> 
          <div class="row justify-center">
                <div class="col-xs-12 col-lg-7 text-center">            
                    <?php if ($headline) : ?>
                        <h2 class="cl-forest-green text-center m-t0 m-b1 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>            
                </div>
            </div>
          <?php if( $our_work ): ?>
            <div class="row text-center row-info-box <?php if($add_load_more ): echo 'row-projects-projects-'.$columns['value']; endif;?> wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
                <?php foreach( $our_work  as $post ): 
                setup_postdata($post); 
                    $title = get_the_title();   ?>
                    <div class="col-xs-12 col-info-box <?php echo $columnsnumber;?> <?php if($add_load_more ): echo 'col-projects-'.$columns['value']; endif;?>">
                        <!-- normal -->
                        <div class="ih-item square effect6 from_top_and_bottom">
                            <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>" class="w-100">
                            <div class="img w-100 h-100"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'h-100 w-100 fit-cover-center' ) ); ?></div>
                            <div class="info">
                            <h2 class="cl-white m-b20 m-t0"><?php echo $title;?></h2>
                            <div class="dp-2 cl-white simple-link link-white">Explore Project</div>
                            </div>
                            </a>
                        </div>
                        <!-- end normal -->
                     </div>                    
                    <?php  endforeach; ?>
                </div>        
           </div>     
            <?php wp_reset_postdata(); endif; ?>                
     </div> 
</section>
<?php              
    endwhile;
endif; ?>   
