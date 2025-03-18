<?php
/**
 * Vamp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vamp
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
function vamp_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Vamp, use a find and replace
		* to change 'vamp' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'vamp', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'vamp' ),
			'menu-mobile' => esc_html__( 'Mobile', 'vamp' ),
			'menu-footer' => esc_html__( 'Footer', 'vamp' )
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
			'vamp_custom_background_args',
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
add_action( 'after_setup_theme', 'vamp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function vamp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'vamp_content_width', 640 );
}
add_action( 'after_setup_theme', 'vamp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vamp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'vamp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'vamp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vamp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vamp_scripts() {
	wp_enqueue_style( 'vamp-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'vamp-style', 'rtl', 'replace' );

	wp_enqueue_style('vamp-gfonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap', [], null );


	/*CSS*/
	wp_enqueue_style('vamp-flex', get_template_directory_uri() . '/css/flex.css', array(), _S_VERSION);
	wp_enqueue_style('vamp-responsive-nav-css', get_template_directory_uri() . '/css/responsive-navigation.css', array(), _S_VERSION);
	wp_enqueue_style('vamp-animate-css', get_template_directory_uri() . '/css/animate-scroll.css', array(), _S_VERSION);	
	wp_enqueue_style('vamp-main-css', get_template_directory_uri() . '/css/vamp.css', array(), _S_VERSION);
	wp_enqueue_style('vamp-glider-css', get_template_directory_uri() . '/css/glider.min.css', array(), _S_VERSION);  
	wp_enqueue_style('vamp-slick-css', get_template_directory_uri() . '/css/slick.min.css', array(), _S_VERSION);  
	wp_enqueue_style('vamp-plyr-css', get_template_directory_uri() . '/css/plyr.css', array(), _S_VERSION); 
	
	
	/*JS*/
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'vamp-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'vamp-responsive-navigation', get_template_directory_uri() . '/js/responsive-navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'vamp-animate-js', get_template_directory_uri() . '/js/animate-scroll.js', array(), _S_VERSION, true );	
	wp_enqueue_script('vamp-plyr-js', get_template_directory_uri() . '/js/plyr.polyfilled.js', array(), _S_VERSION, true);

	wp_enqueue_style('vamp-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('vamp-owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), _S_VERSION);
	wp_enqueue_script( 'vamp-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'vamp-counters-js', get_template_directory_uri() . '/js/counters.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'vamp-glider-js', get_template_directory_uri() . '/js/glider.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'vamp-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true );

	if( ( is_single() && 'service' == get_post_type() ) || is_page_template( 'templates/page-about.php' ) || is_single()  ): 	
		wp_enqueue_script('vamp-accordeon-js', get_template_directory_uri() . '/js/accordeon.js', array(), _S_VERSION, true);
	endif;

	wp_enqueue_script( 'vamp-main-js', get_template_directory_uri() . '/js/vamp.js', array(), _S_VERSION, true );
	



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vamp_scripts' );

/**
 * Disable Gutenberg For Pages
 */
if (is_admin()) :
    add_filter('use_block_editor_for_post', 'laz_disable_block_for_post_type', 10, 2);
endif;

function laz_disable_block_for_post_type($bool, $post) {
    if ('page' === $post->post_type || 'service' === $post->post_type || 'location' === $post->post_type) :
        return false;
    endif;

    return $bool;
}
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

/* Implement General Theme Settings */
require get_template_directory() . '/inc/general-settings.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

