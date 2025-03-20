<?php
/**
 * CNP Technologies functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CNP_Technologies
 */

if ( ! defined( 'CNP_TECHNOLOGIES_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'CNP_TECHNOLOGIES_VERSION', time() );
}

if ( ! defined( 'CNP_TECHNOLOGIES_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `cnp_technologies_content_class`
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
		'CNP_TECHNOLOGIES_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'cnp_technologies_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cnp_technologies_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CNP Technologies, use a find and replace
		 * to change 'cnp-technologies' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cnp-technologies', get_template_directory() . '/languages' );

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
				'menu-header-left'  => __('Header Left Menu', 'cnp-technologies'),
				'menu-header-right' => __('Header Right Menu', 'cnp-technologies'),
				'menu-mobile' => __( 'Mobile Menu', 'cnp-technologies' ),				
				'menu-footer-1' => __( 'Footer Menu 1', 'cnp-technologies' ),
				'menu-footer-2' => __( 'Footer Menu 2', 'cnp-technologies' )
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
add_action( 'after_setup_theme', 'cnp_technologies_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cnp_technologies_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'cnp-technologies' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'cnp-technologies' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cnp_technologies_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cnp_technologies_scripts() {
	wp_enqueue_style('cnp-technologies-typekit', 'https://use.typekit.net/jvx5rgb.css', [], null);
	wp_enqueue_style('cnp-technologies-tailwind-gfonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', [], null );
	wp_enqueue_style( 'cnp-technologies-style', get_stylesheet_uri(), array(), CNP_TECHNOLOGIES_VERSION );
	wp_enqueue_style('cnp-technologies-plyr-css', get_template_directory_uri() . '/css/plyr.css', array(), CNP_TECHNOLOGIES_VERSION); 

	wp_enqueue_script('jquery');
	
	wp_enqueue_script( 'cnp-technologies-parallax-js', get_template_directory_uri() . '/js/parallax.min.js', array(), CNP_TECHNOLOGIES_VERSION, true );	
	wp_enqueue_script('cnp-technologies-treenmax-js', get_template_directory_uri() . '/js/tweenmax.min.js', array(), CNP_TECHNOLOGIES_VERSION, true );
	wp_enqueue_script('cnp-technologies-plyr-js', get_template_directory_uri() . '/js/plyr.polyfilled.js', array(), CNP_TECHNOLOGIES_VERSION, true);
	wp_enqueue_script('cnp-technologies-glider-js', get_template_directory_uri() . '/js/glider.min.js', array(), CNP_TECHNOLOGIES_VERSION, true); 		
	wp_enqueue_script('cnp-technologies-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), CNP_TECHNOLOGIES_VERSION, true); 
	wp_enqueue_script( 'cnp-technologies-custom-js', get_template_directory_uri() . '/js/custom.js', array(), CNP_TECHNOLOGIES_VERSION, true );
	wp_enqueue_script( 'cnp-technologies-script', get_template_directory_uri() . '/js/script.min.js', array(), CNP_TECHNOLOGIES_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cnp_technologies_scripts' );

/**
 * Enqueue the block editor script.
 */
function cnp_technologies_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_style('cnp-technologies-typekit', 'https://use.typekit.net/jvx5rgb.css', [], null);
		wp_enqueue_script(
			'cnp-technologies-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			CNP_TECHNOLOGIES_VERSION,
			true
		);
		wp_add_inline_script( 'cnp-technologies-editor', "tailwindTypographyClasses = '" . esc_attr( CNP_TECHNOLOGIES_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'cnp_technologies_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function cnp_technologies_tinymce_add_class( $settings ) {
	$settings['body_class'] = CNP_TECHNOLOGIES_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'cnp_technologies_tinymce_add_class' );

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

add_filter('gform_submit_button', function($button, $form) {
    return "<div class='bottom-shape-btn-short wrap-submit group'>{$button}</div>";
}, 10, 2);

add_filter('gform_submit_button', function($button, $form) {
    $button = str_replace("gform_button", "gform_button bottom-shape-btn-short", $button);
    return $button;
}, 10, 2);

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
        $output .= "\n$indent<ul class=\"submenu absolute left-0 min-w-[15em] pt-4 pb-4 hidden shadow-md group-hover:block bg-white \">\n";
    }

    // Start Element (menu item)
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Check if item has children based on the depth
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        $class_names = join(' ', apply_filters('nav_menu_css_class', $classes, $item, $args));
        $class_names .= $has_children ? ' group relative px-[10px] lg:px-[22px]' : ' px-[10px] lg:px-[22px]'; // Add 'group' class if item has children
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $class_names . '>';

        // Link
        $item_output = $args->before;
        $item_output .= '<a href="' . esc_url($item->url) . '" class="block text-[20px] lg:text-[22px] text-primary font-medium tracking-[0.22px] lg:hover:text-secondary transition-all ease-in-out duration-300">' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}

function enqueue_custom_scripts() {
    wp_enqueue_script('custom-filter', get_template_directory_uri() . '/js/resources.js', ['jquery'], null, true);

    // Pass REST API URL and Taxonomy Mapping to JavaScript
    wp_localize_script('custom-filter', 'custom_filter_data', [
        'rest_url' => esc_url(rest_url('custom/v1/posts/')),
        'taxonomy_map' => [
            'post' => 'category',
            'resource' => 'resource-solution',
            'case-study' => 'case-study-solution'
        ]
    ]);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

/**
 *	RESOURCES BLOCK REST API *
**/
function custom_register_rest_route() {
    register_rest_route('custom/v1', '/posts/', [
        'methods'  => 'GET',
        'callback' => 'custom_get_filtered_posts',
    ]);
}
add_action('rest_api_init', 'custom_register_rest_route');

function custom_get_filtered_posts(WP_REST_Request $request) {
    $paged     = $request->get_param('paged') ?: 1;
    $post_type = $request->get_param('post_type') ?: ['post', 'resource', 'case-study'];
    $taxonomy  = $request->get_param('taxonomy');
    $term      = $request->get_param('term');

    $args = [
        'post_type'      => $post_type,
        'posts_per_page' => 3,
        'paged'          => $paged,
    ];

    if ($taxonomy && $term) {
        $args['tax_query'] = [
            [
                'taxonomy' => $taxonomy,
                'field'    => 'slug',
                'terms'    => $term,
            ]
        ];
    }

    $query = new WP_Query($args);
    $posts = [];

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            // Ensure taxonomy retrieval is safe
            $post_type = get_post_type();
            $taxonomy_name = ($post_type == 'post') ? 'category' : ($post_type == 'resource' ? 'resource-solution' : 'case-study');

            $terms = get_the_terms(get_the_ID(), $taxonomy_name);
            $category_name = get_field('type');

            $posts[] = [
                'title'    => get_the_title(),
                'link'     => get_permalink(),
                'image'    => get_the_post_thumbnail_url(get_the_ID(), 'full'),
                'date'     => get_the_date('F j, Y'),
                'category' => $category_name,
            ];
        }
    }

    wp_reset_postdata();

    if (empty($posts)) {
        return new WP_Error('no_posts', 'No posts found', ['status' => 404]);
    }

    return rest_ensure_response($posts);
}
