<?php
/**
 * Concrete Supply Co functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Concrete_Supply_Co
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
function concrete_supply_co_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Concrete Supply Co, use a find and replace
		* to change 'concrete-supply-co' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'concrete-supply-co', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'concrete-supply-co' ),
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
			'concrete_supply_co_custom_background_args',
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
add_action( 'after_setup_theme', 'concrete_supply_co_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function concrete_supply_co_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'concrete_supply_co_content_width', 640 );
}
add_action( 'after_setup_theme', 'concrete_supply_co_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function concrete_supply_co_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'concrete-supply-co' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'concrete-supply-co' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'concrete_supply_co_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function concrete_supply_co_scripts() {
	wp_enqueue_style( 'concrete-supply-co-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'concrete-supply-co-style', 'rtl', 'replace' );

	wp_enqueue_style('concrete-supply-co-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200;300;400;500;600;700&display=swap&text=©0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz%21%40%23%24%25%5E%26%2A%28%29%27"%3B%3A%2C.%2F<>%3F%5B%5D%7B%7D%5C%7C%2A-%2B%3D', [], null );
	wp_enqueue_style('concrete-supply-co-responsive-nav-css', get_template_directory_uri() . '/css/responsive-navigation.css', array(), _S_VERSION);
	wp_enqueue_style('concrete-supply-co-flex', get_template_directory_uri() . '/css/flex.css', array(), _S_VERSION);
	wp_enqueue_style('concrete-supply-co-animate-css', get_template_directory_uri() . '/css/animate-scroll.css', array(), _S_VERSION); 
	wp_enqueue_style('concrete-supply-co-glider-css', get_template_directory_uri() . '/css/glider.min.css', array(), _S_VERSION);  
	wp_enqueue_style('concrete-supply-co-slick-css', get_template_directory_uri() . '/css/slick.min.css', array(), _S_VERSION); 
	wp_enqueue_style('concrete-supply-co-fancyboxcss', get_template_directory_uri() . '/css/fancybox.min.css', array(), _S_VERSION); 

	wp_enqueue_script('jquery');	
	wp_enqueue_script( 'concrete-supply-co-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('concrete-supply-co-responsive-nav-js', get_template_directory_uri() . '/js/responsive-navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('concrete-supply-co-glider-js', get_template_directory_uri() . '/js/glider.min.js', array(), _S_VERSION, true); 	
	wp_enqueue_script('concrete-supply-co-counters-js', get_template_directory_uri() . '/js/counters.js', array(), _S_VERSION, true);
	wp_enqueue_script('concrete-supply-co-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true); 
	wp_enqueue_script('concrete-supply-co-parallax-js', get_template_directory_uri() . '/js/parallax.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('concrete-supply-co-fancybox-js', get_template_directory_uri() . '/js/fancybox.min.js', array(), _S_VERSION, true);


	if(is_page_template( 'templates/page-contact.php' ) || is_page_template( 'templates/page-contractor-resources.php' ) || is_page_template( 'templates/page-homeowner-resources.php' ) ): 	
		wp_enqueue_script('concrete-supply-co-accordeon', get_template_directory_uri() . '/js/accordeon.js', array(), _S_VERSION, true);
	endif;

	if(is_page( 'contact' )): 		
		wp_enqueue_script('concrete-supply-co-counties', get_template_directory_uri() . '/js/counties.js', array(), _S_VERSION, true);
	endif;

	wp_enqueue_style('concrete-supply-co-plyr-css', get_template_directory_uri() . '/css/plyr.css', array(), _S_VERSION); 
	wp_enqueue_script('concrete-supply-co-plyr-js', get_template_directory_uri() . '/js/plyr.polyfilled.js', array(), _S_VERSION, true);

	wp_enqueue_style('concrete-supply-co-custom-css', get_template_directory_uri() . '/css/concretesupply.css', array(), _S_VERSION);	
	wp_enqueue_script('concrete-supply-co-custom-js', get_template_directory_uri() . '/js/concretesupply.js', array(), _S_VERSION, true);

	wp_localize_script('concrete-supply-co-custom-js', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax_filter_nonce')
    ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'concrete_supply_co_scripts' );

add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_resource_type');
function tsm_filter_post_type_by_taxonomy_resource_type() {
	global $typenow;
	$post_type = 'portfolio'; // change to your post type
	$taxonomy  = 'portfolio-type'; // change to your taxonomy
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

add_filter('parse_query', 'tsm_convert_id_to_term_in_query_resource_type');
function tsm_convert_id_to_term_in_query_resource_type($query) {
	global $pagenow;
	$post_type = 'portfolio'; // change to your post type
	$taxonomy  = 'portfolio-type'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/**
 * Disable Gutenberg For Pages
 */
