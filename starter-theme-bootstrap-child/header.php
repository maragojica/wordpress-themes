<?php

/**

 * The header for our theme.

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package Shapely

 */



?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Google Fonts -->

	<link rel="preconnect" href="https://fonts.googleapis.com">

	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

	<!-- Custom Main Fonts -->

	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/custom-fonts/custom-font.css" 

	<!-- Animate-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">

	<!--Owl-car<!--rousel CSS-->

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />

	<!-- UIkit CSS -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/css/uikit.min.css" />

	<!-- Custom Main CSS -->

	

	<?php wp_head(); ?>

</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
	$bgheader = get_field('bg_image', 'option'); 
?>

<body <?php body_class(); ?>>

<div id="page" class="site bg-d-blue">
	<header id="main-header" class="header-custom header-main">		        
		<nav id="header" class="navbar navbar-expand-lg <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
		<div class="container-fluid">
			<div class="module left">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

						if ( ! empty( $header_logo ) ) :
					?>
						<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;
					?>
				</a>
				
		    </div>
				<div class="module rigth">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'starter-theme-bootstrap' ); ?>">
					<div class="navicon-box"><a href="javascript:void(0);" class="navicon" aria-label="Navicon"></a></div>
				</button>

				<div id="navbar" class="collapse navbar-collapse">
					<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav me-auto',
								
							)
						);

						if ( '1' === $search_enabled ) :
					?>
							<form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="input-group">
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search', 'starter-theme-bootstrap' ); ?>" title="<?php esc_attr_e( 'Search', 'starter-theme-bootstrap' ); ?>" />
									<button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e( 'Search', 'starter-theme-bootstrap' ); ?></button>
								</div>
							</form>
					<?php
						endif;
					?>
				</div><!-- /.navbar-collapse -->
				<div id="wrap-menu" class="toggle" <?php if(!empty($bgheader)): ?> style="background-image: url(<?php echo $bgheader['url']; ?>);"<?php endif; ?>>
					<div class="menu-title">
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php
							$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

							if ( ! empty( $header_logo ) ) :
						?>
							<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						<?php
							else :
								echo esc_attr( get_bloginfo( 'name', 'display' ) );
							endif;
						?>
					</a>
					</div>
					<div id="mobile-menu" class="main-mobile-menu d-flex flex-column justify-content-between h-100">
						<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav me-auto',
								
							)
						);
						?>	
											
					</div>
					
				</div>
                    <?php $linkedin = get_field('linkedin', 'option'); 
					if( $linkedin ):

						$link_url = $linkedin['url'];
				
						$link_title = $linkedin['title'];
				
						$link_target = $linkedin['target'] ? $linkedin['target'] : '_self'; ?>

						<a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="header-social" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">

								<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">

								<g clip-path="url(#clip0_248_489)">

									<path class="social-bg" fill-rule="evenodd" clip-rule="evenodd" d="M4 36H32C34.2091 36 36 34.2091 36 32V4C36 1.79086 34.2091 0 32 0H4C1.79086 0 0 1.79086 0 4V32C0 34.2091 1.79086 36 4 36Z" fill="#2A675F"/>

									<path fill-rule="evenodd" clip-rule="evenodd" d="M31 31H25.6578V21.9011C25.6578 19.4064 24.7099 18.0123 22.7354 18.0123C20.5873 18.0123 19.465 19.4631 19.465 21.9011V31H14.3167V13.6667H19.465V16.0015C19.465 16.0015 21.013 13.1371 24.6913 13.1371C28.3678 13.1371 31 15.3822 31 20.0256V31ZM8.17467 11.397C6.42103 11.397 5 9.96483 5 8.1985C5 6.43218 6.42103 5 8.17467 5C9.92832 5 11.3485 6.43218 11.3485 8.1985C11.3485 9.96483 9.92832 11.397 8.17467 11.397ZM5.51628 31H10.8847V13.6667H5.51628V31Z" fill="white"/>

								</g>

								<defs>

									<clipPath id="clip0_248_489">

									<rect width="36" height="36" fill="white"/>

									</clipPath>

								</defs>

								</svg>

						</a>
						<?php endif; ?>	
						<?php $cta_header = get_field('cta_header', 'option'); 
						if( $cta_header ):

							$link_url = $cta_header['url'];
					
							$link_title = $cta_header['title'];
					
							$link_target = $cta_header['target'] ? $cta_header['target'] : '_self'; ?>

						     <a  tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="header-cta" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>
						<?php endif; ?>	
						</div>
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>
	<?php
	if(!empty($bgheader)): ?>
	<style>
		.header-custom.header-scrolled nav{
			background-image: url(<?php echo $bgheader['url']; ?>) !important;
		}
	</style>
	<?php endif; ?>


	<div id="content" class="main-container">			

			<div id="main" role="main">

