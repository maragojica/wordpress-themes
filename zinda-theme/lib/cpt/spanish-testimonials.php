<?php
/**
    * Post Type: Spanish Testimonials.
    */

function register_spanish_testimonials_cpt(){
    $labels = [
        "name" => esc_html__("Spanish Testimonials", "custom-post-type-ui"),
        "singular_name" => esc_html__("Spanish Testimonial", "custom-post-type-ui"),
    ];

    $args = [
        "label" => esc_html__("Spanish Testimonials", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => true,
        "rewrite" => ["slug" => "testimonial-sp", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("testimonial-sp", $args);
}

add_action('init' , 'register_spanish_testimonials_cpt');