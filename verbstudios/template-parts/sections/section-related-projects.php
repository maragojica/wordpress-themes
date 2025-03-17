<?php 
if (have_rows('recent_work')) :          
    while (have_rows('recent_work')) : the_row();
    $section_id = get_sub_field('section_id');   
    $headline = get_sub_field('heading');  
    $subheadline = get_sub_field('subheading'); 
    $description = get_sub_field('description');
    $padding_size = get_sub_field('padding_size'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  ?>
<?php 
$query = array(
    'post_type' => array( 'project' ),     //Related Projects
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'desc',
    'post__not_in' => array( get_the_ID() ),
    'posts_per_page' => 3	             
); 
$allpost = new WP_Query($query); 
if ( $allpost->have_posts() ) {  ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-related-projects <?php if($padding_size): echo $padding_size['value']; endif; ?> <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container"> 
         <div class="row justify-center"> 
                <div class="col-xs-12 col-lg-8 col-xl-6 text-center">
                <?php if ($subheadline) : ?>
                        <div class="subheadline cl-l-orange pb-17px text-uppercase wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $subheadline; ?></div>
                    <?php endif; ?>      
                    <?php if ($headline) : ?>
                        <h2 class="cl-black mt-0 mb-10px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo $headline; ?></h2>
                    <?php endif; ?>
                    <?php if ($description) : ?>
                        <div class="dp-1 cl-black wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?>      
                    <?php if (have_rows('button_list')) {  ?> 
                        <div class="button-list-info center-xs mt-20px mt-lg-2 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                        <?php while (have_rows('button_list')) { 
                            the_row(); $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>     
                                <div class="cta-btn">                               
                                <a tabindex="0" class="button <?php echo $button_color;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                                </div>
                                <?php endif; ?>
                        <?php } ?>
                        </div>
                        <?php } ?>    
                </div>
                         
            </div>          
                <div class="row row-related-projects justify-center">
                <?php while($allpost->have_posts()) : $allpost->the_post(); 
                $title = get_the_title(); 
                $id = get_the_id(); 
                $project_location = get_field('project_location'); ?>
                  <div class="col-xs-12 col-lg-4 col-project m-lg-t2 m-t1">  
                  <?php if (has_post_thumbnail()) : ?>               
                        <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" class="box-project-info wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s">
                        <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>                        
                         <div class="title-box-project" >
                         <?php if ($project_location) : ?>
                            <div class="subheadline cl-l-orange pb-10px text-uppercase" ><?php echo $project_location; ?></div>
                        <?php endif; ?> 
                        <?php if($title): ?>
                            <h3 class="cl-white mt-0 mb-0"><?php echo $title;?></h3>
                        <?php endif; ?>    
                         </div>
                        </a>                
                     <?php endif; ?>                        
                   </div>
                   <?php endwhile; ?>
                </div>   
                <?php if (have_rows('button_list')) {   ?>
                <div class="row">
                <div class="col-xs-12 col-lg-12 text-center mt-lg-2">   
                  <div class="button-list-info center-xs mt-20px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">  
                      <?php while (have_rows('button_list')) { 
                          the_row(); $cta = get_sub_field('button_cta'); $button_color = get_sub_field('button_color'); ?>
                      <?php if( $cta ):
                          $link_url = $cta['url'];
                          $link_title = $cta['title'];
                          $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                          ?>     
                              <div class="cta-btn">                               
                              <a tabindex="0" class="button <?php echo $button_color;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                              </div>
                              <?php endif; ?>
                      <?php } ?>
                      </div>
                    </div>
                </div>
                <?php } ?>                       
       </div>             
</section>
<?php  wp_reset_postdata(); } ?> 

<?php              
    endwhile;
endif; ?>  