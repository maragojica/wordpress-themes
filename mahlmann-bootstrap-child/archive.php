<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section class="section-inner section-news bg-white d-flex align-items-center flex-column">
	<div class="container">
				<?php
				if ( have_posts() ) : ?>
				<div class="row">
							<div class="col-md-12">
						<?php the_archive_title( '<h2 class="subheadline-section cl-d-green pb-0 mb-0">', '</h2>' ); ?>
						<div class="line-full w-100 d-flex justify-content-lg-start justify-content-center">
							<hr>
						</div>
						<?php the_archive_description( '<h3 class="subheadline cl-d-blue no-shadow">', '</h3>' ); ?>
					</div>
				</div>
				<div class="row equal">
					<?php /* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */?>
						<div class="col-md-6 col-lg-4 pt-md-5 pt-3"><?php get_template_part( 'template-parts/content', 'post' );?></div>

					<?php endwhile; ?>

					<div class="col-md-12 pt-5 text-center col-pagination"><?php  the_posts_pagination(
								array(
										'prev_text'          => __( '&laquo;', 'wp-bootstrap-starter' ),
										'next_text'          => __( '&raquo;', 'wp-bootstrap-starter' )
								)
						);
						?>
					</div>

					<?php else : ?>

						<div class="col-md-12"><?php get_template_part( 'template-parts/content', 'none' ); ?></div>

					<?php endif; ?>
				</div>
    </div>
</section>


<?php

get_footer();
