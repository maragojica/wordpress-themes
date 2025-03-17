<?php 
    $section_id = get_field('section_id_news');   
    $bg_color_section = get_field('bg_section_color_news');    
    $padding_top_desktop = get_field('padding_top_desktop_news'); 
    $padding_bottom_desktop = get_field('padding_bottom_desktop_news');  
    $padding_top_mobile = get_field('padding_top_mobile_news'); 
    $padding_bottom_mobile = get_field('padding_bottom_mobile_news');   ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif;?> class="section-news <?php if(!$padding_top_desktop): echo ' p-lg-t0'; endif; if(!$padding_bottom_desktop): echo ' p-lg-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>" <?php if($bg_color_section): ?>style="background-color: <?php echo $bg_color_section;?>"<?php endif; ?>>
         <div class="container"> 
         <?php $query = array(
                    'post_type' => array( 'post' ),     //All Post
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'desc',
                    'posts_per_page' => -1                 
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) {  ?>
                <div class="row row-news justify-center">
                <?php while($allpost->have_posts()) : $allpost->the_post(); 
                $title = get_the_title(); 
                $id = get_the_id(); ?>
                   <div class="col-xs-12 col-md-6 col-lg-4 col-news m-b2">  
                        <div class="news-box h-100 text-center bg-navy"> 
                         <div class="entry-date cl-white"><?php the_time('F j, Y'); ?></div>
                            <?php if($title): ?>
                                <div class="headline-news">                                           
                                    <h3 class="cl-white"><?php echo $title;?></h3>                                                        
                                </div>
                            <?php endif; ?>
                            <a class="simple-link link-white" href="<?php the_permalink(); ?>" class="w-100 h-100" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>">   
                            READ MORE
                            </a>   
                        </div>                       
                   </div>
                   <?php endwhile; ?>
                </div>
                <?php  wp_reset_postdata(); 
                } else {
                    echo '<p>No posts found.</p>';
                }?> 
                                                 
       </div>             
</section>
