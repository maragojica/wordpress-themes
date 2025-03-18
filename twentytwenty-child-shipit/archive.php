<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<main id="site-content" role="main">
	<div class="container pt-5 mt-5">
		<div class="row">
			<div class="col-md-12">
				<?php
				the_archive_title( '<h2 class="headline-section cl-stormy-sea text-center pb-0">', '</h2>' ); ?>
				<img class="squiggle-blue m-auto-25" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/border-squiggle-blue.png" border="0">
				<?php the_archive_description( '<div class="copy-description text-center cl-stormy-sea">', '</div>' );
				?>
			</div>
		</div>
	</div>
	<section class="section-updates bg-white wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
		<div class="container loadmoreitemsarticles">
	<?php
	if ( have_posts() ) : ?>
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			/*
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */ ?>

				<article <?php post_class("row-post-items"); ?> id="post-<?php the_ID(); ?>">
						<?php get_template_part( 'template-parts/contents/content-articles'); ?>
				</article><!-- .post -->

		<?php endwhile; ?>
		</div>
	<?php else : ?>
	<div class="container">
		<div class="row">
				<div class="col-md-12">
					<div class="copy-description text-center cl-stormy-sea">No post available</div>
				</div>
		</div>
	</div>
	<?php endif; ?>
			</section>
</main><!-- #site-content -->
<?php
get_footer(); ?>
