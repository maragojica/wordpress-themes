</main><!-- /#main -->
<footer id="footer" class="main-footer position-relative">
	<div class="inner-footer pt-5 pb-5">
		<div class="container">
			<div class="row show-lg">
				<div class="col-md-12">
					<div class="footer-social d-flex align-items-center justify-content-center">
						<?php $link_url= get_option('clublisi_linkedin_url');
						if($link_url){?>
							<a href="<?php echo $link_url;?>" target="_blank" aria-label="Linkedin" class="pe-2 ps-2 mb-2">
								<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M417.2 64H96.8C79.3 64 64 76.6 64 93.9V415c0 17.4 15.3 32.9 32.8 32.9h320.3c17.6 0 30.8-15.6 30.8-32.9V93.9C448 76.6 434.7 64 417.2 64zM183 384h-55V213h55v171zm-25.6-197h-.4c-17.6 0-29-13.1-29-29.5 0-16.7 11.7-29.5 29.7-29.5s29 12.7 29.4 29.5c0 16.4-11.4 29.5-29.7 29.5zM384 384h-55v-93.5c0-22.4-8-37.7-27.9-37.7-15.2 0-24.2 10.3-28.2 20.3-1.5 3.6-1.9 8.5-1.9 13.5V384h-55V213h55v23.8c8-11.4 20.5-27.8 49.6-27.8 36.1 0 63.4 23.8 63.4 75.1V384z"></path></svg></div>
							</a>
						<?php } ?>
						<?php $inst_url= get_option('clublisi_instagram_url');
						if($inst_url){?>
							<a href="<?php echo $inst_url;?>" target="_blank" aria-label="Instagram" class="pe-2 ps-2 mb-2">
								<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="255.833" r="80"></circle><path d="M177.805 176.887c21.154-21.154 49.28-32.93 79.195-32.93s58.04 11.838 79.195 32.992c13.422 13.42 23.01 29.55 28.232 47.55H448.5v-113c0-26.51-20.49-47-47-47h-288c-26.51 0-49 20.49-49 47v113h85.072c5.222-18 14.81-34.19 28.233-47.614zM416.5 147.7c0 7.07-5.73 12.8-12.8 12.8h-38.4c-7.07 0-12.8-5.73-12.8-12.8v-38.4c0-7.07 5.73-12.8 12.8-12.8h38.4c7.07 0 12.8 5.73 12.8 12.8v38.4zm-80.305 187.58c-21.154 21.153-49.28 32.678-79.195 32.678s-58.04-11.462-79.195-32.616c-21.115-21.115-32.76-49.842-32.803-78.842H64.5v143c0 26.51 22.49 49 49 49h288c26.51 0 47-22.49 47-49v-143h-79.502c-.043 29-11.687 57.664-32.803 78.78z"></path></svg></div>
							</a>
						<?php } ?>
						<?php $face_url= get_option('clublisi_facebook_url');
						if($face_url){?>
							<a href="<?php echo $face_url;?>" target="_blank" aria-label="Facebook" class="pe-2 ps-2 mb-2">
								<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M288 192v-38.1c0-17.2 3.8-25.9 30.5-25.9H352V64h-55.9c-68.5 0-91.1 31.4-91.1 85.3V192h-45v64h45v192h83V256h56.4l7.6-64h-64z"></path></svg></div>
							</a>
						<?php } ?>
						<?php $twit_url= get_option('clublisi_twitter_url');
						if($twit_url){?>
							<a href="<?php echo $twit_url;?>" target="_blank" aria-label="Twitter" class="pe-2 ps-2 mb-2">
								<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492 109.5c-17.4 7.7-36 12.9-55.6 15.3 20-12 35.4-31 42.6-53.6-18.7 11.1-39.4 19.2-61.5 23.5C399.8 75.8 374.6 64 346.8 64c-53.5 0-96.8 43.4-96.8 96.9 0 7.6.8 15 2.5 22.1-80.5-4-151.9-42.6-199.6-101.3-8.3 14.3-13.1 31-13.1 48.7 0 33.6 17.2 63.3 43.2 80.7-16-.4-31-4.8-44-12.1v1.2c0 47 33.4 86.1 77.7 95-8.1 2.2-16.7 3.4-25.5 3.4-6.2 0-12.3-.6-18.2-1.8 12.3 38.5 48.1 66.5 90.5 67.3-33.1 26-74.9 41.5-120.3 41.5-7.8 0-15.5-.5-23.1-1.4C62.8 432 113.7 448 168.3 448 346.6 448 444 300.3 444 172.2c0-4.2-.1-8.4-.3-12.5C462.6 146 479 129 492 109.5z"></path></svg></div>
							</a>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="row align-items-center show-lg pt-4 pb-4">
				<div class="col-6 col-footer-menu-1">
					<?php
					// Loading WordPress Custom Menu (theme_location).
					wp_nav_menu(
							array(
									'theme_location' => 'footer-menu',
									'container'      => '',
									'menu_class'     => 'navbar-nav',
									'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
									'walker'         => new WP_Bootstrap_Navwalker(),
							)
					);
					?>
				</div>
				<div class="col-6">
					<?php
					// Loading WordPress Custom Menu (theme_location).
					wp_nav_menu(
							array(
									'theme_location' => 'footer-menu-secondary',
									'container'      => '',
									'menu_class'     => 'navbar-nav',
									'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
									'walker'         => new WP_Bootstrap_Navwalker(),
							)
					);
					?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php $title_footer = get_theme_mod( 'title_footer' ); ?>
					<div class="title-social-footer pb-3"><?php echo $title_footer;?></div>
				</div>
			</div>
			<div class="row align-items-center me-0 ms-0 show-lg">
				<div class="col-4 ps-md-2 pe-md-2 ps-1 pe-1">
					<?php $footer_img_1 = get_theme_mod( 'footer_img_1' );
					if ( ! empty( $footer_img_1 ) ) :
						?>
						<img class="logo-social-footer img-fluid w-100" width="135" height="135" src="<?php echo esc_url( $footer_img_1 ); ?>" alt="Footer Social" />
					<?php endif; ?>
				</div>
				<div class="col-4 ps-md-2 pe-md-2 ps-1 pe-1">
					<?php $footer_img_2 = get_theme_mod( 'footer_img_2' );
					if ( ! empty( $footer_img_2 ) ) :
						?>
						<img class="logo-social-footer img-fluid w-100" width="135" height="135" src="<?php echo esc_url( $footer_img_2 ); ?>" alt="Footer Social" />
					<?php endif; ?>
				</div>
				<div class="col-4 ps-md-2 pe-md-2 ps-1 pe-1">
					<?php $footer_img_3 = get_theme_mod( 'footer_img_3' );
					if ( ! empty( $footer_img_3 ) ) :
						?>
						<img class="logo-social-footer img-fluid w-100" width="135" height="135" src="<?php echo esc_url( $footer_img_3 ); ?>" alt="Footer Social" />
					<?php endif; ?>
				</div>
			</div>
			<div class="row align-items-center hide-lg">
				<div class="col-md">
					<div class="row align-items-center">
						<div class="col-6 col-footer-menu-1">
							<?php
							// Loading WordPress Custom Menu (theme_location).
							wp_nav_menu(
									array(
											'theme_location' => 'footer-menu',
											'container'      => '',
											'menu_class'     => 'navbar-nav',
											'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
											'walker'         => new WP_Bootstrap_Navwalker(),
									)
							);
							?>
						</div>
						<div class="col-6">
							<div class="footer-social d-flex align-items-center justify-content-center">
								<?php $link_url= get_option('clublisi_linkedin_url');
								if($link_url){?>
									<a href="<?php echo $link_url;?>" target="_blank" aria-label="Linkedin" class="pe-2 ps-2 mb-2">
										<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M417.2 64H96.8C79.3 64 64 76.6 64 93.9V415c0 17.4 15.3 32.9 32.8 32.9h320.3c17.6 0 30.8-15.6 30.8-32.9V93.9C448 76.6 434.7 64 417.2 64zM183 384h-55V213h55v171zm-25.6-197h-.4c-17.6 0-29-13.1-29-29.5 0-16.7 11.7-29.5 29.7-29.5s29 12.7 29.4 29.5c0 16.4-11.4 29.5-29.7 29.5zM384 384h-55v-93.5c0-22.4-8-37.7-27.9-37.7-15.2 0-24.2 10.3-28.2 20.3-1.5 3.6-1.9 8.5-1.9 13.5V384h-55V213h55v23.8c8-11.4 20.5-27.8 49.6-27.8 36.1 0 63.4 23.8 63.4 75.1V384z"></path></svg></div>
									</a>
								<?php } ?>
								<?php $inst_url= get_option('clublisi_instagram_url');
								if($inst_url){?>
									<a href="<?php echo $inst_url;?>" target="_blank" aria-label="Instagram" class="pe-2 ps-2 mb-2">
										<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><circle cx="256" cy="255.833" r="80"></circle><path d="M177.805 176.887c21.154-21.154 49.28-32.93 79.195-32.93s58.04 11.838 79.195 32.992c13.422 13.42 23.01 29.55 28.232 47.55H448.5v-113c0-26.51-20.49-47-47-47h-288c-26.51 0-49 20.49-49 47v113h85.072c5.222-18 14.81-34.19 28.233-47.614zM416.5 147.7c0 7.07-5.73 12.8-12.8 12.8h-38.4c-7.07 0-12.8-5.73-12.8-12.8v-38.4c0-7.07 5.73-12.8 12.8-12.8h38.4c7.07 0 12.8 5.73 12.8 12.8v38.4zm-80.305 187.58c-21.154 21.153-49.28 32.678-79.195 32.678s-58.04-11.462-79.195-32.616c-21.115-21.115-32.76-49.842-32.803-78.842H64.5v143c0 26.51 22.49 49 49 49h288c26.51 0 47-22.49 47-49v-143h-79.502c-.043 29-11.687 57.664-32.803 78.78z"></path></svg></div>
									</a>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="row align-items-center">
						<div class="col-4 ps-2 pe-2">
							<?php $footer_img_1 = get_theme_mod( 'footer_img_1' );
							if ( ! empty( $footer_img_1 ) ) :
								?>
								<img class="logo-social-footer img-fluid w-100" width="135" height="135" src="<?php echo esc_url( $footer_img_1 ); ?>" alt="Footer Social" />
							<?php endif; ?>
						</div>
						<div class="col-4 ps-2 pe-2">
							<?php $footer_img_2 = get_theme_mod( 'footer_img_2' );
							if ( ! empty( $footer_img_2 ) ) :
								?>
								<img class="logo-social-footer img-fluid w-100" width="135" height="135" src="<?php echo esc_url( $footer_img_2 ); ?>" alt="Footer Social" />
							<?php endif; ?>
						</div>
						<div class="col-4 ps-2 pe-2">
							<?php $footer_img_3 = get_theme_mod( 'footer_img_3' );
							if ( ! empty( $footer_img_3 ) ) :
								?>
								<img class="logo-social-footer img-fluid w-100" width="135" height="135" src="<?php echo esc_url( $footer_img_3 ); ?>" alt="Footer Social" />
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-md">
					<div class="row align-items-center">
						<div class="col-6">
							<div class="footer-social d-flex align-items-center justify-content-center">
								<?php $face_url= get_option('clublisi_facebook_url');
								if($face_url){?>
									<a href="<?php echo $face_url;?>" target="_blank" aria-label="Facebook" class="pe-2 ps-2 mb-2">
										<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M288 192v-38.1c0-17.2 3.8-25.9 30.5-25.9H352V64h-55.9c-68.5 0-91.1 31.4-91.1 85.3V192h-45v64h45v192h83V256h56.4l7.6-64h-64z"></path></svg></div>
									</a>
								<?php } ?>
								<?php $twit_url= get_option('clublisi_twitter_url');
								if($twit_url){?>
									<a href="<?php echo $twit_url;?>" target="_blank" aria-label="Twitter" class="pe-2 ps-2 mb-2">
										<div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M492 109.5c-17.4 7.7-36 12.9-55.6 15.3 20-12 35.4-31 42.6-53.6-18.7 11.1-39.4 19.2-61.5 23.5C399.8 75.8 374.6 64 346.8 64c-53.5 0-96.8 43.4-96.8 96.9 0 7.6.8 15 2.5 22.1-80.5-4-151.9-42.6-199.6-101.3-8.3 14.3-13.1 31-13.1 48.7 0 33.6 17.2 63.3 43.2 80.7-16-.4-31-4.8-44-12.1v1.2c0 47 33.4 86.1 77.7 95-8.1 2.2-16.7 3.4-25.5 3.4-6.2 0-12.3-.6-18.2-1.8 12.3 38.5 48.1 66.5 90.5 67.3-33.1 26-74.9 41.5-120.3 41.5-7.8 0-15.5-.5-23.1-1.4C62.8 432 113.7 448 168.3 448 346.6 448 444 300.3 444 172.2c0-4.2-.1-8.4-.3-12.5C462.6 146 479 129 492 109.5z"></path></svg></div>
									</a>
								<?php } ?>
							</div>
						</div>
						<div class="col-6 col-footer-menu-2">
							<?php
							// Loading WordPress Custom Menu (theme_location).
							wp_nav_menu(
									array(
											'theme_location' => 'footer-menu-secondary',
											'container'      => '',
											'menu_class'     => 'navbar-nav',
											'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
											'walker'         => new WP_Bootstrap_Navwalker(),
									)
							);
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer><!-- /#footer -->
<button class="scrollToTopBtn" aria-label="scrollToTopBtn">
	<svg width="57" height="57" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
		<g clip-path="url(#clip0_1491_2625)">
			<path d="M17 34L28.5 22L40 34" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
		</g>
		<defs>
			<clipPath id="clip0_1491_2625">
				<rect width="57" height="57" fill="#000000"/>
			</clipPath>
		</defs>
	</svg>
</button>
</div><!-- /#wrapper -->
<?php
wp_footer();
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--Owl-carrousel JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.11/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.15.11/dist/js/uikit-icons.min.js"></script>
<!-- SimpleLoadMore -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.simpleLoadMore.js" type="text/javascript"></script>
<!--Wow JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<!-- Isotope -->
<script src="https://isotope.metafizzy.co/isotope.pkgd.js" type="text/javascript"></script>
<!-- Main JS-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js" type="text/javascript"></script>
<!-- Plyr JS video and audio library-->
<script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
<!-- Mansory -->
<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<script>
	new WOW().init();

</script>
<script>
	const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
</script>
<script>
	$('.loadmoreitems').simpleLoadMore({
		item: '.col-post-items',
		count: 9,
		btnHTML: '<div class="w-100 text-center mt-md-5 mt-4"><a href="#" class="load-more__btn cta-load-more link-post">Load More</a></div>'
	});
</script>
<script>
	// We select the element we want to target
	var target = document.querySelector("main");

	var scrollToTopBtn = document.querySelector(".scrollToTopBtn");
	var rootElement = document.documentElement;

	// Next we want to create a function that will be called when that element is intersected
	function callback(entries, observer) {
		// The callback will return an array of entries, even if you are only observing a single item
		entries.forEach((entry) => {
			if (entry.isIntersecting) {
			// Show button
			scrollToTopBtn.classList.add("showBtn");
		} else {
			// Hide button
			scrollToTopBtn.classList.remove("showBtn");
		}
	});
	}

	function scrollToTop() {
		rootElement.scrollTo({
			top: 0,
			behavior: "smooth"
		});
	}
	scrollToTopBtn.addEventListener("click", scrollToTop);

	// Next we instantiate the observer with the function we created above. This takes an optional configuration
	// object that we will use in the other examples.
	let observer = new IntersectionObserver(callback);
	// Finally start observing the target element
	observer.observe(target);
</script>

</body>
</html>