if (is_admin()) :
    add_filter('use_block_editor_for_post', 'laz_disable_block_for_post_type', 10, 2);
endif;

function laz_disable_block_for_post_type($bool, $post) {
    if ('page' === $post->post_type || 'post' === $post->post_type) :
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
 * Get Base URL
 */
function concrete_supply_co_base_url()
{	
	$base = esc_url(home_url('/'));
	wp_localize_script('concrete-supply-co-counties', 'stylesheetDir', $base);
}
add_action('wp_enqueue_scripts', 'concrete_supply_co_base_url');

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
 * Generates the portfolio items output based on WP_Query arguments.
 */
function generate_portfolio_output($args) {
    $query = new WP_Query($args);
	

   /* $args = array(
        'post_type' => 'portfolio',
		'post_status' => 'publish',
        'posts_per_page' => 12,
        'orderby' => 'menu_order',   
    	'order' => 'desc', 
		'post__not_in' => array_values($idfeatured)
    );*/

    $pattern = array('40', '30', '30', '30', '30', '40', '40', '30', '30', '30', '30', '40');
    $counter = 0;
    $output = '';

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            
            $class = 'portfolio-block-' . $pattern[$counter % count($pattern)];
            $counter++;
			$post_thumbnail_id = get_post_meta( get_the_id(), '_thumbnail_id', true );
			$srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
			$sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full');

            $output .= '<div class="project column ' . $class . '">';
            $output .= '<div class="project-item">';
            $output .= '<img src="' . get_the_post_thumbnail_url(get_the_ID(), 'large') . '" alt="' . get_the_title() . '" height="350" srcset="' . esc_attr($srcset) . '" sizes="' . esc_attr($sizes) . '">';
            $output .= '<div class="overlay">' . get_the_title() . '</div>';
            $output .= '</div>';
            $output .= '</div>';
        }
        wp_reset_postdata();
    } else {
        $output = '';
    }

    return $output;
}

function filter_projects_callback() {

    // Verify nonce
    if( !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'ajax_filter_nonce') ) {
        die('Permission denied');
    }
	
    $filters = isset($_POST['filters']) ? $_POST['filters'] : array();

    $args = array(
        'post_type' => 'portfolio',
		'post_status' => 'publish',
        'posts_per_page' => 12,
        'orderby' => 'menu_order',   
    	'order' => 'desc'  
    );

    $tax_query = array();	

    foreach ($filters as $filter) {
        if (isset($filter['term_id']) && $filter['term_id'] !== 3) {
            $tax_query[] = array(
                'taxonomy' => sanitize_text_field($filter['taxonomy']),
                'field' => 'term_id',
                'terms' => intval($filter['term_id'])
            );
        } else if (isset($filter['term']) && $filter['term'] !== 3) {
            $tax_query[] = array(
                'taxonomy' => sanitize_text_field($filter['taxonomy']),
                'field' => 'slug',
                'terms' => sanitize_text_field($filter['term'])
            );
        }
		
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    echo generate_portfolio_output($args);
    die();
}

add_action('wp_ajax_nopriv_filter_projects', 'filter_projects_callback');
add_action('wp_ajax_filter_projects', 'filter_projects_callback');

