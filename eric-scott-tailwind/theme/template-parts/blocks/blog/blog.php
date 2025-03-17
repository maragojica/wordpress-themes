<?php
$content_block = get_field('blog_info');
if ($content_block) {
    
    // Filter Blogs    
    $number_of_posts = $content_block['number_of_posts'];
    $number_per_row = $content_block['number_per_row'];
    $load_more = $content_block['load_more'];
    $categories_as_filters = $content_block['categories_as_filters'];
    $search_filter = $content_block['search_filter'];
    $hide_filters = $content_block['hide_filters'];
    $post_type = $content_block['post_type'];
    $selected_categories = $content_block['category_blog'] ? (array) $content_block['category_blog'] : [];
    $cat = 'category';

    $filter_col_class = ' w-full lg:w-1/2';
    $search_col_class = ' w-full';
    $row_class = 'h-full flex flex-col lg:flex-row items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter';

    if ($categories_as_filters && $search_filter) {
        $filter_col_class .= ' w-full lg:w-1/2';
        $search_col_class .= ' w-full lg:w-1/2';
        $row_class = 'h-full flex flex-col lg:flex-row items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter';
    } elseif ($categories_as_filters || $search_filter) {
        $row_class = 'h-full flex flex-col lg:flex-row items-start lg:items-center gap-y-[32px] lg:gap-y-0 lg:gap-x-[32px] row-filter';
        $filter_col_class .= ' w-full';
        $search_col_class .= ' w-full';
    }

    $col_class = ' w-full';
    switch ($number_per_row) {
       
        case 2:
            $col_class .= ' md:w-1/2 lg:w-1/2';
            break;
        case 3:
            $col_class .= ' md:w-1/2 lg:w-1/3';
            break;
        case 4:
            $col_class .= ' sm:w-1/2 md:w-1/2 lg:w-1/2 xl:w-1/4';
            break;
    }    
   

    // Adjust the query args based on the categories_as_filters setting  
 
    $args = array(
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => $number_of_posts,
        'orderby'=> 'post_date', 
         'order' => 'DESC'
    );

    if (!$categories_as_filters && !empty($selected_categories)) {
        $args['tax_query'] = [
            [
                'taxonomy' => $cat,
                'field' => 'term_id',
                'terms' => implode(', ', $selected_categories)                 
            ],
        ];
    }
   
    $query = new WP_Query($args);

   //Columns Number

    $select_columns = 'px-3 mb-4'.$col_class;   

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
    

    wp_enqueue_script('blog', get_template_directory_uri() . '/js/blog.js', array('jquery'), ERIC_SCOTT_TAILWIND_VERSION, true);

    // Localize script with data for AJAX requests
   wp_localize_script('blog', 'blogInfo', array(
       'rest_url' => rest_url(),
       'nonce' => wp_create_nonce('wp_rest'),
       'posts_per_page' => $content_block['number_of_posts'] ?? 10,
       'col_class' => $col_class,
       'current_page' => 1,
       'default_postype' => $post_type, 
   ));
?>

<section class="blog-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_class); ?> <?php echo esc_attr($spacing_responsive_class); ?>" <?php echo $anchor_attr; ?> >
    <div class="container mx-auto">           
       
        <div class="row-blog-filter relative z-[4] <?php echo $row_class;?> animate__animated" data-animation="fadeIn" data-duration="1.5s">
                
                <?php if ($search_filter) : ?>
                    <div class="col-search <?php echo $search_col_class;?>">						
                        <form id="search-posts" class="full-border" autocomplete="off" >                       
                        <input type="search" id="search-input" placeholder="Search" autocomplete="off">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path d="M29.5111 32L18.3111 20.8C17.4222 21.5111 16.4 22.0741 15.2444 22.4889C14.0889 22.9037 12.8593 23.1111 11.5556 23.1111C8.32593 23.1111 5.59259 21.9926 3.35556 19.7556C1.11852 17.5185 0 14.7852 0 11.5556C0 8.32593 1.11852 5.59259 3.35556 3.35556C5.59259 1.11852 8.32593 0 11.5556 0C14.7852 0 17.5185 1.11852 19.7556 3.35556C21.9926 5.59259 23.1111 8.32593 23.1111 11.5556C23.1111 12.8593 22.9037 14.0889 22.4889 15.2444C22.0741 16.4 21.5111 17.4222 20.8 18.3111L32 29.5111L29.5111 32ZM11.5556 19.5556C13.7778 19.5556 15.6667 18.7778 17.2222 17.2222C18.7778 15.6667 19.5556 13.7778 19.5556 11.5556C19.5556 9.33333 18.7778 7.44444 17.2222 5.88889C15.6667 4.33333 13.7778 3.55556 11.5556 3.55556C9.33333 3.55556 7.44444 4.33333 5.88889 5.88889C4.33333 7.44444 3.55556 9.33333 3.55556 11.5556C3.55556 13.7778 4.33333 15.6667 5.88889 17.2222C7.44444 18.7778 9.33333 19.5556 11.5556 19.5556Z" fill="#BB945B"/>
                        </svg>                      
                        </button>
                    </form>
                    </div>
                <?php endif; ?>
                <?php if ($categories_as_filters && is_array($selected_categories) && !empty($selected_categories)) : ?>
                        <div class="categories-filters select-dropdown <?php if($hide_filters): ?> hide <?php endif; ?> <?php echo $filter_col_class;?> <?php if (!$search_filter) : ?> max-w-[352px] <?php endif;?>">
                            <button href="#" role="button" data-value="" class="select-dropdown__button dropdown__button__blog full-border"><span>All </span> <i class="chevron-down"></i>
                                </button>
                            <div class="select-category select-category-blog full-border bg-background"> 
                            <?php $i = 1; foreach ($selected_categories as $category_id) {
                                $tax_type =  'category';
                                $category = get_term($category_id, $tax_type);
                               
                                if (!is_wp_error($category)) { ?>                                  
                              
                                  <div class="filter-category <?php if($i == 1 || (isset($_GET['category']) && $_GET['category'] == $category->term_id)) echo ' active'; ?>">
                                      <a href="#" tabindex="0" aria-label="<?php echo esc_html($category->name); ?>" title="<?php echo esc_html($category->name); ?>" class="blog-link select-dropdown__list-item" data-category-id="<?php echo esc_attr($category->term_id); ?>" data-postype="<?php echo esc_attr($post_type); ?>" data-taxonomy="<?php echo $tax_type; ?>" value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></a>                                                 
                                    </div>
                              
                              <?php } ?>


                           <?php $i++; } ?>
                           </div>   
                        </div>                   
                <?php endif; ?>    
      </div>                 
       <?php 
if ($query->have_posts()) : ?>
        <div class="relative z-[2]">
        <div id="main-blog" class="blog blog-items flex flex-col sm:flex-row flex-wrap -mx-3 mt-[32px] animate__animated" data-animation="fadeBottom" data-duration="1s">   
           <?php  while ($query->have_posts()) : $query->the_post();
                        $title = get_the_title(); 
                        $id = get_the_id();    ?>  
                    <div class="<?php echo $select_columns; ?> blog-item content-post">
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
        <?php  wp_reset_postdata(); endif; ?> 
       

        <?php if ($load_more && $query->found_posts > $number_of_posts) : ?>
            <div class="relative text-center mt-8">               
                <a id="load-more" href="#" tabindex="0" target="_self" aria-label="Load more" title="Load more" id="seeMoreBlog" class="max-w-max mx-auto sm btn btn_primary_navy">
                    Load more  
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php }
?>

