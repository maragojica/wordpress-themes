<?php

add_filter('nav_menu_item_id', function($id, $item, $args) {
    return $id == 'menu-item-1672152' ? 'menu-item-1672152' : "";
}, 10, 3);

add_filter('nav_menu_css_class', function($classes, $item, $args) {
    return array_filter($classes, function($class) {
        return
            $class === 'menu-item-has-children' || preg_match('/^menu-item-\d+?$/', $class);
    });
}, 10, 3);

// Remove unwanted SVG filter injection WP
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );