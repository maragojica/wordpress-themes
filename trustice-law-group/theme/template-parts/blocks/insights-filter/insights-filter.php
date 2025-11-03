<?php
$content_block = get_field('content_block_insights_filter');
if ($content_block) {    
      
    $bg_color = $content_block['bg_color'];   

    // Filter Blogs    
    $number_of_posts = $content_block['number_of_posts'];
    $post_type = $content_block['post_type'];
    $selected_categories_raw = $content_block['category_news'] ? (array) $content_block['category_news'] : [];
    $cat = 'category';
    
    // Handle both term IDs and WP_Term objects from ACF
    $selected_categories = [];
    foreach ($selected_categories_raw as $term) {
        if (is_object($term) && isset($term->term_id)) {
            // It's a WP_Term object
            $selected_categories[] = $term->term_id;
        } elseif (is_numeric($term)) {
            // It's already a term ID
            $selected_categories[] = intval($term);
        }
    }
    $load_more = true; // Set based on your ACF if needed

    // Adjust the query args based on the categories_as_filters setting  
 
    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => $number_of_posts,
        'orderby'=> 'post_date', 
        'order' => 'DESC'
    );

    if (!empty($selected_categories)) {
        $args['tax_query'] = [
            [
                'taxonomy' => $cat,
                'field' => 'term_id',
                'terms' => $selected_categories                 
            ],
        ];
    }
   
    $query = new WP_Query($args);

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
         case 'xsmall':
            $spacing_class = 'padding-xsmall';
            break;
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

    if($bg_color === 'white'){
        $bg_class = 'bg-white';
    } elseif($bg_color === 'accent-light'){
        $bg_class = 'bg-accent-light';
    } else {
        $bg_class = '';
    }

    wp_enqueue_script('insights', get_template_directory_uri() . '/js/insights.js', array('jquery'), TRUSTICE_LAW_GROUP_VERSION, true);

    // Localize script with data for AJAX requests
    wp_localize_script('insights', 'insightInfo', array(
        'rest_url' => rest_url(),
        'nonce' => wp_create_nonce('wp_rest'),
        'posts_per_page' => $number_of_posts,      
        'current_page' => 1,
        'default_postype' => $post_type,
        'taxonomy' => $cat,
    ));
?>

