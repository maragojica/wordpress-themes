<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

?>

<section class="no-results not-found p-t0">
	<section class="section-internal-hero bg-blue mb-0 p-0">
        <div class="container banner-container w-100">
            <div class="row flex center-xs middle-xs">               
                <div class="col-xs-12 col-lg-12 w-100 h-100 text-center">
                    <h1 class="mt-0 mb-0 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php esc_html_e( 'Nothing Found', 'vamp' ); ?></h1>                 
               </div> 
            </div> 
        </div>
        </section>  

	<div class="page-content">
		<div class="container p-b5">
			<div class="row">
				<div class="col-xs-12 col-lg-12">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'vamp' ),
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

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'vamp' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'vamp' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
						</div>
			</div>
		</div>
	</div><!-- .page-content -->
</section><!-- .no-results -->
