<section class="our-team">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">  
                <?php $filter_options = get_field('filter_options'); 
                $all_team = get_field('all_team'); 
                if($filter_options): ?>
                <div class="tab-navigation m-b2">              
                    <select id="select-box" name="team" class="custom-select team-select" placeholder="All">               
                    <?php if($all_team): ?>                   
                        <option value="1"><?php echo $all_team;?></option>
                        <?php endif; ?>
                    <?php $i = 2; foreach( $filter_options as $filter_option ): ?>                       
                            <option value="<?php echo $i;?>"><?php echo esc_html( $filter_option->name ); ?></option>
                        <?php $i++; endforeach; ?>                
                    </select>
               </div>
             <?php endif; ?>
            
             <div id="tab-1" class="tab-content">
             <?php $query = array(
                    'post_type' => array( 'team-member' ),     //Team Member
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'asc',
                    'posts_per_page' => -1                    
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) { ?>
                <div class="row center-xl">
                <?php while($allpost->have_posts()) : $allpost->the_post(); ?>
                   <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 m-b2">
                       <div class="team-info">
						   <div class="team-box"> <a tabindex="0" class="w-100 h-100" href="<?php the_permalink(); ?>" aria-label="FULL BIO" title="FULL BIO"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'team-img w-100 h-100 fit-cover-center' ) ); ?></a></div>                          
                            <h2 class="text-uppercase cl-green text-center m-t1 mb-10px"><?php echo the_title(); ?></h2>                          
                        <div class="text-center">                        
                        <a tabindex="0" class="cta-button cl-orange cl-green-h" href="<?php the_permalink(); ?>" aria-label="FULL BIO" title="FULL BIO">
                            FULL BIO
                            <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                            <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                            </svg> 
                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                            </svg>
                         </a>                        
                      </div>                
                       </div>
                   </div>
                   <?php endwhile; ?>
                </div>
                <?php  wp_reset_postdata(); 
                } else {
                    echo '<p>No Blog post found.</p>';
                }?> 
            </div>
              <?php  if($filter_options): $i = 2;
                foreach( $filter_options as $filter_option ): $term_id = $filter_option->term_id; ?>
                   <div id="tab-<?php echo $i;?>" class="tab-content">
                   <?php $query = array(
                    'post_type' => array( 'team-member' ),     //Team Member
                    'post_status' => 'publish',
                    'orderby' => 'menu_order',
                    'order' => 'asc',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'team-category',
                            'terms' => $term_id,
                            'field' => 'term_id',
                        )
                    ),                    
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) { ?>
                <div class="row center-xl">
                <?php while($allpost->have_posts()) : $allpost->the_post(); ?>
                   <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3 m-b2">
                       <div class="team-info">
                           <div class="team-box"><?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class'  => 'team-img w-100 h-100 fit-cover-center' ) ); ?></div>                          
                            <h2 class="text-uppercase cl-green text-center m-t1 mb-10px"><?php echo the_title(); ?></h2>                          
                        <div class="text-center">                        
                        <a tabindex="0" class="cta-button cl-orange cl-green-h" href="<?php the_permalink(); ?>" aria-label="FULL BIO" title="FULL BIO">
                            FULL BIO
                            <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                            <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                            </svg> 
                            <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                            </svg>
                         </a>                        
                      </div>                
                       </div>
                   </div>
                   <?php endwhile; ?>
                </div>
                <?php  wp_reset_postdata(); 
                } else {
                    echo '<p>No Blog post found.</p>';
                }?> 
                   </div>
              <?php $i++; endforeach; endif; ?>
              </div>
            
        </div>
       
    </div>
</section>