<?php
/**
 * WJ Partners functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WJ_Partners
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
function wj_partners_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WJ Partners, use a find and replace
		* to change 'wj-partners' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wj-partners', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary Left', 'wj-partners' ),
			'menu-2' => esc_html__( 'Primary Right', 'wj-partners' ),
			'mobile' => esc_html__( 'Mobile', 'wj-partners' ),
			'footer' => esc_html__( 'Footer', 'wj-partners' )
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
			'wj_partners_custom_background_args',
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
add_action( 'after_setup_theme', 'wj_partners_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wj_partners_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wj_partners_content_width', 640 );
}
add_action( 'after_setup_theme', 'wj_partners_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wj_partners_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wj-partners' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wj-partners' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wj_partners_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wj_partners_scripts() {
	wp_enqueue_style( 'wj-partners-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wj-partners-style', 'rtl', 'replace' );

	wp_enqueue_style('wj-partners-gfonts', 'https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap', [], null );	
	wp_enqueue_style('wj-partners-flex', get_template_directory_uri() . '/css/flex.css', array(), _S_VERSION);
	wp_enqueue_style('wj-partners-responsive-navigation-css', get_template_directory_uri() . '/css/responsive-navigation.css', array(), _S_VERSION);
	wp_enqueue_style('wj-partners-animatemin-css', get_template_directory_uri() . '/css/animate.min.css', array(), _S_VERSION);	
	wp_enqueue_style('wj-partners-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('wj-partners-owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), _S_VERSION);
	wp_enqueue_style('wj-partners-uikit-css', get_template_directory_uri() . '/css/uikit.min.css', array(), _S_VERSION); 	

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'wj-partners-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'wj-partners-navigation-js', get_template_directory_uri() . '/js/responsive-navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('wj-partners-wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true );
	wp_enqueue_script('wj-partners-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	wp_enqueue_script('wj-partners-uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('wj-partners-uikit-icons-js', get_template_directory_uri() . '/js/uikit-icons.min.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'wj-partners-loadmore-js', get_template_directory_uri() . '/js/jquery.simpleLoadMore.js', array(), _S_VERSION, true );

	if(is_page_template( 'templates/page-about.php' ) || is_page_template( 'templates/page-investment.php' ) ): 	
		wp_enqueue_script('wj-partners-accordeon-js', get_template_directory_uri() . '/js/accordeon.js', array(), _S_VERSION, true);
	endif;

	wp_enqueue_style('wj-partners-main-css', get_template_directory_uri() . '/css/wj-partners.css', array(), _S_VERSION);
	wp_enqueue_script( 'wj-partners-main-js', get_template_directory_uri() . '/js/wj-partners.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wj_partners_scripts' );

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
  * Disable Gutenberg For Pages
  */
 if (is_admin()) :
	 add_filter('use_block_editor_for_post', 'laz_disable_block_for_post_type', 10, 2);
 endif;
 
 function laz_disable_block_for_post_type($bool, $post) {
	 if ('page' === $post->post_type || 'post' === $post->post_type || 'testimonial' === $post->post_type || 'team-member' === $post->post_type || 'company' === $post->post_type) :
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

 //Laz Security Snippet
function laz_security_headers() {
    header("Content-Security-Policy: upgrade-insecure-requests;");
    header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
    header('Referrer-Policy: no-referrer-when-downgrade');
    header('X-XSS-Protection: 1; mode=block');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
}
add_action('wp_head', 'laz_security_headers');