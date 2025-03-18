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
		<!--Bootstrap CSS-->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<!-- Font-awesome -->
		<link rel='stylesheet' id='fontawesome-custom-css'  href='https://use.fontawesome.com/releases/v5.6.3/css/all.css?ver=5.13.0' type='text/css' media='all' />
		<!-- Animate-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css">
		<!--Owl-carrousel CSS-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
		<!-- UIkit CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/css/uikit.min.css" />
		<!-- Adobe Fonts-->
		<link rel="stylesheet" href="https://use.typekit.net/pjl3tye.css">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="header-footer-group header-trans" role="banner">
			<div class="container">
				<div class="header-inner section-inner">
					<div class="box-left-header d-flex">
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

								// Site description.
								/*twentytwenty_site_description();*/
								?>

							</div><!-- .header-titles -->

							<button class="toggle nav-toggle mobile-nav-toggle" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">
						<span class="toggle-inner">
							<span class="toggle-icon">
								<?php //twentytwenty_the_theme_svg( 'ellipsis' ); ?>
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assest/feather-menu.svg" width="40">
							</span>
							<!--<span class="toggle-text"><?php //_e( 'Menu', 'twentytwenty' ); ?></span>-->
						</span>
							</button><!-- .nav-toggle -->

						</div><!-- .header-titles-wrapper -->

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
						<?php
						wp_nav_menu(
								array(
										'theme_location' => 'header-menu-social',
										'menu_class'     => 'nav-menu',
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