function load_more_projects_callback() {
	
    // Verify nonce
    if( !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'ajax_filter_nonce') ) {
        die('Permission denied');
    }

    $filters = isset($_POST['filters']) ? $_POST['filters'] : array();
	$idfeatured = isset($_POST['idfeatured']) ? $_POST['idfeatured'] : array();
	$arrayidfeatured = explode(" ", $idfeatured);

    // Base args
    $args = array(
        'post_type' => 'portfolio',
		'post_status' => 'publish',
        'posts_per_page' => 12,
        'orderby' => 'menu_order',   
    	'order' => 'DESC',    
		'post__not_in' => array_values($arrayidfeatured),		      
        'paged' => isset($_POST['paged']) ? intval($_POST['paged']) : 1  // Use the paged value from the AJAX request
    );

    $tax_query = array();

    foreach ($filters as $filter) {
        if (isset($filter['term_id'])) {
            $tax_query[] = array(
                'taxonomy' => sanitize_text_field($filter['taxonomy']),
                'field' => 'term_id',
                'terms' => intval($filter['term_id'])
            );
        } else if (isset($filter['term'])) {
            $tax_query[] = array(
                'taxonomy' => sanitize_text_field($filter['taxonomy']),
                'field' => 'slug',
                'terms' => sanitize_text_field($filter['term'])
            );
        }
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    echo generate_portfolio_output($args);
    die();
}

add_action('wp_ajax_load_more_projects', 'load_more_projects_callback');
add_action('wp_ajax_nopriv_load_more_projects', 'load_more_projects_callback');


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


add_filter('gform_field_validation_1_10', 'custom_validation_for_dynamically_populated_field', 10, 4);
function custom_validation_for_dynamically_populated_field($result, $value, $form, $field) {
    if ($field->id == 10) { 
        $selected_state = rgpost('input_9'); 
        $json_path = get_stylesheet_directory_uri() . '/inc/gravityforms/us_counties_by_state.json';
        $counties_json = file_get_contents($json_path);
        $counties_data = json_decode($counties_json, true);

        if (array_key_exists($selected_state, $counties_data) && in_array($value, $counties_data[$selected_state])) {
            $result['is_valid'] = true; 
        } else {
            $result['is_valid'] = false;
            $result['message'] = 'Invalid selection. Please select from the available choices.'; 
        }
    }
    return $result;
}

add_filter('gform_field_validation_1_11', 'custom_validation_for_dynamically_populated_field_towns', 10, 4);
function custom_validation_for_dynamically_populated_field_towns($result, $value, $form, $field) {
    if ($field->id == 11) { 
        $selected_countie = rgpost('input_10'); 
        $json_path = get_stylesheet_directory_uri() . '/inc/gravityforms/us_towns_by_county.json';
        $towns_json = file_get_contents($json_path);
        $towns_data = json_decode($towns_json, true);
        if (empty($value)) {
            $result['is_valid'] = true;
            return $result;
        }

        if (array_key_exists($selected_countie, $towns_data) && in_array($value, $towns_data[$selected_countie])) {
            $result['is_valid'] = true; 
        } else {
            $result['is_valid'] = false;
            $result['message'] = 'Invalid selection. Please select from the available choices.'; 
        }
    }
    return $result;
}


add_filter('gform_pre_validation', 'populate_counties_dynamically');
add_filter('gform_pre_submission_filter_1', 'populate_counties_dynamically'); 
add_filter('gform_admin_pre_render_1', 'populate_counties_dynamically'); 

function populate_counties_dynamically($form) {
    if ($form['id'] != 1) return $form; 

    foreach ($form['fields'] as &$field) {
        if ($field->id == 10) {
            $json_path = get_stylesheet_directory_uri() . '/inc/gravityforms/us_counties_by_state.json';
            $counties_json = file_get_contents($json_path);
            $counties_data = json_decode($counties_json, true);

            $selected_state = rgpost('input_9'); 

            if (isset($counties_data[$selected_state])) {
                $field->choices = array();
                foreach ($counties_data[$selected_state] as $county) {
                    $field->choices[] = array('text' => $county, 'value' => $county);
                }
            }
            break; 
        }
		if ($field->id == 11) {
            $json_path = get_stylesheet_directory_uri() . '/inc/gravityforms/us_towns_by_county.json';
            $towns_json = file_get_contents($json_path);
            $towns_data = json_decode($towns_json, true);

            $selected_county = rgpost('input_10'); 

            if (isset($towns_data[$selected_county])) {
                $field->choices = array();
                foreach ($towns_data[$selected_county] as $town) {
                    $field->choices[] = array('text' => $town, 'value' => $town);
                }
            }
            break; 
        }
    }
    return $form;
}

