<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta name=“facebook-domain-verification” content=“1nbbjvyphe98tq0899tqvrwy1a5vpl” />
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<!-- Adove Fonts -->
		<link rel="stylesheet" href="https://use.typekit.net/udb5ljm.css">
		<!--Bootstrap CSS-->
		<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">-->
		<!-- Font-awesome -->
		<link rel='stylesheet' id='fontawesome-custom-css'  href='https://use.fontawesome.com/releases/v5.6.3/css/all.css?ver=5.13.0' type='text/css' media='all' />
		<!-- Animate-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
		<!--Owl-carrousel CSS-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
		<!-- UIkit CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.20/dist/css/uikit.min.css" />
		<!-- Adobe Fonts-->
		<!--<link rel="stylesheet" href="https://use.typekit.net/pjl3tye.css">-->
		<link rel="stylesheet" href="https://use.typekit.net/aqy1qqe.css">
		<!-- Plyr CSS video and audio library-->
		<link rel="stylesheet" href="https://cdn.plyr.io/3.6.7/plyr.css" />
		<!-- Facebook Domain Verification-->
		<meta name="facebook-domain-verification" content="1nbbjvyphe98tq0899tqvrwy1a5vpl" />
		

		<script src='//pxl.iqm.com/c/e3f65d16-7664-4d3c-88f6-5258c36f70c2' async></script>
		<?php wp_head(); ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-202246465-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-202246465-1');
</script>


<!-- Meta Pixel Code -->
<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '1479359086219568');
	fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1479359086219568&ev=PageView&noscript=1"/></noscript>
