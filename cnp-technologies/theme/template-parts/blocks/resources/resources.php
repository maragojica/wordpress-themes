<?php
$content_block = get_field('resources_info');
if ($content_block) {

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
    }

    $spacing_responsive_class = '';
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;
    
    $post_type = $content_block['post_type'];  // Post type chosen by user
   

    $row_class = 'h-full flex flex-col lg:flex-row items-center justify-end gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter';

   

    // Fetch the initial posts
    $args = [
        'post_type'      => ['post', 'resource', 'case-study'],
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'orderby'=> 'post_date', 
         'order' => 'DESC',
        'paged'          => 1,
    ];

$posts_query = new WP_Query($args);
   
?>

<section class="resources-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">
       <div class="custom-filter row-blog-filter px-3 relative z-[10] <?php echo $row_class;?> animate__animated" data-animation="fadeIn" data-duration="1.2s">
            <div class="dropdown top-shape-btn-short">
                <button id="resource-btn" class="dropdown-btn top-shape-btn-short">
                  <span class="dropdown-text">By Resource</span>
                    <span class="arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
                        <path d="M8.5 6.03921L15.0167 -7.65688e-08L17 1.83802L8.5 9.71525L0 1.83802L1.98333 -5.79735e-07L8.5 6.03921Z" fill="#004C97"/>
                    </svg>
                    </span>
                </button>
                <?php if($post_type): ?>
                <div id="resource-options" class="dropdown-content">
                    <div data-value="all">All</div>
                   <?php foreach ($post_type as $value) { ?>
                    <div data-value="<?php echo $value['value'];?>"><?php echo $value['label'];?></div>
                    <?php } ?>
                </div>
                <?php endif; ?>
            </div>

            <div class="dropdown top-shape-btn-short">
                <button id="solution-btn" class="dropdown-btn top-shape-btn-short" disabled>
                <span class="dropdown-text">By Solution</span>
                   <span class="arrow">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="10" viewBox="0 0 17 10" fill="none">
                        <path d="M8.5 6.03921L15.0167 -7.65688e-08L17 1.83802L8.5 9.71525L0 1.83802L1.98333 -5.79735e-07L8.5 6.03921Z" fill="#004C97"/>
                    </svg>
                </span>
                </button>
                <div id="solution-options" class="dropdown-content"></div>
            </div>
        </div>
        <div id="posts-container" class="relative z-[2] flex flex-col flex-wrap md:flex-row gap-y-[32px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
            <?php if ($posts_query->have_posts()) : ?>
                <?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
                      <div class="post-item w-full md:w-1/2 lg:w-1/3 px-3 mt-4 bottom-shape-card-r">
                         <div class="w-full h-full flex flex-col group relative">   
                               <div class="post-category absolute z-[2] bg-secondary pl-[28px] pr-[15px] py-[2px] text-white left-0 top-[30px]">
                                    <p class="mb-0 text-white font-medium"><?php if(get_field('type')): echo the_field('type'); endif; ?></p>
                                </div> 
                                <div class="overflow-hidden post-image flex w-full relative z-[1] h-[260px] 2xl:h-[275px]">
                                    <a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>" title="<?php the_title(); ?>" tabindex="0" class="w-full block h-[260px] 2xl:h-[275px]"><?php the_post_thumbnail('full'); ?> </a>
                                </div>                                                   
                            <div class="post-content bg-black flex-grow p-[35px] flex flex-col">
                                <div class="post-date text-white"><?php echo get_the_date('F j, Y'); ?></div>
                                <h4 class="post-title text-white hover:text-secondary"><a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>" title="<?php the_title(); ?>" tabindex="0"><?php the_title(); ?></a></h4>
                            </div>  
                         </div>   
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="flex flex-wrap justify-center mt-[60px]" >
        <div class="relative group bottom-shape-btn-short">
            <a id="load-more" style="display: block;" href="#" tabindex="0" aria-label="Load More" title="Load More" class="min-w-min bottom-shape-btn btn btn_style3">
                <span class="bottom-shape-btn-short mt-[3px]">Load More</span> 
            </a>  
        </div>
        </div>
        <?php wp_reset_postdata(); ?>
   </div>   
</section>
<?php } ?>
