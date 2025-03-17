<?php
/**
 * Amenity Collective functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Amenity_Collective
 */

if ( ! defined( 'AMENITY_COLLECTIVE_VERSION' ) ) {
	/*
	 * Set the theme’s version number.
	 *
	 * This is used primarily for cache busting. If you use `npm run bundle`
	 * to create your production build, the value below will be replaced in the
	 * generated zip file with a timestamp, converted to base 36.
	 */
	define( 'AMENITY_COLLECTIVE_VERSION', time() );
}

if ( ! defined( 'AMENITY_COLLECTIVE_TYPOGRAPHY_CLASSES' ) ) {
	/*
	 * Set Tailwind Typography classes for the front end, block editor and
	 * classic editor using the constant below.
	 *
	 * For the front end, these classes are added by the `amenity_collective_content_class`
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
		'AMENITY_COLLECTIVE_TYPOGRAPHY_CLASSES',
		'prose prose-neutral max-w-none prose-a:text-primary'
	);
}

if ( ! function_exists( 'amenity_collective_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function amenity_collective_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Amenity Collective, use a find and replace
		 * to change 'amenity-collective' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'amenity-collective', get_template_directory() . '/languages' );

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
				'menu-primary' => __( 'Primary', 'amenity-collective' ),
				'menu-mobile' => __( 'Mobile Primary', 'amenity-collective' ),
				'menu-mobile-secondary' => __( 'Mobile Secondary', 'amenity-collective' ),
				'menu-footer-1' => __( 'Footer 1', 'amenity-collective' ),
				'menu-footer-2' => __( 'Footer 2', 'amenity-collective' ),
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
add_action( 'after_setup_theme', 'amenity_collective_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function amenity_collective_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'amenity-collective' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer.', 'amenity-collective' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'amenity_collective_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function amenity_collective_scripts() {
	wp_enqueue_style('amenity-collective-typekit', 'https://use.typekit.net/jib8ret.css', [], null);
	wp_enqueue_style( 'amenity-collective-style', get_stylesheet_uri(), array(), AMENITY_COLLECTIVE_VERSION );
	wp_enqueue_style('amenity-collective-fancybox-css', get_template_directory_uri() . '/css/fancybox.min.css', array(), AMENITY_COLLECTIVE_VERSION);	
	wp_enqueue_style('amenity-collective-owl-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), AMENITY_COLLECTIVE_VERSION);
	wp_enqueue_style('amenity-collective-owltheme-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), AMENITY_COLLECTIVE_VERSION);	

	wp_enqueue_script('jquery');			
	wp_enqueue_script('amenity-collective-treenmax-js', get_template_directory_uri() . '/js/tweenmax.min.js', array(), AMENITY_COLLECTIVE_VERSION, true );
	wp_enqueue_script('amenity-collective-fancybox-js', get_template_directory_uri() . '/js/fancybox.min.js', array(), AMENITY_COLLECTIVE_VERSION, true );
	wp_enqueue_script( 'amenity-collective-owl-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), AMENITY_COLLECTIVE_VERSION, true );	
	wp_enqueue_script( 'amenity-collective-parallax-js', get_template_directory_uri() . '/js/parallax.min.js', array(), AMENITY_COLLECTIVE_VERSION, true );	
	wp_enqueue_script( 'amenity-collective-custom-js', get_template_directory_uri() . '/js/custom.js', array(), AMENITY_COLLECTIVE_VERSION, true );
	wp_enqueue_script( 'amenity-collective-script', get_template_directory_uri() . '/js/script.min.js', array(), AMENITY_COLLECTIVE_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'amenity_collective_scripts' );

/**
 * Enqueue the block editor script.
 */
function amenity_collective_enqueue_block_editor_script() {
	if ( is_admin() ) {
		wp_enqueue_style('amenity-collective-typekit', 'https://use.typekit.net/jib8ret.css', [], null);
		wp_enqueue_script(
			'amenity-collective-editor',
			get_template_directory_uri() . '/js/block-editor.min.js',
			array(
				'wp-blocks',
				'wp-edit-post',
			),
			AMENITY_COLLECTIVE_VERSION,
			true
		);
		wp_add_inline_script( 'amenity-collective-editor', "tailwindTypographyClasses = '" . esc_attr( AMENITY_COLLECTIVE_TYPOGRAPHY_CLASSES ) . "'.split(' ');", 'before' );
	}
}
add_action( 'enqueue_block_assets', 'amenity_collective_enqueue_block_editor_script' );

/**
 * Enqueue the admin styles.
 */
function enqueue_acf_admin_styles() {
    wp_enqueue_style('acf-admin-styles', get_template_directory_uri() . '/style-admin.css', AMENITY_COLLECTIVE_VERSION);
}
add_action('admin_enqueue_scripts', 'enqueue_acf_admin_styles');

/**
 * Add the Tailwind Typography classes to TinyMCE.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function amenity_collective_tinymce_add_class( $settings ) {
	$settings['body_class'] = AMENITY_COLLECTIVE_TYPOGRAPHY_CLASSES;
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'amenity_collective_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * General Settings
 */
require get_template_directory() . '/inc/general-settings.php';

/**
 * Gravity Form Settings
 */
require get_template_directory() . '/inc/gravity-forms.php';

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
        $output .= "\n$indent<ul class=\"submenu absolute left-0 min-w-[15em] pt-4 pb-4 hidden shadow-sm group-hover:block bg-white \">\n";
    }

    // Start Element (menu item)
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // Check if item has children based on the depth
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);
        $class_names = join(' ', apply_filters('nav_menu_css_class', $classes, $item, $args));
        $class_names .= $has_children ? ' group relative px-[14px] xl:px-[19px]' : ' px-[14px] xl:px-[24px]'; // Add 'group' class if item has children
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
 * Custom Extract Forts Word Lowercase
 */
