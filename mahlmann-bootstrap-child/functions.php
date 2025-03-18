<?php

 function mahlmann_enqueue_styles() {

	 //Theme block stylesheet.
	 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
	 wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style'));

     // Fonts stylesheet.
     wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/assets/fonts/fontstypes.css');

     //IHover CSS
     wp_enqueue_style( 'ihover-css', get_stylesheet_directory_uri() . '/assets/css/ihover.css');

 }
add_action( 'wp_enqueue_scripts', 'mahlmann_enqueue_styles' );

function mahlmann_enqueue_scripts() {

}
add_action( 'wp_enqueue_scripts', 'mahlmann_enqueue_scripts' );



/*Menu*/
register_nav_menus( array(

		'footer-center-menu' => __( 'Footer Center Menu', 'mahlmann' )
) );
/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

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

		// alter the query for the home and category pages
		if ($query->is_search) {
			$query->set('post_type', array( 'post' ));
		}

		if(is_home() || is_category() || is_search() || is_author() || is_tag()){
			$query->set('posts_per_page', 9);
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


function excerpt($content, $limit=15) {
    $excerpt = explode(' ', $content, $limit);
    if (count($excerpt)>=$limit) {
    	array_pop($excerpt);
    	$excerpt = implode(" ",$excerpt).'...';
    } else
    	$excerpt = implode(" ",$excerpt);

    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
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
	add_theme_page( 'Mahlmann Media Theme Customization', 'Mahlmann Media Theme Settings', 'edit_theme_options', 'test-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'social_theme_page' );

//this function creates a simple page with title Custom Theme Options Page.
function theme_option_page() {
	?>
	<div class="wrap">
		<h1>Mahlmann Media Theme Options</h1>
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
function mahlmann_theme_settings(){
	add_option('first_field_option',1);// add theme option to database
	add_settings_section( 'first_section', 'Mahlmann Media Social Section',
			'theme_section_description','theme-options');


	//Facebook element.
	add_settings_field('facebook_url', 'Facebook Profile Url', 'display_facebook_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'mahlmann_facebook_url');

	//Linkedin element.
	add_settings_field('linkedin_url', 'Linkedin Profile Url', 'display_linkedin_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'mahlmann_linkedin_url');


}
add_action('admin_init','mahlmann_theme_settings');

function display_facebook_element(){

	?>
	<input type="text" name="mahlmann_facebook_url" id="mahlmann_facebook_url" value="<?php echo get_option('mahlmann_facebook_url'); ?>" />
	<?php
}

function display_linkedin_element(){

	?>
	<input type="text" name="mahlmann_linkedin_url" id="mahlmann_linkedin_url" value="<?php echo get_option('mahlmann_linkedin_url'); ?>" />
	<?php
}


/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);