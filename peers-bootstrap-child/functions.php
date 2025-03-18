<?php

add_action( 'wp_enqueue_scripts', 'peer_bootstrap_child_enqueue_styles' );
function peer_bootstrap_child_enqueue_styles() {
	wp_enqueue_style( 'childs-style', get_stylesheet_directory_uri() . '/style.css' );
 	// Fonts stylesheet.
 	wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/assets/fonts/fontstypes.css');
}


add_action( 'wp_enqueue_scripts', 'peer_bootstrap_child_enqueue_scripts' );

function peer_bootstrap_child_enqueue_scripts() {

}
/*
 * Widgets*/


function wpdocs_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/*Menu*/
register_nav_menus( array(

		'404-menu' => __( '404 Menu', 'peer-bootstrap-child' )
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

/*Customization Theme*/
function social_theme_page() {
	add_theme_page( 'Peers Theme Customization', 'Peers Theme Settings', 'edit_theme_options', 'test-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'social_theme_page' );

//this function creates a simple page with title Custom Theme Options Page.
function theme_option_page() {
	?>
	<div class="wrap">
		<h1>Peers Theme Options</h1>
		<form method="post" action="options.php">
			<?php
			// display settings field on theme-option page
			settings_fields("theme-options-grp");

			// display all sections for theme-options page
			do_settings_sections("theme-options");
			submit_button();
			?>
		</form>
	</div>
	<?php
}
function theme_section_description(){
	echo '<p>Add social url</p>';
}
//admin-init hook to create settings section with title “Peers Social Section”.
function peer_theme_settings(){
	add_option('first_field_option',1);// add theme option to database
	add_settings_section( 'first_section', 'Peers Social Section',
			'theme_section_description','theme-options');


	//Twitter element.
	add_settings_field('twitter_url', 'Twitter Profile Url', 'display_twitter_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'peer_twitter_url');

}

function display_twitter_element(){

	?>
	<input type="text" name="peer_twitter_url" id="peer_twitter_url" value="<?php echo get_option('peer_twitter_url'); ?>" />
	<?php
}
add_action('admin_init','peer_theme_settings');


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

