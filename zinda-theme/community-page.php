<?php

/*
Template Name: Community Category Page
*/

remove_action('genesis_loop', 'genesis_do_loop', 10);
add_action('genesis_loop', 'custom_content', 10);

function custom_content()
{
    global $post;

    ?>
    <?php
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 12,
        'orderby' => 'ASC',
        'paged' => $paged,
        'category_name' => 'community-involvement'
    );

    $loop = new WP_Query($args);
    while ($loop->have_posts()) : $loop->the_post();
        ?>
        <article
                class="post type-post status-publish format-standard category-attorneys category-injury-lawyers entry">
            <header class="entry-header"><h2 class="entry-title"><a class="entry-title-link" rel="bookmark"
                                                                    href="<?= the_permalink() ?>"
                                                                    data-wpel-link="internal"><?= the_title() ?></a>
                </h2>
                <p class="entry-meta">
                    Category: <?php the_category(', '); ?></p>
            </header>
            <div class="entry-content"><p><?= wp_trim_words(get_the_content(), 25); ?></p>
            </div>
        </article>
    <?php endwhile; ?>
    <div class="col-lg-12 col-md-12 col-12">
        <?php
        global $wp_query;
        $wp_query = new WP_Query($args);

        if (have_posts()) :
            do_action('genesis_after_endwhile');
        endif;

        wp_reset_query();
        ?>
    </div>
    <?php wp_reset_postdata(); ?>
    <?php
}

function get_community_pages_data() {
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 12,
        'orderby' => 'ASC',
        'paged' => $paged,
        'category_name' => 'community-involvement'
    );

    // Create a new instance of WP_Query
    $community_pages_query = new WP_Query($args);
    $total_pages = $community_pages_query->max_num_pages;

    $data = array(
        'paged' => get_query_var('paged'),
        'total_pages' => $total_pages
    );

    return $data;
}

add_filter( 'wpseo_metadesc', function($description) {
    $data = get_community_pages_data();

    if ($data['paged']) {
        return $description.' - Page ' . $data['paged'] . ' of ' . $data['total_pages'];
    }
    return $description;
} );

add_filter( 'wpseo_title', function($title) {
    $data = get_community_pages_data();

    if ($data['paged']) {
        return $title.' - Page ' . $data['paged'] . ' of ' . $data['total_pages'];
    }
    return $title;
} );

genesis();