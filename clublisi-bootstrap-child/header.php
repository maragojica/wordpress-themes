<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@400;500;600;700&family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- Preload Local Fonts-->
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Reey-Regular.eot" as="font" type="font/eot" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Reey-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Reey-Regular.woff" as="font" type="font/woff" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Reey-Regular.ttf" as="font" type="font/ttf" crossorigin="anonymous">
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/fonts/Reey-Regular.svg" as="font" type="font/svg" crossorigin="anonymous">
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
		<div class="header-top position-relative">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="" aria-controls="" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'starter-theme-bootstrap' ); ?>">
				<div class="navicon-box"><a href="javascript:void(0);" class="navicon" aria-label="Navicon"><span class="open">Menu</span><span class="close">Close</span></a></div>
			</button>
			<div class="box-social-header d-flex align-items-center">
				<?php $link_url= get_option('clublisi_linkedin_url');
				if($link_url){?>
					<a href="<?php echo $link_url;?>" target="_blank" aria-label="Linkedin" class="pe-2 ps-2 mb-2">
						<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M417.2 64H96.8C79.3 64 64 76.6 64 93.9V415c0 17.4 15.3 32.9 32.8 32.9h320.3c17.6 0 30.8-15.6 30.8-32.9V93.9C448 76.6 434.7 64 417.2 64zM183 384h-55V213h55v171zm-25.6-197h-.4c-17.6 0-29-13.1-29-29.5 0-16.7 11.7-29.5 29.7-29.5s29 12.7 29.4 29.5c0 16.4-11.4 29.5-29.7 29.5zM384 384h-55v-93.5c0-22.4-8-37.7-27.9-37.7-15.2 0-24.2 10.3-28.2 20.3-1.5 3.6-1.9 8.5-1.9 13.5V384h-55V213h55v23.8c8-11.4 20.5-27.8 49.6-27.8 36.1 0 63.4 23.8 63.4 75.1V384z"></path></svg></div>
					</a>
				<?php } ?>
				<?php $inst_url= get_option('clublisi_instagram_url');
				if($inst_url){?>
					<a href="<?php echo $inst_url;?>" target="_blank" aria-label="Instagram" class="pe-2 ps-2 mb-2">
						<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="255.833" r="80"></circle><path d="M177.805 176.887c21.154-21.154 49.28-32.93 79.195-32.93s58.04 11.838 79.195 32.992c13.422 13.42 23.01 29.55 28.232 47.55H448.5v-113c0-26.51-20.49-47-47-47h-288c-26.51 0-49 20.49-49 47v113h85.072c5.222-18 14.81-34.19 28.233-47.614zM416.5 147.7c0 7.07-5.73 12.8-12.8 12.8h-38.4c-7.07 0-12.8-5.73-12.8-12.8v-38.4c0-7.07 5.73-12.8 12.8-12.8h38.4c7.07 0 12.8 5.73 12.8 12.8v38.4zm-80.305 187.58c-21.154 21.153-49.28 32.678-79.195 32.678s-58.04-11.462-79.195-32.616c-21.115-21.115-32.76-49.842-32.803-78.842H64.5v143c0 26.51 22.49 49 49 49h288c26.51 0 47-22.49 47-49v-143h-79.502c-.043 29-11.687 57.664-32.803 78.78z"></path></svg></div>
					</a>
				<?php } ?>
				<?php $face_url= get_option('clublisi_facebook_url');
				if($face_url){?>
					<a href="<?php echo $face_url;?>" target="_blank" aria-label="Facebook" class="pe-2 ps-2 mb-2">
						<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M288 192v-38.1c0-17.2 3.8-25.9 30.5-25.9H352V64h-55.9c-68.5 0-91.1 31.4-91.1 85.3V192h-45v64h45v192h83V256h56.4l7.6-64h-64z"></path></svg></div>
					</a>
				<?php } ?>
				<?php $twit_url= get_option('clublisi_twitter_url');
				if($twit_url){?>
					<a href="<?php echo $twit_url;?>" target="_blank" aria-label="Twitter" class="pe-2 ps-2 mb-2">
						<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492 109.5c-17.4 7.7-36 12.9-55.6 15.3 20-12 35.4-31 42.6-53.6-18.7 11.1-39.4 19.2-61.5 23.5C399.8 75.8 374.6 64 346.8 64c-53.5 0-96.8 43.4-96.8 96.9 0 7.6.8 15 2.5 22.1-80.5-4-151.9-42.6-199.6-101.3-8.3 14.3-13.1 31-13.1 48.7 0 33.6 17.2 63.3 43.2 80.7-16-.4-31-4.8-44-12.1v1.2c0 47 33.4 86.1 77.7 95-8.1 2.2-16.7 3.4-25.5 3.4-6.2 0-12.3-.6-18.2-1.8 12.3 38.5 48.1 66.5 90.5 67.3-33.1 26-74.9 41.5-120.3 41.5-7.8 0-15.5-.5-23.1-1.4C62.8 432 113.7 448 168.3 448 346.6 448 444 300.3 444 172.2c0-4.2-.1-8.4-.3-12.5C462.6 146 479 129 492 109.5z"></path></svg></div>
					</a>
				<?php } ?>
			</div>
		</div>
		<div id="wrap-menu" class="toggle main-mobile-menu d-flex flex-column justify-content-between h-100">
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
		<div class="main-header d-flex justify-content-center align-items-center">
			<div class="container-fluid">
				<div class="row align-items-center">
					<?php if ( is_active_sidebar( 'header-area-1' )) : ?>
						<div class="col-md-3 col-lg-2 text-header hide-md"><?php dynamic_sidebar( 'header-area-1' );?></div>
					<?php endif; ?>
					<div class="col-md col-lg col-middle">
						<div class="box-brand text-center">
							<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
								<?php
								$header_logo = get_theme_mod( 'header_logo' ); $header_logo_color = get_theme_mod( 'header_logo_color' );// Get custom meta-value.

								if ( ! empty( $header_logo ) || ! empty( $header_logo )) :
									?>
									<img class="logo-dark" width="435" height="120" src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
									<img class="logo-color" width="435" height="120" src="<?php echo esc_url( $header_logo_color ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />

									<?php
								else :
									echo esc_attr( get_bloginfo( 'name', 'display' ) );
								endif;
								?>
							</a>
							<?php
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
						</div>
						<div class="description"><?php echo esc_attr( get_bloginfo( 'description', 'display' ) );?></div>
					</div>
					<?php if ( is_active_sidebar( 'header-area-2' )) : ?>
						<div class="col-md-3 col-lg-2 text-header hide-md"><?php dynamic_sidebar( 'header-area-2' );?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>

	<main id="main" class="site-main" role="main">