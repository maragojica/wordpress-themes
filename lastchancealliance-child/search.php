<?php
/**
 * The template for displaying search results pages
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header("inner"); ?>

<section class="banner-inner-page">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="headline-section cl-dark"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
            </div>
        </div>
    </div>
</section>
<div class="info-inner-page">
	<div class="container wrap-news">
				<?php if ( have_posts() ) : ?>

					<?php
					// Start the loop.
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

						// End the loop.
					endwhile;

					// Previous/next page navigation.
					the_posts_pagination(
							array(
									'prev_text'          => __( 'Previous page', 'twentysixteen' ),
									'next_text'          => __( 'Next page', 'twentysixteen' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
							)
					);

				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>

		</div>
	</div>

<?php get_footer(); ?>
