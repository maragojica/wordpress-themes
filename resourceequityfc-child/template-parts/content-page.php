<?php
/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<section class="section-inner-content bg-white section-p60">
		<div class="container">
			<div class="row row-inner m-auto justify-content-center">
				<div class="col-md-12">
						<h2 class="title-section text-uppercase cl-light-blue"><?php the_title(); ?></h2>
						<div class="copy-text xs-text cl-dark">
							<?php  the_content(); ?>
						</div>

				</div>
			</div>
		</div>
	</section>

</article><!-- .post -->
