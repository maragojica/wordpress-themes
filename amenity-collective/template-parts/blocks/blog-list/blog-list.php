<?php
$content_block = get_field('list_blog');
if ($content_block) {
    // Core settings
    $bg_color = $content_block['bg_color'];
    $featured_post = $content_block['featured_post'];
    $number_of_posts = $content_block['number_of_posts'];
    $selected_categories = $content_block['category_blog'] ? (array) $content_block['category_blog'] : [];
    $view_all_blogs = $content_block['view_all'];

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
    if (!$spacing_top_desktop): $spacing_responsive_class .= ' lg:pt-0';
    endif;
    if (!$spacing_bottom_desktop): $spacing_responsive_class .= ' lg:pb-0';
    endif;
    if (!$spacing_top_mobile): $spacing_responsive_class .= ' pt-0-important';
    endif;
    if (!$spacing_bottom_mobile): $spacing_responsive_class .= ' pb-0-important';
    endif;

    // Get current category from URL (this will be the slug if ?category=staffing)
    $current_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
?>

    <section class="list-blog-section max-w-full relative <?php echo esc_attr($className); ?> <?php echo esc_attr($spacing_responsive_class); ?>"
        <?php echo $anchor_attr; ?>
        <?php if ($bg_color): ?> style="background-color: <?php echo esc_attr($bg_color); ?>" <?php endif; ?>
        data-posts-per-page="<?php echo esc_attr($number_of_posts); ?>"
        data-current-page="<?php echo esc_attr(get_query_var('paged') ? get_query_var('paged') : 1); ?>"
        data-current-category="<?php echo esc_attr($current_category ?: 'all'); ?>">

        <?php include('featured-post.php'); ?>

        <div class="w-full <?php echo esc_attr($spacing_class); ?>" id="newsroom-posts">
            <div class="container mx-auto">
                <div class="w-full">
                    <?php if (is_array($selected_categories) && !empty($selected_categories)) : ?>
                        <div class="flex blog-desktop justify-between gap-2 xl:gap-4 2xl:gap-6 mb-6">
                            <div class="flex flex-wrap justify-between rounded-[50px] bg-blueinfo-medium py-1 px-1 gap-[10px] xl:gap-[9px] 2xl:gap-[4px]" id="tabsblogs">
                                <?php foreach ($selected_categories as $category_id) {
                                    $category = get_term($category_id, 'category');
                                    if (!is_wp_error($category)) {
                                        $name = esc_html($category->name); ?>
                                        <button
                                            data-category="<?php echo esc_attr($category->term_id); ?>"
                                            data-category-slug="<?php echo esc_attr($category->slug); ?>"
                                            class="tab-button-blog flex justify-center items-center text-[14px] lg:text-[16px] 2xl:text-[18px] font-bold cursor-pointer transition-all duration-300 ease-in-out font-primary-font text-center bg-transparent text-primary px-[12px] xl:px-[20px] 2xl:px-[23px] py-2 rounded-[50px] hover:bg-white">
                                            <?php echo $name; ?>
                                        </button>
                                <?php }
                                } ?>
                            </div>
                            <?php if ($view_all_blogs):
                                $name = esc_html($view_all_blogs->name); ?>
                                <button data-category="all" class="view-all-button-blog text-[14px] lg:text-[16px] 2xl:text-[18px] font-[800] bg-primary px-6 xl:px-9 text-white py-3 rounded-[50px] border-2 border-primary cursor-pointer transition-all duration-300 ease-in-out font-primary-font text-center">
                                    View <?php echo $name; ?>
                                </button>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <div class="w-full blog-mobile">
                        <div class="custom-dropdown-blob relative text-center mb-5">
                            <button id="filterButtonBlog" class="dropdown-button-blog w-full flex items-center justify-center gap-2 px-4 py-2 border-2 border-primary rounded-[50px] font-primary-font text-[18px] bg-primary text-white font-[800] hover:text-white">
                                <span class="icon-blog">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                        <path d="M8 17H24" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3 11H29" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13 23H19" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span id="dropdownLabelBlog" class="text-primary font-[800] font-primary-font text-[18px]">View All</span>
                            </button>
                            <ul id="dropdownMenuBlog" class="dropdown-menu-blog absolute left-0 z-10 mt-2 w-full p-4 bg-white border-2 border-blueinfo-medium rounded-xl shadow-md hidden">
                                <li class="dropdown-item-blog text-primary font-[800] font-primary-font text-[18px] py-1" data-category="all">View All</li>
                                <?php
                                foreach ($selected_categories as $category_id) :
                                    $category = get_term($category_id, 'category');
                                    if (!is_wp_error($category)) : ?>
                                        <li class="dropdown-item-blog text-primary font-[800] font-primary-font py-1 text-[18px]"
                                            data-category="<?php echo esc_attr($category->term_id); ?>"
                                            data-category-slug="<?php echo esc_attr($category->slug); ?>">
                                            <?php echo esc_html($category->name); ?>
                                        </li>
                                <?php endif;
                                endforeach; ?>
                            </ul>
                        </div>
                    </div>

                    <div id="posts-container" class="posts flex flex-col sm:flex-row flex-wrap justify-start -mx-3 mt-[0.2em]">
                        <?php
                        $initial_args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => $number_of_posts,
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                        );

                        if ($current_category && $current_category !== 'all') {
                            $initial_args['category_name'] = $current_category;
                        }

                        
                    if ($featured_post) {
                        $initial_args['post__not_in'] = array($featured_post->ID);
                    }
                    

                        $initial_query = new WP_Query($initial_args);

                        if ($initial_query->have_posts()) :
                            while ($initial_query->have_posts()) :
                                $initial_query->the_post();
                                include('post-card.php');
                            endwhile;
                        else :
                            echo '<div class="w-full text-center">There are no articles in this category at the moment. Stay tuned for future updates.</div>';
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <!-- Pagination -->
                    <div id="pagination"></div>
                </div>
            </div>
        </div>
    </section>

<?php } ?>