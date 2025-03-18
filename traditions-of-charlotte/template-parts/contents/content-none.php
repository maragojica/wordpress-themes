<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

?>

<section class="no-results not-found">
	<div class="container">
	<header class="page-header">
		<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'traditions-of-charlotte' ); ?></h2>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'traditions-of-charlotte' ),
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

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'traditions-of-charlotte' ); ?></p>
			<a tabindex="0" class="btn btn-forest-green hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Back Home" title="Back Home"><span>Back Home</span></a>                             
			<?php
			

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'traditions-of-charlotte' ); ?></p>
			<a tabindex="0" class="btn btn-forest-green hover-slide-right wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Back Home" title="Back Home"><span>Back Home</span></a>                             
			<?php
			

		endif;
		?>
	</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->
