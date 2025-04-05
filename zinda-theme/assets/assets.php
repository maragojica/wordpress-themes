<?php

add_action( 'wp_enqueue_scripts', 'custom_include_assets' );
function enqueue_select2_admin() {
    if (is_admin()) {
        wp_enqueue_script('select2-js',  CHILD_URL . '/assets/libs/select2/css/select2.min.css', array('jquery'), '4.0.13', true);
        wp_enqueue_style('select2-css',  CHILD_URL . '/assets/libs/select2/js/iziModal.min.js', array(), '4.0.13'); 
    }
}
add_action('admin_enqueue_scripts', 'enqueue_select2_admin');

function custom_include_assets() {
    $jsArray = [
//        CHILD_URL . '/assets/libs/izimodal/js/iziModal.min.js',
//        CHILD_URL . '/assets/libs/swiper/js/swiper-bundle.min.js'
    ];

    $cssArray = [
//        CHILD_URL . '/assets/libs/izimodal/css/iziModal.min.css',
//        CHILD_URL . '/assets/libs/swiper/css/swiper-bundle.min.css'
    ];

    foreach($cssArray as $css_asset) {
        wp_enqueue_style( basename($css_asset), $css_asset);
    }

    foreach($jsArray as $js_asset) {
        wp_enqueue_script( basename($js_asset), $js_asset, array('jquery'), '1.0.0', true);
    }


    // include general theme files
    wp_enqueue_style( 'theme-main', CHILD_URL . '/assets/app/css/main.min.css' , array(), filemtime(__DIR__ . '/app/css/main.min.css'));
    wp_enqueue_script( 'theme-main', CHILD_URL . '/assets/app/js/main.min.js', array('jquery'), filemtime(__DIR__ . '/app/js/main.min.js'), true );

}