<?php
/**
 * Enqueues scripts and styles.
 *
 *  */
 function includr_enqueue_style(){

     //Theme block stylesheet.
     wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
     wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style'));
     // Fonts stylesheet.
     wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/assets/fonts/fontstypes.css');
 }
add_action( 'wp_enqueue_scripts', 'includr_enqueue_style' );


function includr_enqueue_scripts() {

}
add_action( 'wp_enqueue_scripts', 'includr_enqueue_scripts' );

/*
 * Widgets*/

function includr_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Top Header Widget Area', 'includr' ),
        'id' => 'top-header',
        'description' => __( 'Top Header on posts and pages', 'includr' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
        'after_widget' => '</aside>',

    ) );

}
add_action( 'widgets_init', 'includr_widgets_init' );


/*Menu*/
register_nav_menus( array(
		'footer-menu-2' => __( 'Footer Menu Secondary', 'includr' )
) );


/*Custom Functions*/
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


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
		if ($query->is_search) {
			$query->set('post_type', array( 'post', 'practice', 'perspective' ));
		}


      /*  if(is_home() || is_category() || is_search() || is_author()){
            $query->set('posts_per_page', 10);
        }*/
    }
	return $query;
}
add_action( 'pre_get_posts', 'my_post_queries' );

function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

/*Custom Shortcodes*/
function pullquote_shortcode( $atts, $content = null ) {
	return '<div class="m-less">
				<hr>
				<div class="pt-md-3 pb-md-3">
					<div class="copy-text-title cl-dark"><p>' . $content . '</p></div>
				</div>
				<hr>
			</div>';
}
add_shortcode( 'pullquote', 'pullquote_shortcode' );

function stat_shortcode( $atts, $content = null ) {
	$a = shortcode_atts( array(
			'percent' => 'stat',
	), $atts );

	return '<hr>
			<div class="d-flex align-items-sm-center justify-content-around pt-md-2 pb-md-2">
				<div class="position-relative pr-md-5 pr-sm-3 box-percent-number">
					<img class="image_percent" src="https://includr.org/wp-content/uploads/2021/05/Artwork-11@2x.png" alt="">
					<div class="overlay-percent d-flex align-items-center justify-content-end pl-sm-4">' . esc_attr($a['percent']) . '</div>
				</div>
				<h3 class="title-percent cl-stat pl-md-4 pl-xs-5 pl-4">' . $content . '</h3>
			</div>
			<hr>';
}
add_shortcode( 'stat', 'stat_shortcode' );

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

?>