function extractFirstWordLowercase($text) {
    // Trim and split the text into words
    $words = explode(' ', trim($text));
    
    // Get the first word and convert it to lowercase
    $firstWord = strtolower($words[0]);
    
    return $firstWord;
}
 /**
 * Render Post per category
 */
function render_category_posts($category_slug, $number_of_posts, $featured_ID) {
    // Get the current page for pagination
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    // Arguments for WP_Query
    $args = array(
        'post_type'      => 'post',
		'post_status' => 'publish',
		'orderby' => 'date',
		'order' => 'DESC',
        'posts_per_page' => $number_of_posts, 
		'post__not_in'   => array($featured_ID),
        'paged'          => $paged,
        'category_name'  => $category_slug,
    );
	
    // Execute WP_Query
    $query = new WP_Query($args);

    // Check if posts are found
    if ($query->have_posts()) {
        echo '<div class="posts flex flex-col sm:flex-row flex-wrap justify-center -mx-3 mt-[0.2em]">';
        while ($query->have_posts()) {
            $query->the_post();
			$title = get_the_title(); 
			$id = get_the_id(); 
			$publication_name = get_field('publication_name', $id); 
            ?>
            <div class="w-full px-3 mt-[20px] lg:mt-[36px] sm:w-1/2 lg:w-1/3 group">
					<div class="flex flex-col h-full">
					
					<?php if (has_post_thumbnail()) : ?>		
						<a class="relative overflow-hidden" href="<?php the_permalink(); ?>" tabindex="0"  >						  
							<?php the_post_thumbnail('full', array('class' => 'w-full h-[11em] md:h-[400px] lg:h-[305px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300')); ?>	
						</a>			
						<?php endif; ?>
						<div class="flex flex-grow justify-start flex-wrap flex-col p-[30px] xl:p-[48px] bg-blueinfo-dark group-hover:bg-primary transition-all ease-in-out duration-300">                                
								<div class="text-tertiary-dark uppercase text-[14px] sm:text-[16px] font-primary-font font-medium tracking-[1.6px] mb-[5px] transition-all ease-in-out duration-300 group-hover:text-tertiary-light"><?php the_time('M j, Y'); ?></div>                                
							<?php if($title): ?>
								<h4 class="text-primary mb-0"><a class="text-primary hover:text-white group-hover:text-white" href="<?php the_permalink(); ?>" tabindex="0"  ><?php echo $title; ?></a></h4>
							<?php endif; ?>  
						</div>                                       
					
					</div>
				</div>
            <?php
        }
        echo '</div>';

        // Display pagination
        render_pagination($query->max_num_pages, $paged, $category_slug);

    } else {
        echo '<div class="font-text-font text-tertiary-dark font-semibold sm:mt-[20px] mt-[5px] style-disc" >                 
				<p class="text-tertiary-dark">It looks like nothing was found for this Category</p>                   
			</div>';
    }

    // Reset the query
    wp_reset_postdata();
}

 /**
 * Custom Paginator
 */

