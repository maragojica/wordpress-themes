<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KN6S8BR');</script>
<!-- End Google Tag Manager -->

	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/site.webmanifest">
	<!-- Adobe Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/din6efa.css">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
	<!--Owl-car<!--rousel CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/css/uikit.min.css" />
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/d14fb9c500.js" crossorigin="anonymous"></script>
	<!-- Plyr CSS video and audio library-->
	<link rel="stylesheet" href="https://cdn.plyr.io/3.6.7/plyr.css" />

	<?php wp_head(); ?>
</head>
<?php
$header_type = get_field('header_type');
if($header_type == "dark"){
	$classheader = "header-dark";
	$classbody = "body-dark";
	$classmain = "main-dark";
}elseif($header_type == "white"){
	$classheader = "header-white";
	$classbody = "body-white";
	$classmain = "main-white";
}else{
	$classheader = "header-light";
	$classbody = "body-light";
	$classmain = "main-light";
} ?>
<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class("main-body"." ".$classbody); ?>  id="main-body">
	
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KN6S8BR"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'starter-theme-bootstrap' ); ?></a>

<div class="main-content" id="wrapper">
	<header id="main-header" class="header-main <?php echo $classheader;?>">
		<nav id="header" class="navbar navbar-expand-lg <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container-fluid position-relative">
				<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">

					<?php if($header_type == "dark"){						
						$header_dark = get_theme_mod( 'header_dark_color' );
						if ( ! empty( $header_dark ) ) :
						?>
						<img src="<?php echo esc_url( $header_dark ); ?>" width="250" height="70" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						<?php
						else :
						echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;

					}elseif($header_type == "white"){
						$header_white = get_theme_mod( 'header_white_color' );
						if ( ! empty( $header_white ) ) :
						?>
						<img src="<?php echo esc_url( $header_white ); ?>" width="250" height="70" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						<?php
						else :
						echo esc_attr( get_bloginfo( 'name', 'display' ) );
						endif;							
					}else{
						$header_logo = get_theme_mod( 'header_logo' );
						if ( ! empty( $header_logo ) ) :
						?>
						<img src="<?php echo esc_url( $header_logo ); ?>" width="250" height="70" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						<?php
					else :
						echo esc_attr( get_bloginfo( 'name', 'display' ) );
					endif;
					
					}
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
				<?php $header_mobile_bg = get_theme_mod( 'header_mobile_bg' );?>

				<div id="wrap-menu" class="toggle" <?php if ( ! empty( $header_mobile_bg ) ) : ?>style="background-image: url('<?php echo esc_url( $header_mobile_bg ); ?>');" <?php endif; ?>>
					<div class="menu-title">
						<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<?php
							$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

							if ( ! empty( $header_logo ) ) :
								?>
								<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="250" height="70" />
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
						<?php $header_mobile_image = get_theme_mod( 'header_mobile_image' );
						if ( ! empty( $header_mobile_image ) ) :
						?>
						<img class="fluid-img mx-auto d-block" src="<?php echo esc_url( $header_mobile_image ); ?>" width="201" height="159" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						<?php endif; ?>
					</div>
				</div>
			</div><!-- /.container -->
		</nav><!-- /#header -->
		<button class="scrollToTopBtn" title="Scroll To Top">
			<svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
				<g clip-path="url(#clip0_1491_2625)">
					<path d="M17 34L28.5 22L40 34" stroke="#9C5245" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</g>
				<defs>
					<clipPath id="clip0_1491_2625">
						<rect width="57" height="57" fill="white"/>
					</clipPath>
				</defs>
			</svg>
		</button>
	</header>

	<main id="main" class="site-main <?php echo $classmain;?>" role="main">
		<?php if ( is_single() ) { ?>
		<div class="content-share d-flex flex-column align-items-center mb-lg-0 mb-3">
            <span class="share-text me-2 me-lg-0 text-uppercase cl-deep-terracotta mb-4 mb-0">Share</span><?php echo do_shortcode('[addtoany]'); ?>
        </div>
		<?php } ?>