<?php // Get current post ID and categories
$current_post_id = get_the_ID();
$current_categories = wp_get_post_terms($current_post_id, 'nonprofit-resource-category', array('fields' => 'ids'));

if (!empty($current_categories)) {
    // Query for related posts
    $related_posts = new WP_Query(array(
        'post_type' => 'nonprofit-resources',
        'posts_per_page' => 3,
        'post__not_in' => array($current_post_id),
        'tax_query' => array(
            array(
                'taxonomy' => 'nonprofit-resource-category',
                'field'    => 'term_id',
                'terms'    => $current_categories,
            ),
        ),
        'orderby' => 'rand', // Random order, or use 'date' for newest first
    ));

    if ($related_posts->have_posts()) : ?>
        <section class="related-posts-section padding-medium  pb-lg-0 pb-0-important">
            <div class="container">
                <!-- Section Header -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                            <div class="section-header">
                                <div class="section-title">Related posts</div>
                                <p class="section-description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                            <div class="mt-3 mt-md-0">
                                <a href="<?php echo get_post_type_archive_link('nonprofit-resources'); ?>" 
                                   class="btn btn-outline-secondary btn-view-all">
                                    View all
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Posts Grid -->
                <div class="row g-4">
                    <?php while ($related_posts->have_posts()) : $related_posts->the_post(); 
                        // Get post data
                        $post_categories = wp_get_post_terms(get_the_ID(), 'nonprofit-resource-category');
                        $reading_time = get_field('reading_time') ? get_field('reading_time') : '5 min read';
                        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        $excerpt = get_the_excerpt() ? get_the_excerpt() : 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros.';
                    ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <article class="related-post-card">
                                <!-- Featured Image -->
                                <div class="post-image-wrapper">
                                    <?php if ($featured_image) : ?>
                                        <img src="<?php echo esc_url($featured_image); ?>" 
                                             alt="<?php echo esc_attr(get_the_title()); ?>"
                                             class="post-image">
                                    <?php else : ?>
                                        <div class="post-image-placeholder">
                                            <svg class="placeholder-icon" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- Card Content -->
                                <div class="card-body-custom">
                                    <!-- Category and Reading Time -->
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="post-category">
                                            <?php if (!empty($post_categories)) : ?>
                                                <?php echo esc_html($post_categories[0]->name); ?>
                                            <?php else : ?>
                                                Category
                                            <?php endif; ?>
                                        </span>
                                        <span class="reading-time"><?php echo esc_html($reading_time); ?></span>
                                    </div>

                                    <!-- Post Title -->
                                    <h3 class="post-title">
                                        <a href="<?php the_permalink(); ?>" class="post-title-link">
                                            <?php the_title(); ?>
                                        </a>
                                    </h3>

                                    <!-- Post Excerpt -->
                                    <p class="post-excerpt">
                                        <?php echo esc_html($excerpt); ?>
                                    </p>

                                    <!-- Read More Link -->
                                    <a href="<?php the_permalink(); ?>" class="read-more-link">
                                        Read more
                                        <svg class="read-more-icon" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>

        <?php wp_reset_postdata(); ?>
    <?php endif; ?>
<?php } ?>
