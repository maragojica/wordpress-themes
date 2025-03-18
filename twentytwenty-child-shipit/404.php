<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>
<div class="error404-content pt-5 pb-5 d-flex justify-content-center align-items-center wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10 col-lg-7">
				<div class="pb-5">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="m-auto" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/404.png" border="0" width="162px"></a>
				</div>
				<h2 class="headline-section cl-black text-center text-uppercase pb-5"><?php _e( 'Page Not Found', 'twentytwenty' ); ?></h2>
				<div class="copy-description text-center cl-black"><p><?php _e( 'Oops! Looks like you got a little lost at sea—the page you are looking for is not found. Here are some helpful links instead:', 'twentytwenty' ); ?></p></div>
				<div class="box-menu-404">
					<?php wp_nav_menu(array(
							'theme_location'  => 'general-info-menu',
							'container' => 'ul',
							'container_class' => 'menu-404',
							'menu_class' => 'menu-404'

					));
					?>
				</div>
				<div class="copy-description text-center cl-black"><p><?php _e( 'If you typed in the URL directly, make sure it doesn’t have any mistakes. If you clicked on a link on this site let us know that it’s broken.', 'twentytwenty' ); ?></p></div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
