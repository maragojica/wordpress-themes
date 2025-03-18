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
                <div class="row row-related-news justify-center">
                <?php while($allpost->have_posts()) : $allpost->the_post(); 
                $title = get_the_title(); 
                $id = get_the_id(); ?>
                  <div class="col-xs-12 col-md-6 col-lg-4 col-news m-b2">  
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
       </div>             
</section>
<?php  wp_reset_postdata(); } ?> 