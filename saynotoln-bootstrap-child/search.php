<?php
/**
 * The Template for displaying Search Results pages.
 */

get_header();


?>
<article id="post-<?php the_ID(); ?>" <?php post_class("bg-white"); ?>>
	<section class="banner-general d-flex align-items-center position-relative">
		<div class="container z-index-2">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<h1 class="cl-dark-ocean">
						<?php printf( esc_html__( 'Search Results for: %s', 'starter-theme-bootstrap' ), get_search_query() ); ?>
					</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="section-resources bg-white pb-md-5">
		<div class="container pt-md-5 pb-md-5 pt-4 pb-0">

				<?php
				if ( have_posts() ) : ?>
			<div class="row equal">
				<?php	get_template_part( 'archive', 'loop' ); ?>
			</div>
			<?php else : ?>
					<div class="row equal justify-content-center">
					<div class="col-md-6">
						<div class="dp-1">
							<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'starter-theme-bootstrap' ); ?></p>
							<?php
							/*get_search_form();*/
							?>
							<form class="search-general search-form my-2" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<div class="input-group">
									<button type="submit" name="submit" class="btn btn-outline-secondary">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_1246_1310)">
												<path d="M11.74 20.48C16.567 20.48 20.48 16.567 20.48 11.74C20.48 6.91303 16.567 3 11.74 3C6.91303 3 3 6.91303 3 11.74C3 16.567 6.91303 20.48 11.74 20.48Z" stroke="#292947" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
												<path d="M18.03 18.03L21 21" stroke="#292947" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
											</g>
											<defs>
												<clipPath id="clip0_1246_1310">
													<rect width="24" height="24" fill="white"/>
												</clipPath>
											</defs>
										</svg>


									</button>
									<input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e( 'Search site', 'starter-theme-bootstrap' ); ?>" title="<?php esc_attr_e( 'Search site', 'starter-theme-bootstrap' ); ?>" />

								</div>
							</form>
						</div>
					</div>
			</div><!-- /.row -->
				<?php endif; ?>

		</div>
	</section>
</article><!-- /#post-<?php the_ID(); ?> -->
<?php
wp_reset_postdata();

get_footer(); ?>