add_filter('gform_notification_1', 'custom_route_email_notification_with_name', 10, 3);
function custom_route_email_notification_with_name($notification, $form, $entry) {
    $state_field_id = '9'; 
    $county_field_id = '10'; 
	$town_field_id = '11'; 

    // Partial mapping array based on provided data (add the rest here)
    $county_manager_map = [
        'NC-Mecklenburg County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
        'NC-Gaston County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
		'NC-Cleveland County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
		'NC-Lincoln County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
		'NC-Iredell County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
		'NC-Cabarrus County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
		'NC-Rowan County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
		'NC-Stanly County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
		'NC-Union County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
        'NC-Wake County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Johnston County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Nash County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Cumberland County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Orange County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Durham County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Chatham County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Franklin County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Alamance County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Moore County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Lee County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Granville County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Harnett County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Hoke County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Wilson County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Vance County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Scotland County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Richmond County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Anson County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'NC-Robeson County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'SC-Marlboro County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
		'SC-Chesterfield County' => ['name' => 'Mike Tysinger', 'email' => 'mike.tysinger@concretesupplyco.com'],
        'NC-Buncombe County' => ['name' => 'Marty Reinfeld', 'email' => 'mreinfeld@carolinareadymixinc.com'],
		'NC-Henderson County' => ['name' => 'Marty Reinfeld', 'email' => 'mreinfeld@carolinareadymixinc.com'],
		'NC-Madison County' => ['name' => 'Marty Reinfeld', 'email' => 'mreinfeld@carolinareadymixinc.com'],
		'NC-Haywood County' => ['name' => 'Marty Reinfeld', 'email' => 'mreinfeld@carolinareadymixinc.com'],
		'NC-McDowell County' => ['name' => 'Marty Reinfeld', 'email' => 'mreinfeld@carolinareadymixinc.com'],
		'NC-Transylvania County' => ['name' => 'Marty Reinfeld', 'email' => 'mreinfeld@carolinareadymixinc.com'],
		'NC-Yancey County' => ['name' => 'Marty Reinfeld', 'email' => 'mreinfeld@carolinareadymixinc.com'],
        'NC-Rutherford County' => ['name' => 'Steve Barnes', 'email' => 'sbarnes@nctv.com'],
		'NC-Polk County' => ['name' => 'Steve Barnes', 'email' => 'sbarnes@nctv.com'],
        'NC-Wayne County' => ['name' => 'Dustin Meyers', 'email' => 'Dustin.Myers@southernreadymixllc.com'],
		'NC-Greene County' => ['name' => 'Dustin Meyers', 'email' => 'Dustin.Myers@southernreadymixllc.com'],
		'NC-Lenoir County' => ['name' => 'Dustin Meyers', 'email' => 'Dustin.Myers@southernreadymixllc.com'],
		'NC-Duplin County' => ['name' => 'Dustin Meyers', 'email' => 'Dustin.Myers@southernreadymixllc.com'],
		'NC-Orange County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'NC-Alamance County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'NC-Guilford County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'NC-Forsyth County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'NC-Davie County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'NC-Surry County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'NC-Stokes County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'NC-Randolph County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'NC-Davidson County' => ['name' => 'Bill Catalani', 'email' => 'bill@centralcarolinaconcrete.com'],
		'SC-Cherokee County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Union County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Spartanburg County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Greenville County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Pickens County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Oconee County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Anderson County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Abbeville County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Greenwood County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Laurens County' => ['name' => 'James Day', 'email' => 'james.day@concretesupplyco.com'],
		'SC-Richland County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Kershaw County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Fairfield County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Newberry County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Saluda County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Lexington County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Calhoun County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Sumter County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Clarendon County' => ['name' => 'Rhett Smith', 'email' => 'rhett.smith@concretesupplyco.com'],
		'SC-Orangeburg County' => ['name' => 'Randy Corn', 'email' => 'randy.corn@concretesupply.com'],
		'SC-Calhoun County' => ['name' => 'Randy Corn', 'email' => 'randy.corn@concretesupply.com'],
		'SC-Dorchester County' => ['name' => 'Randy Corn', 'email' => 'randy.corn@concretesupply.com'],
		'SC-Berkeley County' => ['name' => 'Randy Corn', 'email' => 'randy.corn@concretesupply.com'],
		'SC-Charleston County' => ['name' => 'Randy Corn', 'email' => 'randy.corn@concretesupply.com'],
		'SC-Georgetown County' => ['name' => 'Bobby Steele', 'email' => 'bobby.steele@concretesupplyco.com'],
		'SC-Horry County' => ['name' => 'Bobby Steele', 'email' => 'bobby.steele@concretesupplyco.com'],
		'NC-Brunswick County' => ['name' => 'Bobby Steele', 'email' => 'bobby.steele@concretesupplyco.com'],
		'SC-Florence County' => ['name' => 'Bobby Steele', 'email' => 'bobby.steele@concretesupplyco.com'],
		'SC-Dillon County' => ['name' => 'Bobby Steele', 'email' => 'bobby.steele@concretesupplyco.com'],
		'SC-Marion County' => ['name' => 'Bobby Steele', 'email' => 'bobby.steele@concretesupplyco.com'],
		'SC-Williamsburg County' => ['name' => 'Bobby Steele', 'email' => 'bobby.steele@concretesupplyco.com'],
		'SC-Darlington County' => ['name' => 'Bobby Steele', 'email' => 'bobby.steele@concretesupplyco.com'],
		'SC-Anderson County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],		
		'SC-Greenville County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],
		'SC-Spartanburg County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],		
		'SC-Lancaster County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],
		'SC-York County' => ['name' => 'Reid Harris', 'email' => 'reid.harris@concretesupplyco.com'],		
    ];

	$town_manager_map = [ 
		'SC-Belton-Anderson County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],
		'SC-Iva-Anderson County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],		
		'SC-Easley-Pickens County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],
		'SC-Clemson-Pickens County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],
		'SC-Piedmont-Greenville County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],
		'SC-Greenville-Greenville County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],
		'SC-Fountain Inn-Greenville County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],
		'SC-Spartanburg-Spartanburg County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com'],		
		'NC-Boiling Springs-Cleveland County' => ['name' => 'Jamie Boulware', 'email' => 'jamie@american-concrete.com']				
    ];

    $submitted_state = rgar($entry, $state_field_id);
    $submitted_county = rgar($entry, $county_field_id);
	$submitted_town = rgar($entry, $town_field_id);
    $county_key = $submitted_state . '-' . $submitted_county;
	$town_key = $submitted_state . '-' . $submitted_town . '-' . $submitted_county;
    $additional_email = 'Drew.Turner@concretesupplyco.com';

    if (isset($county_manager_map[$county_key])) {
        $notification['to'] = $county_manager_map[$county_key]['email'] . ',' . $additional_email;

        // This sets the subject and message content dynamically
        $notification['subject'] = 'New submission for ' . $county_manager_map[$county_key]['name'];
        $notification['message'] = "Hello " . $county_manager_map[$county_key]['name'] . ",\n\n" . $notification['message'];

        //error_log("Notification sent to county manager: " . $county_manager_map[$county_key]['email'] . " and " . $additional_email);
    } elseif (isset($town_manager_map[$town_key])) {
        $notification['to'] = $town_manager_map[$town_key]['email'] . ',' . $additional_email;

        // This sets the subject and message content dynamically
        $notification['subject'] = 'New submission for ' . $town_manager_map[$town_key]['name'];
        $notification['message'] = "Hello " . $town_manager_map[$town_key]['name'] . ",\n\n" . $notification['message'];

        //error_log("Notification sent to town manager: " . $town_manager_map[$town_key]['email'] . " and " . $additional_email);
    } else {
        $notification['to'] = 'scotth0407@gmail.com' . ',' . $additional_email;
        //error_log("Notification sent to default email: scotth0407@gmail.com and " . $additional_email);
    }   

    // Ensure the notification is active
    $notification['isActive'] = true;

    return $notification;
}