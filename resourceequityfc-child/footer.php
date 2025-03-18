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
			<footer id="site-footer" role="contentinfo" class="header-footer-group bg-footer d-flex align-items-center justify-content-center">
				<div class="site-footer d-flex align-items-center justify-content-center">
					<div class="container">
						<div class="row row-logo-footer align-items-center">
							<div class="col-md-4">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/footer-logo.png" border="0"></a>
							</div>
							<div class="col-md text-info-footer cl-light-gray">
								<p>The Resource Equity Funders Collaborative (REFC) is a partnership among education funders committed to equity in PK-12 education.</p>
							</div>
						</div>
						<div class="row row-menu-footer">
							<div class="col-md-12">
								<?php wp_nav_menu(array(
										'theme_location'  => 'footer-menu-1',
										'container' => 'ul',
										'container_class' => 'menu',
										'menu_class' => 'd-flex justify-content-md-between justify-content-start'

								));
								?>
							</div>
						</div>
						<div class="row row-credits-footer align-items-center justify-content-between">
							<div class="col-6">
								<p class="mb-0 text-copy-footer cl-white">Copyright 2021</p>
							</div>
							<div class="col-6 text-right">
								<p class="mb-0 text-copy-logo">Powered by <a href="https://wearerally.com/" target="_blank">Rally</a></p>
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
        <!-- Main JS-->
        <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js" type="text/javascript"></script>
		<script>
			new WOW().init();
			jQuery('.cta-join-us a').attr('uk-toggle', '');
		</script>
<div id="modal-joinus-forms" uk-modal>
	<div class="uk-modal-dialog uk-modal-body">
		<button class="uk-modal-close-default" type="button" uk-close></button>
		<div class="box-joinus-page">
			<?php echo do_shortcode('[contact-form-7 id="185" title="Join Our List Form"]'); ?>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
	</body>
</html>
