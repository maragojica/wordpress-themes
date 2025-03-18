<?php


/**
 * Enqueues scripts and styles.
 *
 *  */

function rxla_enqueue_style(){

	//Theme block stylesheet.
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array('parent-style'));
	wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/custom.css');

	//IHover CSS
	wp_enqueue_style( 'ihover-css', get_stylesheet_directory_uri() . '/assets/css/ihover.css');
}
add_action( 'wp_enqueue_scripts', 'rxla_enqueue_style' );


function rxla_enqueue_scripts() {

}
add_action( 'wp_enqueue_scripts', 'rxla_enqueue_scripts' );

function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_filter( 'widget_text', 'do_shortcode' );

//Dynamic Year
function site_year(){
	ob_start();
	echo date( 'Y' );
	$output = ob_get_clean();
    return $output;
}
add_shortcode( 'site_year', 'site_year' );

//
// Your code goes below
//

/*
 * Widgets*/
function rxla_widgets_init() {
	register_sidebar( array(
			'name'          => esc_html__( 'Top Footer', 'rxla' ),
			'id'            => 'footer-top',
			'description'   => esc_html__( 'Add widgets here.', 'rxla' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'rxla_widgets_init' );

function my_post_queries( $query ) {
	if (!is_admin() && $query->is_main_query()){

		// alter the query for the home and category pages

		if(is_home() || is_category() || is_search() || is_author()){
			$query->set('posts_per_page', 4);
		}
	}
}
add_action( 'pre_get_posts', 'my_post_queries' );

function wpdocs_custom_excerpt_length( $length ) {
	return 32;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


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


function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );


/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);
