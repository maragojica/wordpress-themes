<?php
/**
 * Felton Health functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Felton_Health
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
function felton_health_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Felton Health, use a find and replace
		* to change 'felton-health' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'felton-health', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary Left', 'felton-health' ),
			'menu-2' => esc_html__( 'Primary Right', 'felton-health' ),
			'mobile' => esc_html__( 'Mobile', 'felton-health' ),
			'footer-1' => esc_html__( 'Footer', 'felton-health' )
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
			'felton_health_custom_background_args',
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
add_action( 'after_setup_theme', 'felton_health_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function felton_health_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'felton_health_content_width', 640 );
}
add_action( 'after_setup_theme', 'felton_health_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function felton_health_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'felton-health' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'felton-health' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'felton_health_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function felton_health_scripts() {
	wp_enqueue_style( 'felton-health-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'felton-health-style', 'rtl', 'replace' );

	wp_enqueue_style('felton-health-gfonts', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', [], null );	
	wp_enqueue_style('felton-health-flex', get_template_directory_uri() . '/css/flex.css', array(), _S_VERSION);
	wp_enqueue_style('felton-health-responsive-navigation-css', get_template_directory_uri() . '/css/responsive-navigation.css', array(), _S_VERSION);			
	wp_enqueue_style('felton-health-animatemin-css', get_template_directory_uri() . '/css/animate.min.css', array(), _S_VERSION);	
	wp_enqueue_style('felton-health-slick-css', get_template_directory_uri() . '/css/buttons.css', array(), _S_VERSION); 
	wp_enqueue_style('felton-health-uikit-css', get_template_directory_uri() . '/css/uikit.min.css', array(), _S_VERSION); 
	wp_enqueue_style('felton-health-glider-css', get_template_directory_uri() . '/css/glider.min.css', array(), _S_VERSION);  
	wp_enqueue_style('felton-health-slick-css', get_template_directory_uri() . '/css/slick.min.css', array(), _S_VERSION); 
	
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'felton-health-navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('felton-health-responsive-navigation-js', get_template_directory_uri() . '/js/responsive-navigation.js', array(), _S_VERSION, true );	
	wp_enqueue_script('felton-health-wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true );
	wp_enqueue_script('felton-health-youtube-js', get_template_directory_uri() . '/js/youtube.js', array(), _S_VERSION, true);
	wp_enqueue_script('felton-health-glider-js', get_template_directory_uri() . '/js/glider.min.js', array(), _S_VERSION, true); 	
	wp_enqueue_script('felton-health-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true); 

	wp_enqueue_script('felton-health-uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('felton-health-uikit-icons-js', get_template_directory_uri() . '/js/uikit-icons.min.js', array(), _S_VERSION, true);	

	wp_enqueue_style('felton-health-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('felton-health-owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), _S_VERSION);
	wp_enqueue_script( 'felton-health-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );
	
	wp_enqueue_style('felton-health-plyr-css', get_template_directory_uri() . '/css/plyr.css', array(), _S_VERSION); 
	wp_enqueue_script('felton-health-plyr-js', get_template_directory_uri() . '/js/plyr.polyfilled.js', array(), _S_VERSION, true);


	if(is_page_template( 'templates/page-about.php' ) ): 	
		wp_enqueue_script('felton-health-accordeon', get_template_directory_uri() . '/js/accordeon.js', array(), _S_VERSION, true);
	endif;
	
	wp_enqueue_style('felton-health-main-css', get_template_directory_uri() . '/css/felton-health.css', array(), _S_VERSION);
	wp_enqueue_script( 'felton-health-main-js', get_template_directory_uri() . '/js/felton-health.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'felton_health_scripts' );

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
	 if ('page' === $post->post_type || 'post' === $post->post_type || 'testimonial' === $post->post_type || 'team-member' === $post->post_type || 'story' === $post->post_type) :
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

   //Changing Gravity Form Submit Output
 add_filter( 'gform_submit_button_1', 'style_submit_button', 10, 2 );
function style_submit_button( $button, $form ) {
	return "<div class='cta-btn navy-sb cursor-pointer'>                               
					<div class='relative inline-flex items-center justify-start py-3 pl-4 pr-12 overflow-hidden text-navy-600 transition-all duration-150 ease-in-out hover:pl-10 hover:pr-6 navy-sb group'>
					<span class='absolute bottom-0 left-0 w-full h-1 transition-all duration-150 ease-in-out bg-600 group-hover:h-full'></span>
					<span class='box-svg absolute right-0 pr-4 duration-200 ease-out group-hover:translate-x-12'>                                       
					<svg xmlns='http://www.w3.org/2000/svg' width='26' height='8' viewBox='0 0 26 8' fill='none'>
						<path d='M25.3536 4.35355C25.5488 4.15829 25.5488 3.84171 25.3536 3.64645L22.1716 0.464466C21.9763 0.269204 21.6597 0.269204 21.4645 0.464466C21.2692 0.659728 21.2692 0.976311 21.4645 1.17157L24.2929 4L21.4645 6.82843C21.2692 7.02369 21.2692 7.34027 21.4645 7.53553C21.6597 7.7308 21.9763 7.7308 22.1716 7.53553L25.3536 4.35355ZM0 4.5H25V3.5H0V4.5Z' fill='#516456'></path>
					</svg>
					</span>
					<span class='box-svg absolute left-0 pl-2.5 -translate-x-12 group-hover:translate-x-0 ease-out duration-200'>
					<svg xmlns='http://www.w3.org/2000/svg' width='26' height='8' viewBox='0 0 26 8' fill='none'>
						<path d='M25.3536 4.35355C25.5488 4.15829 25.5488 3.84171 25.3536 3.64645L22.1716 0.464466C21.9763 0.269204 21.6597 0.269204 21.4645 0.464466C21.2692 0.659728 21.2692 0.976311 21.4645 1.17157L24.2929 4L21.4645 6.82843C21.2692 7.02369 21.2692 7.34027 21.4645 7.53553C21.6597 7.7308 21.9763 7.7308 22.1716 7.53553L25.3536 4.35355ZM0 4.5H25V3.5H0V4.5Z' fill='#fff'></path>
					</svg>
					</span>
					<span class='link-button relative w-full text-left transition-colors duration-200 ease-in-out'><button class='btn-submit link-button' id='gform_submit_button_{$form['id']}'>SEND</button></span>
				</div>                            
           </div>";
}

