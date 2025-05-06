<?php
/**
 * Vizion Church functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Vizion_Church
 */

if ( ! defined( 'VIZION_CHURCH_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'VIZION_CHURCH_VERSION', time() );
}

if ( ! defined( 'VIZION_CHURCH_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `vizion_church_content_class`
	 * function. You will see that function used everywhere an `entry-content`
	 * or `page-content` class has been added to a wrapper element.
	 *
	 * For the block editor, these classes are converted to a JavaScript array
	 * and then used by the `./javascript/block-editor.js` file, which adds
	 * them to the appropriate elements in the block editor (and adds them
	 * again when they’re removed.)
	 *
	 * For the classic editor (and anything using TinyMCE, like Advanced Custom
	 * Fields), these classes are added to TinyMCE’s body class when it
	 * initializes.
	 */
	define(
		'VIZION_CHURCH_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'vizion_church_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function vizion_church_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Vizion Church, use a find and replace
		 * to change 'vizion-church' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'vizion-church', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-primary' => __( 'Primary Menu', 'vizion-church' ),
				'menu-mobile' => __( 'Mobile Menu', 'vizion-church' ),
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

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		add_editor_style( 'style-editor-extra.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'vizion_church_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function vizion_church_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'vizion-church' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'vizion-church' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'vizion_church_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function vizion_church_scripts() {
	wp_enqueue_style( 'vizion-church-style', get_stylesheet_uri(), array(), VIZION_CHURCH_VERSION );
	wp_enqueue_style('vizion-church-css', get_template_directory_uri() . '/fonts/fonts.css', array(), VIZION_CHURCH_VERSION); 
	wp_enqueue_style('vizion-church-aos-css', get_template_directory_uri() . '/css/aos.css', array(), VIZION_CHURCH_VERSION);	
	wp_enqueue_style('vizion-church-plyr-css', get_template_directory_uri() . '/css/plyr.css', array(), VIZION_CHURCH_VERSION); 
	wp_enqueue_style('vizion-church-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), VIZION_CHURCH_VERSION);
	wp_enqueue_style('vizion-church-owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), VIZION_CHURCH_VERSION);	

	wp_enqueue_script('jquery');	
	wp_enqueue_script( 'vizion-church-aos-js', get_template_directory_uri() . '/js/aos.js', array(), VIZION_CHURCH_VERSION, true );	
	wp_enqueue_script('vizion-church-plyr-js', get_template_directory_uri() . '/js/plyr.polyfilled.js', array(), VIZION_CHURCH_VERSION, true);
	wp_enqueue_script( 'vizion-church-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), VIZION_CHURCH_VERSION, true );
	wp_enqueue_script( 'vizion-church-custom-js', get_template_directory_uri() . '/js/custom.js', array(), VIZION_CHURCH_VERSION, true );
	wp_enqueue_script( 'vizion-church-script', get_template_directory_uri() . '/js/script.min.js', array(), VIZION_CHURCH_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'vizion_church_scripts' );

/**
 * Enqueue the block editor script.
 */
function vizion_church_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_script(
			'vizion-church-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			VIZION_CHURCH_VERSION,
			true
		);
		wp_add_inline_script( 'vizion-church-editor', "tailwindTypographyClasses = '" . esc_attr( VIZION_CHURCH_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'vizion_church_enqueue_block_editor_script' );

/**
 * Enqueue the admin styles.
 */
function enqueue_acf_admin_styles() {
    wp_enqueue_style('acf-admin-styles', get_template_directory_uri() . '/style-admin.css', VIZION_CHURCH_VERSION);
}
add_action('admin_enqueue_scripts', 'enqueue_acf_admin_styles');


/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function vizion_church_tinymce_add_class( $settings ) {
	$settings['body_class'] = VIZION_CHURCH_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'vizion_church_tinymce_add_class' );

/**
 * Limit the block editor to heading levels supported by Tailwind Typography.
 *
 * @param array  $args Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 * @return array
 */
function vizion_church_modify_heading_levels( $args, $block_type ) {
	if ( 'core/heading' !== $block_type ) {
		return $args;
	}

	// Remove <h1>, <h5> and <h6>.
	$args['attributes']['levelOptions']['default'] = array( 2, 3, 4 );

	return $args;
}
add_filter( 'register_block_type_args', 'vizion_church_modify_heading_levels', 10, 2 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into Advanced Custom Fields.
 */
require get_template_directory() . '/inc/acf-functions.php';

/**
 * General Settings
 */
require get_template_directory() . '/inc/general-settings.php';

/**
 * Gravity Form Settings
 */
require get_template_directory() . '/inc/gravity-forms.php';
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
  *	TAILWIND CUSTOM MENU CLASSES *
  **/


class Tailwind_Walker_Nav_Menu extends Walker_Nav_Menu {
    // Start Level (submenu wrapper)
    function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"submenu absolute left-0 min-w-max pt-4 pb-4 hidden shadow-md group-hover:block bg-backgroung \">\n";
    }

    // Start Element (menu item)
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Check if item has children based on the depth
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        $class_names = join(' ', apply_filters('nav_menu_css_class', $classes, $item, $args));
        $class_names .= $has_children ? ' group relative px-[15px] lg:px-[25px]' : ' px-[15px] lg:px-[25px]'; // Add 'group' class if item has children
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $class_names . '>';

        // Link
        $item_output = $args->before;
        $item_output .= '<a href="' . esc_url($item->url) . '" class="block font-menu text-[16px] text-black font-light uppercase lg:hover:text-foreground transition-all ease-in-out duration-300">' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}