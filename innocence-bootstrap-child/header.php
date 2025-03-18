<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<!-- Adove Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/gmb4jvg.css">
	<!-- Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
	<!--Owl-carrousel CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.15.11/dist/css/uikit.min.css" />
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/d14fb9c500.js" crossorigin="anonymous"></script>
	<!-- Plyr CSS video and audio library-->
	<link rel="stylesheet" href="https://cdn.plyr.io/3.6.7/plyr.css" />

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

	<?php wp_head(); ?>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-DN6XPD0G54"></script>

	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'G-DN6XPD0G54');
	</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TGCSQCX');</script>
<!-- End Google Tag Manager -->	

</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>  id="main-body">
	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGCSQCX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'starter-theme-bootstrap' ); ?></a>

<div class="main-content" id="wrapper">
	<?php $header_type = get_field('header_type'); ?>
	<header id="main-header" class="header-main<?php if($header_type == "light"){ ?> header-light<?php }else{?> header-dark <?php } ?>">
		<nav id="header" class="navbar align-items-start <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container-fluid position-relative">
					<div class="box-header-l d-flex align-items-center">
						<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"></a>
						<?php wp_nav_menu(
								array(
										'theme_location' => 'report-menu',
										'container'      => '',
										'menu_class'     => 'report-box',
										'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
										'walker'         => new WP_Bootstrap_Navwalker(),
								)
						);?>
					</div>
					<div class="box-header-r d-flex align-items-center">
						<?php wp_nav_menu(
								array(
										'theme_location' => 'donation-menu',
										'container'      => '',
										'menu_class'     => 'donation-box',
										'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
										'walker'         => new WP_Bootstrap_Navwalker(),
								)
						);?>

						<div class="navicon-box"><a href="javascript:void(0);" class="navicon" aria-label="Navicon"></a></div>
					</div>

				<div id="wrap-menu" class="toggle">

					<div id="main-desktop-menu" class="main-desktop-menu h-100">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
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
						</div>
					</div>
				</div>
			</div><!-- /.container -->
		</nav><!-- /#header -->
		<button class="scrollToTopBtn" aria-label="ScrollTo Top">
			<svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_1491_2625)">
					<path d="M17 34L28.5 22L40 34" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
					<clipPath id="clip0_1491_2625">
						<rect width="57" height="57" fill="white"/>
					</clipPath>
				</defs>
			</svg>
		</button>
	</header>

	<main id="main" class="site-main" role="main">
