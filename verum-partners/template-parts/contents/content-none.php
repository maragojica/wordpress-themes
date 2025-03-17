<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

?>

<section class="no-results not-found">
	<div class="container">
	<header class="page-header">
		<h1 class="page-title cl-green text-center"><?php esc_html_e( 'Nothing Found', 'verum-partners' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content text-center">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'verum-partners' ),
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

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'verum-partners' ); ?></p>
			<?php
			

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'verum-partners' ); ?></p>
			<?php
			

		endif;
		?>
	</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->
