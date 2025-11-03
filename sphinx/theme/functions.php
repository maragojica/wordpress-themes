<?php
/**
 * sphinx functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sphinx
 */

if ( ! defined( 'SPHINX_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'SPHINX_VERSION', time() );
}

if ( ! defined( 'SPHINX_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `sphinx_content_class`
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
		'SPHINX_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'sphinx_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sphinx_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sphinx, use a find and replace
		 * to change 'sphinx' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sphinx', get_template_directory() . '/languages' );

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
				'menu-primary' => __( 'Primary', 'sphinx' ),
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
add_action( 'after_setup_theme', 'sphinx_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sphinx_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'sphinx' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'sphinx' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sphinx_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sphinx_scripts() {
	wp_enqueue_style('sphinx-gfonts', 'https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap', [], null );
	wp_enqueue_style('sphinx-aos-css', get_template_directory_uri() . '/css/aos.css', array(), SPHINX_VERSION);
	wp_enqueue_style( 'sphinx-style', get_stylesheet_uri(), array(), SPHINX_VERSION );

	wp_enqueue_script('jquery');
	wp_enqueue_script( 'sphinx-aos-js', get_template_directory_uri() . '/js/aos.js', array(), SPHINX_VERSION, true );
	wp_enqueue_script( 'sphinx-custom-js', get_template_directory_uri() . '/js/custom.js', array(), SPHINX_VERSION, true );
	wp_enqueue_script( 'sphinx-script', get_template_directory_uri() . '/js/script.min.js', array(), SPHINX_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sphinx_scripts' );

/**
 * Enqueue the block editor script.
 */
function sphinx_enqueue_block_editor_script() {
	$current_screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;

	if (
		$current_screen &&
		$current_screen->is_block_editor() &&
		'widgets' !== $current_screen->id
	) {
		wp_enqueue_style('sphinx-gfonts', 'https://fonts.googleapis.com/css2?family=Figtree:ital,wght@0,300..900;1,300..900&display=swap', [], null );
		wp_enqueue_script(
			'sphinx-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			SPHINX_VERSION,
			true
		);
		wp_add_inline_script( 'sphinx-editor', "tailwindTypographyClasses = '" . esc_attr( SPHINX_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'sphinx_enqueue_block_editor_script' );

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function sphinx_tinymce_add_class( $settings ) {
	$settings['body_class'] = SPHINX_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'sphinx_tinymce_add_class' );

/**
 * Limit the block editor to heading levels supported by Tailwind Typography.
 *
 * @param array  $args Array of arguments for registering a block type.
 * @param string $block_type Block type name including namespace.
 * @return array
 */
function sphinx_modify_heading_levels( $args, $block_type ) {
	if ( 'core/heading' !== $block_type ) {
		return $args;
	}

	// Remove <h1>, <h5> and <h6>.
	$args['attributes']['levelOptions']['default'] = array( 2, 3, 4 );

	return $args;
}
add_filter( 'register_block_type_args', 'sphinx_modify_heading_levels', 10, 2 );

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
 * Functions which enhance the theme by hooking into Advanced Custom Fields.
 */
require get_template_directory() . '/inc/admin/acf-functions.php';

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
 *	OPEN EXTERNAL LINK NEW TAB *
 **/
function open_external_links_in_new_tab($content) {
  return preg_replace_callback(
    '#<a[^>]+href=["\'](http[s]?://[^"\']+)["\'][^>]*>#i',
    function ($matches) {
      $host = parse_url(home_url(), PHP_URL_HOST);
      $link_host = parse_url($matches[1], PHP_URL_HOST);
      if ($host && $link_host && $host !== $link_host) {
        return preg_replace('/<a/i', '<a target="_blank" rel="noopener noreferrer"', $matches[0]);
      }
      return $matches[0];
    },
    $content
  );
}
add_filter('the_content', 'open_external_links_in_new_tab');

 /**
  *	CUSTOM TAXONOMY CPT NEWS*
  **/
  add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_news_type');
function tsm_filter_post_type_by_taxonomy_news_type() {
	global $typenow;
	$post_type = 'news'; 
	$taxonomy  = 'news-type'; 
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

add_filter('parse_query', 'tsm_convert_id_to_term_in_query_news_type');
function tsm_convert_id_to_term_in_query_news_type($query) {
	global $pagenow;
	$post_type = 'news'; 
	$taxonomy  = 'news-type'; 
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
