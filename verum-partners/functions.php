<?php
/**
 * Verum Partners functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Verum_Partners
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
function verum_partners_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Verum Partners, use a find and replace
		* to change 'verum-partners' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'verum-partners', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary Left', 'verum-partners' ),
			'menu-2' => esc_html__( 'Primary Right', 'verum-partners' ),
			'mobile' => esc_html__( 'Mobile', 'verum-partners' ),
			'footer' => esc_html__( 'Footer', 'verum-partners' )
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
			'verum_partners_custom_background_args',
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
add_action( 'after_setup_theme', 'verum_partners_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function verum_partners_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'verum_partners_content_width', 640 );
}
add_action( 'after_setup_theme', 'verum_partners_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function verum_partners_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'verum-partners' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'verum-partners' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'verum_partners_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function verum_partners_scripts() {
	wp_enqueue_style( 'verum-partners-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'verum-partners-style', 'rtl', 'replace' );

	wp_enqueue_style('verum-partners-google-fonts', 'https://fonts.googleapis.com/css2?family=Bellefair&family=Montserrat:wght@400;600&display=swap', [], null );
	wp_enqueue_style('verum-partners-responsive-nav-css', get_template_directory_uri() . '/css/responsive-navigation.css', array(), _S_VERSION);
	wp_enqueue_style('verum-partners-flex', get_template_directory_uri() . '/css/flex.css', array(), _S_VERSION);
	wp_enqueue_style('verum-partnersanimatemin-css', get_template_directory_uri() . '/css/animate.min.css', array(), _S_VERSION);
	wp_enqueue_style('verum-partners-uikit-css', get_template_directory_uri() . '/css/uikit.min.css', array(), _S_VERSION); 

	wp_enqueue_script('jquery');
	wp_enqueue_script('verum-partners-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('verum-partners-responsive-nav-js', get_template_directory_uri() . '/js/responsive-navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script( 'verum-partners-loadmore-js', get_template_directory_uri() . '/js/jquery.simpleLoadMore.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'verum-partners-wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true );

	wp_enqueue_style('verum-partners--owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('verum-partners--owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), _S_VERSION);
	wp_enqueue_script( 'verum-partners--owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );

	wp_enqueue_style('verum-partners-custom-css', get_template_directory_uri() . '/css/verum-partners.css', array(), _S_VERSION);	
	wp_enqueue_script('verum-partners-custom-js', get_template_directory_uri() . '/js/verumpartners.js', array(), _S_VERSION, true);
	
	wp_enqueue_script('verum-partners-uikit-js', get_template_directory_uri() . '/js/uikit.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('verum-partners-uikit-icons-js', get_template_directory_uri() . '/js/uikit-icons.min.js', array(), _S_VERSION, true);

	if(is_page_template( 'templates/page-careers.php' ) || is_single() && 'profile' == get_post_type() ): 	
		wp_enqueue_script('verum-partners-accordeon-js', get_template_directory_uri() . '/js/accordeon.js', array(), _S_VERSION, true);
	endif;

	wp_localize_script('verum-partners-custom-js', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax_filter_nonce')
    ));
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'verum_partners_scripts' );

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
 * Enables Theme Options Panel
 */
require get_template_directory() . '/inc/admin/general-settings.php';


/**
 * Disable Gutenberg For Pages
 */
if (is_admin()) :
    add_filter('use_block_editor_for_post', 'laz_disable_block_for_post_type', 10, 2);
endif;

function laz_disable_block_for_post_type($bool, $post) {
    if ('page' === $post->post_type || 'service' === $post->post_type || 'team-member' === $post->post_type || 'profile' === $post->post_type) :
        return false;
    endif;

    return $bool;
}
/**
 * Removes Comments From The Site Entirely
 *
 */
add_action('admin_init', function () {
	// Redirect any user trying to access comments page
	global $pagenow;

	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url());
		exit;
	}

	// Remove comments metabox from dashboard
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

	// Disable support for comments and trackbacks in post types
	foreach(get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});

// Close comments on the front-end
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);

// Hide existing comments
add_filter('comments_array', '__return_empty_array', 10, 2);

// Remove comments page in menu
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});

// Remove comments links from admin bar
add_action('init', function () {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});

/**
 * Activate Accessibility for links
 */
