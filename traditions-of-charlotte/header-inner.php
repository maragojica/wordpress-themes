<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Traditions_of_Charlotte
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

<body <?php body_class(); ?>>
<div id="page-preloader">
    <div class="spinner loader_item">    
      <div class="circle-pulse"></div>
    </div>
</div>
<?php wp_body_open(); ?>
<div id="page" class="site">	
<div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
	<header id="masthead" class="site-header header-inner">
		<div class="container-fluid">
			<div class="row desktop center-xs middle-xs">
				<div class="col-xs-12 col-lg-3">
					<div class="site-branding">
					<?php
						$logo = get_field('branding', 'option')['desktop_colored_logo'];
						if ($logo) {
							$logo_url = $logo['url'];
							$logo_mime_type = $logo['mime_type'];
							if ($logo_url) {
								if ($logo_mime_type == 'image/svg+xml') {
									echo file_get_contents($logo_url);
								} else { ?>								
									<a class="flex" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
										<img class="logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="248" height="43"/>
									</a>
								<?php }
							}
						} ?>
					</div><!-- .site-branding -->
				</div>
				<div class="col-xs-12 col-lg-9 flex end-xs">
				<?php if (get_field('header_desktop_menu', 'option')): ?>
					<div class="site-menu">
					<nav id="site-navigation" class="main-navigation">	
						<?php 				
							wp_nav_menu(array(
								'menu' => get_field('header_desktop_menu', 'option'),
								'theme_location' => 'menu-1',
								'menu_id' => 'primary-menu',
							));	?>
					</nav><!-- #site-navigation -->			
				</div>
				<?php endif; ?>
				</div>
			</div>
			<div class="row mobile">
				<div class="col-xs-12 flex w-100 between-xs middle-xs">
				<div class="mobile-logo">
					<?php
					$logo = get_field('branding', 'option')['mobile_colored_logo'];
					if ($logo) {
						$logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) {
							if ($logo_mime_type == 'image/svg+xml') {
								echo file_get_contents($logo_url);
							} else { ?>								
								<a class="flex" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
									<img class="skip-lazy" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="150" height="35"/>
								</a>
							<?php }
						}
					} ?>
				</div>
				<div id="responsive-menu">
					<div class="menu-overlay menu-close"></div>
					<div id="menu-button"><span></span><span></span><span></span><span></span></div>
					<div class="responsive-menu-interior">
						<div class="offcanvas-logo">								
						<?php
					$logo = get_field('branding', 'option')['mobile_colored_logo'];
					if ($logo) {
						$logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) {
							if ($logo_mime_type == 'image/svg+xml') {
								echo file_get_contents($logo_url);
							} else { ?>								
								<a class="flex" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
									<img class="skip-lazy" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="150" height="35"/>
								</a>
							<?php }
						}
					} ?>
					</div>
					<?php if (get_field('header_mobile_menu', 'option')): ?>		
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
		</div>	
	</header><!-- #masthead -->
