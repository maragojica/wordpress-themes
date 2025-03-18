<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */
$has_social_menu = has_nav_menu( 'social' );

$has_sidebar_1 = is_active_sidebar( 'sidebar-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-2' );
?>
			<footer id="site-footer" role="contentinfo" class="header-footer-group d-flex align-items-center justify-content-center">
				<div class="container">
					<div class="row row-logo-footer align-items-start">
						<div class="col-md-6 col-lg-2 text-lg-left text-center pb-md-0 pb-5">
							<a class="link-logo-footer" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/footer-logo.png" border="0"></a>

							<?php if ( $has_social_menu ) { ?>
								<nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper pt-5 social-desktop">
									<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">
										<?php
										wp_nav_menu(
												array(
														'theme_location'  => 'social',
														'container'       => '',
														'container_class' => '',
														'items_wrap'      => '%3$s',
														'menu_id'         => '',
														'menu_class'      => '',
														'depth'           => 1,
														'link_before'     => '<span class="screen-reader-text">',
														'link_after'      => '</span>',
														'fallback_cb'     => '',
												)
										);
										?>
									</ul><!-- .footer-social -->
								</nav><!-- .footer-social-wrapper -->
							<?php } ?>
						</div>
						<div class="col-md-6 col-lg-4">
							<div class="row">
								<div class="col-6">
									<?php wp_nav_menu(array(
											'theme_location'  => 'footer',
											'container' => 'ul',
											'container_class' => 'menu',
											'menu_class' => 'footer-links'

									));
									?>
								</div>
								<div class="col-6">
									<?php wp_nav_menu(array(
											'theme_location'  => 'footer-menu-2',
											'container' => 'ul',
											'container_class' => 'menu',
											'menu_class' => 'footer-links'

									));
									?>
								</div>
							</div>
						</div>
						<?php if ( $has_sidebar_1 ) { ?>
						<div class="col-md-6 col-lg">
							<div class="row">
								<div class="col-6 col-lg-12">
									<?php dynamic_sidebar( 'sidebar-1' ); ?>
								</div>
								<?php if ( $has_social_menu ) { ?>
										<div class="col-6">
											<nav aria-label="<?php esc_attr_e( 'Social links', 'twentytwenty' ); ?>" class="footer-social-wrapper pt-5 social-tbl">
												<ul class="social-menu footer-social reset-list-style social-icons fill-children-current-color">
													<?php
													wp_nav_menu(
															array(
																	'theme_location'  => 'social',
																	'container'       => '',
																	'container_class' => '',
																	'items_wrap'      => '%3$s',
																	'menu_id'         => '',
																	'menu_class'      => '',
																	'depth'           => 1,
																	'link_before'     => '<span class="screen-reader-text">',
																	'link_after'      => '</span>',
																	'fallback_cb'     => '',
															)
													);
													?>
												</ul><!-- .footer-social -->
											</nav><!-- .footer-social-wrapper -->
										</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						<?php if ( $has_sidebar_2 ) { ?>
							<div class="col-md-6 col-lg-4">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div>
						<?php } ?>
					</div>
					<div class="row row-credits-footer align-items-center justify-content-between mt-5">
						<div class="col-6">
							<p class="mb-0 text-copy-footer cl-white">&copy; <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo bloginfo( 'name' ); ?></a> <?php
								echo date_i18n(
								/* translators: Copyright date format, see https://secure.php.net/date */
										_x( 'Y', 'copyright date format', 'twentytwenty' )
								);
								?></p>
						</div>
						<div class="col-6 text-right">
							<p class="mb-0 text-copy-logo">Built by <a href="https://wearerally.com/" target="_blank">Rally</a></p>
						</div>
					</div>
				</div>
			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>
	<!--Bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<!--Owl-carrousel JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.20/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.20/dist/js/uikit-icons.min.js"></script>
	<!--Wow JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
	<!-- SimpleLoadMore -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.simpleLoadMore.js" type="text/javascript"></script>
	<!-- Main JS-->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js" type="text/javascript"></script>
	<!-- Plyr JS video and audio library-->
    <script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
	<script>
		new WOW().init();
	</script>
	<script>
		$('.loadmoreitemsarticles').simpleLoadMore({
			item: '.col-post-items',
			count: 8,
			btnHTML: '<div class="w-100 text-center mt-md-5 mt-3"><a href="#" class="load-more__btn ctaloadmore">Show More</a></div>'
		});
	</script>
	<script>
		const player = new Plyr('audio', {});

		// Expose player so it can be used from the console
		window.player = player;
	</script>
	</body>
</html>
