<?php
$blog = get_field('blog');
if ($blog) {

    $sub_heading = $blog['sub_heading'];
    $heading = $blog['heading'];
    $number_of_posts = $blog['number_of_posts'];
    $number_per_row = $blog['number_per_row'];
    $load_more = $blog['load_more'];
    $categories_as_filters = $blog['categories_as_filters'];
    $search_filter = $blog['search_filter'];
    $hide_filters = $blog['hide_filters'];
    $selected_categories = $blog['categories'] ? (array) $blog['categories'] : [];

    $filter_col_class = ' col-xs-12 col-md-7 col-lg-6';
    $search_col_class = ' col-xs-12 col-md-12 col-lg-12';
    $row_class = 'row center-md center-xs row-filter';

    if ($categories_as_filters && $search_filter) {
        $filter_col_class .= ' col-xs-12 col-md-7 col-lg-6';
        $search_col_class .= ' col-xs-12 col-md-5 col-lg-6';
        $row_class = 'row center-md center-xs row-filter';
    } elseif ($categories_as_filters || $search_filter) {
        $row_class = 'row center-md center-xs row-filter';
        $filter_col_class .= ' col-xs-12 col-md-12 col-lg-12';
        $search_col_class .= ' col-xs-12 col-md-12 col-lg-12';
    }

    $col_class = 'col-xs-12';
    switch ($number_per_row) {
        case 1:
            $col_class = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
            break;
        case 2:
            $col_class = 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
            break;
        case 3:
            $col_class = 'col-xs-12 col-sm-6 col-md-6 col-lg-4';
            break;
        case 4:
            $col_class = 'col-xs-12 col-sm-6 col-md-6 col-lg-3';
            break;
    }

    wp_enqueue_script('blog', get_template_directory_uri() . '/js/blog.js', array('jquery'), _S_VERSION, true);

    // Localize script with data for AJAX requests
    wp_localize_script('blog', 'blogInfo', array(
        'rest_url' => rest_url(),
        'nonce' => wp_create_nonce('wp_rest'),
        'posts_per_page' => $blog['number_of_posts'] ?? 10,
        'col_class' => $col_class,
		'current_page' => 2, 
    ));

    // Adjust the query args based on the categories_as_filters setting  
   
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $number_of_posts
    );

    if (!$categories_as_filters && !empty($selected_categories)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $selected_categories                
            ],
        ];
    }
    $query = new WP_Query($args);
?>
    <section class="section-main-blog blog p-b0">
        <div class="container">
            <div class="row center-xs">
                <?php if (!empty($sub_heading)) : ?>
                    <div class="main-description dp-1 cl-orange wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo esc_html($sub_heading); ?></span>
                <?php endif; ?>
                <?php if (!empty($heading)) : ?>
                    <h2 class="text-uppercase cl-orange text-center mt-0 mb-10px mb-lg-1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>
            </div>
            <div class="row-blog-filter m-t1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                <?php if ($categories_as_filters && is_array($selected_categories) && !empty($selected_categories)) : ?>
                        <div class="categories-filters <?php if($hide_filters): ?> hide <?php endif; ?>">
                            <?php foreach ($selected_categories as $category_id) {
                                $category = get_term($category_id, 'category');
                                if (!is_wp_error($category)) {
                                    echo '<button class="category-filter" data-category-id="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</button>';
                                }
                            } ?>
                        </div>                   
                <?php endif; ?>
                <?php if ($search_filter) : ?>
                    <div class="col-search">						
                        <form id="search-posts">
                        <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                        <path d="M11.9889 13L7.43889 8.45C7.07778 8.73889 6.6625 8.96759 6.19306 9.13611C5.72361 9.30463 5.22407 9.38889 4.69444 9.38889C3.38241 9.38889 2.27199 8.93449 1.36319 8.02569C0.454398 7.1169 0 6.00648 0 4.69444C0 3.38241 0.454398 2.27199 1.36319 1.36319C2.27199 0.454398 3.38241 0 4.69444 0C6.00648 0 7.1169 0.454398 8.02569 1.36319C8.93449 2.27199 9.38889 3.38241 9.38889 4.69444C9.38889 5.22407 9.30463 5.72361 9.13611 6.19306C8.96759 6.6625 8.73889 7.07778 8.45 7.43889L13 11.9889L11.9889 13ZM4.69444 7.94444C5.59722 7.94444 6.36458 7.62847 6.99653 6.99653C7.62847 6.36458 7.94444 5.59722 7.94444 4.69444C7.94444 3.79167 7.62847 3.02431 6.99653 2.39236C6.36458 1.76042 5.59722 1.44444 4.69444 1.44444C3.79167 1.44444 3.02431 1.76042 2.39236 2.39236C1.76042 3.02431 1.44444 3.79167 1.44444 4.69444C1.44444 5.59722 1.76042 6.36458 2.39236 6.99653C3.02431 7.62847 3.79167 7.94444 4.69444 7.94444Z" fill="#08308B"/>
                        </svg>
                        </button>
                        <input type="search" id="search-input" placeholder="Search posts...">
                    </form>
                    </div>
                <?php endif; ?>
            </div>
            <div id="main-blog" class="blog row m-t2 blog-items">
                <?php
                if ($query->have_posts()) :
                    $animation_delay = 0;
                    while ($query->have_posts()) : $query->the_post();
                        $animation_delay += 0.2; ?>
                        <div class="<?php echo $col_class; ?> m-b2 blog-item wow fadeIn" data-wow-duration="0.8s" data-wow-delay="<?php echo esc_attr($animation_delay); ?>">
                           
                               <div class="box-card h-100">
                                <div class="card-media">                               
                                <?php if (has_post_thumbnail()) : ?>  
                                      <a class="w-100 h-100 cl-blue cl-black-h" tabindex="0" href="<?php the_permalink(); ?>" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>">                             
                                          <?php the_post_thumbnail('full', array('class' => 'img-fluid w-100 h-100 fit-cover-center')); ?>
                                       </a>                                          
                                     <?php endif; ?> 
                                </div>
                                <div class="card-footer bg-navy">
                                    <h3 class="cl-white text-uppercase m-t0 m-b0 text-center">                                        
                                        <?php echo the_title();?>  
                                    </h3>                                    
                                </div> 
                            </div> 
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
                <?php if ($load_more && $query->found_posts > $number_of_posts) : ?>
                    <div class="row center-xs m-lg-t3">
                        <a class="kryo-button button blue wow fadeInUp" data-animation="fadeIn" data-wow-duration="0.8s" id="load-more" data-wow-delay="<?php echo $animation_delay + 0.2; ?>s;">
                            <span class="kryo-button">
                                <span class="button-text text">
                                    Load More                                   
                                </span>
                            </span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php
}
?>