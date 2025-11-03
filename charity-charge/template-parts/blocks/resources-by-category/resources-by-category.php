<?php
$content_block = get_field('resources_by_category');
if ($content_block) {
    $heading = $content_block['heading'];
    $description = $content_block['description'];
    $select_source = $content_block['select_source'];
    $select_category = $content_block['select_category'];
    $featured_resource_cat = $content_block['featured_resource_cat'];
    $buttons = $content_block['buttons']; 
    $bg_section = $content_block['bg_color_section']; 
    

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
    if(!$spacing_top_desktop): $spacing_responsive_class .= ' pt-lg-0'; endif;
    if(!$spacing_bottom_desktop): $spacing_responsive_class .= ' pb-lg-0'; endif;
    if(!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important'; endif;
    if(!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important'; endif;

    //Container Settings
    $container_classes = 'row ';

    $bg_section_class = '';
    switch ($bg_section) {
        case 'light':
            $bg_section_class = 'bg-accent';
            break;
        case 'white':
            $bg_section_class = 'bg-white';
            break;
        default:
            $bg_section_class = '';
            break;
    }

    // Process resources based on source selection
    $first_row_resources = array();
    $second_row_resources = array();
    $no_content_message = '';

    if ($select_source === 'date' && $select_category) {
        // Query posts from selected category ordered by date
        $args = array(
            'post_type' => 'nonprofit-resources',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'nonprofit-resource-category',
                    'field'    => 'term_id',
                    'terms'    => $select_category,
                ),
            ),
        );
        
        $category_posts = get_posts($args);
        
        if (empty($category_posts)) {
            $category_term = get_term($select_category, 'nonprofit-resource-category');
            $category_name = $category_term ? $category_term->name : 'selected category';
            $no_content_message = 'No resources found in ' . $category_name . '.';
        } else {
            // First two posts for first row
            $first_row_resources = array_slice($category_posts, 0, 2);
            // Remaining posts for second row
            $second_row_resources = array_slice($category_posts, 2);
        }
        
    } elseif ($select_source === 'featured' && $featured_resource_cat) {
        // Get featured resources
        $first_row_resources = $featured_resource_cat;
        
        if (empty($first_row_resources)) {
            $no_content_message = 'No featured resources selected.';
        } else {
            // Get category from first featured resource
            $first_featured_id = $first_row_resources[0]->ID;
            $resource_categories = get_the_terms($first_featured_id, 'nonprofit-resource-category');
            
            if (!empty($resource_categories) && !is_wp_error($resource_categories)) {
                $category_id = $resource_categories[0]->term_id;
                
                // Get featured resource IDs to exclude
                $featured_ids = array();
                foreach ($first_row_resources as $featured_resource) {
                    $featured_ids[] = $featured_resource->ID;
                }
                
                // Query remaining posts from same category
                $args = array(
                    'post_type' => 'nonprofit-resources',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post__not_in' => $featured_ids,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'nonprofit-resource-category',
                            'field'    => 'term_id',
                            'terms'    => $category_id,
                        ),
                    ),
                );
                
                $remaining_posts = get_posts($args);
                $second_row_resources = $remaining_posts;
            }
        }
    } else {
        $no_content_message = 'Please configure the source selection and category settings.';
    }

    // Function to render resource card
   if ( ! function_exists( 'render_resource_card' ) ) {
    function render_resource_card($post_item, $col_class = 'col-lg-6') {
        $featured_id = is_object($post_item) ? $post_item->ID : $post_item;
        $featured_image = get_the_post_thumbnail_url($featured_id, 'full');
        $featured_title = get_the_title($featured_id);
        $featured_link = get_permalink($featured_id);

        // Get category
        if (get_post_type($featured_id) === 'nonprofit-resources') {
            $resource_categories = get_the_terms($featured_id, 'nonprofit-resource-category');
            $featured_category_name = (!empty($resource_categories) && !is_wp_error($resource_categories)) ? esc_html($resource_categories[0]->name) : '';
        } else {
            $featured_category = get_the_category($featured_id);
            $featured_category_name = (!empty($featured_category) && !is_wp_error($featured_category)) ? esc_html($featured_category[0]->name) : '';
        }

        $featured_description = get_the_excerpt($featured_id);
        $use_custom_author = get_field('use_custom_author', $featured_id);
        if( $use_custom_author ) {
            $author_name = get_field('author_name', $featured_id);
            $author_avatar = get_field('author_image', $featured_id);
        }else{
            $author_name = get_field('author_name_general', 'option');
            $author_avatar = get_field('author_image_general', 'option');
        }
        $publish_date = get_the_date('d M Y', $featured_id);

        // Calculate read time
        $content = get_post_field('post_content', $featured_id);
        $word_count = str_word_count(strip_tags($content));
        $read_time = max(1, ceil($word_count / 200));
        $read_time_text = $read_time . ' min read';
        ?>
        <div class="<?php echo esc_attr($col_class); ?> mb-4">
            <div class="featured-card d-flex flex-column h-100">
                <div class="featured-image">
                    <a href="<?php echo esc_url($featured_link); ?>" tabindex="0" aria-label="<?php echo esc_html($featured_title); ?>" title="<?php echo esc_html($featured_title); ?>" class="w-100 h-100">
                        <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($featured_title); ?>" class="img-fluid">
                    </a>
                </div>
                <div class="featured-content d-flex flex-column flex-grow-1">
                    <?php if ($featured_category_name): ?>
                        <div class="category-tag"><?php echo $featured_category_name; ?></div>
                    <?php endif; ?>
                    <div class="featured-title">
                        <a href="<?php echo esc_url($featured_link); ?>"><?php echo esc_html($featured_title); ?></a>
                    </div>
                    <?php if ($featured_description): ?>
                        <div class="featured-description main-description color-gray-off mt-2"><?php echo esc_html($featured_description); ?></div>
                    <?php endif; ?>
                    <div class="mt-auto author-info d-flex align-items-center gap-2">
                        <div class="author-avatar">
                            <?php if (!empty($author_avatar['url'])): ?>
                                <img src="<?php echo esc_url($author_avatar['url']); ?>" alt="<?php echo esc_attr($author_name); ?>" class="img-fluid">
                            <?php endif; ?>
                        </div>
                        <div>
                            <div class="author-name"><?php echo esc_html($author_name); ?></div>
                            <div class="author-date d-flex align-items-center gap-2">
                                <span><?php echo esc_html($publish_date); ?></span>
                                <span>&bull; <?php echo esc_html($read_time_text); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
   }
?>

<section class="featured-by-category-resources-section list-respources-general position-relative <?php echo esc_attr($bg_section_class); ?> <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?>>
   
    <div class="container">
        <?php if ($subheading || $heading || $description) : ?> 
       <div class="<?php echo esc_attr($container_classes); ?> align-items-center justify-content-center gap-lg-0 gap-4 mb-5">
            <div class="col-lg-6 col-12 text-lg-start">
                <?php if ($subheading) : ?> 
                    <div class="small-subheadline color-gray-dark mb-1" data-aos="fade-up"><?php echo esc_html($subheading); ?></div>
                <?php endif; ?>
                <?php if ($heading) : ?>                 
                    <div class="title-section color-black bold-title" data-aos="fade-up">
                        <?php echo $heading; ?>
                    </div>           
                  <?php endif; ?> 
            </div>
            <div class="col-lg-6 text-lg-end">
                 <?php if($description): ?>
                    <div class="main-description color-gray-off text-start" data-aos="fade-up"><?php echo $description; ?></div>
                <?php endif; ?>
                <?php if ($buttons) : ?>
                <div class="<?php echo esc_attr($container_classes); ?>">
                    <div class="col-12 text-center">
                        <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-3 justify-content-start" data-aos="fade-up" data-aos-delay="50">
                        <?php foreach ($buttons as $button) : ?>
                            <?php 
                            $button_link = $button['button'];
                            $button_style = $button['button_style'];
                                $button_type = $button['button_type'];
                            if ($button_link) :
                                $url = $button_link['url'];
                                $title = $button_link['title'];
                                $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                <div class="relative group">
                                <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="button <?php if($button_style): echo $button_style; endif;?> w-100 w-lg-auto <?php if($button_type): echo $button_type; endif;?>  ">
                                    <?php echo esc_html( $title ); ?>
                                </a>
                            </div>            
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            </div>                
       </div>
<?php endif; ?>
        <?php if ($no_content_message): ?>
            <!-- No Content Message -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="alert alert-info text-center" data-aos="fade-up">
                        <p class="mb-0"><?php echo esc_html($no_content_message); ?></p>
                    </div>
                </div>
            </div>
        <?php else: ?>
            
            <?php if (!empty($first_row_resources)): ?>
                <!-- First Row - Featured/Latest Two Posts -->
                <div class="row row-featured-resources-two-cols" data-aos="fade-in">
                    <?php 
                    $count = 0;
                    foreach ($first_row_resources as $resource_item): 
                        if ($count >= 2) break; // Limit to 2 posts in first row
                        render_resource_card($resource_item, 'col-lg-6');
                        $count++;
                    endforeach; 
                    ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($second_row_resources)): ?>
                <!-- Second Row - Remaining Posts with Pagination -->
                <?php 
                $total_second_row = count($second_row_resources);
                $resources_per_page = 6;
                $total_pages = ceil($total_second_row / $resources_per_page);
                $resources_chunks = array_chunk($second_row_resources, $resources_per_page);
                $show_pagination = $total_pages > 1;
                ?>
                
                <div class="second-row-paginated-section mt-3" data-aos="fade-in">
                    <!-- Paginated Content Container -->
                    <div class="pagination-content-container mb-lg-5">
                        <?php foreach ($resources_chunks as $page_index => $page_resources) : ?>
                            <!-- Page Content -->
                            <div class="pagination-page <?php echo $page_index === 0 ? 'active' : 'hidden'; ?>" data-page="<?php echo $page_index + 1; ?>">
                                <div class="row">
                                    <?php 
                                    $count = 0;
                                    foreach ($page_resources as $resource_item): 
                                        render_resource_card($resource_item, 'col-lg-4');
                                        $count++;
                                        // Force new row after every 3 items
                                        if ($count % 3 === 0 && $count < count($page_resources)): ?>
                                            <div class="w-100 mt-lg-4 mt-3"></div>
                                        <?php endif;
                                    endforeach; 
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    
                    <?php if ($show_pagination): ?>
                        <!-- Pagination Navigation -->
                        <nav class="resources-pagination mt-4" aria-label="Resources pagination">
                            <ul class="pagination justify-content-center justify-content-lg-end">
                                <!-- Previous Button - Only show if more than 2 pages or not on first page -->
                                <?php if ($total_pages > 2): ?>
                                    <li class="page-item prev-item disabled">
                                        <button class="page-link prev-btn" aria-label="Previous page">
                                            <span aria-hidden="true">&#8592;</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                                
                                <!-- Page Numbers with Ellipsis Logic -->
                                <?php if ($total_pages <= 5): ?>
                                    <!-- Show all pages if 5 or fewer -->
                                    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                        <li class="page-item <?php echo $i === 1 ? 'active' : ''; ?>">
                                            <button class="page-link page-btn" data-page="<?php echo $i; ?>"><?php echo $i; ?></button>
                                        </li>
                                    <?php endfor; ?>
                                <?php else: ?>
                                    <!-- Show ellipsis pattern for more than 5 pages -->
                                    <!-- First page -->
                                    <li class="page-item active">
                                        <button class="page-link page-btn" data-page="1">1</button>
                                    </li>
                                    
                                    <!-- Second page -->
                                    <li class="page-item">
                                        <button class="page-link page-btn" data-page="2">2</button>
                                    </li>
                                    
                                    <!-- Ellipsis (start) -->
                                    <li class="page-item ellipsis-start d-none">
                                        <span class="page-link">...</span>
                                    </li>
                                    
                                    <!-- Middle pages (will be shown/hidden dynamically) -->
                                    <?php for ($i = 3; $i <= $total_pages - 2; $i++): ?>
                                        <li class="page-item middle-page <?php echo $i > 3 ? 'd-none' : ''; ?>">
                                            <button class="page-link page-btn" data-page="<?php echo $i; ?>"><?php echo $i; ?></button>
                                        </li>
                                    <?php endfor; ?>
                                    
                                    <!-- Ellipsis (end) -->
                                    <li class="page-item ellipsis-end">
                                        <span class="page-link">...</span>
                                    </li>
                                    
                                    <!-- Second to last page -->
                                    <li class="page-item">
                                        <button class="page-link page-btn" data-page="<?php echo $total_pages - 1; ?>"><?php echo $total_pages - 1; ?></button>
                                    </li>
                                    
                                    <!-- Last page -->
                                    <li class="page-item">
                                        <button class="page-link page-btn" data-page="<?php echo $total_pages; ?>"><?php echo $total_pages; ?></button>
                                    </li>
                                <?php endif; ?>
                                
                                <!-- Next Button - Only show if more than 2 pages or not on last page -->
                                <?php if ($total_pages > 2): ?>
                                    <li class="page-item next-item">
                                        <button class="page-link next-btn" aria-label="Next page">
                                            <span aria-hidden="true">&#8594;</span>
                                        </button>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    <?php endif; ?>
                </div>
            <?php elseif (!empty($first_row_resources) && count($first_row_resources) < 3): ?>
                <!-- Message when there are only first row resources -->
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="text-center text-muted" data-aos="fade-up">
                            <p class="mb-0"><em>No additional resources found in this category.</em></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
        
    </div>
     
</section> 


<?php }
?>