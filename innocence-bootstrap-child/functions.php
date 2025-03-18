<?php

add_action( 'wp_enqueue_scripts', 'innocence_bootstrap_child_enqueue_styles' );
function innocence_bootstrap_child_enqueue_styles() {
	wp_enqueue_style( 'childs-style', get_stylesheet_directory_uri() . '/style.css' );
}


add_action( 'wp_enqueue_scripts', 'innocence_bootstrap_child_enqueue_scripts' );

function innocence_bootstrap_child_enqueue_scripts() {

}


function wpdocs_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/*Menu*/
register_nav_menus( array(

		'report-menu' => __( 'Report Menu', 'innocence-bootstrap-child' ),
		'donation-menu' => __( 'Donation Menu', 'innocence-bootstrap-child' )
) );


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


/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

