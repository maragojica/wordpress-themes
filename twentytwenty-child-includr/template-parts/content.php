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
	<div class="section section-main-single mt-lg-0 mt-5">
		<div class="container">
			<div class="row row-center-lg equal ml-md-auto align-items-md-center">
				<div class="col-md-7 col-lg-10">
					<?php the_title( '<h4 class="title-section cl-blue text-md-left text-center">', '</h4>' ); ?>
						<?php if ( has_post_thumbnail() ) { ?>
						<div class="mt-5 pt-3 featured-img-full-md">
							<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
							<img class="img-fluid w-100" src="<?php echo $featured_img_url;?>">
						</div>
						<?php } ?>
					<div class="pod-description mb-5 pb-5">
						<div class="copy-text copy-default cl-dark-3 mt-md-4"><?php the_content(); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</article><!-- .post -->
