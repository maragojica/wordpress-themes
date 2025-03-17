<?php $title_related_post =  get_field('title_related_post', 'option'); 
$subtitle_related_post =  get_field('subtitle_related_post', 'option');?>
<?php 
$terms = get_the_terms( get_the_ID(), 'category' );
$term_list = wp_list_pluck( $terms, 'slug' );
$query = array(
    'post_type' => array( 'post' ),     //Related Post
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'desc',
    'post__not_in' => array( get_the_ID() ),
    'posts_per_page' => -1,
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
<section class="related-post-section max-w-full relative lg:pt-[60px] pb-[3em] lg:pb-[160px]">
    <div class="container mx-auto">           
        <div class="w-full flex justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">     
            <div class="w-full xl:w-8/12">           
                <?php if ($subtitle_related_post ) : ?>
                    <h3 class="text-primary mb-[10px]">
                        <?php echo $subtitle_related_post ; ?>
                    </h3>
                <?php endif; ?>
                <?php if ($title_related_post) : ?>
                <div class="w-full relative">
                    <h2 class="text-secondary-dark mb-[20px] z-[2] relative w-fit pr-4 sm:pr-8 bg-accent" >
                            <?php echo $title_related_post; ?>
                    </h2>
                    <div class="w-full h-[4px] bg-primary absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 z-[1] invisible sm:visible"></div>
                </div>
                <?php endif; ?>  
                </div>
            </div>     
            <div class="w-full flex justify-center">
            <div class="w-full xl:w-8/12">
               <?php $animation_delay = 1; ?>
                <div class="flex flex-col sm:flex-row flex-wrap -mx-3 mt-[2em] lg:mt-[40px]">   
                <?php while($allpost->have_posts()) : $allpost->the_post(); 
                        $title = get_the_title(); 
                        $id = get_the_id(); 
                        $duration = $animation_delay . 's'; ?>            
                        <div class="w-full px-3 mb-4 lg:w-1/3 content-post-related block hidden animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                            <div class="flex flex-col h-full relative justify-between p-[28px] rounded-[12px] border-4 border-solid" style="border-color: #8B9589">                            
                                <div class="flex-wrap">
                                <h3 class="text-primary mb-[10px]"><?php the_time('M j, Y'); ?></h3>
                                    <?php if($title): ?>
                                        <div class="text-heading font-secondary-font uppercase mb-3 text-secondary-dark"><?php echo $title; ?></div>
                                    <?php endif; ?>  
                                <?php  if ( has_excerpt() ) {
                                        $excerpt = get_the_excerpt(); 
                                        $excerpt_length = 17;
                                        $excerpt = get_the_excerpt();
                                        $trimmed_excerpt = wp_trim_words($excerpt, $excerpt_length); ?>
                                        <div class="font-text-font bodysmall text-primary"><?php echo wp_kses_post($trimmed_excerpt); ?></div>
                                    <?php } ?>
                                </div>                     
                                <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="mt-[32px] group flex items-center justify-start gap-[12px] text-subheading font-secondary-font uppercase text-secondary-dark hover:text-secondary-dark">
                                    Read More
                                    <div class="relative">
                                        <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-[1] origin-left scale-100 group-hover:opacity-0 group-hover:scale-0" xmlns="http://www.w3.org/2000/svg" width="27" height="16" viewBox="0 0 27 16" fill="none">
                                            <path d="M0 8H24" stroke="#324249" stroke-width="3"/>
                                            <path d="M18 2L24 8L18 14" stroke="#324249" stroke-width="3"/>
                                        </svg>
                                        <svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-0 origin-left scale-0 group-hover:opacity-[1] group-hover:scale-100" xmlns="http://www.w3.org/2000/svg" width="39" height="16" viewBox="0 0 39 16" fill="none">
                                        <path d="M0 8H36" stroke="#324249" stroke-width="3"/>
                                        <path d="M30 2L36 8L30 14" stroke="#324249" stroke-width="3"/>
                                        </svg>
                                    </div>
                                </a>                                                
                            
                            </div>
                        </div>
                    <?php $animation_delay += 0.05; endwhile; ?>      
                </div>
        
                <?php if($count_allpost > 3): ?>
                
                <div id="blockMoreRelated" class="relative text-center mt-8">
                        <a href="#" tabindex="0" target="_self" aria-label="Load More" title="Load More" id="seeMoreRelated" class="min-w-full sm:min-w-min btn btn_style3 relative z-[2]">
                            Load More  
                        </a>
                     <div class="w-full h-[4px] bg-primary absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 z-[1] visible"></div> 
                </div>
                <?php endif; ?>
            </div> 
            </div>  
    </div>
</section>
<?php  wp_reset_postdata(); } ?> 