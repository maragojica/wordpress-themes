<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Adove Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/nse7fcw.css">
	<!-- Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
	<!--Owl-carrousel CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/css/uikit.min.css" />
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/d14fb9c500.js" crossorigin="anonymous"></script>
	<!-- Plyr CSS video and audio library-->
	<link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
	<?php wp_head(); ?>
	
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-X7HVPWP352"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-X7HVPWP352');
</script>
	
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>  id="main-body">

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable" aria-label="Skip to main content"><?php esc_html_e( 'Skip to main content', 'starter-theme-bootstrap' ); ?></a>

<div class="main-content" id="wrapper">
	<?php $header_type = get_field('header_type'); ?>
	<header id="main-header" class="header-main<?php if($header_type == "light"){ ?> header-light<?php }else{?> header-dark <?php } ?>">
		<nav id="header" class="flex-column navbar navbar-expand-lg <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<?php if ( is_active_sidebar( 'header-top-area' )) : ?>
				<div class="header-top-area container-fluid w-100 d-flex align-items-center justify-content-end"><?php dynamic_sidebar( 'header-top-area' );?></div>
			<?php endif; ?>
			<div class="container-fluid position-relative">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

						if ( ! empty( $header_logo ) ) :
					?>
						<img class="logo-ligth" src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="187" height="55"/>
					<?php
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;
					?>
					<img class="logo-dark" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-dark.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="187" height="55">
				</a>


				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'starter-theme-bootstrap' ); ?>">
					<div class="navicon-box"><a href="javascript:void(0);" class="navicon" aria-label="Navicon"></a></div>
				</button>

				<div id="navbar" class="collapse navbar-collapse justify-content-end">
					<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
							array(
								'theme_location' => 'main-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
							)
						);

						if ( '1' === $search_enabled ) :
					?>
							<form class="search-form my-2 my-lg-0 ms-3" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="input-group">
									<button type="submit" name="submit" class="btn btn-outline-secondary">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_1246_1382)">
												<path d="M11.74 20.48C16.567 20.48 20.48 16.567 20.48 11.74C20.48 6.91303 16.567 3 11.74 3C6.91303 3 3 6.91303 3 11.74C3 16.567 6.91303 20.48 11.74 20.48Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
												<path d="M18.03 18.03L21 21" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
												<clipPath id="clip0_1246_1382">
													<rect width="24" height="24" fill="white"/>
												</clipPath>
											</defs>
										</svg>

									</button>
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search site', 'starter-theme-bootstrap' ); ?>" title="<?php esc_attr_e( 'Search site', 'starter-theme-bootstrap' ); ?>" />

								</div>
							</form>
					<?php
						endif;
					?>
				</div><!-- /.navbar-collapse -->

				<div id="wrap-menu" class="toggle">
					<div class="menu-title">
						<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
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
										'menu_class'     => 'navbar-nav',
										'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
										'walker'         => new WP_Bootstrap_Navwalker(),
								)
						);
						?>

					</div>
				</div>
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>

	<main id="main" class="site-main" role="main">