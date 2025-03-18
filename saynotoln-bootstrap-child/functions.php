<?php


function  saynotoln_bootstrap_child_styles() {
	wp_enqueue_style( 'childs-style', get_stylesheet_directory_uri() . '/style.css' );
 	// Fonts stylesheet.
 	wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/assets/fonts/fontstypes.css');
}

add_action( 'wp_enqueue_scripts', 'saynotoln_bootstrap_child_styles' );


function  saynotoln_bootstrap_child_enqueue_scripts() {

}
add_action( 'wp_enqueue_scripts', 'saynotoln_bootstrap_child_enqueue_scripts' );
/*
 * Widgets*/
function saynotoln_bootstrap_child_widgets_init() {
	register_sidebar( array(
			'name' => __( 'Top Header Widget Area', 'saynotoln-bootstrap-child' ),
			'id' => 'header-top-area',
			'description' => __( 'Top Header on posts and pages', 'saynotoln-bootstrap-child' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',

	) );

}
add_action( 'widgets_init', 'saynotoln_bootstrap_child_widgets_init' );

function wpdocs_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


/*Menu*/
register_nav_menus( array(

		'404-menu' => __( '404 Menu', 'saynotoln-bootstrap-child' )
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



function isinternal($url) {

	$domain = get_site_url();
	// Test if link is internal/external
	if(stristr($url, $domain) || strpos($url,"/") == '0')
		return true;
	else
		return false;
}

/*Customization Theme*/
function social_theme_page() {
	add_theme_page( 'Say No To LNG Theme Customization', 'Say No To LNG Theme Settings', 'edit_theme_options', 'test-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'social_theme_page' );

//this function creates a simple page with title Custom Theme Options Page.
function theme_option_page() {
	?>
	<div class="wrap">
		<h1>Say No To LNG Theme Options</h1>
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
//admin-init hook to create settings section with title “Walton Social Section”.
function saynolng_theme_settings(){
	add_option('first_field_option',1);// add theme option to database
	add_settings_section( 'first_section', 'Say No To LNG Social Section',
			'theme_section_description','theme-options');


	//Linkedin element.
	add_settings_field('linkedin_url', 'Linkedin Profile Url', 'display_linkedin_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'saynolng_linkedin_url');


	//Twitter element.
	add_settings_field('twitter_url', 'Twitter Profile Url', 'display_twitter_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'saynolng_twitter_url');

	//Facebook element.
	add_settings_field('facebook_url', 'Facebook Profile Url', 'display_facebook_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'saynolng_facebook_url');
	
	//Youtube element.
	add_settings_field('youtubeurl', 'Yourtube Profile Url', 'display_youtube_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'saynolng_youtube_url');
	
	//Tiktok element.
	add_settings_field('tiktok_url', 'TikTok Profile Url', 'display_tiktok_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'saynolng_tiktok_url');	

	//Insta element.
	add_settings_field('insta_url', 'Instagram Profile Url', 'display_insta_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'saynolng_insta_url');		

}
function display_insta_element(){
	?>
	<input type="text" name="saynolng_insta_url" id="saynolng_insta_url" value="<?php echo get_option('saynolng_insta_url'); ?>" />
	<?php
}
add_action('admin_init','saynolng_theme_settings');

function display_youtube_element(){
	?>
	<input type="text" name="saynolng_tiktok_url" id="saynolng_tiktok_url" value="<?php echo get_option('saynolng_tiktok_url'); ?>" />
	<?php
}
add_action('admin_init','saynolng_theme_settings');

function display_tiktok_element(){
	?>
	<input type="text" name="saynolng_youtube_url" id="saynolng_youtube_url" value="<?php echo get_option('saynolng_youtube_url'); ?>" />
	<?php
}
add_action('admin_init','saynolng_theme_settings');

function display_linkedin_element(){

	?>
	<input type="text" name="saynolng_linkedin_url" id="saynolng_linkedin_url" value="<?php echo get_option('saynolng_linkedin_url'); ?>" />
	<?php
}

function display_twitter_element(){

	?>
	<input type="text" name="saynolng_twitter_url" id="saynolng_twitter_url" value="<?php echo get_option('saynolng_twitter_url'); ?>" />
	<?php
}

function display_facebook_element(){

	?>
	<input type="text" name="saynolng_facebook_url" id="saynolng_facebook_url" value="<?php echo get_option('saynolng_facebook_url'); ?>" />
	<?php
}
add_action('admin_init','saynolng_theme_settings');


add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_resource_audience');
function tsm_filter_post_type_by_taxonomy_resource_audience() {
	global $typenow;
	$post_type = 'resource'; // change to your post type
	$taxonomy  = 'resource_audience'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
				'show_option_all' => sprintf( __( 'Show all %s', 'textdomain' ), $info_taxonomy->label ),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
		));
	};
}

add_filter('parse_query', 'tsm_convert_id_to_term_in_query_resource_audience');
function tsm_convert_id_to_term_in_query_resource_audience($query) {
	global $pagenow;
	$post_type = 'resource'; // change to your post type
	$taxonomy  = 'resource_audience'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

