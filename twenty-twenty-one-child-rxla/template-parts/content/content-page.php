<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="section-90 mb-lg-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<h1 class="headline cl-dark pt-5 pb-4"><?php the_title(); ?></h1>
				</div>
				<div class="col-md-9 pt-4">
					<div class="copy-text cl-body copy-text-default">
						<?php
						the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
