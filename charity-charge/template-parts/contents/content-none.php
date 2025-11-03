<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Charity_Charge
 */

?>
<section class="default-section position-relative bg-blue-darker">
			<div class="top-section padding-large">
				<div class="container">
					<div class="row align-items-center justify-content-center text-center g-5">
						<div class="col-12 col-md-7">	
							<h1 class="color-white subheadline" data-aos="fade-up">
								<?php
								if ( is_home() && current_user_can( 'publish_posts' ) ) :

									printf(
										'<p>' . wp_kses(
											/* translators: 1: link to WP admin new post page. */
											__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'charity-charge' ),
											array(
												'a' => array(
													'href' => array(),
												),
											)
										) . '</p>',
										esc_url( admin_url( 'post-new.php' ) )
									);

								elseif ( is_search() ) :
									?>

									<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'charity-charge' ); ?></p>
									<?php
								

								else :
									?>

									<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'charity-charge' ); ?></p>
									<?php
								

								endif;
								?>
							</h1>																			
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div><!-- .page-content -->
	</div><!-- .no-results -->
