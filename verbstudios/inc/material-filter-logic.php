<?php

/**
 * Rest API Endpoint
 */
add_action('rest_api_init', function () {
    register_rest_route('wp/v2', '/materials_filter', array(
        'methods' => 'GET',
        'callback' => 'filter_materials_endpoint',
        'permission_callback' => '__return_true',
    ));
});

function filter_materials_endpoint($request)
{
    if (! wp_verify_nonce($request->get_header('X-WP-Nonce'), 'wp_rest')) {
        return new WP_Error('rest_forbidden', esc_html__('You do not have permissions to perform this action.'), array('status' => 403));
    }
    $filters = $request->get_param('filters');
    $page = $request->get_param('page') ?: 1;

    $tax_query = array('relation' => 'AND');

    if (!empty($filters['price'])) {
        $tax_query[] = array(
            'taxonomy' => 'price',
            'field' => 'term_id',
            'terms' => $filters['price']
        );
    }

    if (!empty($filters['species'])) {
        $tax_query[] = array(
            'taxonomy' => 'wood-species',
            'field' => 'term_id',
            'terms' => $filters['species']
        );
    }

    if (!empty($filters['length'])) {
        $tax_query[] = array(
            'taxonomy' => 'length',
            'field' => 'term_id',
            'terms' => $filters['length']
        );
    }

    $args = array(
        'post_type' => 'material',
        'paged' => $page,
        'tax_query' => $tax_query,
        'posts_per_page' => 8
    );

    $query = new WP_Query($args);
    $posts = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $post_thumbnail_id = get_post_meta(get_the_ID(), '_thumbnail_id', true);
            $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
            $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full');
            $price = get_field('price');

            $terms_wood_species = get_the_terms(get_the_ID(), 'wood-species');
            $terms_length = get_the_terms(get_the_ID(), 'length');
            $terms_thickness = get_the_terms(get_the_ID(), 'thickness');
            $terms_list = array();

            if (!empty($terms_wood_species)) {
                foreach ($terms_wood_species as $term) {
                    if ($term->name != "All") {
                        $terms_list[] =  $term->name;
                    }
                }
            }

            if (!empty($terms_length)) {
                foreach ($terms_length as $term) {
                    if ($term->name != "All") {
                        $terms_list[] =  $term->name;
                    }
                }
            }

            if (!empty($terms_thickness)) {
                foreach ($terms_thickness as $term) {
                    if ($term->name != "All") {
                        $terms_list[] =  $term->name;
                    }
                }
            }

            $posts[] = array(
                'title' => get_the_title(),
                'permalink' => get_permalink(),
                'thumbnail_url' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'srcset' => $srcset,
                'sizes' => $sizes,
                'price' => $price,
                'terms' => implode(', ', $terms_list),
            );
        }
        wp_reset_postdata();
    }

    return rest_ensure_response(array(
        'posts' => $posts,
        'posts_per_page' => 8
    ));
}
