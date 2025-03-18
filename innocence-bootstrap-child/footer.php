		</main><!-- /#main -->
		<footer id="footer" class="main-footer">
			<section class="section-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-8" id="mobile-footer-link">
							<div class="footer-links">
								<ul>
									<li><a href="#">Contact</a></li>
									<li><a href="#">Donate</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">About</a></li>
									<li><a href="#">Ways to Give</a></li>
									<li><a href="#">Financials</a></li>
									<li><a href="#">Legal</a></li>
								</ul>
							</div>
							<div class="footer-partner-logo-col hide-mobile">
								<p class="mb-2">
									 The Innocence Project is affiliated with Benjamin N. Cardozo School of Law, Yeshiva University.
								</p>
								<a href="https://cardozo.yu.edu/" target="_blank" class="logo-img-wrap" aria-label="cardozo logo"><img alt="cardozo logo" src="https://innocenceproject.org/wp-content/themes/madeo-child/include/img/cardozo-logo.png"></a>
							</div>
						</div>
						<div class="col-md-4 footer-subscribe-col">
							<div id="subscribe-email">
								<div class="subscribe">
									<p>
										Join our mailing list to receive the latest news and updates from the Innocence Project:
									</p>
									<form class="footer-subscribe" name="footer-newsletter" action="https://innocenceproject.org/getinvolved/" method="post">
										<label><input type="email" class="form-control" id="email-subscribe" placeholder="Email" name="email-subscribe"></label>

										
									</form>
								</div>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="follow-us">
								<ul>
									<li class="facebook"><a href="https://www.facebook.com/innocenceproject/" target="_blank" aria-label="Facebook"></a></li>
									<li class="twitter"><a href="https://twitter.com/innocence" target="_blank" aria-label="Twitter"></a></li>
									<li class="instagram"><a href="https://www.instagram.com/innocenceproject/" target="_blank" aria-label="Instagram"></a></li>
									<li class="tiktok"><a href="https://www.tiktok.com/@innocence" target="_blank" aria-label="Tiktok"></a></li>
									<li class="youtube"><a href="https://www.youtube.com/user/innocenceproject" target="_blank" aria-label="Youtube"></a></li>
								</ul>
							</div>
							<p class="credit">
								<a href="tel:+2123645340" target="_blank">212.364.5340</a> - <a href="mailto:info@innocenceproject.org" target="_blank">info@innocenceproject.org</a>
							</p>
							<p class="credit">
								© 2022 Innocence Project. All Rights Reserved.
							</p>
							</div>
						</div>
					</div>
				</div>
				</section>
		</footer><!-- /#footer -->
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

	<script type="text/javascript">
		jQuery('.row-tiktok').click(function() { 
			console.log( "Handler for .click() called." );
		});
	</script>

</body>
</html>
