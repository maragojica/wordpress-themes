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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Google Font Types -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- Adove Fonts -->
	<link rel="stylesheet" href="https://use.typekit.net/rks8hte.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!-- Font-awesome -->
	<link rel='stylesheet' id='fontawesome-custom-css'  href='https://use.fontawesome.com/releases/v5.6.3/css/all.css?ver=5.13.0' type='text/css' media='all' />
	<!-- Animate-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
	<!--Owl-carrousel CSS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.20/dist/css/uikit.min.css" />
	<!-- Plyr CSS video and audio library-->
	<link rel="stylesheet" href="https://cdn.plyr.io/3.6.7/plyr.css" />

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
wp_body_open();
?>

<header id="site-header" class="header-footer-group" role="banner">
	<div class="header-top">
		<div class="container">
			<div class="row row-top-header equal align-items-center">
				<div class="col-3 pr-0 text-center h-100 align-items-center justify-content-center d-flex">
					<div class="box-site-description h-100 w-100 align-items-center justify-content-center d-flex">
						<?php

						// Site description.
						twentytwenty_site_description();
						?>
					</div>
				</div>
				<div class="col-6 pr-0 pl-0 text-center h-100 align-items-center justify-content-center d-flex">
					<?php
					// Site title or logo.
					twentytwenty_site_logo(); ?>
				</div>
				<div class="col-3 pl-0 text-center h-100 align-items-center justify-content-center d-flex">
					<div class="header-titles-wrapper">

						<?php

						// Check whether the header search is activated in the customizer.
						$enable_header_search = get_theme_mod( 'enable_header_search', true );

						if ( true === $enable_header_search ) {

							?>

							<div class="toggle-wrapper search-toggle-wrapper">

								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner flex-row align-items-center">
										<?php /*twentytwenty_the_theme_svg( 'search' ); */?>
										<span class="toggle-text"><?php _e( 'Search', 'twentytwenty' ); ?></span>

										<svg class="svg-icon" aria-hidden="true" role="img" focusable="false" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="17px">
											<image  x="0px" y="0px" width="17px" height="17px"  xlink:href="data:img/png;base64,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" />
										</svg>
									</span>
								</button><!-- .search-toggle -->

							</div>

						<?php } ?>

					</div><!-- .header-titles-wrapper -->
				</div>
			</div>
			<?php
			// Output the search modal (if it is activated in the customizer).
			if ( true === $enable_header_search ) {
				get_template_part( 'template-parts/modal-search' );
			}
			?>
		</div>
	</div>
	<div class="header-menu">
		<div class="container">
			<div class="box-header-menu">
				<div class="row equal row-header-menu align-items-center">
					<div class="col-md-3 pr-md-0 col-left-header">
						<a href="#" id="link-newsletter">
						<img class="icon-newsletter" width="113px" height="114px" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon-newsletter.svg">
						</a>
					</div>
					<div class="col-md pr-md-0 pl-md-0 h-100 align-items-center justify-content-center d-flex col-center-header">
						<div class="header-titles logo-mv-header">
							<?php
							// Site title or logo.
							twentytwenty_site_logo();
							?>
						</div><!-- .header-titles -->
						<div class="header-titles-wrapper">
							<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
									<span class="toggle-inner">
										<span class="toggle-icon">
											<i class="fas fa-bars"></i>
										</span>
									</span>
							</button><!-- .nav-toggle -->

						</div><!-- .header-titles-wrapper -->
						<div class="header-navigation-wrapper w-100 h-100">

							<?php
							if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) {
								?>

								<nav class="primary-menu-wrapper h-100 w-100 align-items-center justify-content-between" aria-label="<?php esc_attr_e( 'Horizontal', 'twentytwenty' ); ?>" role="navigation">

									<ul class="primary-menu reset-list-style align-items-center justify-content-between w-100 h-100">

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
							} ?>

						</div><!-- .header-navigation-wrapper -->
					</div>
					<div class="col-md-3 pl-md-0 col-right-header"></div>
				</div>
			</div>
			<div class="info-page mt-0 mb-0 alert-newssletter uk-animation-slide-bottom-medium" uk-alert style="display: none;">
				<a id="link-news-close"><svg width="20" height="20" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><line fill="none" stroke="#A9A9C1" stroke-width="1.1" x1="1" y1="1" x2="13" y2="13"></line><line fill="none" stroke="#A9A9C1" stroke-width="1.1" x1="13" y1="1" x2="1" y2="13"></line></svg></a>
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-md-10">
							<?php echo do_shortcode('[contact-form-7 id="323" title="Contact Header"]'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header><!-- #site-header -->

<?php
// Output the menu modal.
get_template_part( 'template-parts/modal-menu' );
