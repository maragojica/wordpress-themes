<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WJ_Partners
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class("body-inner"); ?>>
<?php wp_body_open(); ?>
	<div id="page-preloader">
    <div class="spinner loader_item">    
      <div class="circle-pulse"></div>
    </div>
</div>
<div id="page" class="site">
<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
	<header id="masthead" class="site-header main-navigation site-header-inner">
	<div class="container">
		<div class="row desktop center-xs middle-xs">
			<div class="col-xs-12">
				<div class="desktop-nav">
				<?php if (get_field('header_desktop_left_menu', 'option')): ?>
			<!-- Left Navigation -->
			<div class="left">
				<nav id="left-nav">
					<?php
					wp_nav_menu(array(
						'menu' => get_field('header_desktop_left_menu', 'option'),
						'theme_location' => 'menu-1',
						'container'      => false,
						'menu_id'        => 'primary-menu-left',
					));
					?>
				</nav>
			</div>
			<?php endif; ?>
			<!-- Logo -->		
			<div id="logo">                    
<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				<?php
					$logo = get_field('branding', 'option')['desktop_white_logo'];
					if ($logo) {
						$logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) {
							if ($logo_mime_type == 'image/svg+xml') {
								echo file_get_contents($logo_url);
							} else { ?>								
								
									<img class="logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="210" height="35"/>
								
							<?php }
						}
					} ?>
	</a>
			</div>
			
			<?php if (get_field('header_desktop_right_menu', 'option')): ?>				
			<!-- Right Navigation -->
			<div class="right">
				<nav id="right-nav">
					<?php
					wp_nav_menu(array(
						'menu' => get_field('header_desktop_right_menu', 'option'),
						'theme_location' => 'menu-2',
						'container'      => false,
						'menu_id'        => 'primary-menu-right',
					));
					?>
				</nav>
			</div>
			<?php endif; ?>
				</div>
			</div>			
		</div>
		<div class="row mobile">
			<div class="mobile-logo">
				<a class="flex" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
				<?php
				$logo = get_field('branding', 'option')['mobile_white_logo'];
				if ($logo) {
					$logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) {
						if ($logo_mime_type == 'image/svg+xml') {
							echo file_get_contents($logo_url);
						} else { ?>								
							
								<img class="skip-lazy" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="150" height="25"/>
							
						<?php }
					}
				} ?>
					</a>
			</div>
			<div id="responsive-menu">
				<div class="menu-overlay menu-close"></div>
				<div id="menu-button"><span></span><span></span><span></span><span></span></div>
				<div class="responsive-menu-interior">
					<div class="offcanvas-logo">		
						<a class="flex" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
					<?php
				$logo = get_field('branding', 'option')['mobile_white_logo'];
				if ($logo) {
					$logo_url = $logo['url'];
					$logo_mime_type = $logo['mime_type'];
					if ($logo_url) {
						if ($logo_mime_type == 'image/svg+xml') {
							echo file_get_contents($logo_url);
						} else { ?>								
							
								<img class="skip-lazy" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="150" height="25"/>
							
						<?php }
					}
				} ?>
							</a>
				</div>
				<?php if (get_field('header_desktop_right_menu', 'option')): ?>		
					<?php
					wp_nav_menu(
						array(
							'menu' => get_field('header_mobile_menu', 'option'),
							'theme_location' => 'mobile',
							'menu_class'     => 'responsive-menu-items',
							'menu_id'        => 'responsive-menu-items',
							'container'      => false,
						)
					);
					?>	
				<?php endif; ?>	
				</div>
			</div>
		</div>
	</div>
	</header><!-- #masthead -->

