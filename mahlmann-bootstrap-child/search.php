<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
					<h2 class="subheadline-section cl-d-green pb-0 mb-0"><?php printf( esc_html__( 'Search Results for: %s', 'wp-bootstrap-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					<div class="line-full w-100 d-flex justify-content-lg-start justify-content-center">
						<hr>
					</div>
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
					<div class="col-md-6 col-lg-4 pt-5"><?php get_template_part( 'template-parts/content', 'post' );?></div>

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
