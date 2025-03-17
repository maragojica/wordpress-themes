<?php
/**
 * Verb Studios functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Verb_Studios
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
function verbstudios_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Verb Studios, use a find and replace
		* to change 'verbstudios' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'verbstudios', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'verbstudios' ),
			'mobile' => esc_html__( 'Mobile', 'verbstudios' ),
			'footer-1' => esc_html__( 'Footer', 'verbstudios' )
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
			'verbstudios_custom_background_args',
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
add_action( 'after_setup_theme', 'verbstudios_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function verbstudios_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'verbstudios_content_width', 640 );
}
add_action( 'after_setup_theme', 'verbstudios_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function verbstudios_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'verbstudios' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'verbstudios' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'verbstudios_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function verbstudios_scripts() {
	wp_enqueue_style( 'verbstudios-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'verbstudios-style', 'rtl', 'replace' );

	wp_enqueue_style('verbstudios-gfonts', 'https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap', [], null );	
	wp_enqueue_style('verbstudios-flex', get_template_directory_uri() . '/css/flex.css', array(), _S_VERSION);
	wp_enqueue_style('verbstudios-responsive-navigation-css', get_template_directory_uri() . '/css/responsive-navigation.css', array(), _S_VERSION);			
	wp_enqueue_style('verbstudios-animatemin-css', get_template_directory_uri() . '/css/animate.min.css', array(), _S_VERSION);	
	wp_enqueue_style('verbstudios-fancyboxcss', get_template_directory_uri() . '/css/fancybox.min.css', array(), _S_VERSION); 
	wp_enqueue_style('verbstudios-glider-css', get_template_directory_uri() . '/css/glider.min.css', array(), _S_VERSION);  
	wp_enqueue_style('verbstudios-slick-css', get_template_directory_uri() . '/css/slick.min.css', array(), _S_VERSION); 
	

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'verbstudios-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script('verbstudios-responsive-navigation-js', get_template_directory_uri() . '/js/responsive-navigation.js', array(), _S_VERSION, true );	
	wp_enqueue_script( 'verbstudios-loadmore-js', get_template_directory_uri() . '/js/jquery.simpleLoadMore.js', array(), _S_VERSION, true );
	wp_enqueue_script('verbstudios-wow-js', get_template_directory_uri() . '/js/wow.min.js', array(), _S_VERSION, true );
	wp_enqueue_script('verbstudios-fancy-js', get_template_directory_uri() . '/js/fancybox.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('verbstudios-glider-js', get_template_directory_uri() . '/js/glider.min.js', array(), _S_VERSION, true); 		
	wp_enqueue_script('verbstudios-slick-js', get_template_directory_uri() . '/js/slick.min.js', array(), _S_VERSION, true); 
	wp_enqueue_script('verbstudios-youtube-js', get_template_directory_uri() . '/js/youtube.js', array(), _S_VERSION, true);
	
	wp_enqueue_script('verbstudios-materials-js', get_template_directory_uri() . '/js/materials.js', array(), _S_VERSION, true);
    wp_localize_script('verbstudios-materials-js', 'ajax_params', array(
        'nonce' => wp_create_nonce('wp_rest')
    ));

	wp_enqueue_style('verbstudios-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('verbstudios-owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), _S_VERSION);
	wp_enqueue_script( 'verbstudios-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), _S_VERSION, true );

	wp_enqueue_style('verbstudios-plyr-css', get_template_directory_uri() . '/css/plyr.css', array(), _S_VERSION); 
	wp_enqueue_script('verbstudios-plyr-js', get_template_directory_uri() . '/js/plyr.polyfilled.js', array(), _S_VERSION, true);
	
	wp_enqueue_style('verbstudios-main-css', get_template_directory_uri() . '/css/verbstudios.css', array(), _S_VERSION);
	wp_enqueue_script( 'verbstudios-main-js', get_template_directory_uri() . '/js/verbstudios.js', array(), _S_VERSION, true );
	
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'verbstudios_scripts' );

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
 * Material Filters.
 */
require get_template_directory() . '/inc/material-filter-logic.php';

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
	 if ('page' === $post->post_type || 'post' === $post->post_type || 'testimonial' === $post->post_type || 'project' === $post->post_type || 'material' === $post->post_type) :
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

  /**
  * Displaying Custom Taxonomies
  */
  /* Materials Prices*/
 add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_material_price');
 function tsm_filter_post_type_by_taxonomy_material_price() {
	 global $typenow;
	 $post_type = 'material'; // change to your post type
	 $taxonomy  = 'price'; // change to your taxonomy
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
 
 add_filter('parse_query', 'tsm_convert_id_to_term_in_query_material_price');
 function tsm_convert_id_to_term_in_query_material_price($query) {
	 global $pagenow;
	 $post_type = 'material'; // change to your post type
	 $taxonomy  = 'price'; // change to your taxonomy
	 $q_vars    = &$query->query_vars;
	 if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		 $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		 $q_vars[$taxonomy] = $term->slug;
	 }
 }
 
  /* Materials Wood Species*/
  add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_material_species');
  function tsm_filter_post_type_by_taxonomy_material_species() {
	  global $typenow;
	  $post_type = 'material'; // change to your post type
	  $taxonomy  = 'wood-species'; // change to your taxonomy
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
  
  add_filter('parse_query', 'tsm_convert_id_to_term_in_query_material_species');
  function tsm_convert_id_to_term_in_query_material_species($query) {
	  global $pagenow;
	  $post_type = 'material'; // change to your post type
	  $taxonomy  = 'wood-species'; // change to your taxonomy
	  $q_vars    = &$query->query_vars;
	  if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		  $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		  $q_vars[$taxonomy] = $term->slug;
	  }
  }

    /* Materials Length*/
	add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_material_length');
	function tsm_filter_post_type_by_taxonomy_material_length() {
		global $typenow;
		$post_type = 'material'; // change to your post type
		$taxonomy  = 'length'; // change to your taxonomy
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
	
	add_filter('parse_query', 'tsm_convert_id_to_term_in_query_material_length');
	function tsm_convert_id_to_term_in_query_material_length($query) {
		global $pagenow;
		$post_type = 'material'; // change to your post type
		$taxonomy  = 'length'; // change to your taxonomy
		$q_vars    = &$query->query_vars;
		if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			$q_vars[$taxonomy] = $term->slug;
		}
	}

	 /* Materials Thickness*/
	 add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_material_thickness');
	 function tsm_filter_post_type_by_taxonomy_material_thickness() {
		 global $typenow;
		 $post_type = 'material'; // change to your post type
		 $taxonomy  = 'thickness'; // change to your taxonomy
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
	 
	 add_filter('parse_query', 'tsm_convert_id_to_term_in_query_material_thickness');
	 function tsm_convert_id_to_term_in_query_material_thickness($query) {
		 global $pagenow;
		 $post_type = 'material'; // change to your post type
		 $taxonomy  = 'thickness'; // change to your taxonomy
		 $q_vars    = &$query->query_vars;
		 if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
			 $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
			 $q_vars[$taxonomy] = $term->slug;
		 }
	 }

