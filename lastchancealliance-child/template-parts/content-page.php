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

	<section class="banner-inner-page bg-white">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-11">
						<h3 class="headline-section cl-dark"><?php the_title(); ?></h3>
						<div class="date-page">Last updated: <?php the_date(); ?></div>
						<div class="copy-text sm-text light-content text-content-default cl-dark-2 mb-5 pb-2 pb-md-5">
							<?php  the_content(); ?>
						</div>

				</div>
			</div>
		</div>
	</section>

</article><!-- .post -->