function render_pagination($total_pages, $current_page, $category_slug) {
    if ($total_pages <= 1) return; // No pagination needed if only one page

    $pagination_links = paginate_links(array(
        'base'      => get_pagenum_link(1) . '%_%',
        'format'    => '?paged=%#%',
        'current'   => max(1, $current_page),
        'total'     => $total_pages,
        'prev_text' => '&laquo;', // Previous arrow
        'next_text' => '&raquo;', // Next arrow
        'type'      => 'array',
        'add_args'  => array('category' => $category_slug), // Preserve category in query strings
    ));

    if (!empty($pagination_links)) {
        echo '<nav class="pagination flex justify-center items-center space-x-4 mt-[56px] lg:mt-[82px] lg:mb-0 mb-[30px]">';
        foreach ($pagination_links as $link) {
            if (strpos($link, 'current') !== false) {
                echo '<span class="pagination-link current font-primary-font uppercase text-[13px] md:text-[16px] lg:text-[18px] font-semibold tracking-[0.789px] lg:tracking-[1.08px] bg-primary border-2 lg:border-[3px] border-transparent text-white w-[30px] h-[30px]  md:w-[42px] md:h-[42px] flex justify-center items-center rounded-[40px]">' . $link . '</span>';
            } else {
                echo '<span class="pagination-link font-primary-font uppercase text-[13px] md:text-[16px] lg:text-[18px] font-semibold tracking-[0.789px] lg:tracking-[1.08px] border-2 lg:border-[3px] border-primary text-primary hover:text-white hover:bg-primary w-[30px] h-[30px] md:w-[42px] md:h-[42px] flex justify-center items-center rounded-[40px] hover:border-transparent">' . $link . '</span>';
            }
        }
        echo '</nav>';
    }
}


add_action('rest_api_init', function () {
    register_rest_field('post', 'custom_fields', array(
        'get_callback' => function($post) {
            return get_fields($post['id']);
        }
    ));
});

add_action('rest_api_init', function () {
    register_rest_route(
        'amenity/v1',
        '/posts',
        [
            'methods'  => 'GET',
            'callback' => 'amenity_get_posts',
            'args'     => [
                'page' => [
                    'description' => 'Current page of the collection.',
                    'type'        => 'integer',
                    'default'     => 1,
                ],
                'per_page' => [
                    'description' => 'Number of items to be returned.',
                    'type'        => 'integer',
                    'default'     => 9,
                ],
                'category' => [
                    'description' => 'Category slug or ID to filter.',
                    'type'        => 'string',
                    'default'     => '',
                ],
            ],
        ]
    );
});

/**
 * Callback function for the /amenity/v1/posts endpoint.
 */
