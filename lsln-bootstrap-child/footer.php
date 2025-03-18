		</main><!-- /#main -->
		<footer id="footer" class="main-footer d-flex align-items-center pb-5 pt-5 mt-md-4">
			<div class="container">
				<!--Footer Live-->
				<div class="row">
					<div class="col-md-12">
						<div class="learn-more-about pb-md-5 d-none">
							<div class="section container">
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/arctic/" target="_blank">Arctic</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/china/" target="_blank">China</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/russia/" target="_blank">Russia</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/southeast-asia/" target="_blank">Southeast	Asia</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/united-states/" target="_blank">United States</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/citizen-action/" target="_blank">Citizen Action</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/climate-crisis/" target="_blank">The Climate Crisis</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/healthy-oceans/" target="_blank">Healthy Oceans</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/information/" target="_blank">Information</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/justice/" target="_blank">Justice</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/livelihoods/" target="_blank">Livelihoods</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/partners/" target="_blank">Partners</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/pollution/" target="_blank">Pollution</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/shipping/" target="_blank">Shipping</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/wild-places/" target="_blank">Wild Places</a>
								<a class="btn btn-default" href="https://www.pacificenvironment.org/list/wildlife/" target="_blank">Wildlife</a>
								<div class="clearfix">&nbsp;</div>
							</div>
						</div>
						<section id="footer-widgets">
							<div class="footer-widgets-inner">
								<div class="row">
									<div class="footer-connect col-xs-12 col-md-8 col-lg-6">
										<div class="footer-support">
											<h3>Show Your Support With a Donation</h3>

											<div class="support-content">
												<p>Make a gift today. Your donation supports community-led environmental action and nurtures brave grassroots leaders around the Pacific Rim.</p>
											</div>
											<a href="https://actionnetwork.org/fundraising/make-a-one-time-gift-today/?amount=10" target="_blank" class="btn btn-orange">$10</a>
											<a href="https://actionnetwork.org/fundraising/make-a-one-time-gift-today/?amount=25" target="_blank" class="btn btn-orange">$25</a>
											<a href="https://actionnetwork.org/fundraising/make-a-one-time-gift-today/?amount=75" target="_blank" class="btn btn-orange">$75</a>
											<a href="https://actionnetwork.org/fundraising/make-a-one-time-gift-today/?amount=100" target="_blank" class="btn btn-orange">$100</a>
											<a href="https://actionnetwork.org/fundraising/make-a-one-time-gift-today/?amount=250" target="_blank" class="btn btn-orange">$250</a>
											<a href="https://actionnetwork.org/fundraising/make-a-one-time-gift-today/?amount=500" target="_blank" class="btn btn-orange">$500</a>
											<a href="https://actionnetwork.org/fundraising/make-a-one-time-gift-today" target="_blank" class="btn btn-orange">$ Other <i class="fa fa-chevron-right"></i></a>
										</div>
										<div class="footer-newsletter">
											<h3>Stay Up to Date</h3>
											<div class="newsletter-content">
												Make your voice heard. Sign up for alerts and join us in our fight for thriving communities, healthy oceans and a livable climate.
											</div>
											<form method="GET" target="_blank" action="https://actionnetwork.org/forms/join-our-community" _lpchecked="1">
												<input type="text" id="email" name="answer[email]" placeholder="email">
												<input type="submit" value="sign up" class="btn btn-blue">
											</form>
										</div>
									</div>
									<div class="footer-menu hidden-xs hidden-sm col-md-3">
										<section class="widget nav_menu-2 widget_nav_menu">
											<?php	wp_nav_menu(
													array(
															'theme_location'  => 'footer-menu',
															'fallback_cb'     => '',
															'items_wrap'      => '<ul class="menu">%3$s</ul>',
														//'fallback_cb'    => 'WP_Bootstrap4_Navwalker_Footer::fallback',
															'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
													)
											); ?>
										</section>
									</div>
									<div class="footer-social col-xs-12 col-md-4 col-lg-3">
										<div class="footer-share">
											<?php $title_social= get_option('portspeople_section_title');
											if($title_social){?>
												<h3><?php echo $title_social; ?></h3>
											<?php } ?>
											<?php $face_url= get_option('portspeople_facebook_url');
											if($face_url){?>
												<a	href="<?php echo $face_url;?>" target="_blank" class="facebook social"><i class="fa fa-facebook-square"></i></a>
											<?php } ?>
											<?php $twit_url= get_option('portspeople_twitter_url');
											if($twit_url){?>
												<a	href="<?php echo $twit_url;?>" target="_blank" class="twitter social"><i class="fa fa-twitter-square"></i></a>
											<?php } ?>
											<?php $inst_url= get_option('portspeople_instagram_url');
											if($inst_url){?>
												<a	href="<?php echo $inst_url;?>" target="_blank"	class="instagram social"><i class="fa fa-instagram"></i></a>
											<?php } ?>
											<?php $youtube_url= get_option('portspeople_youtube_url');
											if($youtube_url){?>
												<a	href="<?php echo $youtube_url;?>" target="_blank" class="youtube social"><i class="fa fa-youtube-square"></i>
												</a>
											<?php } ?>
											 <span class="st_sharethis_custom"><i class="fa fa-share-alt-square"></i></span>
										</div>
										<div class="footer-update">
											<h3>Click To Tweet</h3>
											<div class="tweet-share">
												<a href="http://ctt.ec/HI729" target="_blank">Tweet: Join Pacific
													Environment in protecting the living environment around the Pacific Rim!</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
				<!--Footer Live End-->
			</div><!-- /.container -->
		</footer><!-- /#footer -->
	</div><!-- /#wrapper -->
	<?php
		wp_footer();
	?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<!--Owl-carrousel JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.14.3/dist/js/uikit-icons.min.js"></script>
	<!-- SimpleLoadMore -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.simpleLoadMore.js" type="text/javascript"></script>
	<!-- Main JS-->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js" type="text/javascript"></script>
	<!-- Plyr JS video and audio library-->
	<script src="https://cdn.plyr.io/3.7.2/plyr.polyfilled.js"></script>
	<script>
		const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
	</script>
	<script>
		$('.loadmoreitemsresources').simpleLoadMore({
			item: '.col-resources',
			count: 3,
			btnHTML: '<div class="w-100 text-center mt-md-5 mt-4"><a href="#" class="load-more__btn cta-more">See More</a></div>'
		});
		$('.loadmoreitemspost').simpleLoadMore({
			item: '.col-posts',
			count: 6,
			btnHTML: '<div class="w-100 text-center mt-md-5 mt-4"><a href="#" class="load-more__btn cta-more">See More</a></div>'
		});
	</script>
</body>
</html>
