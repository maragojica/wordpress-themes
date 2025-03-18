<?php
/**
 * The template for displaying the footer inner
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
			<!--</main><!-- #main -->
		<!--</div><!-- #primary -->
	<!--</div><!-- #content -->

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
<!--Article Intro Js-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/classie.js" type="text/javascript"></script>
<script>
	new WOW().init();
</script>
<script>
	(function() {


		var ie = (function(){
			var undef,rv = -1; // Return value assumes failure.
			var ua = window.navigator.userAgent;
			var msie = ua.indexOf('MSIE ');
			var trident = ua.indexOf('Trident/');

			if (msie > 0) {
				// IE 10 or older => return version number
				rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
			} else if (trident > 0) {
				// IE 11 (or newer) => return version number
				var rvNum = ua.indexOf('rv:');
				rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
			}

			return ((rv > -1) ? rv : undef);
		}());



		// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36
		var keys = [32, 37, 38, 39, 40], wheelIter = 0;

		function preventDefault(e) {
			e = e || window.event;
			if (e.preventDefault)
				e.preventDefault();
			e.returnValue = false;
		}

		function keydown(e) {
			for (var i = keys.length; i--;) {
				if (e.keyCode === keys[i]) {
					preventDefault(e);
					return;
				}
			}
		}

		function touchmove(e) {
			preventDefault(e);
		}

		function wheel(e) {
			// for IE
			//if( ie ) {
			//preventDefault(e);
			//}
		}

		function disable_scroll() {
			window.onmousewheel = document.onmousewheel = wheel;
			document.onkeydown = keydown;
			document.body.ontouchmove = touchmove;
		}

		function enable_scroll() {
			window.onmousewheel = document.onmousewheel = document.onkeydown = document.body.ontouchmove = null;
		}

		var docElem = window.document.documentElement,
				scrollVal,
				isRevealed,
				noscroll,
				isAnimating,
				container = document.getElementById( 'container-article' ),
				trigger = container.querySelector( 'button.trigger' );

		function scrollY() {
			return window.pageYOffset || docElem.scrollTop;
		}

		function scrollPage() {
			scrollVal = scrollY();

			if( noscroll && !ie ) {
				if( scrollVal < 0 ) return false;
				// keep it that way
				window.scrollTo( 0, 0 );
			}

			if( classie.has( container, 'notrans' ) ) {
				classie.remove( container, 'notrans' );
				return false;
			}

			if( isAnimating ) {
				return false;
			}

			if( scrollVal <= 0 && isRevealed ) {
				toggle(0);
			}
			else if( scrollVal > 0 && !isRevealed ){
				toggle(1);
			}
		}

		function toggle( reveal ) {
			isAnimating = true;

			if( reveal ) {
				classie.add( container, 'modify' );
			}
			else {
				noscroll = true;
				disable_scroll();
				classie.remove( container, 'modify' );
			}

			// simulating the end of the transition:
			setTimeout( function() {
				isRevealed = !isRevealed;
				isAnimating = false;
				if( reveal ) {
					noscroll = false;
					enable_scroll();
				}
			}, 600 );
		}

		// refreshing the page...
		var pageScroll = scrollY();
		noscroll = pageScroll === 0;

		disable_scroll();

		if( pageScroll ) {
			isRevealed = true;
			classie.add( container, 'notrans' );
			classie.add( container, 'modify' );
		}

		window.addEventListener( 'scroll', scrollPage );
		trigger.addEventListener( 'click', function() { toggle( 'reveal' ); } );
	})();
</script>
</body>
</html>
