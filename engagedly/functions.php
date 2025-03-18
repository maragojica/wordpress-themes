<?php
/**
 * Engagedly functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Engagedly
 */

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

if ( ! function_exists( 'theme_setup' ) ) :
    function theme_setup() {
        //load_theme_textdomain( 'engagedly', get_template_directory() . '/languages' );

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        add_theme_support( 'post-thumbnails' );

        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'engagedly' ),
            'footer' => esc_html__( 'Footer', 'engagedly' ),
            'social' => __( 'Social Links', 'engagedly' ),
            'documentation' => __( 'Documentation', 'engagedly' ),
        ) );

        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
	        'script',
	        'style',
        ) );

	    /**
	     * Add support for core custom logo.
	     *
	     * @link https://codex.wordpress.org/Theme_Logo
	     */
	    add_theme_support(
		    'custom-logo',
		    array(
			    'height'      => 70,
			    'width'       => 318,
			    'flex-width'  => false,
			    'flex-height' => false,
		    )
	    );

	    // Add theme support for selective refresh for widgets.
	    add_theme_support( 'customize-selective-refresh-widgets' );

	    // Add support for Block Styles.
	    add_theme_support( 'wp-block-styles' );

	    // Add support for full and wide align images.
	    add_theme_support( 'align-wide' );

	    // Add support for responsive embedded content.
	    add_theme_support( 'responsive-embeds' );
    }
endif;
add_action( 'after_setup_theme', 'theme_setup' );

