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
	<!-- Adove Font-->
	<link rel="stylesheet" href="https://use.typekit.net/fdl7mau.css">
	<!-- Google Fonts-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Plyr CSS video and audio library-->
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.2/plyr.css" />
	<?php wp_head(); ?>
</head>

<?php
	$navbar_scheme   = get_theme_mod( 'navbar_scheme', 'navbar-light bg-light' ); // Get custom meta-value.
	$navbar_position = get_theme_mod( 'navbar_position', 'static' ); // Get custom meta-value.

	$search_enabled  = get_theme_mod( 'search_enabled', '1' ); // Get custom meta-value.
?>

<body <?php body_class(); ?>  id="main-body">

<?php wp_body_open(); ?>

<a href="#main" class="visually-hidden-focusable"><?php esc_html_e( 'Skip to main content', 'starter-theme-bootstrap' ); ?></a>

<div id="wrapper">
	<header id="main-header" class="header-main">
		<nav id="header" class="bg-white navbar navbar-expand-md <?php echo esc_attr( $navbar_scheme ); if ( isset( $navbar_position ) && 'fixed_top' === $navbar_position ) : echo ' fixed-top'; elseif ( isset( $navbar_position ) && 'fixed_bottom' === $navbar_position ) : echo ' fixed-bottom'; endif; if ( is_home() || is_front_page() ) : echo ' home'; endif; ?>">
			<div class="container justify-content-center">
				<div class="row w-100 align-items-center show-md">
					<div class="col">

						<div id="navbar" class="collapse navbar-collapse">
							<?php
							// Loading WordPress Custom Menu (theme_location).
							wp_nav_menu(
									array(
											'theme_location' => 'main-menu',
											'container'      => '',
											'menu_class'     => 'navbar-nav me-auto',
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
					</div>
					<div class="col text-center">
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
					<div class="col d-flex align-items-center justify-content-end">
						<?php if ( is_active_sidebar( 'header-top-area' )) : ?>
							<div class="header-top-area"><?php dynamic_sidebar( 'header-top-area' );?></div>
						<?php endif; ?>
						<div class="header-action">
							<?php
							wp_nav_menu(
									array(
											'theme_location' => 'header-menu-action',
											'menu_class'     => 'nav-menu-action',
									)
							);
							?>
						</div>
					</div>
				</div>
                <div class="row w-100 align-items-center hide-md">
                    <div class="col-6">
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
                    <div class="col-6">
                        <div id="toggle">
                            <div class="one"></div>
                            <div class="two"></div>
                            <div class="three"></div>
                        </div>
                    </div>
                    <div id="menu" class="col-12">
                       <?php wp_nav_menu(
                        array(
                        'theme_location' => 'main-menu',
                        'container'      => '',
                        'menu_class'     => 'navbar-nav me-auto',
                        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'         => new WP_Bootstrap_Navwalker(),
                        )
                        ); ?>

                        <?php if ( is_active_sidebar( 'header-top-area' )) : ?>
                            <div class="header-top-area"><?php dynamic_sidebar( 'header-top-area' );?></div>
                        <?php endif; ?>
                    </div>
                </div>
			</div><!-- /.container -->
		</nav><!-- /#header -->
	</header>

	<main id="main" class="site-main" role="main">

