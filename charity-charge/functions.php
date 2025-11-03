<?php
/**
 * Charity Charge functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Charity_Charge
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', time() );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function charity_charge_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Charity Charge, use a find and replace
		* to change 'charity-charge' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'charity-charge', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-primary' => esc_html__( 'Primary Menu', 'charity-charge' ),
			'menu-mobile' => esc_html__( 'Mobile Menu', 'charity-charge' ),
			'menu-footer-1' => esc_html__( 'Footer Menu 1', 'charity-charge' ),
			'menu-footer-2' => esc_html__( 'Footer Menu 2', 'charity-charge' ),
			'menu-footer-3' => esc_html__( 'Footer Menu 3', 'charity-charge' ),
			'menu-footer-4' => esc_html__( 'Footer Menu 4', 'charity-charge' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'charity_charge_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'charity_charge_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function charity_charge_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'charity_charge_content_width', 640 );
}
add_action( 'after_setup_theme', 'charity_charge_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function charity_charge_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'charity-charge' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'charity-charge' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'charity_charge_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function charity_charge_scripts() {
	wp_enqueue_style( 'charity-charge-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'charity-charge-style', 'rtl', 'replace' );

	wp_enqueue_style('charity-charge-gfonts', 'https://fonts.googleapis.com/css2?family=Gabarito:wght@400..900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Marck+Script&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap', [], null );
	wp_enqueue_style('charity-charge-colors', get_template_directory_uri() . '/css/colors.css', array(), _S_VERSION);
	wp_enqueue_style('charity-charge-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style('charity-charge-responsive-navigation-css', get_template_directory_uri() . '/css/responsive-navigation.css', array(), _S_VERSION);
	wp_enqueue_style('charity-charge-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('charity-charge-aos-css', get_template_directory_uri() . '/css/aos.css', array(), _S_VERSION);

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'charity-charge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('charity-charge-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script('charity-charge-responsive-navigation-js', get_template_directory_uri() . '/js/responsive-navigation.js', array(), _S_VERSION, true );	
	wp_enqueue_script('charity-charge-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'charity-charge-aos-js', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, true );

	wp_enqueue_style('charity-charge-main-css', get_template_directory_uri() . '/css/charity-charge.css', array(), _S_VERSION);
	wp_enqueue_script( 'charity-charge-main-js', get_template_directory_uri() . '/js/charity-charge.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'charity_charge_scripts' );

function custom_admin_enqueue_styles() {
    wp_enqueue_style('custom-admin', get_template_directory_uri() . '/css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'custom_admin_enqueue_styles');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Activate Global Theme Options
 */

 require get_template_directory() . '/inc/admin/general-settings.php';

 /**
 * Functions which enhance the theme by hooking into Advanced Custom Fields.
 */
require get_template_directory() . '/inc/admin/acf-functions.php';

 /**
  * Activate Accessibility for links
  */
 function add_attribute_to_current_menu_item( $atts, $item, $args ) {
	 
	 $atts['aria-label'] = $item->title;
	 $atts['tabindex'] = 0;
	 return $atts;
 }
 add_filter( 'nav_menu_link_attributes', 'add_attribute_to_current_menu_item', 10, 3 );
 
 /**
  * Register Thumbnail Sizes
  */
 function mobile_thumbnail_size() {
	 add_image_size('mobile', 500, 0, true);
	 
 }
 add_action('after_setup_theme', 'mobile_thumbnail_size');
 
 /**
  *	ENABLED FILE *.svg
  **/
 
  add_filter('upload_mimes', 'custom_upload_mimes');
  function custom_upload_mimes ( $existing_mimes=array() ) {
	  // add your extension to the array
	 
	  $existing_mimes['svg'] = 'image/svg+xml';
	  return $existing_mimes;
  }


  /**
*	CUSTOM TAXONOMY CPT Nonprofit Resources*
**/

add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_nonprofit_resources');
function tsm_filter_post_type_by_taxonomy_nonprofit_resources() {
	global $typenow;
	$post_type = 'nonprofit-resources'; 
	$taxonomy  = 'nonprofit-resource-category'; 
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

add_filter('parse_query', 'tsm_convert_id_to_term_in_query_nonprofit_resources');
function tsm_convert_id_to_term_in_query_nonprofit_resources($query) {
	global $pagenow;
	$post_type = 'nonprofit-resources'; 
	$taxonomy  = 'nonprofit-resource-category'; 
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

