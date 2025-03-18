<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section class="section-inner section-news bg-white d-flex align-items-center flex-column">
		<div class="container">

			<section class="error-404 not-found">
				<div class="row justify-content-center">
					<div class="col-md-10">
						<header class="page-header">
							<h2 class="subheadline cl-blue-d pb-0 mb-0"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-bootstrap-starter' ); ?></h2>
						</header><!-- .page-header -->

						<div class="page-content mt-3">
							<h3 class="subheadline cl-black"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wp-bootstrap-starter' ); ?></h3>

							<div class="mt-3">
								<form class="form-inline form-search-home" name="search" method="get" action="/">
									<div class="input-group w-100">
										<input type="text" name="s" id="search" placeholder="Search..." class="form-control">
										<div class="input-group-append">
											<button class="btn btn-secondary btn-submit search-submit" type="submit">
												Search <i class="fas fa-arrow-down"></i>
											</button>
										</div>
									</div>
								</form>
							</div>

						</div><!-- .page-content -->
					</div>
				</div>
			</section><!-- .error-404 -->

		</div><!-- #main -->
	</section><!-- #primary -->

<?php

get_footer();
