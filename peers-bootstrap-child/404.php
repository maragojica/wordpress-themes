<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found.
 *
 */

get_header();

?>
<section class="section-inside bg-lighter pb-md-5">
	<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
		<div class="row">
			<div class="col-lg-8">
				<h1 class="cl-dark-green mb-md-5">Page not found!</h1>
			</div>
		</div>
		<div class="row pt-md-5 pb-md-5 pt-4 pb-4">
			<div class="col-md-8">
				<h3 class="cl-dark mb-md-5 mb-4">Oops! Looks like the page you are looking for got lost. Here are some helpful links to get you back on the path:</h3>
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
