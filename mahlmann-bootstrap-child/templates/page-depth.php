<?php
/**
 * Template Name: Depth Template
 * Template Post Type: post, page
 * This is the template that displays home page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>
		<div id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'depth' );

			endwhile; // End of the loop.
			?>
		</div><!-- #main -->
<?php
get_footer();

