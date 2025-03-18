<?php

add_action( 'wp_enqueue_scripts', 'ahshay_bootstrap_child_enqueue_styles' );
function ahshay_bootstrap_child_enqueue_styles() {
	wp_enqueue_style( 'childs-style', get_stylesheet_directory_uri() . '/style.css' ); 	
}


add_action( 'wp_enqueue_scripts', 'ahshay_bootstrap_child_enqueue_scripts' );

function ahshay_bootstrap_child_enqueue_scripts() {

}
/*
 * Widgets*/
function ahshay_bootstrap_child_widgets_init() {
	register_sidebar( array(
			'name' => __( 'Footer Info 1 Widget Area', 'ahshay-bootstrap-child' ),
			'id' => 'footer-info-1',
			'description' => __( 'Footer Info 1 on posts and pages', 'ahshay-bootstrap-child' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',
	) );
	register_sidebar( array(
			'name' => __( 'Footer Info 2 Widget Area', 'ahshay-bootstrap-child' ),
			'id' => 'footer-info-2',
			'description' => __( 'Footer Info 2 on posts and pages', 'ahshay-bootstrap-child' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',
	) );
	register_sidebar( array(
			'name' => __( 'Footer Logos Widget Area', 'ahshay-bootstrap-child' ),
			'id' => 'footer-logos',
			'description' => __( 'Footer Logos on posts and pages', 'ahshay-bootstrap-child' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',
	) );
}
add_action( 'widgets_init', 'ahshay_bootstrap_child_widgets_init' );


function wpdocs_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

/*Menu*/
register_nav_menus( array(

		'404-menu' => __( '404 Menu', 'ahshay-bootstrap-child' )
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
	$existing_mimes['webm'] = 'video/webm';
	$existing_mimes['ogg']  = 'video/ogg';
	return $existing_mimes;
}

function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) return $url; //don't break WP Admin
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );

/*Customization Theme*/
function social_theme_page() {
	add_theme_page( 'Ahshays Theme Customization', 'Ahshays Theme Settings', 'edit_theme_options', 'test-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'social_theme_page' );

//this function creates a simple page with title Custom Theme Options Page.
function theme_option_page() {
	?>
	<div class="wrap">
		<h1>Ahshays Theme Options</h1>
		<form method="post" action="options.php">
			<?php
			// display settings field on theme-option page
			settings_fields("theme-options-grp");

			// display all sections for theme-options page
			do_settings_sections("theme-options");
			submit_button();
			?>
		</form>
	</div>
	<?php
}
function theme_section_description(){
	echo '<p>Add social url</p>';
}
//admin-init hook to create settings section with title “ahshays Social Section”.
function ahshay_theme_settings(){
	add_option('first_field_option',1);// add theme option to database
	add_settings_section( 'first_section', 'ahshays Social Section',
			'theme_section_description','theme-options');


	//Twitter element.
	add_settings_field('twitter_url', 'Twitter Profile Url', 'display_twitter_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'ahshay_twitter_url');

	add_settings_field('twitter_svg', 'Twitter Profile SVG Image', 'display_twitter_svg_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'ahshay_twitter_svg');

	//Linkedin element.
	add_settings_field('linkedin_url', 'LinkedIn Profile Url', 'display_linkedin_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'ahshay_linkedin_url');

	add_settings_field('linkedin_svg', 'LinkedIn Profile SVG Image', 'display_linkedin_svg_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'ahshay_linkedin_svg');

	//Facebook element.
	add_settings_field('facebook_url', 'Facebook Profile Url', 'display_facebook_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'ahshay_facebook_url');

	add_settings_field('facebook_svg', 'Facebook Profile SVG Image', 'display_facebook_svg_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'ahshay_facebook_svg');

	//Instagram element.
	add_settings_field('instagram_url', 'Instagram Profile Url', 'display_instagram_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'ahshay_instagram_url');

	add_settings_field('instagram_svg', 'Instagram Profile SVG Image', 'display_instagram_svg_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'ahshay_instagram_svg');

}

function display_twitter_element(){

	?>
	<input type="text" name="ahshay_twitter_url" id="ahshay_twitter_url" value="<?php echo get_option('ahshay_twitter_url'); ?>" />
	<?php
}

function display_twitter_svg_element(){

	?>
	<textarea type="text" name="ahshay_twitter_svg" id="ahshay_twitter_svg" rows="8" width="100%" style="width:100%!important;"><?php echo get_option('ahshay_twitter_svg'); ?></textarea>
	<?php
}

function display_linkedin_element(){

	?>
	<input type="text" name="ahshay_linkedin_url" id="ahshay_linkedin_url" value="<?php echo get_option('ahshay_linkedin_url'); ?>" />
	<?php
}
function display_linkedin_svg_element(){

	?>
	<textarea type="text" name="ahshay_linkedin_svg" id="ahshay_linkedin_svg" rows="8" width="100%" style="width:100%!important;"><?php echo get_option('ahshay_linkedin_svg'); ?></textarea>
	<?php
}

function display_facebook_element(){

	?>
	<input type="text" name="ahshay_facebook_url" id="ahshay_facebook_url" value="<?php echo get_option('ahshay_facebook_url'); ?>" />
	<?php
}
function display_facebook_svg_element(){

	?>
	<textarea type="text" name="ahshay_facebook_svg" id="ahshay_facebook_svg" rows="8" width="100%" style="width:100%!important;"><?php echo get_option('ahshay_facebook_svg'); ?></textarea>
	<?php
}
function display_instagram_element(){

	?>
	<input type="text" name="ahshay_instagram_url" id="ahshay_instagram_url" value="<?php echo get_option('ahshay_instagram_url'); ?>" />
	<?php
}
function display_instagram_svg_element(){

	?>
	<textarea type="text" name="ahshay_instagram_svg" id="ahshay_instagram_svg" rows="8" width="100%" style="width:100%!important;"><?php echo get_option('ahshay_instagram_svg'); ?></textarea>
	<?php
}

add_action('admin_init','ahshay_theme_settings');


function ahshay_bootstrap_child_customize( $wp_customize ) {

	/**
	 * Section: Page Layout
	 */
	//Section Footer
	$wp_customize->add_section(
			'theme_footer_section',
			array(
					'title'    => __( 'Footer', 'ahshay-bootstrap-child' ),
					'priority' => 1001,
			)
	);
	//Footer Logo
	$wp_customize->add_setting(
			'footer_logo',
			array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
					$wp_customize,
					'footer_logo',
					array(
							'label'       => __( 'Upload Footer Logo', 'ahshay-bootstrap-child' ),
							'description' => __( 'Height: &gt;80px', 'ahshay-bootstrap-child' ),
							'section'     => 'theme_footer_section',
							'settings'    => 'footer_logo',
							'priority'    => 1,
					)
			)
	);
	// Header Logo.
	$wp_customize->add_setting(
			'header_white_color',
			array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
					$wp_customize,
					'header_white_color',
					array(
							'label'       => __( 'Upload White Logo', 'ahshay-bootstrap-child' ),
							'description' => __( 'Height: &gt;80px', 'ahshay-bootstrap-child' ),
							'section'     => 'theme_header_section',
							'settings'    => 'header_white_color',
							'priority'    => 1,
					)
			)
	);
	$wp_customize->add_setting(
		'header_dark_color',
		array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
		)
);
$wp_customize->add_control(
		new WP_Customize_Image_Control(
				$wp_customize,
				'header_dark_color',
				array(
						'label'       => __( 'Upload Dark Logo', 'ahshay-bootstrap-child' ),
						'description' => __( 'Height: &gt;80px', 'ahshay-bootstrap-child' ),
						'section'     => 'theme_header_section',
						'settings'    => 'header_dark_color',
						'priority'    => 1,
				)
		)
);
	//Mobile Image
	$wp_customize->add_setting(
			'header_mobile_image',
			array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
					$wp_customize,
					'header_mobile_image',
					array(
							'label'       => __( 'Upload Mobile Image', 'ahshay-bootstrap-child' ),
							'description' => __( 'Height: &gt;80px', 'ahshay-bootstrap-child' ),
							'section'     => 'theme_header_section',
							'settings'    => 'header_mobile_image',
							'priority'    => 2,
					)
			)
	);
	//BG Mobile Image
	$wp_customize->add_setting(
			'header_mobile_bg',
			array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
					$wp_customize,
					'header_mobile_bg',
					array(
							'label'       => __( 'Upload Mobile BG', 'ahshay-bootstrap-child' ),
							'description' => __( 'Height: &gt;80px', 'ahshay-bootstrap-child' ),
							'section'     => 'theme_header_section',
							'settings'    => 'header_mobile_bg',
							'priority'    => 2,
					)
			)
	);
}
add_action( 'customize_register', 'ahshay_bootstrap_child_customize' );


function isinternal($url) {

	$domain = get_site_url();
	if(stristr($url, $domain) || strpos($url,"/") == '0')
		return true;
	else
		return false;
}

/**
 * Adds custom widget.
 */

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

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);





add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'gpb_portfolio',
      array(
          'labels' => array(
              'name' => __( 'Our Work' ),
              'singular_name' => __( 'Our Work' )
          ),
          'public' => true,
          'has_archive' => false,
          'rewrite' => array('slug' => 'our-work')
      )
  );
}