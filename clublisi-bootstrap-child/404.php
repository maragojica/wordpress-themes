<?php
/**
 * Template Name: Not found
 * Description: Page template 404 Not found.
 *
 */

get_header();

?>
<section class="section-inside  pb-md-5">
	<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
		<div class="row">
			<div class="col-md-12">
				<h1 class="title-404 text-center cl-dark mb-5">404</h1>
			</div>
		</div>
		<div class="row pt-md-5 pb-md-5 pt-4 pb-4 justify-content-center">
			<div class="col-md-7">
				<div class="row align-items-center">
					<div class="col-sm-4 pb-sm-0 pb-4 pe-sm-4">
						<h6 class="title-404 cl-black text-sm-end text-center">uh oh, we couldn’t find that page!</h6>
					</div>
					<div class="col-sm-8 ps-sm-4">
						<div class="dp-1 cl-dark text-sm-start text-center">We are sorry you couldn't find that page. But you can click below to get back to where you started...</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<?php
						// Loading WordPress Custom Menu (theme_location).
						wp_nav_menu(
								array(
										'theme_location' => '404-menu',
										'container'      => '',
										'menu_class'     => 'navbar-nav 404-secondary-menu',
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
</section>
<?php
get_footer();
