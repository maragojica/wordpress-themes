<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Adove Fonts -->

	<!-- Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
	<!--Owl-carrousel CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/css/uikit.min.css" />
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/d14fb9c500.js" crossorigin="anonymous"></script>

	<!-- Preload Local Fonts-->
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoRegular.eot" as="font" type="font/eot" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoRegular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoRegular.woff" as="font" type="font/woff" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoRegular.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoRegular.svg" as="font" type="font/svg" crossorigin="anonymous">

	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoThin.eot" as="font" type="font/eot" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoThin.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoThin.woff" as="font" type="font/woff" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoThin.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoThin.svg" as="font" type="font/svg" crossorigin="anonymous">

	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoLight.eot" as="font" type="font/eot" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoLight.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoLight.woff" as="font" type="font/woff" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoLight.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoLight.svg" as="font" type="font/svg" crossorigin="anonymous">

	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoDemibold.eot" as="font" type="font/eot" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoDemibold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoDemibold.woff" as="font" type="font/woff" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoDemibold.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoDemibold.svg" as="font" type="font/svg" crossorigin="anonymous">

	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoBold.eot" as="font" type="font/eot" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoBold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoBold.woff" as="font" type="font/woff" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoBold.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Fieldwork-GeoBold.svg" as="font" type="font/svg" crossorigin="anonymous">

	<?php wp_head(); ?>
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

	<header id="main-header" class="header-main">
		<nav id="header" class="navbar navbar-expand-lg <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container position-relative">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php
						$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

						if ( ! empty( $header_logo ) ) :
					?>
						<img class="logo-ligth" src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<?php
						else :
							echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;
					?>

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