<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if ( is_active_sidebar( 'footer-top' ) ) : ?>

	<aside class="footer-widgets d-flex align-items-center bg-yellow">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3"><h3 class="subtitle cl-dark mb-2 mb-lg-4 text-lg-left text-center">Contact us</h3></div>
				<div class="col-9 col-lg-8"><div class="copy-text cl-dark"><?php dynamic_sidebar( 'footer-top' ); ?></div></div>
				<div class="col"><a class="cta-link cl-black cta-lg" href="/contact-us"><i class="fas fa-long-arrow-alt-right"></i></a></div>
			</div>
		</div>
	</aside><!-- .widget-area -->
<?php endif; ?>