<!-- End Meta Pixel Code -->

		
	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

			<div class="top-header d-flex bg-black align-items-center">
				<div class="container-fluid">
					<div class="row equal align-items-center justify-content-end">
						<div class="col-md-12 text-right">
							<?php if ( is_active_sidebar( 'top-header' )) :
								dynamic_sidebar( 'top-header' );
							endif; ?>
						</div>
					</div>
				</div>
			</div>
			<header id="site-header" class="header-footer-group header-trans d-flex align-items-center" role="banner">
				<div class="container">
					<div class="header-inner section-inner p-0 w-100">
						<div class="box-left-header d-flex align-items-center">
							<div class="header-titles-wrapper">
								<?php

								// Check whether the header search is activated in the customizer.
								$enable_header_search = get_theme_mod( 'enable_header_search', true );
								if ( true === $enable_header_search ) {
									?>

									<button class="toggle search-toggle mobile-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<span class="toggle-icon">
											<?php twentytwenty_the_theme_svg( 'search' ); ?>
										</span>
										<span class="toggle-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>
									</span>
									</button><!-- .search-toggle -->

								<?php } ?>

								<div class="header-titles">

									<?php
									// Site title or logo.
									twentytwenty_site_logo();
									?>

								</div><!-- .header-titles -->

								<button class="toggle nav-toggle mobile-nav-toggle justify-content-center" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<i class="fas fa-bars"></i>
							</span>
						</span>
								</button><!-- .nav-toggle -->

							</div><!-- .header-titles-wrapper -->
							<div class="header-action hide-deks-md">
								<?php
								wp_nav_menu(
										array(
												'theme_location' => 'header-menu-action',
												'menu_class'     => 'nav-menu-action',
										)
								);
								?>
							</div>

							<div class="header-navigation-wrapper">

								<?php
								if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
									?>

									<nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">

										<ul class="primary-menu reset-list-style">

											<?php
											if ( has_nav_menu( 'primary' ) ) {

												wp_nav_menu(
														array(
																'container'  => '',
																'items_wrap' => '%3$s',
																'theme_location' => 'primary',
														)
												);

											} elseif ( ! has_nav_menu( 'expanded' ) ) {

												wp_list_pages(
														array(
																'match_menu_classes' => true,
																'show_sub_menu_icons' => true,
																'title_li' => false,
																'walker'   => new TwentyTwenty_Walker_Page(),
														)
												);

											}
											?>

										</ul>

									</nav><!-- .primary-menu-wrapper -->

									<?php
								}

								if ( true === $enable_header_search || has_nav_menu( 'expanded' ) ) {
									?>

									<div class="header-toggles hide-no-js">

										<?php
										if ( has_nav_menu( 'expanded' ) ) {
											?>

											<div class="toggle-wrapper nav-toggle-wrapper has-expanded-menu">

												<button class="toggle nav-toggle desktop-nav-toggle" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<!--<span class="toggle-text"><?php /*_e( 'Menu', 'twentytwenty' );*/ ?></span>-->
										<span class="toggle-icon">
											<?php twentytwenty_the_theme_svg( 'ellipsis' ); ?>
										</span>
									</span>
												</button><!-- .nav-toggle -->

											</div><!-- .nav-toggle-wrapper -->

											<?php
										}

										if ( true === $enable_header_search ) {
											?>

											<div class="toggle-wrapper search-toggle-wrapper">

												<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<?php twentytwenty_the_theme_svg( 'search' ); ?>
										<span class="toggle-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>
									</span>
												</button><!-- .search-toggle -->

											</div>

											<?php
										}
										?>

									</div><!-- .header-toggles -->
									<?php
								}
								?>

							</div><!-- .header-navigation-wrapper -->
						</div>
						<div class="box-rigth-header d-flex">
							<div class="social d-flex mr-3 mr-xl-5">
								<?php $twit_url= get_option('shipit_twitter_url');
								if($twit_url){?>
									<a href="<?php echo $twit_url;?>" target="_blank" class="pr-3 pl-3">
										<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000pt" height="20.000000pt" viewBox="0 0 25.000000 20.000000" preserveAspectRatio="xMidYMid meet">
											<g transform="translate(0.000000,20.000000) scale(0.006667,-0.006780)" fill="#000000" stroke="none">
												<path d="M2460 2936 c-144 -31 -263 -93 -365 -188 -172 -161 -253 -356 -243 -589 l4 -109 -40 6 c-127 17 -232 37 -316 60 -418 113 -809 363 -1087 697 -36 42 -69 74 -75 71 -18 -11 -77 -150 -95 -221 -22 -91 -22 -266 1 -358 29 -120 95 -242 182 -334 63 -67 72 -81 54 -81 -38 0 -141 30 -208 61 -36 16 -66 29 -68 29 -9 0 -3 -115 10 -184 30 -155 94 -274 211 -391 87 -86 160 -135 258 -170 59 -22 61 -23 33 -30 -16 -4 -85 -5 -153 -2 l-125 5 6 -27 c4 -14 27 -68 53 -120 37 -77 61 -110 127 -176 116 -117 237 -183 395 -215 l85 -17 -57 -36 c-165 -106 -370 -184 -572 -219 -102 -17 -147 -20 -298 -15 -97 3 -175 1 -172 -3 9 -14 162 -104 265 -155 137 -69 273 -117 455 -163 212 -53 330 -66 535 -59 273 10 450 40 670 113 537 179 978 579 1230 1119 122 260 185 516 206 833 l6 103 77 58 c113 87 315 301 298 317 -3 3 -47 -8 -99 -25 -98 -31 -261 -65 -280 -59 -6 2 5 14 25 27 64 39 181 174 225 259 60 114 57 120 -30 76 -86 -43 -285 -110 -356 -120 -51 -6 -52 -6 -104 41 -101 90 -201 146 -323 179 -84 23 -264 29 -345 12z"/> 									</g>
										</svg>
									</a>
								<?php } ?>
								<?php $insta_url= get_option('shipit_instagram_url');
								if($insta_url){?>
									<a href="<?php echo $insta_url;?>" target="_blank" class="pr-3 pl-3">
										<svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="20.000000pt" height="20.000000pt" viewBox="0 0 20.000000 20.000000" preserveAspectRatio="xMidYMid meet">
											<g transform="translate(0.000000,20.000000) scale(0.006780,-0.006780)" fill="#000000" stroke="none">
												<path d="M363 2935 c-160 -44 -289 -165 -342 -323 -21 -60 -21 -78 -21 -1137 0 -1062 0 -1076 21 -1138 27 -83 69 -145 138 -209 61 -57 141 -101 212 -117 28 -7 427 -11 1105 -11 1031 0 1064 1 1126 20 72 22 167 80 215 131 17 19 47 60 67 92 68 114 66 81 66 1231 0 715 -3 1051 -11 1088 -36 175 -182 328 -354 373 -85 22 -2141 22 -2222 0z m1985 -506 c113 -55 132 -204 36 -288 -94 -83 -234 -46 -280 74 -31 82 6 173 88 214 54 27 100 27 156 0z m-690 -250 c124 -31 224 -91 328 -194 76 -76 97 -105 136 -185 63 -129 82 -222 75 -364 -9 -194 -70 -329 -212 -472 -77 -78 -104 -98 -185 -138 -126 -61 -201 -79 -325 -79 -122 0 -213 21 -320 73 -191 93 -336 270 -392 480 -25 97 -23 263 5 363 111 393 495 615 890 516z"/>
												<path d="M1339 1952 c-303 -79 -449 -426 -302 -717 32 -62 132 -162 199 -197 238 -128 547 -36 671 198 207 389 -141 827 -568 716z"/>
											</g>
										</svg>
									</a>
								<?php } ?>
							</div>
							<?php
							wp_nav_menu(
									array(
											'theme_location' => 'header-menu-action',
											'menu_class'     => 'nav-menu-action',
									)
							);
							?>
						</div>
					</div><!-- .header-inner -->
				</div>
				<?php
				// Output the search modal (if it is activated in the customizer).
				if ( true === $enable_header_search ) {
					get_template_part( 'template-parts/modal-search' );
				}
				?>
			</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' ); ?>
		<main id="site-content" role="main">