<?php 
if (have_rows('gallery_colors_charts')) :          
    while (have_rows('gallery_colors_charts')) : the_row();
    $section_id = get_sub_field('section_id'); 
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile');  
    $projects_categories = get_sub_field('color_charts_categories'); ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-gallery-projects gallery-color-charts <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
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
              <?php foreach( $projects_categories as $filter_option ): $term_id = $filter_option->term_id; ?>
                <div>
                <?php $query = array(
                    'post_type' => array( 'color-chart' ),     //Color Charts
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'color-charts-category',
                            'terms' => $term_id,
                            'field' => 'term_id',
                        )
                    ),                    
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) { ?>
                <div class="row row-color-charts">
                <?php while($allpost->have_posts()) : $allpost->the_post(); 

                $title = get_the_title(); 
                $id = get_the_id(); 
                $popup = get_field('popup'); 
                $pdf = get_field('pdf');
                $post_thumbnail_id = get_post_meta( $id, '_thumbnail_id', true );
                $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
                $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full'); ?>
                   <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-color-charts col-xl-2 m-t2">
                      <div class="project-box-gallery">
                        <a data-fancybox="gallery" data-caption="<?php echo $title; ?>" tab-index="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" class="w-100 h-100" href="<?php if(empty($popup)){ echo get_the_post_thumbnail_url($id, 'full'); }else{ echo $popup; }?>">                        
                            <img src="<?php echo get_the_post_thumbnail_url($id, 'full'); ?>" alt="<?php echo $title; ?>" height="212" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
                        </a>
                        <?php if($pdf): ?>
                        <div class="link-download bg-blue bg-black-h">
                            <a tab-index="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" class="link-dowload" href="<?php echo $pdf;?>" target="_blank">                        
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                <path d="M8 12L3 7L4.4 5.55L7 8.15V0H9V8.15L11.6 5.55L13 7L8 12ZM2 16C1.45 16 0.979167 15.8042 0.5875 15.4125C0.195833 15.0208 0 14.55 0 14V11H2V14H14V11H16V14C16 14.55 15.8042 15.0208 15.4125 15.4125C15.0208 15.8042 14.55 16 14 16H2Z" fill="white"/>
                                </svg>  
                            </a>
                        </div>
                        <?php endif; ?>
                      </div>
                      <?php if($title): ?>
                        <div class="headline-color text-center">                                           
                            <?php echo $title;?>                       
                        </div>
                      <?php endif; ?>
                   </div>
                <?php endwhile; ?>
                </div>
                <?php  wp_reset_postdata(); 
                } else {
                    echo '<p>No Colors Charts found.</p>';
                }?> 
                </div>
                <?php endforeach; ?>                    
            </div>   
           <?php endif; ?>                                   
       </div>             
</section>

<?php              
    endwhile;
endif; ?>  