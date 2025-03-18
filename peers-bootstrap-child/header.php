<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Adove Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/xig6hmr.css">
	<!-- Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
	<!--Owl-carrousel CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css" />
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/d14fb9c500.js" crossorigin="anonymous"></script>
	<!-- Plyr CSS video and audio library-->
	<link rel="stylesheet" href="https://cdn.plyr.io/3.6.7/plyr.css" />

	<?php wp_head(); ?>
	
<!-- Google tag (gtag.js) -->

<script async src="https://www.googletagmanager.com/gtag/js?id=G-6RVJLYTN0H"></script>

<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', 'G-6RVJLYTN0H');
</script>	
	
<!-- Google Tag Manager -->

<script>
	(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-KGFW853');
</script>

<!-- End Google Tag Manager -->	
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>  id="main-body">

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KGFW853" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	
<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'starter-theme-bootstrap' ); ?></a>

<div class="main-content" id="wrapper">
	<?php $header_type = get_field('header_type'); ?>
	<header id="main-header" class="header-main<?php if($header_type == "dark"){ ?> header-dark<?php }else{?> header-light<?php } ?>">
		<nav id="header" class="navbar navbar-expand-lg <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container-fluid position-relative">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
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
					<div id="mobile-menu" class="main-mobile-menu d-flex flex-column h-100">
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
						<?php if( is_active_sidebar('header-logos') ) { ?><div class="show-lg"><?php dynamic_sidebar( 'header-logos' ); ?></div><?php }?>
						<?php $twit_url = get_option('peer_twitter_url');
						if($twit_url){?>
							<a class="social-link text-center mt-5" href="<?php echo $twit_url;?>" target="_blank" aria-label="Twitter">
								<svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
									<circle cx="18" cy="17.9365" r="17.9365" fill="#001A20"/>
									<g clip-path="url(#clip0_368_2445)">
										<path d="M15.2522 27.586C23.2012 27.586 27.543 20.756 27.543 14.84C27.543 14.6454 27.543 14.4507 27.5266 14.2645C28.3836 13.6297 29.1099 12.8426 29.6894 11.9455C28.8977 12.3094 28.0653 12.5464 27.2084 12.648C28.1142 12.0894 28.7835 11.2092 29.1099 10.1682C28.2611 10.6929 27.3308 11.0569 26.3677 11.2515C24.7355 9.44879 21.9933 9.36416 20.255 11.0569C19.1369 12.1486 18.6554 13.7821 19.0063 15.3394C15.5297 15.1616 12.2897 13.4605 10.1025 10.6591C8.95173 12.7072 9.53933 15.3309 11.4327 16.6427C10.7472 16.6258 10.0698 16.4312 9.47404 16.0842C9.47404 16.1011 9.47404 16.118 9.47404 16.1434C9.47404 18.2762 10.9267 20.1128 12.9426 20.5359C12.306 20.7137 11.6368 20.7391 10.992 20.6121C11.5552 22.4402 13.1792 23.6844 15.0318 23.7267C13.5057 24.9708 11.6123 25.6479 9.66991 25.6479C9.32714 25.6479 8.98437 25.6225 8.6416 25.5802C10.6085 26.892 12.9099 27.586 15.2522 27.586Z" fill="white"/>
									</g>
									<defs>
										<clipPath id="clip0_368_2445">
											<rect width="21.0559" height="21.8358" fill="white" transform="translate(8.6416 7.79849)"/>
										</clipPath>
									</defs>
								</svg>
							</a>
						<?php } ?>
					</div>
				</div>
			</div><!-- /.container -->
		</nav><!-- /#header -->
		<button class="scrollToTopBtn">
			<svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_1491_2625)">
					<path d="M17 34L28.5 22L40 34" stroke="#EE6C4D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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