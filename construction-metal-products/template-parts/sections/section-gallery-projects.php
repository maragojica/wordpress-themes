<?php 
if (have_rows('gallery_projects')) :          
    while (have_rows('gallery_projects')) : the_row();
    $section_id = get_sub_field('section_id'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  
    $projects_categories = get_sub_field('projects_categories'); ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-gallery-projects <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
         <div class="container"> 
            <?php if($projects_categories): ?>
                <ul class="uk-subnav uk-subnav-pill" uk-switcher>
                    <?php foreach( $projects_categories as $filter_option ): ?>
                       <li><a href="#"><?php echo esc_html( $filter_option->name ); ?></a></li>
                    <?php endforeach; ?>                    
                </ul>
            <?php endif; ?>
            <?php if($projects_categories): ?>                
            <div class="uk-switcher uk-margin">
              <?php $i = 1; foreach( $projects_categories as $filter_option ): $term_id = $filter_option->term_id; ?>
                <div>
                <?php $query = array(
                    'post_type' => array( 'project' ),     //Projects
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'project-category',
                            'terms' => $term_id,
                            'field' => 'term_id',
                        )
                    ),                    
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) { ?>
                <div class="row row-gall-projects" >
                <?php while($allpost->have_posts()) : $allpost->the_post(); 

                $title = get_the_title(); 
                $id = get_the_id(); 
                $post_thumbnail_id = get_post_meta( $id, '_thumbnail_id', true );
                $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
                $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full'); ?>
                   <div class="col-xs-12 col-md-6 col-lg-4 m-t2 col-projects">
                      <div class="project-box-gallery">
                        <a data-fancybox="gallery-<?php echo $i;?>" tab-index="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" class="w-100 h-100" href="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" data-caption="<?php echo $title; ?>">                        
                            <img src="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" alt="<?php echo $title; ?>" height="320" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
                        </a>
                      </div>
                   </div>
                <?php endwhile; ?>
                </div>
                <?php  wp_reset_postdata(); 
                } else {
                    echo '<p>No Projects found.</p>';
                }?> 
                </div>
                <?php $i++; endforeach; ?>                    
            </div>   
           <?php endif; ?>                                   
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  