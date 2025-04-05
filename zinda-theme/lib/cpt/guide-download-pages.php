<?php
/**
 * Post Type: Guide Download Pages.
 */

function register_badges_cpt(){

    $labels = [
        "name" => esc_html__("Guide Download Pages", "custom-post-type-ui"),
        "singular_name" => esc_html__("Guide Download Page", "custom-post-type-ui"),
        "menu_name" => esc_html__("Guide Download Pages", "custom-post-type-ui"),
        "all_items" => esc_html__("All Guide Download Pages", "custom-post-type-ui"),
        "add_new" => esc_html__("Add Guide Download Page", "custom-post-type-ui"),
    ];

    $args = [
        "label" => esc_html__("Guide Download Pages", "custom-post-type-ui"),
        "labels" => $labels,
        "description" => "Custom type to create a guide download page.",
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
        "rewrite" => ["slug" => "guide-download-page", "with_front" => false],
        "query_var" => true,
        "supports" => ["title", "editor", "thumbnail", "custom-fields"],
        "show_in_graphql" => false,
    ];

    register_post_type("guide-download-page", $args);
}

add_action('init', 'register_badges_cpt');