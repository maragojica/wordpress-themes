<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found.
 *
 */

get_header();

?>
<section class="section-inside bg-accent-grey-1 pb-md-5">
	<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
		<div class="row">
			<div class="col-lg-7">
				<h2 class="big-h2-mv cl-green mb-5">Page not found!</h2>
				<div class="dp-1 cl-black mb-4">Oops! Looks like the page you are looking for got lost.</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/path.png" alt="Separator Beige" class="line-path">
			</div>
		</div>
		<div class="row pt-md-5 pb-md-5 pt-4 pb-4">
			<div class="col-md-7">
				<h6 class="cl-grey-3 mb-md-5">Here are some helpful links to get you back on the path:</h6>
				<?php
				// Loading WordPress Custom Menu (theme_location).
				wp_nav_menu(
						array(
								'theme_location' => '404-menu',
								'container'      => '',
								'menu_class'     => 'navbar-nav 404-secondary-menu flex-md-row',
								'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
								'walker'         => new WP_Bootstrap_Navwalker(),
						)
				);
				?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
