<?php
/**
 * Enqueues scripts and styles.
 *
 *  */
 function lca_enqueue_style(){

     //Theme block stylesheet.
     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
     wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style'));

     //IHover CSS
     wp_enqueue_style( 'ihover-css', get_stylesheet_directory_uri() . '/css/ihover.css');

 }
add_action( 'wp_enqueue_scripts', 'lca_enqueue_style' );


function lca_enqueue_scripts() {

    //Load More
    wp_enqueue_script( 'script-load-more', get_stylesheet_directory_uri() . '/js/jquery.simpleLoadMore.js');
    // Main js.
    wp_enqueue_script( 'script-owl-carousel', get_stylesheet_directory_uri() . '/js/main.js');

}
add_action( 'wp_enqueue_scripts', 'lca_enqueue_scripts' );



/*
 * Widgets*/

function lca_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Header Social Widget Area', 'lca' ),
        'id' => 'header-social-area',
        'description' => __( 'Rigth Header on posts and pages', 'lca' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
        'after_widget' => '</aside>',

    ) );
    register_sidebar( array(
        'name' => __( 'Footer Copyright Widget Area', 'lca' ),
        'id' => 'footer-copyright',
        'description' => __( 'Footer Copyright Widget Area', 'lca' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
        'after_widget' => '</aside>',

    ) );

}
add_action( 'widgets_init', 'lca_widgets_init' );

/*Menu*/
register_nav_menus( array(
    'header-menu-social' => __( 'Header Social Menu', 'lca' ),
    'footer-menu-1' => __( 'Footer Menu 1', 'lca' ),
    'footer-menu-2' => __( 'Footer Menu 2', 'lca' ),
    'footer-menu-3' => __( 'Footer Menu 3', 'lca' ),
    'footer-menu-social' => __( 'Social Footer Menu', 'lca' )
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


function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
    $return = array();

    if (class_exists('WPSEO_Primary_Term')){
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)){
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories){
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)){
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories){
            $return['all_categories'] = array();

            if (!empty($categories_list)){
                foreach($categories_list as &$category){
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
}

//Exclude pages from WordPress Search
/*if (!is_admin()) {
    function wpb_search_filter($query) {
        if ($query->is_search) {
            $query->set('post_type', 'post');
        }
        return $query;
    }
    add_filter('pre_get_posts','wpb_search_filter');
}*/


?>