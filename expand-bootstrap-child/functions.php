<?php

add_action( 'wp_enqueue_scripts', 'expand_bootstrap_child_enqueue_styles' );
function expand_bootstrap_child_enqueue_styles() {
	wp_enqueue_style( 'childs-style', get_stylesheet_directory_uri() . '/style.css' );
 	// Fonts stylesheet.
 	wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/assets/fonts/fontstypes.css');
}


add_action( 'wp_enqueue_scripts', 'expand_bootstrap_child_enqueue_scripts' );

function expand_bootstrap_child_enqueue_scripts() {

}
/*
 * Widgets*/

function expand_bootstrap_child_widgets_init() {
	register_sidebar( array(
			'name' => __( 'Top Header Logos Widget Area', 'expand-bootstrap-child' ),
			'id' => 'header-logos',
			'description' => __( 'Top Header Logos on posts and pages', 'expand-bootstrap-child' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',

	) );
	register_sidebar( array(
			'name' => __( 'Footer Logos Widget Area', 'expand-bootstrap-child' ),
			'id' => 'footer-logos',
			'description' => __( 'Footer Logos Widget Area', 'expand-bootstrap-child' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',

	) );
}
add_action( 'widgets_init', 'expand_bootstrap_child_widgets_init' );

function wpdocs_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/*Menu*/
register_nav_menus( array(

		'404-menu' => __( '404 Menu', 'expand-bootstrap-child' )
) );


/**
 *	ENABLED FILE *.svg
 **/

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// add your extension to the array
	$existing_mimes['vcf'] = 'text/x-vcard';
	$existing_mimes['vtt'] = 'text/vtt';
	$existing_mimes['svg'] = 'image/svg+xml';
	return $existing_mimes;
}



function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

/*Custom Widget*/
/**
 * Adds custom widget.
 */


class SiteLogosHeader_Widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(false, "Site Logos Header");
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{
		$title = esc_attr($instance["title"]);
		echo "<br />";
	}

	function widget($args, $instance)
	{
		$widget_id = "widget_" . $args["widget_id"];

		// I like to put the HTML output for the actual widget in a seperate file
		include(realpath(dirname(__FILE__)) . "/inc/site_logos_header.php");
	}
}

register_widget("SiteLogosHeader_Widget");

class SiteLogosFooter_Widget extends WP_Widget
{
	function __construct()
	{
		parent::__construct(false, "Site Logos Footer");
	}

	function update($new_instance, $old_instance)
	{
		return $new_instance;
	}

	function form($instance)
	{
		$title = esc_attr($instance["title"]);
		echo "<br />";
	}

	function widget($args, $instance)
	{
		$widget_id = "widget_" . $args["widget_id"];

		// I like to put the HTML output for the actual widget in a seperate file
		include(realpath(dirname(__FILE__)) . "/inc/site_logos_footer.php");
	}
}
register_widget("SiteLogosFooter_Widget");

function isinternal($url) {

	$domain = get_site_url();
	// Test if link is internal/external
	if(stristr($url, $domain) || strpos($url,"/") == '0')
		return true;
	else
		return false;
}


add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_resource_audience');
function tsm_filter_post_type_by_taxonomy_resource_audience() {
	global $typenow;
	$post_type = 'resource'; // change to your post type
	$taxonomy  = 'resource_audience'; // change to your taxonomy
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

add_filter('parse_query', 'tsm_convert_id_to_term_in_query_resource_audience');
function tsm_convert_id_to_term_in_query_resource_audience($query) {
	global $pagenow;
	$post_type = 'resource'; // change to your post type
	$taxonomy  = 'resource_audience'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_resource_type');
function tsm_filter_post_type_by_taxonomy_resource_type() {
	global $typenow;
	$post_type = 'resource'; // change to your post type
	$taxonomy  = 'resource_type'; // change to your taxonomy
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
	$post_type = 'resource'; // change to your post type
	$taxonomy  = 'resource_type'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

/*add_filter( 'gform_confirmation_anchor', function() {
	return 15;
} );*/

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

