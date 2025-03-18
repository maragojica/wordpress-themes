<?php
/**
 * Enqueues scripts and styles.
 *
 *  */
 function shipit_enqueue_style(){

     //Theme block stylesheet.
     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
     wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style'));

     // Fonts stylesheet.
     wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/assets/fonts/fontstypes.css');

	 //IHover CSS
	 wp_enqueue_style( 'ihover-css', get_stylesheet_directory_uri() . '/assets/css/ihover.css');
 }
add_action( 'wp_enqueue_scripts', 'shipit_enqueue_style' );


function shipit_enqueue_scripts() {

}
add_action( 'wp_enqueue_scripts', 'shipit_enqueue_scripts' );

/*
 * Widgets*/

function shipit_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Top Header Widget Area', 'shipit' ),
        'id' => 'top-header',
        'description' => __( 'Top Header on posts and pages', 'shipit' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
        'after_widget' => '</aside>',

    ) );
	register_sidebar( array(
			'name' => __( 'Footer Copyright Widget Area', 'shipit' ),
			'id' => 'footer-copyright',
			'description' => __( 'Footer Copyright Widget Area', 'shipit' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',

	) );

}
add_action( 'widgets_init', 'shipit_widgets_init' );


/*Menu*/
register_nav_menus( array(

	'header-menu-action' => __( 'Header Action Menu', 'shipit' ),
	'general-info-menu' => __( 'Page 404 Menu', 'shipit' ),
    'footer-menu-2' => __( 'Footer Menu 2', 'shipit' )
) );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
    require_once get_stylesheet_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );
/*Custom Functions*/

function num_of_word($text,$numb) {
	$text = strip_tags($text);
	$wordsArray = explode(" ", $text);
	$parts = array_chunk($wordsArray, $numb);

	$final = implode(" ", $parts[0]);

	if(isset($parts[1]))
		$final = $final." ...";
	return $final;
}

function get_small_title($count,$elipsis){
	$title = get_the_title();
	$len = strlen($title);
	if($len>$count){
		$title = substr($title, 0, $count);
		$title = substr($title, 0, strripos($title, " "));
		if($elipsis==1){
			$title.="...";
		}
	}
	return $title;
}


/**
 * Filter the except length to 24 words.
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


       if(is_home() || is_category() || is_search() || is_author()){
            $query->set('posts_per_page', 10);
        }
    }
	return $query;
}
add_action( 'pre_get_posts', 'my_post_queries' );

function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

/*Customization Theme*/
function social_theme_page() {
	add_theme_page( 'Shipit Theme Customization', 'Shipit Theme Settings', 'edit_theme_options', 'test-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'social_theme_page' );

//this function creates a simple page with title Custom Theme Options Page.
function theme_option_page() {
	?>
	<div class="wrap">
		<h1>Shipit Theme Options</h1>
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
//admin-init hook to create settings section with title “ICAA Social Section”.
function shipit_theme_settings(){
	add_option('first_field_option',1);// add theme option to database
	add_settings_section( 'first_section', 'Shipit Social Section',
			'theme_section_description','theme-options');


	//Twitter element.
	add_settings_field('twitter_url', 'Twitter Profile Url', 'display_twitter_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'shipit_twitter_url');

	//Instagram element.
	add_settings_field('instagram_url', 'Instagram Profile Url', 'display_instagram_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'shipit_instagram_url');


}
add_action('admin_init','shipit_theme_settings');

function display_twitter_element(){

	?>
	<input type="text" name="shipit_twitter_url" id="shipit_twitter_url" value="<?php echo get_option('shipit_twitter_url'); ?>" />
	<?php
}

function display_instagram_element(){

	?>
	<input type="text" name="shipit_instagram_url" id="shipit_instagram_url" value="<?php echo get_option('shipit_instagram_url'); ?>" />
	<?php
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
/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);
/*
add_filter('rest_authentication_errors', function ( $access ) {
        return new WP_Error(
            'rest_disabled',
            __( 'The WordPress REST API has been disabled.' ),
            array(
                'status' => rest_authorization_required_code(),
            )
        );
    }
);
add_filter( 'xmlrpc_enabled', '__return_false' );
*/

