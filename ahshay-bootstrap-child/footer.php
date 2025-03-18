		</main><!-- /#main -->
		<footer id="footer" class="main-footer">
			<div class="footer-top pt-5 pb-5">
				<div class="container">
					<div class="row align-items-end">
						<div class="col-lg-4 col-xl-3 text-center text-lg-start">
							<a class="navbar-brand cl-blue ps-0 pe-0" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" aria-label="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
							<?php $footer_logo = get_theme_mod( 'footer_logo' );
							if ( ! empty( $footer_logo ) ) : ?>
							<img class="footer-logo" src="<?php echo esc_url( $footer_logo ); ?>" border="0" width="278" height="275" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" width="278" height="276">
								<?php endif; ?>
							</a>
						</div>
						<div class="col-lg-8 col-xl-9">
							<div class="d-flex align-items-lg-end align-items-center justify-content-between flex-lg-row flex-column">
								<?php
								if ( has_nav_menu( 'footer-menu' ) ) :
									wp_nav_menu(
											array(
													'theme_location'  => 'footer-menu',
													'container'       => 'div',
													'container_class' => 'footer-menu',
													'fallback_cb'     => '',
													'items_wrap'      => '<ul class="menu nav flex-lg-row flex-column footer-menu">%3$s</ul>',
												//'fallback_cb'    => 'WP_Bootstrap4_Navwalker_Footer::fallback',
													'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
											)
									);
								endif; ?>
								<?php if ( is_active_sidebar( 'footer-info-1' )) : ?>
									<div class="dp-1 dp-2 box-footer-text-1 cl-white text-lg-end text-center"><?php dynamic_sidebar( 'footer-info-1' );?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div><!-- /.container -->
			</div>
			<div class="container">
				<div class="line-top-footer w-100"></div>
			</div>
			<div class="footer-contact pt-5 pb-5">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6 pb-md-0 pb-5">
							<?php if ( is_active_sidebar( 'footer-info-2' )) : ?>
							<div class="dp-1 cl-white pe-md-5"><?php dynamic_sidebar( 'footer-info-2' );?></div>
							<?php endif; ?>
							<div class="pt-md-4 pt-0 d-flex align-items-center">
								<div class="label-1 cl-light-teal pt-md-0 pt-1 pe-2">Follow Us</div>
								<?php 
								$twit_url = get_option('ahshay_twitter_url');
								$twit_svg = get_option('ahshay_twitter_svg');

								if($twit_url){?>
									<a class="social-link" href="<?php echo $twit_url;?>" target="_blank" aria-label="Twitter" title="Twitter">
										<?php echo $twit_svg ?>
									</a>
								<?php } ?>
								<?php 
								$face_url = get_option('ahshay_facebook_url');
								$face_svg = get_option('ahshay_facebook_svg');

								if($face_url){?>
									<a class="social-link" href="<?php echo $face_url;?>" target="_blank" aria-label="Facebook" title="Facebook">
										<?php echo $face_svg ?>
									</a>
								<?php } ?>
								<?php 
								$insta_url = get_option('ahshay_instagram_url');
								$insta_svg = get_option('ahshay_instagram_svg');

								if($insta_url){?>
									<a class="social-link" href="<?php echo $insta_url;?>" target="_blank" aria-label="Instagram" title="Instagram">
										<?php echo $insta_svg ?>
									</a>
								<?php } ?>
								<?php 
								$lin_url = get_option('ahshay_linkedin_url');
								$lin_svg = get_option('ahshay_linkedin_svg');

								if($lin_url){?>
									<a class="social-link" href="<?php echo $lin_url;?>" target="_blank" aria-label="Linkedin" title="Linkedin">
										<?php echo $lin_svg ?>
									</a>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="box-form">
								<script src="https://s3-us-west-2.amazonaws.com/bloomerang-public-cdn/ahshay/.widget-js/13312.js" type="text/javascript"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="line-top-footer w-100"></div>
			</div>
			<div class="footer-bottom pt-5 pb-5">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<?php if ( is_active_sidebar( 'footer-logos' )) : ?>
								<?php dynamic_sidebar( 'footer-logos' );?>
							<?php endif; ?>
						</div>
						<div class="col-lg-6">
							<div class="d-flex align-items-center justify-content-lg-end justify-content-center flex-md-row flex-column pt-lg-0 pt-md-5">
							<div class="d-flex align-items-center">
								<a href="https://www.washington.edu/online/privacy/" target="_blank" aria-label="Privacy Policy" title="Privacy Policy" class="ps-md-0 mt-sm-0 mt-3 cl-white">Privacy Policy</a>
								<a href="https://www.washington.edu/accesstech/policy-resources/" target="_blank" aria-label="Accessibility"  title="Accessibility" class="ps-sm-5 mt-sm-0 mt-3 cl-white">Accessibility</a>
							</div>
							<p class="mt-0 mb-0 ps-md-5 mt-md-0 mt-2"><?php printf( esc_html__( '&copy;%1$s %2$s.', 'starter-bootstrap' ), " Copyright ".date_i18n( 'Y' ), esc_attr( get_bloginfo( 'name', 'display' ) )."  |  All rights reserved" ); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copy-footer text-center pt-md-4 pb-md-4 pt-3 pb-3">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p class="mb-0 mt-0 d-flex align-items-center justify-content-center">Made by <a href="https://wearerally.com/" target="_blank" aria-label="Rally" title="Rally" class="ps-1">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 334.21"><defs><style>.cls-1{fill:#f4f2ed;}.cls-2{fill:#121212;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><rect class="cls-1" x="7.5" y="7.5" width="585" height="319.21"/><path d="M585,15V319.21H15V15H585M600,0H0V334.21H600V0Z"/><path class="cls-2" d="M74.21,74.35h45.08c31.62,0,44.83,12.17,44.83,40.16v28.24c0,16.58-6.22,25.65-17.88,30.06,12.18,4.14,16.59,12.95,16.59,29.8V248c0,5.44,1.55,9.07,4.66,11.92H135.36C133,258.06,132,253.39,132,248V204.16c0-11.92-3.37-16.84-15.8-16.84H103.75v72.55H74.21Zm29.54,25.91v59.59h13.73c11.92,0,16.58-5.44,16.58-16.84V116.32c0-11.4-4.66-16.06-16.84-16.06Z"/><path class="cls-2" d="M215.16,74.35H246l37.57,185.52H253l-4.66-26.69H213.61l-4.41,26.69H178.63ZM218,206.49h25.65l-11.14-63.22-1.81-27.73-2.07,27.73Z"/><path class="cls-2" d="M327.09,74.35V229.29h44.57v30.58H296V74.35Z"/><path class="cls-2" d="M415.57,74.35V229.29h44.57v30.58H384.48V74.35Z"/><path class="cls-2" d="M474.39,194.05,440.45,74.35h31.61l16.32,64.51,2.07,19.7,2.08-19.7,17.1-64.51H541L506,193.28v66.59H474.39Z"/></g></g></svg>
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- /#footer -->
	</div><!-- /#wrapper -->
	<?php
		wp_footer();
	?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!--Owl-carrousel JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit-icons.min.js"></script>
	<!-- SimpleLoadMore -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.simpleLoadMore.js" type="text/javascript"></script>
	<!--Wow JS-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
	<!-- Main JS-->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js" type="text/javascript"></script>
	<!-- Plyr JS video and audio library-->
	<script src="https://cdn.plyr.io/3.6.7/plyr.polyfilled.js"></script>
	<script>
		new WOW().init();
		
		const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p, {
        controls: [
            'play-large', // The large play button in the center
           'restart', // Restart playback
           'rewind', // Rewind by the seek time (default 10 seconds)
           'play', // Play/pause playback
           'fast-forward', // Fast forward by the seek time (default 10 seconds)
          'progress', // The progress bar and scrubber for playback and buffering
           'current-time', // The current time of playback
           'duration', // The full duration of the media
            'mute', // Toggle mute
            'volume', // Volume control
            'captions', // Toggle captions
           'settings', // Settings menu
          //  'pip', // Picture-in-picture (currently Safari only)
            //'airplay', // Airplay (currently Safari only)
            //'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
            'fullscreen', // Toggle fullscreen
        ]
    }));

    for (i = 0; i < players.length; i++) {
        players[i].play();
        console.log("OK" + players[i].isEmbed);
        var oplayer = players[i];
        console.log(oplayer.playing);
        oplayer.controls = controls;
	}	
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
