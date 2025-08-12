<?php $title_related_post =  get_field('title_related_post', 'option'); ?>
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
<div class="w-full">
    <div class="container mx-auto"><div class="w-full h-[1px] bg-[#0066CA] mx-auto md:max-w-[90%]"></div></div>
</div>
<section class="related-post-section max-w-full relative padding-medium">
    <div class="container mx-auto">           
        <div class="w-full flex justify-center">     
            <div class="w-full text-center">          
                
                <?php if ($title_related_post) : ?>
                    <h2 class="text-[#313932] uppercase" data-aos="fade-up">
                        <?php echo $title_related_post; ?>
                    </h2> 
                <?php endif; ?>  
                </div>
            </div>     
            <div class="w-full flex justify-center">
            <div class="w-full">              
            <div class="flex flex-col md:flex-row flex-wrap mx-auto md:mx-[-15px]">   
           <?php while($allpost->have_posts()) : $allpost->the_post(); 
                        $title = get_the_title(); 
                        $id = get_the_id(); 
                        if (has_excerpt()) {
                            $excerpt = get_the_excerpt();
                        } else {
                            $content = get_the_content();
                            $excerpt = get_custom_excerpt($content, 20);
                        } ?>  
                    <div class="w-full md:w-1/3 lg:w-1/3 md:px-[15px] group md:mt-[60px] mt-[2em] content-blogs" data-aos="fade-up">
                        <div class="flex flex-col h-full">
                           
                           <?php if (has_post_thumbnail()) : ?>		
                              <a class="relative overflow-hidden" href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" >						  
                                <?php the_post_thumbnail('full', array('class' => 'w-full h-[15em] md:h-[22em] lg:h-[300px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300')); ?>	
                              </a>			
                            <?php endif; ?>
                            <div class="flex justify-start flex-grow flex-wrap flex-col transition-all ease-in-out duration-300 bg-[#F7F7F7] pt-[25px] pb-[35px] px-[30px]">
                                <div class="flex-grow">
                                <div class="text-[#0066CA] text-sub mb-[10px] uppercase"><?php the_time('F j, Y'); ?></div>
                                <?php if($title): ?>
                                    <h3 class="text-primary title-case w-full"><a class="text-primary hover:text-secondary group-hover:text-secondary" href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" ><?php echo $title; ?></a></h3>
                                <?php endif; ?>
                                <?php if($excerpt ): ?>
                                    <div class="text-[#00194C] style-disc" >                 
                                        <?php echo $excerpt ; ?>                   
                                    </div>
                                    <?php endif; ?> 
                                </div>                               
                                <div class="flex flex-wrap gap-4 mt-[30px]">                               
                                <div class="relative group">
                                <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="simple-link">
                                     Read More
                                </a> 
                                </div>  
                            </div> 
                            </div>                                       
                                  
                        </div>
                    </div>
                <?php endwhile; ?>           
        </div>    
                
            </div> 
            </div>  
    </div>
</section>
<?php  wp_reset_postdata(); } ?> 