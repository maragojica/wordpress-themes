<?php

add_action( 'wp_enqueue_scripts', 'portspeople_bootstrap_child_enqueue_styles' );
function portspeople_bootstrap_child_enqueue_styles() {
	wp_enqueue_style( 'childs-style', get_stylesheet_directory_uri() . '/style.css' );
}

add_action( 'wp_enqueue_scripts', 'portspeople_bootstrap_child_enqueue_scripts' );
function portspeople_bootstrap_child_enqueue_scripts() {

}

/*
 * Widgets*/

function portspeople_bootstrap_child_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Top Header Widget Area', 'portspeople-bootstrap-child' ),
        'id' => 'header-top-area',
        'description' => __( 'Top Header on posts and pages', 'portspeople-bootstrap-child' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
        'after_widget' => '</aside>',

    ) );

}
add_action( 'widgets_init', 'portspeople_bootstrap_child_widgets_init' );

/*Menu*/
register_nav_menus( array(

		'header-menu-action' => __( 'Header Action Menu', 'portspeople' )
) );


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
/**
 *	ENABLED FILE *.svg
 **/

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['vcf'] = 'text/x-vcard';
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}

function my_post_queries( $query ) {
	if (!is_admin() && $query->is_main_query()){

		if(is_category() || is_search() || is_author() || is_tag()){
			$query->set('posts_per_page', 100);
		}
	}
}
add_action( 'pre_get_posts', 'my_post_queries' );

function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'policymaker'; // change to your post type
	$taxonomy  = 'policymakercat'; // change to your taxonomy
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

add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'policymaker'; // change to your post type
	$taxonomy  = 'policymakercat'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy2');
function tsm_filter_post_type_by_taxonomy2() {
	global $typenow;
	$post_type = 'advocate'; // change to your post type
	$taxonomy  = 'advocatecat'; // change to your taxonomy
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

add_filter('parse_query', 'tsm_convert_id_to_term_in_query2');
function tsm_convert_id_to_term_in_query2($query) {
	global $pagenow;
	$post_type = 'advocate'; // change to your post type
	$taxonomy  = 'advocatecat'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
	$return = array();

	if (class_exists('WPSEO_Primary_Term')){
		// Show Primary category by Yoast if it is enabled & set
		$wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
		$primary_term = get_term($wpseo_primary_term->get_primary_term());

		if (!is_wp_error($primary_term)){
			$return['primary_category'] = $primary_term;
		}
	}

	if (empty($return['primary_category']) || $return_all_categories){
		$categories_list = get_the_terms($post_id, $term);

		if (empty($return['primary_category']) && !empty($categories_list)){
			$return['primary_category'] = $categories_list[0];  //get the first category
		}
		if ($return_all_categories){
			$return['all_categories'] = array();

			if (!empty($categories_list)){
				foreach($categories_list as &$category){
					$return['all_categories'][] = $category->term_id;
				}
			}
		}
	}

	return $return;
}


/*Customization Theme*/
function social_theme_page() {
	add_theme_page( 'Ports for People Theme Customization', 'Ports for People Theme Settings', 'edit_theme_options', 'test-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'social_theme_page' );

//this function creates a simple page with title Custom Theme Options Page.
function theme_option_page() {
	?>
	<div class="wrap">
		<h1>Ports for People Theme Options</h1>
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
function portspeople_theme_settings(){
	add_option('first_field_option',1);// add theme option to database
	add_settings_section( 'first_section', 'Ports for People Social Section',
			'theme_section_description','theme-options');


	//Section Title
	add_settings_field('section_title_social', 'Section Title', 'display_sectiontitle_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'portspeople_section_title');

	//Facebook element.
	add_settings_field('facebook_url', 'Facebook Profile Url', 'display_facebook_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'portspeople_facebook_url');

	//Twitter element.
	add_settings_field('twitter_url', 'Twitter Profile Url', 'display_twitter_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'portspeople_twitter_url');

	//Instagram element.
	add_settings_field('instagram_url', 'Instagram Profile Url', 'display_instagram_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'portspeople_instagram_url');

	//Youtube element.
	add_settings_field('youtube_url', 'Youtube Profile Url', 'display_youtube_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'portspeople_youtube_url');




}
add_action('admin_init','portspeople_theme_settings');

function display_sectiontitle_element(){

	?>
	<input type="text" name="portspeople_section_title" id="portspeople_section_title" value="<?php echo get_option('portspeople_section_title'); ?>" />
	<?php
}

function display_facebook_element(){

	?>
	<input type="text" name="portspeople_facebook_url" id="portspeople_facebook_url" value="<?php echo get_option('portspeople_facebook_url'); ?>" />
	<?php
}
function display_twitter_element(){

	?>
	<input type="text" name="portspeople_twitter_url" id="portspeople_twitter_url" value="<?php echo get_option('portspeople_twitter_url'); ?>" />
	<?php
}
function display_instagram_element(){

	?>
	<input type="text" name="portspeople_instagram_url" id="portspeople_instagram_url" value="<?php echo get_option('portspeople_instagram_url'); ?>" />
	<?php
}
function display_youtube_element(){

	?>
	<input type="text" name="portspeople_youtube_url" id="portspeople_youtube_url" value="<?php echo get_option('portspeople_youtube_url'); ?>" />
	<?php
}


 ?>