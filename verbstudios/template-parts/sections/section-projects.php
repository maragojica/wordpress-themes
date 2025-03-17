<section id="section-projects" class="section-projects p-t0 p-b0">
         <div class="container"> 
         <?php $query = array(
                    'post_type' => array( 'project' ),     //Projects
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => -1       
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) { ?>               
                <?php while($allpost->have_posts()) : $allpost->the_post(); 
                $title = get_the_title(); 
                $project_location = get_field('project_location'); 
                ?>
                  
                   <?php if (has_post_thumbnail()) : ?>               
                        <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" class="box-project-content wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s">
                        <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>                        
                         <div class="title-box-project wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">
                         <?php if ($project_location) : ?>
                            <div class="subheadline cl-l-orange pb-10px text-uppercase" ><?php echo $project_location; ?></div>
                        <?php endif; ?> 
                        <?php if($title): ?>
                            <h3 class="cl-white mt-0 mb-0"><?php echo $title;?></h3>
                        <?php endif; ?>    
                         </div>
                        </a>                
                     <?php endif; ?>
                <?php endwhile; ?>
              
                <?php  wp_reset_postdata(); 
                } else {
                    echo '<p class="text-center dp-1">No Projects found.</p>';
                }?>                                   
       </div>             
</section>