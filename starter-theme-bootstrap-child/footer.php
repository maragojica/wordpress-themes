<?php

/**

 * The template for displaying the footer.

 *

 * Contains the closing of the #content div and all content after.

 *

 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package Shapely

 */



?>



</div><!-- #main -->


<footer id="colophon" class="site-footer footer bg-d-blue" role="contentinfo">

	<div class="container-fluid">	      
		<div class="box-top-footer">
			<div class="module left">
					<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
						<?php
							$header_logo = get_theme_mod( 'header_logo' ); // Get custom meta-value.

							if ( ! empty( $header_logo ) ) :
						?>
							<img src="<?php echo esc_url( $header_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						<?php
							else :
								echo esc_attr( get_bloginfo( 'name', 'display' ) );
							endif;
						?>
					</a>
					
				</div>
				<div class="module rigth">
					<?php wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'container'      => '',
									'menu_class'     => 'navbar-nav me-auto',
									
								)
							);
					?>
										<?php $linkedin = get_field('linkedin', 'option'); 
						if( $linkedin ):

							$link_url = $linkedin['url'];
					
							$link_title = $linkedin['title'];
					
							$link_target = $linkedin['target'] ? $linkedin['target'] : '_self'; ?>

							<a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="header-social" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">

									<svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">

									<g clip-path="url(#clip0_248_489)">

										<path class="social-bg" fill-rule="evenodd" clip-rule="evenodd" d="M4 36H32C34.2091 36 36 34.2091 36 32V4C36 1.79086 34.2091 0 32 0H4C1.79086 0 0 1.79086 0 4V32C0 34.2091 1.79086 36 4 36Z" fill="#2A675F"/>

										<path fill-rule="evenodd" clip-rule="evenodd" d="M31 31H25.6578V21.9011C25.6578 19.4064 24.7099 18.0123 22.7354 18.0123C20.5873 18.0123 19.465 19.4631 19.465 21.9011V31H14.3167V13.6667H19.465V16.0015C19.465 16.0015 21.013 13.1371 24.6913 13.1371C28.3678 13.1371 31 15.3822 31 20.0256V31ZM8.17467 11.397C6.42103 11.397 5 9.96483 5 8.1985C5 6.43218 6.42103 5 8.17467 5C9.92832 5 11.3485 6.43218 11.3485 8.1985C11.3485 9.96483 9.92832 11.397 8.17467 11.397ZM5.51628 31H10.8847V13.6667H5.51628V31Z" fill="white"/>

									</g>

									<defs>

										<clipPath id="clip0_248_489">

										<rect width="36" height="36" fill="white"/>

										</clipPath>

									</defs>

									</svg>

							</a>
							<?php endif; ?>	
							<?php $cta_footer = get_field('cta_footer', 'option'); 
							if( $cta_footer ):

								$link_url = $cta_footer['url'];
						
								$link_title = $cta_footer['title'];
						
								$link_target = $cta_footer['target'] ? $cta_footer['target'] : '_self'; ?>

								<a  tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="header-cta" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>	
				</div>
		</div>
		<?php $copyright = get_field('copyright', 'option'); 
		if($copyright): ?>
		<div class="footer-bottom"><?php echo $copyright;?></div>
		<?php endif; ?>
	</div>

</footer><!-- #colophon -->

<?php $bgfooter = get_field('bg_image_footer', 'option'); 
	if(!empty($bgfooter)): ?>
	<style>
		footer .container-fluid{
			background-image: url(<?php echo $bgfooter['url']; ?>) !important;
		}
	</style>
	<?php endif; ?>

</div>

</div><!-- #page -->

<?php wp_footer(); ?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--Owl-carrousel JS-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<!-- UIkit JS -->

<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit-icons.min.js"></script>

<!-- Main JS-->

<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/custom-main.js" type="text/javascript"></script>

<script>
	const {children: titles} = document.querySelector(".animate-text");
const txtsLen = titles.length;
let index = 0;
const textInTimer = 3000;
const textOutTimer = 2800;

function animateText() {
  for (let i = 0; i < txtsLen; i++) {
    titles[i].classList.remove("text-in", "text-out");
  }
  titles[index].classList.add("text-in");

  setTimeout(function () {
    titles[index].classList.add("text-out");
  }, textOutTimer);

  setTimeout(function () {
    if (index == txtsLen - 1) {
      index = 0;
    } else {
      index++;
    }
    animateText();
  }, textInTimer);
}

window.onload = animateText;
</script>
</body>

</html>

