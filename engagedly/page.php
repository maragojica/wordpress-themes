<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Engagedly
 */

get_header(); ?>

	<section class="empty-banner"></section>
	<section class="banner-internal relative d-flex align-items-center justify-content-center mb-5 pb-5 mb-mv-0 pb-mv-0">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7">
					<?php
					while (have_posts()) : the_post();
						// check if the flexible content field has rows of data
						if (have_rows('page_content')) :
							// loop through the rows of data
							while (have_rows('page_content')) : the_row();
								get_template_part('template-parts/section', get_row_layout());
							endwhile;
						else :
							get_template_part( 'template-parts/content' );

							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						endif;
					endwhile;
					?>
				</div>
				<div class="col-md col-lg pr-mv-0 pl-mv-0">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer();