function create_posttype() {

	register_post_type( 'board-persons',
		array(
			'labels' => array(
				'name' => __( 'Board Members', 'engagedly' ),
				'singular_name' => __( 'Member', 'engagedly' ),
				'menu_name' => __( 'Board Members', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Member', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Members', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'members'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

	register_post_type( 'case-studies',
		array(
			'labels' => array(
				'name' => __( 'Case Studies', 'engagedly' ),
				'singular_name' => __( 'Case Study', 'engagedly' ),
				'menu_name' => __( 'Case Studies', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Case Study', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Case Study', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'case-studies'),
			'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
		)
	);

	register_post_type( 'documentations',
		array(
			'labels' => array(
				'name' => __( 'Documentations', 'engagedly' ),
				'singular_name' => __( 'Documentation', 'engagedly' ),
				'menu_name' => __( 'Documentations', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Documentation', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Documentation', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'documentations'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

	register_taxonomy('documentation_cat', array('documentations'), array(
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'documentation_cat' ),
	));

	register_post_type( 'industries',
		array(
			'labels' => array(
				'name' => __( 'Industries', 'engagedly' ),
				'singular_name' => __( 'Industry', 'engagedly' ),
				'menu_name' => __( 'Industries', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Industry', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Industry', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'industries'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

	register_post_type( 'integrations',
		array(
			'labels' => array(
				'name' => __( 'Integrations', 'engagedly' ),
				'singular_name' => __( 'Integration', 'engagedly' ),
				'menu_name' => __( 'Integrations', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Integration', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Integration', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'integration'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

    register_post_type( 'partners',
        array(
            'labels' => array(
                'name' => __( 'Partners', 'engagedly' ),
                'singular_name' => __( 'Partner', 'engagedly' ),
                'menu_name' => __( 'Partners', 'engagedly' ),
                'add_new'   => __( 'Add New', 'Partner', 'engagedly' ),
                'add_new_item'   => __( 'Add New', 'Partner', 'engagedly' ),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'sponsors'),
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );

	register_post_type( 'product-solutions',
		array(
			'labels' => array(
				'name' => __( 'Product Solutions', 'engagedly' ),
				'singular_name' => __( 'Product Solution', 'engagedly' ),
				'menu_name' => __( 'Product Solutions', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Product', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Product', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'product-solutions'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

	register_post_type( 'sponsors',
		array(
			'labels' => array(
				'name' => __( 'Sponsors', 'engagedly' ),
				'singular_name' => __( 'Sponsor', 'engagedly' ),
				'menu_name' => __( 'Sponsors', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Sponsor', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Sponsor', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'sponsors'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

    register_post_type( 'stories',
        array(
            'labels' => array(
                'name' => __( 'Stories', 'engagedly' ),
                'singular_name' => __( 'Story', 'engagedly' ),
                'menu_name' => __( 'Stories', 'engagedly' ),
                'add_new'   => __( 'Add New', 'Story', 'engagedly' ),
                'add_new_item'   => __( 'Add New', 'Story', 'engagedly' ),
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'story'),
            'supports' => array( 'title', 'editor', 'thumbnail' )
        )
    );

	register_post_type( 'testimonials',
		array(
			'labels' => array(
				'name' => __( 'Testimonials', 'engagedly' ),
				'singular_name' => __( 'Testimonial', 'engagedly' ),
				'menu_name' => __( 'Testimonials', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Testimonial', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Testimonial', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'testimonials'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

	register_post_type( 'uses-cases',
		array(
			'labels' => array(
				'name' => __( 'Uses Cases', 'engagedly' ),
				'singular_name' => __( 'Use Case', 'engagedly' ),
				'menu_name' => __( 'Uses Cases', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Use Case', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Use Case', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'uses-cases'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

	register_post_type( 'white-papers',
		array(
			'labels' => array(
				'name' => __( 'White Papers', 'engagedly' ),
				'singular_name' => __( 'White Paper', 'engagedly' ),
				'menu_name' => __( 'White Papers', 'engagedly' ),
				'add_new'   => __( 'Add New', 'White Paper', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'White Paper', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'white-papers'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);

	
	register_post_type( 'announcements',
		array(
			'labels' => array(
				'name' => __( 'Announcements', 'engagedly' ),
				'singular_name' => __( 'Announcement', 'engagedly' ),
				'menu_name' => __( 'Announcements', 'engagedly' ),
				'add_new'   => __( 'Add New', 'Announcement', 'engagedly' ),
				'add_new_item'   => __( 'Add New', 'Announcement', 'engagedly' ),
			),
			'public' => true,
			'has_archive' => false,
			'rewrite' => array('slug' => 'announcement'),
			'supports' => array( 'title', 'editor', 'thumbnail' )
		)
	);
	
}
add_action( 'init', 'create_posttype' );

function theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Right', 'engagedly' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Left', 'engagedly' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'engagedly' ),
		'id'            => 'sidebar-footer-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-4 col-lg-2 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'engagedly' ),
		'id'            => 'sidebar-footer-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-4 col-lg-2 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'engagedly' ),
		'id'            => 'sidebar-footer-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-4 col-lg-2 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'engagedly' ),
		'id'            => 'sidebar-footer-4',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-6 col-lg-3 col-4-footer %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 5', 'engagedly' ),
		'id'            => 'sidebar-footer-5',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget col-6 col-lg-3 mb-4 mb-lg-0 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Extra', 'engagedly' ),
		'id'            => 'sidebar-footer-extra',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Copyright', 'engagedly' ),
		'id'            => 'sidebar-copyright',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
}
add_action( 'widgets_init', 'theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function theme_enqueue_scripts() {

	wp_enqueue_style( 'engagedly-theme-header', get_template_directory_uri(). '/assets/css/header.css' );
	wp_enqueue_style( 'engagedly-style-nice-select', get_template_directory_uri(). '/assets/css/nice-select.css' );
	wp_enqueue_style( 'engagedly-style', get_stylesheet_uri() );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'engagedly-script-nice-select', get_template_directory_uri(). '/assets/js/jquery.nice-select.js', array(), '', true);
	wp_enqueue_script( 'app', get_template_directory_uri(). '/assets/js/main.js', array(), '1.0.1', true);
	
}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

function convert_to_accordion_menu($nav_menu, $args) {

	// Get the nav menu based on the requested menu
	$menu = wp_get_nav_menu_object($args->menu);

	// Get the nav menu based on the theme_location
	$locations = get_nav_menu_locations();
	if ( ! $menu && $args->theme_location && $locations && isset( $locations[ $args->theme_location ] ) ) {
		$menu = wp_get_nav_menu_object( $locations[ $args->theme_location ] );
	}

	// get the first menu that has items if we still can't find a menu
	if ( ! $menu && ! $args->theme_location ) {
		$menus = wp_get_nav_menus();
		foreach ( $menus as $menu_maybe ) {
			$menu_items = wp_get_nav_menu_items( $menu_maybe->term_id, array( 'update_post_term_cache' => false ) );
			if ( $menu_items ) {
				$menu = $menu_maybe;
				break;
			}
		}
	}

	if ( empty( $args->menu ) ) {
		$args->menu = $menu;
	}

	$is_accordion_menu = get_field('is_accordion_menu', $menu);

	if ($is_accordion_menu) {

		static $menu_id_slugs = array();

		// Get the nav menu based on the requested menu
		$menu = wp_get_nav_menu_object( $args->menu );

		// If the menu exists, get its items.
		if ( $menu && ! is_wp_error( $menu ) && ! isset( $menu_items ) ) {
			$menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );
		}

		$nav_menu = '';
		$items    = '';

		// Set up the $menu_item variables
		_wp_menu_item_classes_by_context( $menu_items );

		$sorted_menu_items        = array();
		$menu_items_parent        = array();
		$menu_items_with_children = array();
		foreach ( (array) $menu_items as $menu_item ) {
			$sorted_menu_items[ $menu_item->menu_order ] = $menu_item;
			if ( $menu_item->menu_item_parent ) {
				$menu_items_with_children[ $menu_item->menu_item_parent ][ $menu_item->menu_order ] = $menu_item;
			} else {
				$menu_items_parent[ $menu_item->ID ] = true;
			}
		}

		if ( $menu_items_parent ) {
			foreach ( $sorted_menu_items as $menu_item ) {
				if ( $menu_items_parent[ $menu_item->ID ] ) {
					$title = $menu_item->title;
					$url = $menu_item->url;
					$classes = implode(' ', $menu_item->classes);
					if ( ! empty( $menu_items_with_children[ $menu_item->ID ] ) ) {
						$item_childs = '';
						$current = $menu_item->current ? 'uk-open' : '';
						foreach ( $menu_items_with_children[ $menu_item->ID ] as $menu_item_children ) {
							$children_title  = $menu_item_children->title;
							$children_url    = $menu_item_children->url;
							$children_classes = implode(' ', $menu_item_children->classes);
							$current = $menu_item_children->current ? 'uk-open' : $current;
							$item_childs  .= '<div class="tablinks w-100 tabintegration"><a href="' . $children_url . '" class="' . $children_classes . '">' . $children_title . '</a></div>';
						}
						$items .= "<li class='{$current}'><a class=\"uk-accordion-title\" href=\"#\"><span> </span></a><a class='uk-title-collapsible {$classes}' href=\"{$url}\"><span>{$title}</span></a>";
						$items .= "<div class=\"uk-accordion-content\">";
						$items .= $item_childs;
						$items .= "</div>";
					} else {
						$items .= "<li><a class=\"uk-accordion-title uk-title\" href=\"{$url}\"><span> </span></a><a class='uk-title-collapsible {$classes}' href=\"{$url}\"><span>{$title}</span></a>";
					}
					$items .= "</li>";
				}
			}
		}

		unset( $menu_items, $menu_item, $menu_item_children );

		// Attributes
		if ( ! empty( $args->menu_id ) ) {
			$wrap_id = $args->menu_id;
		} else {
			$wrap_id = 'menu-' . $menu->slug;
			while ( in_array( $wrap_id, $menu_id_slugs ) ) {
				if ( preg_match( '#-(\d+)$#', $wrap_id, $matches ) ) {
					$wrap_id = preg_replace( '#-(\d+)$#', '-' . ++$matches[1], $wrap_id );
				} else {
					$wrap_id = $wrap_id . '-1';
				}
			}
		}
		$menu_id_slugs[] = $wrap_id;

		$wrap_class = $args->menu_class ? $args->menu_class : '';

		$nav_menu .= sprintf( '<ul id="%1$s" class="%2$s" uk-accordion="collapsible: true">%3$s</ul>', esc_attr( $wrap_id ), esc_attr( $wrap_class ), $items );
		unset( $items );
	}

	return $nav_menu;
}
add_filter('pre_wp_nav_menu','convert_to_accordion_menu', 10, 2);

/**
 * Convert primary menu tu tab menu
 */
require_once 'common/PrimaryMenuWalker.php';

/**
 * Create new Widgets
 */
require_once 'common/ScheduleDemoWidget.php';
require_once 'common/ScheduleDemoFormWidget.php';
require_once 'common/RecommendedWidget.php';
require_once 'common/LastPostsWidget.php';

function register_new_widgets()
{
    register_widget( 'ScheduleDemoWidget' );
	register_widget( 'ScheduleDemoFormWidget' );
	register_widget( 'RecommendedWidget' );
	register_widget( 'LastPostsWidget' );
}
add_action( 'widgets_init', 'register_new_widgets' );


/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);