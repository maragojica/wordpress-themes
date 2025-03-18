<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Vamp
 */

get_header("inner");
?>

	<main id="primary" class="site-main">
 
		<?php if ( have_posts() ) : ?>

			<section class="section-internal-hero bg-blue mb-0 p-0">
        <div class="container banner-container w-100">
            <div class="row flex center-xs middle-xs">               
                <div class="col-xs-12 col-lg-12 w-100 h-100 text-center">
                    <h1 class="mt-0 mb-0 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s">
						<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'vamp' ), '<span>' . get_search_query() . '</span>' );
					?>
					</h1>                 
               </div> 
            </div> 
        </div>
        </section> 
<div class="container p-b5">
			<div class="row">
				<div class="col-xs-12 col-lg-12">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
</div>
			</div>
		</div>
	</main><!-- #main -->

<?php

get_footer();
