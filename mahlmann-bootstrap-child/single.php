<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="section-inner section-news bg-white d-flex align-items-center flex-column">
		<div class="container">
            <div class="row equal justify-content-center">
                <div class="col-lg-8">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'post-single' );

                    endwhile; // End of the loop.
                    ?>
                </div>

            </div><!-- #main -->
        </div>
	</section><!-- #primary -->
<?php
get_footer();