function amenity_get_posts(\WP_REST_Request $request)
{
    $page     = $request->get_param('page');
    $per_page = $request->get_param('per_page');
    $category = $request->get_param('category'); // Slug or ID, up to you.

    // Build query args
    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'paged'          => (int) $page,
        'posts_per_page' => (int) $per_page,
    ];

    if (!empty($category) && $category !== 'all') {
        // If you store slug:
        //   $args['category_name'] = $category;
        //
        // If you store numeric term_id:
        //   $args['cat'] = (int) $category;
        //
        // Or if you want to auto-detect whether category is slug or ID:
        if (is_numeric($category)) {
            $args['cat'] = (int) $category;
        } else {
            $args['category_name'] = $category;
        }
    }

    $query = new \WP_Query($args);

    // Build a custom response array.
    // This can be as minimal or as detailed as you like.
    $posts_data = [];
    foreach ($query->posts as $post) {
        // Basic fields
        $item = [
            'id'         => $post->ID,
            'title'      => get_the_title($post),
            'slug'       => $post->post_name,
            'date'       => get_the_date('Y-m-d H:i:s', $post),
            'permalink'  => get_permalink($post),
            'excerpt'    => wp_trim_words(strip_shortcodes($post->post_content), 40),
            'categories' => wp_get_post_categories($post->ID),  // or slugs, your choice
        ];

        // Featured image (featured_media) if you want it
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        if ($thumbnail_id) {
            $item['featured_media'] = [
                'id'  => $thumbnail_id,
                'url' => wp_get_attachment_image_url($thumbnail_id, 'full'),
            ];
        } else {
            $item['featured_media'] = null;
        }

        // Custom fields, if needed (ACF or standard meta)
        // $item['custom_fields'] = get_post_meta($post->ID);

        $posts_data[] = $item;
    }

    // Build a response
    // We’ll include total pages so your JS can read it and generate pagination.
    $response = [
        'posts'       => $posts_data,
        'total'       => (int) $query->found_posts,
        'total_pages' => (int) $query->max_num_pages,
        'current_page'=> (int) $page,
    ];

    // Optionally set X-WP-TotalPages / X-WP-Total headers if you want to mimic core
    $rest_response = new \WP_REST_Response($response, 200);
    $rest_response->header('X-WP-Total', $query->found_posts);
    $rest_response->header('X-WP-TotalPages', $query->max_num_pages);

    return $rest_response;
}


 /**
 * Register ACF Blocks
 */
function lazarus_register_acf_blocks()
{
	register_block_type(__DIR__ . '/template-parts/blocks/hero');
	register_block_type(__DIR__ . '/template-parts/blocks/hero-internal');
	register_block_type(__DIR__ . '/template-parts/blocks/hero-internal-color');
	register_block_type(__DIR__ . '/template-parts/blocks/cta-banner');
	register_block_type(__DIR__ . '/template-parts/blocks/columns-text');
	register_block_type(__DIR__ . '/template-parts/blocks/columns-info');
	register_block_type(__DIR__ . '/template-parts/blocks/content-text');
	register_block_type(__DIR__ . '/template-parts/blocks/cards-info');
	register_block_type(__DIR__ . '/template-parts/blocks/counters');
	register_block_type(__DIR__ . '/template-parts/blocks/our-values');
	register_block_type(__DIR__ . '/template-parts/blocks/recent-blog');
	register_block_type(__DIR__ . '/template-parts/blocks/blog-list');
	register_block_type(__DIR__ . '/template-parts/blocks/partner-slider');
	register_block_type(__DIR__ . '/template-parts/blocks/testimonials-slider');
	register_block_type(__DIR__ . '/template-parts/blocks/criteria-slider');
	register_block_type(__DIR__ . '/template-parts/blocks/mansory');
	register_block_type(__DIR__ . '/template-parts/blocks/timeline');
	register_block_type(__DIR__ . '/template-parts/blocks/accordeon');
	register_block_type(__DIR__ . '/template-parts/blocks/contact');
	register_block_type(__DIR__ . '/template-parts/blocks/focus-areas');
	register_block_type(__DIR__ . '/template-parts/blocks/brands');
	register_block_type(__DIR__ . '/template-parts/blocks/jobs-openings');
	register_block_type(__DIR__ . '/template-parts/blocks/team');
	register_block_type(__DIR__ . '/template-parts/blocks/logos-list');
	register_block_type(__DIR__ . '/template-parts/blocks/map');
	register_block_type(__DIR__ . '/template-parts/blocks/back-forth');
	register_block_type(__DIR__ . '/template-parts/blocks/media-requests');
}
add_action('init', 'lazarus_register_acf_blocks', PHP_INT_MAX);
