<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Vamp
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-MZBWJQHD');</script>

<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZBWJQHD"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>
<div id="page" class="site">
<button class="scrollToTopBtn" title="Back To Top">
			<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
			<rect width="50" height="50" fill="#000"/>
			<mask id="mask0_200_2750" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="10" y="9" width="29" height="29">
			<rect x="10" y="9" width="29" height="29" fill="#D9D9D9"/>
			</mask>
			<g mask="url(#mask0_200_2750)">
			<path d="M23.2915 29.6017H25.7082V24.6212L27.6415 26.5186L29.3332 24.8584L24.4998 20.115L19.6665 24.8584L21.3582 26.5186L23.2915 24.6212V29.6017ZM24.4998 36.7168C22.8283 36.7168 21.2575 36.4055 19.7873 35.7829C18.3172 35.1603 17.0384 34.3154 15.9509 33.2482C14.8634 32.1809 14.0024 30.9259 13.3681 29.4831C12.7337 28.0404 12.4165 26.4988 12.4165 24.8584C12.4165 23.218 12.7337 21.6764 13.3681 20.2336C14.0024 18.7908 14.8634 17.5358 15.9509 16.4686C17.0384 15.4013 18.3172 14.5564 19.7873 13.9338C21.2575 13.3113 22.8283 13 24.4998 13C26.1714 13 27.7422 13.3113 29.2123 13.9338C30.6825 14.5564 31.9613 15.4013 33.0488 16.4686C34.1363 17.5358 34.9972 18.7908 35.6316 20.2336C36.266 21.6764 36.5832 23.218 36.5832 24.8584C36.5832 26.4988 36.266 28.0404 35.6316 29.4831C34.9972 30.9259 34.1363 32.1809 33.0488 33.2482C31.9613 34.3154 30.6825 35.1603 29.2123 35.7829C27.7422 36.4055 26.1714 36.7168 24.4998 36.7168ZM24.4998 34.3451C27.1984 34.3451 29.4842 33.4261 31.3571 31.588C33.23 29.75 34.1665 27.5067 34.1665 24.8584C34.1665 22.21 33.23 19.9668 31.3571 18.1287C29.4842 16.2907 27.1984 15.3717 24.4998 15.3717C21.8012 15.3717 19.5155 16.2907 17.6425 18.1287C15.7696 19.9668 14.8332 22.21 14.8332 24.8584C14.8332 27.5067 15.7696 29.75 17.6425 31.588C19.5155 33.4261 21.8012 34.3451 24.4998 34.3451Z" fill="white"/>
			</g>
			</svg>
		</button>
	<header id="masthead" class="site-header">
        <div class="container">
            <div class="row desktop middle-xs">

                <!-- Logo -->
                <div class="col-xs-3">
                    <div id="logo" class="animate__animated fadeLeft" data-animation="fadeLeft" data-duration="1s">
                        <?php
                        $logo = get_field('branding', 'option')['desktop_colored_logo'];
                        if ($logo) {
                            $logo_url = $logo['url'];
                            $logo_mime_type = $logo['mime_type'];
                            if ($logo_url) {
                                if ($logo_mime_type == 'image/svg+xml') {
                                    echo file_get_contents($logo_url);
                                } else { ?>								
                                    <a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
                                        <img class="logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="249" height="75"/>
                                    </a>
                                <?php }
                            }
                        } ?>
                    </div>
                </div>

                <!-- Navigation -->
                <div class="col-xs-9 flex end-xs">
                    <nav id="site-navigation" class="main-navigation animate__animated fadeRight" data-animation="fadeRight" data-duration="1.2s">
					<?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'menu_id'        => 'primary-menu'                        
                            
                        ));
					?>
                    </nav>
                </div>
			</div> 

            <div class="row mobile">
                <div class="col-xs-12 flex w-100 between-xs middle-xs">
                <div id="mobile-logo">
                    <?php
                    $logo = get_field('branding', 'option')['mobile_colored_logo'];
                    if ($logo) : ?>
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php echo esc_url($logo['sizes']['medium']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="54" width="50" />
                        </a>
                    <?php endif; ?>
                </div>
                <div id="responsive-menu">
                    <div class="menu-overlay menu-close"></div>
                    <div id="menu-button"><span></span><span></span><span></span><span></span></div>
                    <div class="responsive-menu-interior">
                        <div class="offcanvas-logo">
                        <?php
                        $logo = get_field('branding', 'option')['mobile_colored_logo'];
                        if ($logo) : ?>
                            <a href="<?php echo home_url(); ?>">
                                <img src="<?php echo esc_url($logo['sizes']['medium']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="54" width="50" />
                            </a>
                        <?php endif; ?>
                        </div>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-mobile',
                                'menu_class'     => 'responsive-menu-items',
                                'menu_id'        => 'responsive-menu-items',
                                'container'      => false,
                            )
                        );
                        ?>
                </div>
                </div> 
         </div>
    </header>