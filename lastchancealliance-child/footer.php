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

?>
</main><!-- #site-content -->
			<footer id="site-footer" role="contentinfo" class="header-footer-group bg-footer">
				<div class="site-footer d-flex align-items-center justify-content-center">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-xl-10">
								<div class="row flex-md-row-reverse">
									<div class="col-md ml-5 ml-md-0">
										<div class="row">
											<div class="col col-md">
												<div class="row">
													<div class="col-md">
														<?php wp_nav_menu(array(
																'theme_location'  => 'footer-menu-1',
																'container' => 'ul',
																'container_class' => 'menu',
																'menu_class' => 'menu'

														));
														?>
													</div>
													<div class="col-md">
														<?php wp_nav_menu(array(
																'theme_location'  => 'footer-menu-2',
																'container' => 'ul',
																'container_class' => 'menu',
																'menu_class' => 'menu'

														));
														?>
													</div>
													<div class="col-md">
														<?php wp_nav_menu(array(
																'theme_location'  => 'footer-menu-3',
																'container' => 'ul',
																'container_class' => 'menu',
																'menu_class' => 'menu'

														));
														?>
													</div>
												</div>
											</div>
											<div class="col col-md-3 col-lg-2 text-center text-md-left">
												<?php wp_nav_menu(array(
														'theme_location'  => 'footer-menu-social',
														'container' => 'ul',
														'container_class' => 'menu',
														'menu_class' => 'menu'
												));
												?>
											</div>
										</div>
									</div>
									<div class="col-md-3 mt-5 mt-md-0">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="footer-logo m-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/footer-logo.png" border="0"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-bottom mt-5 mt-md-0">
					<div class="container">
						<div class="row align-items-center justify-content-center">
							<div class="col-md-12 cl-white text-center">
								<?php if( is_active_sidebar('footer-copyright') ) {
									dynamic_sidebar( 'footer-copyright' );
								}  ?>
							</div>
						</div>
					</div>
				</div>
			</footer><!-- #site-footer -->

		<!--Bootstrap JS-->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
		<!--Owl-carrousel JS-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
		<!-- UIkit JS -->
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.7/dist/js/uikit-icons.min.js"></script>
		<!--Wow JS-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
		<script>
			new WOW().init();
		</script>
<?php wp_footer(); ?>
	</body>
</html>
