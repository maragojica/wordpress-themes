<?php
/**
 * connecting-elements functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package connecting-elements
 */

if ( ! defined( 'CONNECTING_ELEMENTS_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'CONNECTING_ELEMENTS_VERSION', time() );
}

if ( ! defined( 'CONNECTING_ELEMENTS_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `connecting_elements_content_class`
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
		'CONNECTING_ELEMENTS_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'connecting_elements_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function connecting_elements_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on connecting-elements, use a find and replace
		 * to change 'connecting-elements' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'connecting-elements', get_template_directory() . '/languages' );

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
				'menu-primary' => __( 'Primary', 'connecting-elements' ),
				'menu-mobile' => __( 'Mobile', 'connecting-elements' ),
				'menu-footer-1' => __( 'Footer 1', 'connecting-elements' ),
				'menu-footer-2' => __( 'Footer 2', 'connecting-elements' ),
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
add_action( 'after_setup_theme', 'connecting_elements_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function connecting_elements_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'connecting-elements' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'connecting-elements' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'connecting_elements_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function connecting_elements_scripts() {
	wp_enqueue_style('connecting-elements-typekit', 'https://use.typekit.net/soh1rfc.css', [], null);
	wp_enqueue_style( 'connecting-elements-style', get_stylesheet_uri(), array(), CONNECTING_ELEMENTS_VERSION );
	wp_enqueue_style('connecting-elements-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), CONNECTING_ELEMENTS_VERSION);
	wp_enqueue_style('connecting-elements-owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), CONNECTING_ELEMENTS_VERSION);	

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'connecting-elements-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), CONNECTING_ELEMENTS_VERSION, true );	
	wp_enqueue_script( 'connecting-elements-custom-js', get_template_directory_uri() . '/js/custom.js', array(), CONNECTING_ELEMENTS_VERSION, true );
	wp_enqueue_script( 'connecting-elements-script', get_template_directory_uri() . '/js/script.min.js', array(), CONNECTING_ELEMENTS_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'connecting_elements_scripts' );

/**
 * Enqueue the block editor script.
 */
function connecting_elements_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_style('connecting-elements-typekit', 'https://use.typekit.net/soh1rfc.css', [], null);
		wp_enqueue_script(
			'connecting-elements-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			CONNECTING_ELEMENTS_VERSION,
			true
		);
		wp_add_inline_script( 'connecting-elements-editor', "tailwindTypographyClasses = '" . esc_attr( CONNECTING_ELEMENTS_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'connecting_elements_enqueue_block_editor_script' );


/**
 * Enqueue the admin styles.
 */
function enqueue_acf_admin_styles() {
    wp_enqueue_style('acf-admin-styles', get_template_directory_uri() . '/style-admin.css', CONNECTING_ELEMENTS_VERSION);
}
add_action('admin_enqueue_scripts', 'enqueue_acf_admin_styles');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function connecting_elements_tinymce_add_class( $settings ) {
	$settings['body_class'] = CONNECTING_ELEMENTS_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'connecting_elements_tinymce_add_class' );

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
        $output .= "\n$indent<ul class=\"submenu absolute left-0 min-w-[18em] pt-4 pb-4 hidden shadow-sm group-hover:block bg-white \">\n";
    }

    // Start Element (menu item)
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Check if item has children based on the depth
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        $class_names = join(' ', apply_filters('nav_menu_css_class', $classes, $item, $args));
        $class_names .= $has_children ? ' group relative px-[14px] xl:px-[19px]' : ' px-[14px] xl:px-[15px]'; // Add 'group' class if item has children
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $class_names . '>';

        // Link
        $item_output = $args->before;
        $item_output .= '<a href="' . esc_url($item->url) . '" class="block lg:text-[16px] 2xl:text-mainmenu text-[0.64rem] font-bold font-secondary-font uppercase text-white transition-all ease-in-out duration-300">' . apply_filters('the_title', $item->title, $item->ID) . '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}


  /**
 * Products Block Rest API
 */
function register_lazy_product_block_endpoint() {
    register_rest_route('laz-product-block/v1', '/get-products/', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'lazy_product_block_callback',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'register_lazy_product_block_endpoint');

function lazy_product_block_callback($request) {
    $posts_per_page = isset($request['per_page']) ? intval($request['per_page']) : 6; 
    $page = isset($request['page']) ? intval($request['page']) : 1;
    $category = isset($request['category']) ? $request['category'] : '';	
    // Make sure this matches the JS param 'postype'
    $post_type = isset($request['postype']) ? $request['postype'] : 'product';
    $search = isset($request['search']) ? $request['search'] : '';

    // Determine the taxonomy based on post type
    $cat_taxonomy = ($post_type === 'product') ? 'product-category' : 'product-category';

    $args = array(
        'post_type' => $post_type,        
        'posts_per_page' => $posts_per_page,
        'orderby' => 'title', 
        'order' => 'ASC',
        'paged' => $page,
        'post_status' => 'publish'
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $cat_taxonomy,
                'field'    => 'term_id',
                'terms'    => (array) $category
            ),
        );
    }

    if (!empty($search)) {
        $args['s'] = $search; 
    }

    $query = new WP_Query($args);
    $posts_data = array();

    foreach ($query->posts as $post) {
        $categories = get_the_terms($post->ID, $cat_taxonomy);
        $category_names = [];
        if (is_array($categories) && !empty($categories)) {
            foreach($categories as $term) {
                $category_names[] = $term->name;
            }
        }

        $category_names_simple = '';
        if (is_array($categories) && !empty($categories)) {
            foreach ($categories as $term) {
                if ($term->name !== "All") {
                    $category_names_simple .= $term->name . " ";
                }
            }
        }

        $posts_data[] = array(
            'id' => $post->ID,
            'title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'date' => $post->post_date,
            'permalink' => get_permalink($post->ID),
            'featured_image_src' => get_the_post_thumbnail_url($post->ID, 'full'),
            'categories' => $category_names,
            'postype' => $post_type,
			'brand' => get_field('brand', $post->ID),
            'categories_simple' => trim($category_names_simple)
        );
    }

    $response = new WP_REST_Response($posts_data, 200);
    $response->header('X-WP-Total', $query->found_posts); 
    return $response;
}

  /**
 * Portfolios Block Rest API
 */
function register_lazy_portfolio_block_endpoint() {
    register_rest_route('laz-portfolio-block/v1', '/get-portfolios/', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'lazy_portfolio_block_callback',
        'permission_callback' => '__return_true',
    ));
}
add_action('rest_api_init', 'register_lazy_portfolio_block_endpoint');

function lazy_portfolio_block_callback($request) {
    $posts_per_page = isset($request['per_page']) ? intval($request['per_page']) : 6; 
    $page = isset($request['page']) ? intval($request['page']) : 1;
    $category = isset($request['category']) ? $request['category'] : '';	
    // Make sure this matches the JS param 'postype'
    $post_type = isset($request['postype']) ? $request['postype'] : 'portfolio';
    $search = isset($request['search']) ? $request['search'] : '';

    // Determine the taxonomy based on post type
    $cat_taxonomy = ($post_type === 'portfolio') ? 'portfolio-category' : 'portfolio-category';

    $args = array(
        'post_type' => $post_type,        
        'posts_per_page' => $posts_per_page,
        'orderby' => 'post_date', 
        'order' => 'DESC',
        'paged' => $page,
        'post_status' => 'publish'
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $cat_taxonomy,
                'field'    => 'term_id',
                'terms'    => (array) $category
            ),
        );
    }

    if (!empty($search)) {
        $args['s'] = $search; 
    }

    $query = new WP_Query($args);
    $posts_data = array();

    foreach ($query->posts as $post) {
        $categories = get_the_terms($post->ID, $cat_taxonomy);
        $category_names = [];
        if (is_array($categories) && !empty($categories)) {
            foreach($categories as $term) {
                $category_names[] = $term->name;
            }
        }

        $category_names_simple = '';
        if (is_array($categories) && !empty($categories)) {
            foreach ($categories as $term) {
                if ($term->name !== "All") {
                    $category_names_simple .= $term->name . " ";
                }
            }
        }

        $posts_data[] = array(
            'id' => $post->ID,
            'title' => $post->post_title,
            'excerpt' => $post->post_excerpt,
            'date' => $post->post_date,
            'permalink' => get_permalink($post->ID),
            'featured_image_src' => get_the_post_thumbnail_url($post->ID, 'full'),
            'categories' => $category_names,
            'postype' => $post_type,			
            'categories_simple' => trim($category_names_simple)
        );
    }

    $response = new WP_REST_Response($posts_data, 200);
    $response->header('X-WP-Total', $query->found_posts); 
    return $response;
}

