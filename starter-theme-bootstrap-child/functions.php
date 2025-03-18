<?php 
add_action( 'wp_enqueue_scripts', 'starter_theme_bootstrap_child_enqueue_styles' );
function starter_theme_bootstrap_child_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css?v='.time() );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/assets/css/custom-main.css?v=y-'.time() ); //get_stylesheet_directory_uri
}