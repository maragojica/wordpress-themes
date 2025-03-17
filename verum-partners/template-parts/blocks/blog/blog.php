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
    $cat_audio_id = 17;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $number_of_posts,	
        'cat' => -$cat_audio_id	
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
    <section class="section-main-blog blog p-mv-b0">
        <div class="container">
            <div class="row center-xs">
				<div class="col-xs-12">
                <?php if (!empty($sub_heading)) : ?>
                    <div class="main-description dp-1 cl-orange wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo esc_html($sub_heading); ?></span>
                <?php endif; ?>
                <?php if (!empty($heading)) : ?>
                    <h2 class="text-uppercase cl-orange text-center mt-0 mb-10px mb-lg-1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>
				</div>
            </div>
            <div class="<?php echo $row_class; ?> m-t1 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.6s">
                <?php if ($categories_as_filters && is_array($selected_categories) && !empty($selected_categories)) : ?>
                    <div class="<?php echo $filter_col_class; ?>">
                        <div class="categories-filters">
                            <?php foreach ($selected_categories as $category_id) {
                                $category = get_term($category_id, 'category');
                                if (!is_wp_error($category)) {
                                    echo '<button class="category-filter" data-category-id="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</button>';
                                }
                            } ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($search_filter) : ?>
                    <div class="<?php echo $search_col_class; ?> col-search">
						<div class="box-link-blogs">
							 <a href="#main-blog" tabindex="0" aria-label="Blog" title="Blog" class="blog-anchor">
								Blog
							</a>
							 <a href="#audio-blog" tabindex="0" aria-label="Audio" title="Audio" class="blog-anchor">
								Audio
							</a>
						</div>
                        <form id="search-posts">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <mask id="mask0_772_11" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                <rect width="24" height="24" fill="#D9D9D9"/>
                            </mask>
                            <g mask="url(#mask0_772_11)">
                                <path d="M19.6 21L13.3 14.7C12.8 15.1 12.225 15.4167 11.575 15.65C10.925 15.8833 10.2333 16 9.5 16C7.68333 16 6.14583 15.3708 4.8875 14.1125C3.62917 12.8542 3 11.3167 3 9.5C3 7.68333 3.62917 6.14583 4.8875 4.8875C6.14583 3.62917 7.68333 3 9.5 3C11.3167 3 12.8542 3.62917 14.1125 4.8875C15.3708 6.14583 16 7.68333 16 9.5C16 10.2333 15.8833 10.925 15.65 11.575C15.4167 12.225 15.1 12.8 14.7 13.3L21 19.6L19.6 21ZM9.5 14C10.75 14 11.8125 13.5625 12.6875 12.6875C13.5625 11.8125 14 10.75 14 9.5C14 8.25 13.5625 7.1875 12.6875 6.3125C11.8125 5.4375 10.75 5 9.5 5C8.25 5 7.1875 5.4375 6.3125 6.3125C5.4375 7.1875 5 8.25 5 9.5C5 10.75 5.4375 11.8125 6.3125 12.6875C7.1875 13.5625 8.25 14 9.5 14Z" fill="#1C1B1F"/>
                            </g>
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
                            <div class="box-post">
                            <div class="content-post">
								<?php if (has_post_thumbnail()) : ?>
								  <a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" class="image-link">
									<?php the_post_thumbnail('medium_large', array('class' => 'img-fluid')); ?>
								  </a>
								<?php endif; ?>
                               <h3 class="cl-green cl-orange-h mt-1"><a class="cl-green cl-orange-h" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>" tabindex="0" href="<?php echo esc_url(get_permalink());?>"><?php echo the_title();?></a></h3>                
                            <?php 
                            if ( has_excerpt() ) {
                            $excerpt = get_the_excerpt();
                            $excerpt_length = 16;
                            $excerpt = get_the_excerpt();
                            $trimmed_excerpt = wp_trim_words($excerpt, $excerpt_length); ?>
                                <div class="dp-1 cl-off-black"><?php echo wp_kses_post($trimmed_excerpt); ?></div>
                            <?php } ?>
                            </div>
                            <div class="footer-post">
                                <div class="entry-date"><?php the_time('F j, Y'); ?></div>
                                <a href="<?php the_permalink(); ?>" class="read-more" tabindex="0" aria-label="Read More" title="Read More">Read More</a>
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
                        <a class="kryo-button wow fadeInUp" data-animation="fadeIn" data-wow-duration="0.8s" id="load-more" data-wow-delay="<?php echo $animation_delay + 0.2; ?>s;">
                            <span class="kryo-button">
                                <span class="button-text cta-button cl-orange cl-green-h">
                                    Load More
                                    <svg class="arrow-passive" xmlns="http://www.w3.org/2000/svg" width="45" height="6" viewBox="0 0 45 6" fill="none">
                                        <path d="M44.1651 3L42 0.834936L39.8349 3L42 5.16506L44.1651 3ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#BB6C29"/>
                                    </svg> 
                                    <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="43" height="6" viewBox="0 0 43 6" fill="none">
                                        <path d="M42.2652 3.26517C42.4116 3.11872 42.4116 2.88128 42.2652 2.73483L39.8787 0.34835C39.7322 0.201903 39.4948 0.201903 39.3483 0.34835C39.2019 0.494796 39.2019 0.732233 39.3483 0.87868L41.4697 3L39.3483 5.12132C39.2019 5.26777 39.2019 5.5052 39.3483 5.65165C39.4948 5.7981 39.7322 5.7981 39.8787 5.65165L42.2652 3.26517ZM0 3.375L42 3.375V2.625L0 2.625L0 3.375Z" fill="#024325"/>
                                    </svg>
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