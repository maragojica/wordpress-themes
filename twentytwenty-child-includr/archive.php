<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<div class="section-recent-articles section-all-stories mb-5 blue-links">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php
				the_archive_title( '<h2 class="title-post cl-dark pb-5 pt-5 text-center">', '</h2>' );
				the_archive_description( '<h5 class="title-divisions cl-dark text-center">', '</h5>' );
				?>
			</div>
		</div>
		<div class="row equal loadmoreitemsarticles mt-5">
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
					<div class="col-md-4 col-lg-3 mb-md-5 col-post-items">
						<?php get_template_part( 'template-parts/contents/content-articles'); ?>
					</div>

				<?php endwhile; ?>

			<?php else : ?>
				<div class="col-md-12">
					<h5 class="title-divisions cl-dark text-center">No post available</h5>
				</div>

			<?php endif; ?>

		</div>
	</div>
</div><!-- #primary -->

<?php
get_footer(); ?>
