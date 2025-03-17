<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Construction_Metal_Products
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
<?php wp_body_open(); ?>
<div id="page" class="site">
    <div class="progress-wrap">
		<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
		</svg>
	</div>
	<header id="masthead" class="site-header main-navigation">
	   <div class="top-header bg-blue">
		  <div class="container">
		     <div class="row middle-xs">
			    <div class="col-xs-6">
				   <div class="box-header-link">
				   <?php $link = get_field('phone_number_header', 'option');
					if( $link ):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self'; ?>							
						<a tabindex="0" class="header-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
					<?php endif; ?>	
					<?php $link = get_field('email_header', 'option');
					if( $link ):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self'; ?>							
						<a tabindex="0" class="header-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
					<?php endif; ?>	
				   </div>
			    </div>
				<div class="col-xs-6 col-search">
				<!--<form class="form-search-home w-100 animate__animated" data-animation="fadeBottom" data-duration="2s" name="search" method="get" action="/">
					<div class="input-group w-100">
						<label for="search" class="hide">Search:</label>
						<div class="input-group-append">
							<button class="btn-search" type="submit" value="submit">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<mask id="mask0_123_190" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
									<rect width="24" height="24" fill="#D9D9D9"/>
								</mask>
								<g mask="url(#mask0_123_190)">
									<path d="M19.6 21L13.3 14.7C12.8 15.1 12.225 15.4167 11.575 15.65C10.925 15.8833 10.2333 16 9.5 16C7.68333 16 6.14583 15.3708 4.8875 14.1125C3.62917 12.8542 3 11.3167 3 9.5C3 7.68333 3.62917 6.14583 4.8875 4.8875C6.14583 3.62917 7.68333 3 9.5 3C11.3167 3 12.8542 3.62917 14.1125 4.8875C15.3708 6.14583 16 7.68333 16 9.5C16 10.2333 15.8833 10.925 15.65 11.575C15.4167 12.225 15.1 12.8 14.7 13.3L21 19.6L19.6 21ZM9.5 14C10.75 14 11.8125 13.5625 12.6875 12.6875C13.5625 11.8125 14 10.75 14 9.5C14 8.25 13.5625 7.1875 12.6875 6.3125C11.8125 5.4375 10.75 5 9.5 5C8.25 5 7.1875 5.4375 6.3125 6.3125C5.4375 7.1875 5 8.25 5 9.5C5 10.75 5.4375 11.8125 6.3125 12.6875C7.1875 13.5625 8.25 14 9.5 14Z" fill="white"/>
								</g>
								</svg>
							<span hidden>Search</span>
							</button>
						</div>
						<input type="text" name="s" id="search" placeholder="Search" aria-describedby="search" class="searchinput">						
					</div>
				</form>-->
	         </div>
			 </div>
		  </div>
	   </div>	
	   <div class="main-header">
	   <div class="container">
	      <div class="row middle-xs desktop">
			    <div class="col-xs-12 col-main-nav">
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
											<a class="flex align-items-center" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
												<img class="logo" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="411" height="82"/>
											</a>
										<?php }
									}
								} ?>
						</div><!-- .site-branding -->
						<div class="desktop-nav">
							<?php if (get_field('header_desktop_menu', 'option')): ?>
								<!-- Main Navigation -->
								<nav id="site-navigation" class="main-navigation">	
										<?php
										wp_nav_menu(array(
											'menu' => get_field('header_desktop_menu', 'option'),
											'theme_location' => 'menu-1',
											'container'      => false,
											'menu_id'        => 'primary-menu',
										));
										?>
									</nav>					
								<?php endif; ?>				
						</div>
				</div>	
		  </div>
		  <div class="row mobile">
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
								<img class="skip-lazy" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="180" height="80"/>
							</a>
						<?php }
					}
				} ?>
			</div>
			<div class="box-header-mobile">
			<div class="box-header-link">
				   <?php $link = get_field('phone_number_mobile', 'option');
					if( $link ):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self'; ?>							
						<a tabindex="0" class="header-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
						<svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14" fill="none">
						<path d="M14.125 14C12.3889 14 10.6736 13.6468 8.97917 12.9403C7.28472 12.2338 5.74306 11.2324 4.35417 9.93611C2.96528 8.63982 1.89236 7.20093 1.13542 5.61944C0.378472 4.03796 0 2.43704 0 0.816667C0 0.583333 0.0833333 0.388889 0.25 0.233333C0.416667 0.0777778 0.625 0 0.875 0H4.25C4.44444 0 4.61806 0.0615741 4.77083 0.184722C4.92361 0.30787 5.01389 0.453704 5.04167 0.622222L5.58333 3.34444C5.61111 3.55185 5.60417 3.72685 5.5625 3.86944C5.52083 4.01204 5.44444 4.13519 5.33333 4.23889L3.3125 6.14444C3.59028 6.62407 3.92014 7.0875 4.30208 7.53472C4.68403 7.98194 5.10417 8.41296 5.5625 8.82778C5.99306 9.22963 6.44444 9.60231 6.91667 9.94583C7.38889 10.2894 7.88889 10.6037 8.41667 10.8889L10.375 9.06111C10.5 8.94444 10.6632 8.85695 10.8646 8.79861C11.066 8.74028 11.2639 8.72407 11.4583 8.75L14.3333 9.29444C14.5278 9.3463 14.6875 9.44028 14.8125 9.57639C14.9375 9.7125 15 9.86482 15 10.0333V13.1833C15 13.4167 14.9167 13.6111 14.75 13.7667C14.5833 13.9222 14.375 14 14.125 14ZM2.52083 4.66667L3.89583 3.38333L3.54167 1.55556H1.6875C1.75694 2.08704 1.85417 2.61204 1.97917 3.13056C2.10417 3.64907 2.28472 4.16111 2.52083 4.66667ZM9.97917 11.6278C10.5208 11.8481 11.0729 12.0231 11.6354 12.1528C12.1979 12.2824 12.7639 12.3667 13.3333 12.4056V10.6944L11.375 10.325L9.97917 11.6278Z" fill="#08308B"/>
						</svg>
					    </a>                            
					<?php endif; ?>	
					<?php $link = get_field('email_header_mobile', 'option');
					if( $link ):
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self'; ?>							
						<a tabindex="0" class="header-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
					    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="12" viewBox="0 0 16 12" fill="none">
						<path d="M1.6 12C1.16 12 0.783333 11.8531 0.47 11.5594C0.156667 11.2656 0 10.9125 0 10.5V1.5C0 1.0875 0.156667 0.734375 0.47 0.440625C0.783333 0.146875 1.16 0 1.6 0H14.4C14.84 0 15.2167 0.146875 15.53 0.440625C15.8433 0.734375 16 1.0875 16 1.5V10.5C16 10.9125 15.8433 11.2656 15.53 11.5594C15.2167 11.8531 14.84 12 14.4 12H1.6ZM8 6.75L1.6 3V10.5H14.4V3L8 6.75ZM8 5.25L14.4 1.5H1.6L8 5.25ZM1.6 3V1.5V10.5V3Z" fill="#08308B"/>
						</svg>
					    </a>                            
					<?php endif; ?>	
				   </div>
			<div id="responsive-menu">
				<div class="menu-overlay menu-close"></div>
				<div id="menu-button"><span></span><span></span><span></span><span></span></div>
				<div class="responsive-menu-interior">
					
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
	   </div>
	</header><!-- #masthead -->