function add_attribute_to_current_menu_item( $atts, $item, $args ) {
    
	$atts['aria-label'] = $item->title;
	$atts['tabindex'] = 0;
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_attribute_to_current_menu_item', 10, 3 );

//Register Thumbnail Sizes

function mobile_thumbnail_size() {
    add_image_size('mobile', 500, 0, true);
	
}

/**
 *	ENABLED FILE *.svg
 **/

 add_filter('upload_mimes', 'custom_upload_mimes');
 function custom_upload_mimes ( $existing_mimes=array() ) {
	 // add your extension to the array
	
	 $existing_mimes['svg'] = 'image/svg+xml';
	 return $existing_mimes;
 }
add_action('after_setup_theme', 'mobile_thumbnail_size');

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

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/**
 * Automatically add IDs to headings such as <h2></h2>
 */
function auto_id_headings( $content ) {

	$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
		if ( ! stripos( $matches[0], 'id=' ) ) :
			$heading_link = '<a href="#' . sanitize_title( $matches[3] ) . '" class="heading-link"><i class="glyphicon glyphicon-link"></i></a>';
			$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $heading_link . $matches[3] . $matches[4];
		endif;

		return $matches[0];
	}, $content );

    return $content;

}
add_filter( 'the_content', 'auto_id_headings' );


/**
 * Table of Contents Generation
 */
/**
 * Table of Contents Generation
 */
function get_post_headings($content)
{
	$pattern = '/<(h[2-3])\b[^>]*>(.*?)<\/\1>/i';
	preg_match_all($pattern, $content, $matches);
	return $matches;
}

/**
 * Table of Contents Generation
 */
function generate_toc($headings)
{
    $toc = '<div class="toc">';
    
    $min_level = 6;
    foreach ($headings[1] as $h_tag) {
        $level = intval(substr($h_tag, 1));
        if ($level < $min_level) {
            $min_level = $level;
        }
    }
    
    $current_level = $min_level - 1; 

    foreach ($headings[2] as $index => $heading) {
        $level = intval(substr($headings[1][$index], 1));
        $id = sanitize_title($heading);

        $headings[0][$index] = str_replace('>', " id='{$id}'>", $headings[0][$index]);

        if ($level > $current_level) {
            while ($current_level < $level) {
                $toc .= '<ol>';
                $current_level++;
            }
        } elseif ($level < $current_level) {
            $toc .= '</li>'; 
            while ($current_level > $level) {
                $toc .= '</ol></li>';
                $current_level--;
            }
        } else {
            $toc .= '</li>';
        }

        $toc .= '<li><a tab-index="0" aria-label="' . htmlspecialchars($heading, ENT_QUOTES) . '" title="' . htmlspecialchars($heading, ENT_QUOTES) . '" href="#' . $id . '">' . $heading . '</a>';
    }

    while ($current_level >= $min_level) {
        $toc .= '</li></ol>';
        $current_level--;
    }

    $toc .= '</div>';

    return [$toc, $headings[0]];
}


/**
 * Blog Block Rest API
 */

function register_lazy_blog_block_endpoint() {
    register_rest_route('laz-blog-block/v1', '/get-posts/', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'lazy_blog_block_callback',
        'permission_callback' => '__return_true',
    ));
}

add_action('rest_api_init', 'register_lazy_blog_block_endpoint');


function lazy_blog_block_callback($request) {
    $posts_per_page = isset($request['per_page']) ? $request['per_page'] : 6; 
    $page = isset($request['page']) ? $request['page'] : 1;
    $category = isset($request['category']) ? $request['category'] : '';
    $search = isset($request['search']) ? $request['search'] : '';
	$cat_audio_id = 17;

    $args = array(
        'post_type' => 'post',
		'cat' => -$cat_audio_id,
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
    );

    if (!empty($category)) {
        $args['cat'] = $category; // Use 'cat' for category ID
    }

    if (!empty($search)) {
        $args['s'] = $search; // Use 's' for search query
    }

    $query = new WP_Query($args);
    $posts_data = array();

    foreach ($query->posts as $post) {
        // Fetch category details
        $categories = get_the_category($post->ID);
        $category_names = array_map(function($cat) {
            return $cat->name;
        }, $categories);	

        $posts_data[] = array(
            'id' => $post->ID,
            'title' => $post->post_title,
            'excerpt' => wp_trim_words($post->post_excerpt, 16),
            'date' => $post->post_date,
            'permalink' => get_permalink($post->ID),
            'featured_image_src' => get_the_post_thumbnail_url($post->ID, 'full'),
            'categories' => $category_names, // Include category names
        );
    }

    return new WP_REST_Response($posts_data, 200);
}