<?php
$content_block = get_field('content_news');
if ($content_block) {
    
    $heading = $content_block['heading'];
    $description = $content_block['description']; 
    $news_type = $content_block['news_type'];  
    $add_load_more = $content_block['add_load_more']; 

    // Block Settings
    $className = isset($block['className']) ? $block['className'] : '';
    $anchor = isset($block['anchor']) ? $block['anchor'] : '';
    $anchor_attr = $anchor ? 'id="' . esc_attr($anchor) . '"' : '';

    //Spacing Settings
    $spacing = $content_block['spacing'];
    $spacing_top_desktop = $content_block['spacing_top_desktop'];
    $spacing_bottom_desktop = $content_block['spacing_bottom_desktop'];
    $spacing_top_mobile = $content_block['spacing_top_mobile'];
    $spacing_bottom_mobile = $content_block['spacing_bottom_mobile'];

    $spacing_class = '';
    switch ($spacing) {
        case 'small':
            $spacing_class = 'padding-small';
            break;
        case 'medium':
            $spacing_class = 'padding-medium';
            break;
        case 'large':
            $spacing_class = 'padding-large';
            break;
        case 'xlarge':
            $spacing_class = 'padding-xlarge';
            break;    
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;
      
   $post_number = 3;
   if($news_type == 'all'):
        $post_number = -1;
   endif;     
?>

<section class="news-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto relative z-[2]">   
    <div class="w-full mx-auto text-center">
           
            <?php if($heading): ?>
                <h2 class="text-[#313932] uppercase" data-aos="fade-up"  >
                        <?php echo $heading; ?>
                    </h2> 
            <?php endif; ?>   
            <?php if($description): ?>
            <div class="text-[#313932] style-disc style-triangle lg:max-w-[60%] mx-auto mt-[15px]" data-aos="fade-up"  >                 
                <?php echo $description; ?>                   
            </div>
            <?php endif; ?>                         
    </div> 
         <?php 
$query = array(
    'post_type' => array( 'post' ),     //List of News
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'desc',   
    'posts_per_page' => $post_number,                   
); 
$allpost = new WP_Query($query); 
$count_allpost = $allpost->post_count; 

$select_columns = 'w-full md:w-1/3 lg:w-1/3 md:px-[15px]';


if ( $allpost->have_posts() ) {   ?>
        <div class="flex flex-col md:flex-row flex-wrap mx-auto md:mx-[-15px]">   
           <?php while($allpost->have_posts()) : $allpost->the_post(); 
                        $title = get_the_title(); 
                        $id = get_the_id(); 
                        if (has_excerpt()) {
                            $excerpt = get_the_excerpt();
                        } else {
                            $content = get_the_content();
                            $excerpt = get_custom_excerpt($content, 20);
                        }?>
                    <div class="<?php echo $select_columns; ?> group md:mt-[60px] mt-[2em] content-blogs block hidden" data-aos="fade-up" >
                        <div class="flex flex-col h-full">
                           
                           <?php if (has_post_thumbnail()) : ?>		
                              <a class="relative overflow-hidden" href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" >						  
                                <?php the_post_thumbnail('full', array('class' => 'w-full h-[15em] md:h-[22em] lg:h-[300px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300')); ?>	
                              </a>			
                            <?php endif; ?>
                            <div class="flex justify-start flex-grow flex-wrap flex-col transition-all ease-in-out duration-300 bg-[#F7F7F7] pt-[25px] pb-[35px] px-[30px]">
                                <div class="flex-grow">
                                <!--<div class="text-[#0066CA] text-sub mb-[10px] uppercase"><?php the_time('F j, Y'); ?></div>-->
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
        <?php  wp_reset_postdata(); } ?> 
        <?php if($add_load_more): ?>                
            <div id="blockMoreBlogs" class="relative text-center mt-12">
                <a href="#" tabindex="0" target="_self" aria-label="Load More" title="Load More" id="seeMoreBlogs" class="btn btn_secondary max-w-fit mx-auto">
                    Load More
                </a>                      
            </div>
        <?php endif; ?>
    </div>
</section>

<?php }
?>