<section class="insights-filter-section max-w-full relative <?php if($bg_class): echo $bg_class; endif; ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
    <div class="container mx-auto">    
        <div class="row-portfolio-filter relative z-[4] lg:mb-[4em]">
            <?php if (is_array($selected_categories) && !empty($selected_categories)) : ?>
                <!-- Desktop Tabs -->
                <div class="xl:flex hidden text-center select-category-blog filters-projects justify-between items-center gap-[48px] mb-9">
                    <!-- All Tab -->
                    <a href="#" tabindex="0" aria-label="All" title="All" class="blog-link active" data-category-id="" data-postype="<?php echo esc_attr($post_type); ?>" data-taxonomy="<?php echo esc_attr($cat); ?>">Show All</a>
                    <div class="flex items-center gap-[29px]">
                    <?php foreach ($selected_categories as $category_id) {
                        $category = get_term($category_id, $cat);
                        if (!is_wp_error($category)) { ?> 
                            <a href="#" tabindex="0" aria-label="<?php echo esc_html($category->name); ?>" title="<?php echo esc_html($category->name); ?>" class="blog-link" data-category-id="<?php echo esc_attr($category->term_id); ?>" data-postype="<?php echo esc_attr($post_type); ?>" data-taxonomy="<?php echo esc_attr($cat); ?>"><?php echo esc_html($category->name); ?></a>                                                 
                        <?php } 
                    } ?>
                    </div>
                </div>

                <!-- Mobile Dropdown -->
                <div class="categories-filters news-dropdown-wrapper xl:hidden block mb-9 relative w-full max-w-full">
                    <button type="button" class="news-dropdown-button w-full flex items-center justify-between px-6 py-4 bg-accent-light border border-accent-light text-left cursor-pointer transition-all duration-300 hover:border-gray-600">
                        <span class="news-dropdown-selected text-[18px] font-semibold text-primary uppercase">Show All</span>
                        <svg class="news-dropdown-icon w-5 h-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="news-dropdown-menu hidden absolute top-full left-0 right-0 bg-accent-light border border-accent-light shadow-lg mt-2 w-full max-h-[400px] overflow-y-auto z-50">
                        <div class="select-category-blog">
                            <!-- All Option -->
                            <a href="#" tabindex="0" aria-label="All" title="All" class="blog-link block px-6 py-3 hover:bg-primary hover:text-white text-[16px] font-medium transition-all duration-200 active font-semibold" data-category-id="" data-postype="<?php echo esc_attr($post_type); ?>" data-taxonomy="<?php echo esc_attr($cat); ?>">Show All</a>
                            
                            <?php foreach ($selected_categories as $category_id) {
                                $category = get_term($category_id, $cat);
                                if (!is_wp_error($category)) { ?>                                  
                                    <a href="#" tabindex="0" aria-label="<?php echo esc_html($category->name); ?>" title="<?php echo esc_html($category->name); ?>" class="blog-link block px-6 py-3 hover:bg-primary hover:text-white text-[16px] font-medium transition-all duration-200 border-b border-gray-100 last:border-b-0" data-category-id="<?php echo esc_attr($category->term_id); ?>" data-postype="<?php echo esc_attr($post_type); ?>" data-taxonomy="<?php echo esc_attr($cat); ?>"><?php echo esc_html($category->name); ?></a>                                                
                                <?php } 
                            } ?>
                        </div>   
                    </div>                   
                </div>
            <?php endif; ?>    
        </div>                 
        
        <?php if ($query->have_posts()) : ?>        
            <div id="main-news" class="news news-items grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-x-10 lg:gap-x-12 gap-y-8 lg:gap-y-12">   
                <?php while ($query->have_posts()) : $query->the_post();
                    $title = get_the_title(); 
                    $id = get_the_id();
                    
                    // Get categories excluding "All"
                    $terms = get_the_terms($id, $cat);
                    $category_names = array();
                    if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            if (strtolower($term->name) !== 'all') {
                                $category_names[] = $term->name;
                            }
                        }
                    }
                    $categories_display = !empty($category_names) ? implode(', ', $category_names) : '';
                    ?>  
                    <div class="news-card">
                        <div class="event-image relative overflow-visible">
                            <a class="block w-full h-full relative z-[2]" href="<?php echo get_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>">
                                <?php if (has_post_thumbnail()) : ?>								  
                                    <?php the_post_thumbnail('full', array('class' => 'w-full h-full transition-all duration-500')); ?>				
                                <?php endif; ?> 
                            </a>
                        </div>
                        <div class="event-content group">
                            <?php if ($categories_display): ?>
                                <div class="post-categories mb-[10px] flex flex-wrap gap-2">
                                    <span class="eyebrow text-secondary uppercase"><?php echo esc_html($categories_display); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if($title): ?>
                                <h4 class="event-title text-primary">
                                    <a class="group-hover:text-secondary" href="<?php echo get_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>">
                                        <?php echo $title; ?>
                                    </a>
                                </h4>
                            <?php endif; ?>
                        </div>                             
                    </div>
                <?php endwhile; ?>           
            </div>
        <?php wp_reset_postdata(); endif; ?>        

        <?php if ($load_more && $query->found_posts > $number_of_posts) : ?>
            <div class="relative text-center mt-[3em]">               
                <a id="load-more" href="#" tabindex="0" target="_self" aria-label="Load More" title="Load More" class="seeMoreNews btn sm:w-fit w-full btn_outline_light mx-auto">
                    Load More  
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php } ?>