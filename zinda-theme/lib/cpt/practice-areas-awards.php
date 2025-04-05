<?php
/**
 * Post Type: Practice Areas Awards.
 */


function register_practice_areas_awards_cpt(){

    $labels = [
        "name" => esc_html__("Practice Areas Awards", "custom-post-type-ui"),
        "singular_name" => esc_html__("Practice Area Award", "custom-post-type-ui"),
    ];

    $args = [
        "label" => esc_html__("Practice Areas Awards", "custom-post-type-ui"),
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
        "can_export" => false,
        "rewrite" => ["slug" => "practice-rewards", "with_front" => true],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail"],
        "show_in_graphql" => false,
    ];

    register_post_type("practice-rewards", $args);
}

add_action('init', 'register_practice_areas_awards_cpt');