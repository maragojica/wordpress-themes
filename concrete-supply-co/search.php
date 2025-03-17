<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Concrete_Supply_Co
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
			<section class="page-hero-default flex bg-lightgray">
                <div class="container h-100 flex flex-column top-xs end-xs text-left">
                    <div class="row">
                       <div class="col-xs-12">
					   		<div class="line"></div>
							<h1 class="cl-blue text-uppercase mt-0 mb-02 animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1s" style="animation-duration: 1s;">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'concrete-supply-co' ), '<span>' . get_search_query() . '</span>' );
							?>
							</h1>
                       </div>  
                    </div>        
                </div> 
       		 </section>   
			<section class="section-search-results">
				<div class="container">								
					<div class="search-results animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s">
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
			</section>
	</main><!-- #main -->
<?php
get_footer();
