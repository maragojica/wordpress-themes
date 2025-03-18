<?php


function  clublisi_bootstrap_child_styles() {
	wp_enqueue_style( 'childs-style', get_stylesheet_directory_uri() . '/style.css' );
 	// Fonts stylesheet.
 	wp_enqueue_style( 'fonts-css', get_stylesheet_directory_uri() . '/assets/fonts/fontstypes.css');
}

add_action( 'wp_enqueue_scripts', 'clublisi_bootstrap_child_styles' );


function  clublisi_bootstrap_child_enqueue_scripts() {

}
add_action( 'wp_enqueue_scripts', 'clublisi_bootstrap_child_enqueue_scripts' );

/*Menu*/
register_nav_menus( array(

		'home-action-menu' => __( 'Home Action Menu', 'clublisi-bootstrap-child' ),
		'footer-menu-secondary' => __( 'Footer Menu Secondary', 'clublisi-bootstrap-child' ),
		'404-menu' => __( '404 Menu', 'clublisi-bootstrap-child' )
) );

/*
 * Widgets
 */

function clublisi_bootstrap_child_widgets_init() {

	register_sidebar( array(
			'name' => __( 'Header 1 Widget Area', 'storefront' ),
			'id' => 'header-area-1',
			'description' => __( 'Header 1 Widget Area on posts and pages', 'clublisi-bootstrap-child' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',

	) );
	register_sidebar( array(
			'name' => __( 'Header 2 Widget Area', 'storefront' ),
			'id' => 'header-area-2',
			'description' => __( 'Header 2 Widget Area on posts and pages', 'clublisi-bootstrap-child' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s widget-site">',
			'after_widget' => '</aside>',

	) );
}
add_action( 'widgets_init', 'clublisi_bootstrap_child_widgets_init' );

function wpdocs_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


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


/*Customization Theme*/
function social_theme_page() {
	add_theme_page( 'Clublisi Theme Customization', 'Clublisi Theme Settings', 'edit_theme_options', 'test-theme-options', 'theme_option_page' );
}
add_action( 'admin_menu', 'social_theme_page' );

//this function creates a simple page with title Custom Theme Options Page.
function theme_option_page() {
	?>
	<div class="wrap">
		<h1>Clublisi Theme Options</h1>
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

function clublisi_theme_settings(){
	add_option('first_field_option',1);// add theme option to database
	add_settings_section( 'first_section', 'Clublisi Social Section',
			'theme_section_description','theme-options');


	//Linkedin element.
	add_settings_field('linkedin_url', 'Linkedin Profile Url', 'display_linkedin_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'clublisi_linkedin_url');


	//Twitter element.
	add_settings_field('twitter_url', 'Twitter Profile Url', 'display_twitter_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'clublisi_twitter_url');

	//Instagram element.
	add_settings_field('instagram_url', 'Instagram Profile Url', 'display_instagram_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'clublisi_instagram_url');

	//Facebook element.
	add_settings_field('facebook_url', 'Facebook Profile Url', 'display_facebook_element', 'theme-options', 'first_section');
	register_setting( 'theme-options-grp', 'clublisi_facebook_url');

}
function display_linkedin_element(){

	?>
	<input type="text" name="clublisi_linkedin_url" id="clublisi_linkedin_url" value="<?php echo get_option('clublisi_linkedin_url'); ?>" />
	<?php
}

function display_twitter_element(){

	?>
	<input type="text" name="clublisi_twitter_url" id="clublisi_twitter_url" value="<?php echo get_option('clublisi_twitter_url'); ?>" />
	<?php
}
function display_instagram_element(){

	?>
	<input type="text" name="clublisi_instagram_url" id="clublisi_instagram_url" value="<?php echo get_option('clublisi_instagram_url'); ?>" />
	<?php
}
function display_facebook_element(){

	?>
	<input type="text" name="clublisi_facebook_url" id="clublisi_facebook_url" value="<?php echo get_option('clublisi_facebook_url'); ?>" />
	<?php
}

add_action('admin_init','clublisi_theme_settings');

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


function clublisi_theme_bootstrap_customize( $wp_customize ) {

	/**
	 * Section: Page Layout
	 */
	// Header Logo.
	$wp_customize->add_setting(
			'header_logo_color',
			array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
					$wp_customize,
					'header_logo_color',
					array(
							'label'       => __( 'Upload Header Logo Color', 'clublisi-theme-bootstrap' ),
							'description' => __( 'Height: &gt;80px', 'clublisi-theme-bootstrap' ),
							'section'     => 'theme_header_section',
							'settings'    => 'header_logo_color',
							'priority'    => 1,
					)
			)
	);

	$wp_customize->add_section(
			'theme_footer_section',
			array(
					'title'    => __( 'Footer', 'clublisi-theme-bootstrap' ),
					'priority' => 1000,
			)
	);
	$wp_customize->add_setting(
			'title_footer',
			array(
					'default'           => 'static',
					'sanitize_callback' => 'sanitize_text_field',
			)
	);
	$wp_customize->add_control(
			'title_footer',
			array(
					'type'     => 'text',
					'label'    => __( 'Title Footer', 'clublisi-theme-bootstrap' ),
					'section'  => 'theme_footer_section',
					'settings' => 'title_footer',
					'priority' => 1,
			)
	);
	$wp_customize->add_setting(
			'footer_img_1',
			array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
					$wp_customize,
					'footer_img_1',
					array(
							'label'       => __( 'Upload Footer Image 1', 'clublisi-theme-bootstrap' ),
							'description' => __( 'Height: &gt;135px', 'clublisi-theme-bootstrap' ),
							'section'     => 'theme_footer_section',
							'settings'    => 'footer_img_1',
							'priority'    => 1,
					)
			)
	);
	$wp_customize->add_setting(
			'footer_img_2',
			array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
					$wp_customize,
					'footer_img_2',
					array(
							'label'       => __( 'Upload Footer Image 2', 'clublisi-theme-bootstrap' ),
							'description' => __( 'Height: &gt;135px', 'clublisi-theme-bootstrap' ),
							'section'     => 'theme_footer_section',
							'settings'    => 'footer_img_2',
							'priority'    => 1,
					)
			)
	);
	$wp_customize->add_setting(
			'footer_img_3',
			array(
					'default'           => '',
					'sanitize_callback' => 'esc_url_raw',
			)
	);
	$wp_customize->add_control(
			new WP_Customize_Image_Control(
					$wp_customize,
					'footer_img_3',
					array(
							'label'       => __( 'Upload Footer Image 3', 'clublisi-theme-bootstrap' ),
							'description' => __( 'Height: &gt;135px', 'clublisi-theme-bootstrap' ),
							'section'     => 'theme_footer_section',
							'settings'    => 'footer_img_3',
							'priority'    => 1,
					)
			)
	);
}
add_action( 'customize_register', 'clublisi_theme_bootstrap_customize' );

/* Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);

