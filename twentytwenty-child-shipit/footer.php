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
			<footer id="site-footer" role="contentinfo" class="header-footer-group pt-0 pb-0">
				<div class="site-footer d-flex align-items-center">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start mb-lg-0 mb-4">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="footer-logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/footer-logo.png" border="0"></a>
							</div>
							<div class="col-md">
								<?php wp_nav_menu(array(
										'theme_location'  => 'footer',
										'container' => 'ul',
										'container_class' => 'menu-footer',
										'menu_class' => 'menu-footer'

								));
								?>
							</div>
							<div class="col-md">
								<?php wp_nav_menu(array(
										'theme_location'  => 'footer-menu-2',
										'container' => 'ul',
										'container_class' => 'menu-footer',
										'menu_class' => 'menu-footer'

								));
								?>
							</div>
							<div class="col-md text-center">
								<p class="title-follow-footer mb-3">Follow us on</p>
								<div class="social d-flex justify-content-center">
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
							</div>

						</div>
					</div>
				</div>
				<div class="footer-bottom d-flex align-items-center justify-content-center">
					<div class="container">
						<div class="row-credits-footer m-auto">
							<div class="row align-items-center justify-content-center">
								<div class="col-6 text-center">
									<?php if ( is_active_sidebar( 'footer-copyright' )) :
										dynamic_sidebar( 'footer-copyright' );
									endif; ?>
								</div>
								<div class="col-6 text-center">
									<p class="mb-0 text-copy-footer">&copy;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo bloginfo( 'name' ); ?></a><?php
										echo date_i18n(
										/* translators: Copyright date format, see https://secure.php.net/date */
												_x( 'Y', 'copyright date format', 'twentytwenty' )
										);
										?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer><!-- #site-footer -->

		<!--Bootstrap JS-->
		<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>-->
		<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>-->
		<!--<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.6.3.min.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!--Owl-carrousel JS-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
		<!-- UIkit JS -->
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.20/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.20/dist/js/uikit-icons.min.js"></script>
		<!--Wow JS-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
		<!-- SimpleLoadMore -->
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.simpleLoadMore.js" type="text/javascript"></script>
		<!-- Isotope -->
		<script src="https://isotope.metafizzy.co/isotope.pkgd.js" type="text/javascript"></script>
		<!-- Main JS-->
		<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js" type="text/javascript"></script>
		<!-- Plyr JS video and audio library-->
		<script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
		<script>
			new WOW().init();
		</script>
		<script>
			const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
		</script>
		<script>
			jQuery('.loadmoreitemsarticles').simpleLoadMore({
				item: '.row-post-items',
				count: 4,
				btnHTML: '<div class="load-more__btn ctaloadmore cta-link bg-ultra-violet bg-transparent-h cl-white cl-stormy-sea-h border-ultra-violet-h d-flex position-relative m-auto">' +
				'<img class="top-cta" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sparkle-ultraviolet.svg" width="30px" height="30px">'+
				'<a href="#" class="w-100 h-100 cl-white cl-stormy-sea-h">Load More</a>' +
				'<img class="bottom-cta" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/sparkle-ultraviolet.svg" width="30px" height="30px">'+
				'</div>'
			});
		</script>

<?php wp_footer(); ?>
	</body>
</html>
