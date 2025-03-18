<?php 
if (have_rows('our_blog')) :          
    while (have_rows('our_blog')) : the_row();
    $section_id = get_sub_field('section_id');
    $headline = get_sub_field('heading');  
    $description = get_sub_field('description');    
    $padding_top_desktop = get_sub_field('padding_top_desktop'); 
    $padding_bottom_desktop = get_sub_field('padding_bottom_desktop');      
    $padding_top_mobile = get_sub_field('padding_top_mobile'); 
    $padding_bottom_mobile = get_sub_field('padding_bottom_mobile'); ?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-blog <?php if(!$padding_top_desktop): echo ' p-t0'; endif; if(!$padding_bottom_desktop): echo ' p-b0'; endif; if(!$padding_top_mobile): echo ' p-mv-t0'; endif; if(!$padding_bottom_mobile): echo ' p-mv-b0'; endif; ?>">
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
         <?php $query = array(
                    'post_type' => array( 'post' ),     //All Post
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'desc',
                    'posts_per_page' => -1                 
                ); 
                $allpost = new WP_Query($query); 
                if ( $allpost->have_posts() ) {  ?>
                <div class="row row-news">
                <?php while($allpost->have_posts()) : $allpost->the_post(); 
                $title = get_the_title(); 
                $id = get_the_id(); ?>
                   <div class="col-xs-12 col-md-6 col-lg-4 col-news m-t2">  
                       <div class="new-contain h-100">
                       <?php if (has_post_thumbnail()) : ?>
                              <div class="box-news-single">
								  <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" class="image-link w-100 h-100">
									<?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
								  </a>
                               </div>  
								<?php endif; ?>
                        <div class="news-box bg-cream"> 
                         <div class="entry-date cl-forest-green"><?php the_time('F j, Y'); ?></div>
                            <?php if($title): ?>
                                <div class="headline-news">                                           
                                    <h3 class="cl-forest-green"><?php echo $title;?></h3>                                                        
                                </div>
                            <?php endif; ?>
                            <a class="simple-link link-mauve" href="<?php the_permalink(); ?>" class="w-100 h-100" tabindex="0" aria-label="<?php echo $title;?>" title="<?php echo $title;?>">   
                            Read More
                            </a>   
                        </div> 
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
<?php              
    endwhile;
endif; ?>  