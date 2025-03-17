<?php 
$terms = get_the_terms( get_the_ID(), 'category' );
$term_list = wp_list_pluck( $terms, 'slug' );
$query = array(
    'post_type' => array( 'post' ),     //Related Post
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'asc',
    'post__not_in' => array( get_the_ID() ),
    'posts_per_page' => 3,
    'tax_query' => array(
		array(
			'taxonomy' => 'category',
			'field' => 'slug',
			'terms' => $term_list
		)
	)                 
); 
$allpost = new WP_Query($query); 
if ( $allpost->have_posts() ) {  ?>
    <section class="section-related-news bg-light-gray">
         <div class="container"> 
         <div class="row justify-center middle-xs">
               <div class="col-xs-12 col-xl-9">
                     <h2 class="cl-navy mt-0 text-center wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.3s">Related Articles</h2>
               </div>    
         </div>  
                <div class="row row-related-news justify-center">
                <?php while($allpost->have_posts()) : $allpost->the_post(); 
                $title = get_the_title(); 
                $id = get_the_id(); ?>
                   <div class="col-xs-12 col-md-6 col-lg-4 col-related-news m-t2">  
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
       </div>             
</section>
<?php  wp_reset_postdata(); } ?> 