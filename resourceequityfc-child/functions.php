<?php
/**
 * Enqueues scripts and styles.
 *
 *  */
 function resourcequity_enqueue_style(){

     //Theme block stylesheet.
     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
     wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style'));

     //IHover CSS
     wp_enqueue_style( 'ihover-css', get_stylesheet_directory_uri() . '/css/ihover.css');

     //Fonts CSS
     wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/fonts/fonts.css');

 }
add_action( 'wp_enqueue_scripts', 'resourcequity_enqueue_style' );


function resourcequity_enqueue_scripts() {

    //Load More
    wp_enqueue_script( 'script-load-more', get_stylesheet_directory_uri() . '/js/jquery.simpleLoadMore.js', array( 'jquery' ) );

}
add_action( 'wp_enqueue_scripts', 'resourcequity_enqueue_scripts' );



/*
 * Widgets*/

function resourcequity_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Header Text Widget Area', 'resourcequity' ),
        'id' => 'header-text-area',
        'description' => __( 'Header Text on posts and pages', 'resourcequity' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
        'after_widget' => '</aside>',

    ) );
    register_sidebar( array(
        'name' => __( 'Footer Text Widget Area', 'resourcequity' ),
        'id' => 'footer-text-area',
        'description' => __( 'Footer Text on posts and pages', 'resourcequity' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
        'after_widget' => '</aside>',

    ) );
    register_sidebar( array(
        'name' => __( 'Footer Copyright Widget Area', 'resourcequity' ),
        'id' => 'footer-copyright',
        'description' => __( 'Footer Copyright Widget Area', 'resourcequity' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
        'after_widget' => '</aside>',

    ) );

}
add_action( 'widgets_init', 'resourcequity_widgets_init' );

/*Menu*/
register_nav_menus( array(

    'footer-menu-1' => __( 'Footer Menu', 'resourcequity' )
) );

/*Custom Functions*/
function num_of_word($text,$numb) {
    $text = strip_tags($text);
    $wordsArray = explode(" ", $text);
    $parts = array_chunk($wordsArray, $numb);

    $final = implode(" ", $parts[0]);

    if(isset($parts[1]))
        $final = $final." ...";
    return $final;
}
function get_small_title($count,$elipsis){
    $title = get_the_title();
    $len = strlen($title);
    if($len>$count){
        $title = substr($title, 0, $count);
        $title = substr($title, 0, strripos($title, " "));
        if($elipsis==1){
            $title.="...";
        }
    }

    return $title;
}


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



/**
 *	ENABLED FILE *.svg
 **/

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
    // add your extension to the array
    $existing_mimes['vcf'] = 'text/x-vcard';
    $existing_mimes['svg'] = 'image/svg+xml';
    return $existing_mimes;
}
function my_post_queries( $query ) {
    if (!is_admin() && $query->is_main_query()){

        // alter the query for the home and category pages

        if(is_home() || is_category() || is_search() || is_author()){
            $query->set('posts_per_page', 10);
        }
    }
}
add_action( 'pre_get_posts', 'my_post_queries' );


add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
    global $typenow;
    $post_type = 'partner'; // change to your post type
    $taxonomy  = 'partners_cat'; // change to your taxonomy
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

add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
    global $pagenow;
    $post_type = 'partner'; // change to your post type
    $taxonomy  = 'partners_cat'; // change to your taxonomy
    $q_vars    = &$query->query_vars;
    if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
        $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
        $q_vars[$taxonomy] = $term->slug;
    }
}


?>