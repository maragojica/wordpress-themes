<?php 
// Get current post ID and categories
$current_post_id = get_the_ID();
$current_categories = wp_get_post_terms($current_post_id, 'nonprofit-resource-category', array('fields' => 'ids'));

if (!empty($current_categories)) {
    // Generate a unique seed for randomness that changes periodically
    $random_seed = date('YmdH') . $current_post_id; // Changes every hour
    
    // First try to get related posts with matching categories
    $related_posts = new WP_Query(array(
        'post_type' => 'nonprofit-resources',
        'posts_per_page' => 3,
        'post__not_in' => array($current_post_id),
        'tax_query' => array(
            array(
                'taxonomy' => 'nonprofit-resource-category',
                'field'    => 'term_id',
                'terms'    => $current_categories,
                'operator' => 'IN', // Match ANY of the categories
            ),
        ),
        'orderby' => 'RAND(' . $random_seed . ')',
        'no_found_rows' => true,
        'update_post_meta_cache' => false,
        'update_post_term_cache' => false,
        'ignore_sticky_posts' => true,
    ));
    
    // If we don't have enough posts, get random posts from all categories
    if ($related_posts->post_count < 3) {
        // Reset post data before new query
        wp_reset_postdata();
        
        $related_posts = new WP_Query(array(
            'post_type' => 'nonprofit-resources',
            'posts_per_page' => 3,
            'post__not_in' => array($current_post_id),
            'orderby' => 'RAND(' . $random_seed . ')',
            'no_found_rows' => true,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
            'ignore_sticky_posts' => true,
        ));
    }

    if ($related_posts->have_posts()) : ?>
        <section class="related-posts-section padding-medium pb-lg-0 pb-0-important">
            <div class="container">
                <!-- Section Header -->
                <div class="row mb-lg-5 mb-3">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                            <div class="section-header">
                                <?php $heading_related_nonprofit = get_field('heading_related_nonprofit', 'option');
                                if($heading_related_nonprofit): ?>
                                <div class="section-title color-black"><?php echo esc_html($heading_related_nonprofit); ?></div>
                                <?php endif; ?>
                                <?php $description_related_nonprofit = get_field('description_related_nonprofit', 'option');
                                 if($description_related_nonprofit): ?>
                                <div class="section-description mt-3 color-black">
                                    <?php echo $description_related_nonprofit; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="mt-3 mt-md-0 d-none d-lg-block">
                                 <?php $buttons = get_field('buttons_related_nonprofit', 'option'); if ($buttons) : ?>
                                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 justify-content-center justify-content-lg-end" data-aos="fade-up" data-aos-delay="50">
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
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Posts Grid -->
                <div class="row g-4">
                    <?php while ($related_posts->have_posts()) : 
                        $related_posts->the_post();
                        
                        // Get post data
                        $post_categories = wp_get_post_terms(get_the_ID(), 'nonprofit-resource-category');
                        $reading_time = get_field('reading_time') ? get_field('reading_time') : '5 min read';
                        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $excerpt = get_the_excerpt() ? get_the_excerpt() : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.';
                    ?>
                        <div class="col-12 col-lg-4">
                            <article class="related-post-card h-100 d-flex flex-column">
                                <!-- Featured Image -->
                                <div class="post-image-wrapper">
                                    <?php if ($featured_image) : ?>
                                        <img src="<?php echo esc_url($featured_image); ?>" 
                                             alt="<?php echo esc_attr(get_the_title()); ?>"
                                             class="post-image">                                   
                                    <?php endif; ?>
                                </div>

                                <!-- Card Content -->
                                <div class="card-body-custom d-flex flex-column flex-grow-1 justify-content-between">
                                    <div>
                                        <!-- Category and Reading Time -->
                                        <div class="post-meta d-flex align-items-center gap-3">
                                            <span class="category-tags color-black">
                                                <?php if (!empty($post_categories)) : ?>
                                                    <?php echo esc_html($post_categories[0]->name); ?>
                                                <?php else : ?>
                                                    Category
                                                <?php endif; ?>
                                            </span>
                                            <span class="read-time color-black"><?php echo esc_html($reading_time); ?></span>
                                        </div>

                                        <!-- Post Title -->
                                        <div class="post-related-title color-black">
                                            <a href="<?php the_permalink(); ?>" class="post-title-link">
                                                <?php the_title(); ?>
                                            </a>
                                        </div>

                                        <!-- Post Excerpt -->
                                        <div class="post-excerpt color-black">
                                            <?php echo esc_html($excerpt); ?>
                                        </div>
                                    </div>

                                    <!-- Read More Link -->
                                    <div class="mt-3 mt-auto">
                                        <a href="<?php the_permalink(); ?>" class="read-more-link">
                                            Read more
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7941 7.85072C10.9747 8.03134 10.9747 8.32413 10.7941 8.50474L6.07883 13.22C5.89821 13.4006 5.60542 13.4006 5.4248 13.22L5.20675 13.002C5.02613 12.8214 5.02613 12.5285 5.20675 12.3479L9.37696 8.17773L5.20675 4.00752C5.02613 3.8269 5.02613 3.53411 5.20675 3.35349L5.4248 3.13544C5.60542 2.95482 5.89821 2.95482 6.07883 3.13544L10.7941 7.85072Z" fill="black"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
                 <div class="mt-5 d-block d-lg-none">
                                 <?php $buttons = get_field('buttons_related_nonprofit', 'option'); if ($buttons) : ?>
                                <div class="d-flex flex-column flex-lg-row flex-wrap gap-3 justify-content-center justify-content-lg-end" data-aos="fade-up" data-aos-delay="50">
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
                                            <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="button <?php if($button_style): echo $button_style; endif;?> <?php if($button_type): echo $button_type; endif;?> d-block mx-auto text-center" style="width: fit-content !important;">
                                                <?php echo esc_html( $title ); ?>
                                            </a>
                                        </div>            
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            </div>
            </div>
        </section>

        <?php 
        // Always reset post data after custom query in single post template
        wp_reset_postdata(); 
        ?>
    <?php endif; ?>
<?php } ?>