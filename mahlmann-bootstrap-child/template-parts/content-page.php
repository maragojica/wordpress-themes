<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
    $enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
    if(!$enable_vc ) {
    ?>
	<div class="row">
		<div class="col-md-12">
			<?php the_title( '<h2 class="subheadline-section cl-d-green pb-0 mb-0">', '</h2>' ); ?>
			<div class="line-full w-100 d-flex justify-content-lg-start justify-content-center">
				<hr>
			</div>
		</div>
	</div>
    <?php } ?>
	<div class="row pt-4">
		<div class="col-md-12">
			<div class="copy-text cl-d-gray-2">
				<?php
				the_content();

				wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-bootstrap-starter' ),
						'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
		</div>
	</div>

</article><!-- #post-## -->
