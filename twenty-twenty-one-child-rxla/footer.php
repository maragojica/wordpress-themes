<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->
	<a href="#" target="_blank" class="w-100 h-100 link-map">
		<div class="footer-map w-100">

		</div>
	</a>
	<style>
		.footer-map{
			background: url("http://rxla.wpengine.com/wp-content/uploads/2021/04/footer-map.png");
		}
	</style>
	<div class="footer-top">
		<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>
	</div>

	<footer id="colophon" class="footer-main bg-dark d-flex align-items-center" role="contentinfo">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md">
					<?php if ( has_nav_menu( 'footer' ) ) : ?>
						<nav aria-label="<?php esc_attr_e( 'Secondary menu', 'twentytwentyone' ); ?>" class="footer-bottom-navigation">
							<ul class="footer-navigation-wrapper justify-content-lg-start">
								<?php
								wp_nav_menu(
										array(
												'theme_location' => 'footer',
												'items_wrap'     => '%3$s',
												'container'      => false,
												'depth'          => 1,
												'link_before'    => '<span>',
												'link_after'     => '</span>',
												'fallback_cb'    => false,
										)
								);
								?>
							</ul><!-- .footer-navigation-wrapper -->
						</nav><!-- .footer-navigation -->
					<?php endif; ?>
				</div>
				<div class="col-md mt-md-0 mt-4">
					<?php if ( is_active_sidebar( 'sidebar-1' ) ) :
					       dynamic_sidebar( 'sidebar-1' );
					endif;?>
				</div>
			</div>
			<div class="row align-items-center row-powered">
				<div class="col-md-12 text-center">
					<div class="powered-by">
						Copyright <sup>&#169</sup> <?php echo do_shortcode('[site_year]'); ?>
					</div><!-- .powered-by -->

				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<!--Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<!--Owl-carrousel JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.4.6/dist/js/uikit-icons.min.js"></script>
<!--Wow JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<!-- Main JS-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js" type="text/javascript"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
