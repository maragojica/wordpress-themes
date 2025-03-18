<?php


function  zlateai_bootstrap_child_styles() {
	wp_enqueue_style( 'childs-style', get_stylesheet_directory_uri() . '/style.css' );
 	// Fonts stylesheet.
 	wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/assets/fonts/fontstypes.css');
}

add_action( 'wp_enqueue_scripts', 'zlateai_bootstrap_child_styles' );


function  zlateai_bootstrap_child_enqueue_scripts() {

}
add_action( 'wp_enqueue_scripts', 'zlateai_bootstrap_child_enqueue_scripts' );
/*
 * Widgets*/


function wpdocs_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



/**
 *	ENABLED FILE *.svg
 **/

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['vcf'] = 'text/x-vcard';
	$existing_mimes['vtt'] = 'text/vtt';
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}



function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );



function isinternal($url) {

	$domain = get_site_url();
	// Test if link is internal/external
	if(stristr($url, $domain) || strpos($url,"/") == '0')
		return true;
	else
		return false;
}

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

