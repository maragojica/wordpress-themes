<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<section class="no-results not-found">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<header class="page-header">
				<h2 class="subheadline cl-blue-d"><?php esc_html_e( 'Nothing Found', 'wp-bootstrap-starter' ); ?></h2>
			</header><!-- .page-header -->

			<div class="page-content copy-text cl-black">
				<?php
				if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

					<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wp-bootstrap-starter' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

				<?php elseif ( is_search() ) : ?>

					<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wp-bootstrap-starter' ); ?></p>
					<?php
					get_search_form();

				else : ?>

					<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wp-bootstrap-starter' ); ?></p>
					<?php
					get_search_form();

				endif; ?>
			</div><!-- .page-content -->
		</div>
	</div>
</section><!-- .no-results -->
