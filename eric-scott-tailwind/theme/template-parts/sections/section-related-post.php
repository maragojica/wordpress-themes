<?php $heading =  get_field('related_articles_headline', 'option'); 
$subheading =  get_field('related_articles_subheadline', 'option');?>
<?php 
$terms = get_the_terms( get_the_ID(), 'category' );
$term_list = wp_list_pluck( $terms, 'slug' );
$query = array(
    'post_type' => array( 'post' ),     //Related Post
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'desc',
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
$count_allpost = $allpost->post_count; 
if ( $allpost->have_posts() ) {  ?>
<section class="related-post-section max-w-full relative padding-small lg:pt-0 pt-0-important">
    <div class="container mx-auto">           
        <div class="w-full flex justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">     
            <div class="w-full xl:w-8/12">           
              <?php if ($heading) : ?>
                <div class="relative max-w-fit mx-auto">
                    <?php if( $subheading): ?>
                        <div class="text-secondary subheading font-secondary capitalize rotate--10.166 absolute -left-[1.2rem] md:-left-[34px] lg:-left-[51px] -top-[12px] xl:top-0 z-[1] animate__animated" data-animation="fadeIn" data-duration="1.3s"><?php echo $subheading; ?></div>
                    <?php endif; ?>
                    <h2 class="text-primary animate__animated" data-animation="fadeIn" data-duration="1.2s">
                        <?php echo $heading; ?>
                    </h2>
                </div>               
                <?php endif; ?>                 
            </div>    
            </div>  
        <div class="w-full">
            <div class="blog blog-items flex flex-col sm:flex-row flex-wrap -mx-3 mt-[32px]">   
            <?php while($allpost->have_posts()) : $allpost->the_post(); 
                    $title = get_the_title(); 
                    $id = get_the_id();  ?>            
                    <div class="px-3 mb-4 w-full md:w-1/2 lg:w-1/3 blog-item content-post">
                    <div class="flex flex-col h-full justify-between w-full p-[20px] lg:p-[40px] rounded-[6px] shadow-[0px_4px_14px_2px_rgba(12,35,64,0.09)]" >
                        <div class="flex-wrap mb-[20px]">
                            <div class="text-primary subtext mb-[5px]"><?php the_time('F j, Y'); ?></div>
                            <?php if($title): ?>
                                <h3 class="text-secondary mb-[20px]"><?php echo $title; ?></h3>
                            <?php endif; ?>   
                            <?php  if ( has_excerpt() ) {
                                    $excerpt = get_the_excerpt(); 
                                    $excerpt_length = 15;
                                    $excerpt = get_the_excerpt();
                                    $trimmed_excerpt = wp_trim_words($excerpt, $excerpt_length); ?>
                                <div class="text-secondary style-disc">
                                    <?php echo wp_kses_post($trimmed_excerpt); ?>
                                </div>
                            <?php } ?>  
                        </div>
                    
                        <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="max-w-max sm btn btn_primary_navy">
                            Read more
                        </a>                                                  
                    
                    </div>
                </div>
                <?php endwhile; ?>      
            </div>        
        
        </div>  
    </div>
</section>
<?php  wp_reset_postdata(); } ?> 