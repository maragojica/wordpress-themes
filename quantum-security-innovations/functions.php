<?php
/**
 * Quantum Security & Innovations functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Quantum_Security_&_Innovations
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
function quantum_security_innovations_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Quantum Security & Innovations, use a find and replace
		* to change 'quantum-security-innovations' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'quantum-security-innovations', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'quantum-security-innovations' ),
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
			'quantum_security_innovations_custom_background_args',
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
add_action( 'after_setup_theme', 'quantum_security_innovations_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function quantum_security_innovations_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'quantum_security_innovations_content_width', 640 );
}
add_action( 'after_setup_theme', 'quantum_security_innovations_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function quantum_security_innovations_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'quantum-security-innovations' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'quantum-security-innovations' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'quantum_security_innovations_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function quantum_security_innovations_scripts() {
	wp_enqueue_style( 'quantum-security-innovations-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'quantum-security-innovations-style', 'rtl', 'replace' );

    wp_enqueue_style('quantum-security-innovations-afonts', 'https://use.typekit.net/cfh3kac.css', [], null );
	wp_enqueue_style('quantum-security-innovations-gfonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600;700;900&display=swap', [], null );
	wp_enqueue_style('quantum-security-innovations-flex', get_template_directory_uri() . '/css/flex.css', array(), _S_VERSION);
	wp_enqueue_style('quantum-security-innovations-responsive-navigation-css', get_template_directory_uri() . '/css/responsive-navigation.css', array(), _S_VERSION);			
	wp_enqueue_style('quantum-security-innovations-animate-css', get_template_directory_uri() . '/css/animate-scroll.css', array(), _S_VERSION);		
	wp_enqueue_style('quantum-security-innovations-glider-css', get_template_directory_uri() . '/css/glider.min.css', array(), _S_VERSION);  
	wp_enqueue_style('quantum-security-innovations-slick-css', get_template_directory_uri() . '/css/slick.min.css', array(), _S_VERSION); 
	wp_enqueue_style('quantum-security-innovations-fancyboxcss', get_template_directory_uri() . '/css/fancybox.min.css', array(), _S_VERSION); 
	

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'quantum-security-innovations-navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'quantum-security-innovations-responsive-navigation-js', get_template_directory_uri() . '/js/responsive-navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'quantum-security-innovations-animate-js', get_template_directory_uri() . '/js/animate-scroll.js', array(), _S_VERSION, true );
	wp_enqueue_script('quantum-security-innovations-glider-js', get_template_directory_uri() . '/js/glider.min.js', array(), _S_VERSION, true); 		
	wp_enqueue_script('quantum-security-innovations-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true); 
	wp_enqueue_script('quantum-security-innovations-parallax-js', get_template_directory_uri() . '/js/parallax.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('quantum-security-innovations-fancybox-js', get_template_directory_uri() . '/js/fancybox.min.js', array(), _S_VERSION, true);

	if(is_page_template( 'templates/page-resources.php' ) || is_page_template( 'templates/page-companies.php' ) || is_page_template( 'templates/page-about.php' ) || is_page_template( 'templates/page-team.php' )): 	
		wp_enqueue_script('quantum-security-innovations-accordeon-js', get_template_directory_uri() . '/js/accordeon.js', array(), _S_VERSION, true);
	endif;

	wp_enqueue_style('quantum-security-innovations-plyr-css', get_template_directory_uri() . '/css/plyr.css', array(), _S_VERSION); 
	wp_enqueue_script('quantum-security-innovations-plyr-js', get_template_directory_uri() . '/js/plyr.polyfilled.js', array(), _S_VERSION, true);

	wp_enqueue_style('quantum-security-innovations-main-css', get_template_directory_uri() . '/css/quantum-security-innovations.css', array(), _S_VERSION);
	wp_enqueue_script( 'quantum-security-innovations-main-js', get_template_directory_uri() . '/js/quantum-security-innovations.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	
}
add_action( 'wp_enqueue_scripts', 'quantum_security_innovations_scripts' );

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
 * Activate Global Theme Options
 */
require get_template_directory() . '/inc/admin/general-settings.php';

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
 * Disable Gutenberg For Pages
 */
if (is_admin()) :
    add_filter('use_block_editor_for_post', 'laz_disable_block_for_post_type', 10, 2);
endif;

function laz_disable_block_for_post_type($bool, $post) {
    if ('page' === $post->post_type || 'testimonial' === $post->post_type || 'team-member' === $post->post_type || 'project' === $post->post_type) :
        return false;
    endif;

    return $bool;
}

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