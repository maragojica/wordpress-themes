<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nordic_IT
 */

get_header();
?>

	<section id="primary">
		<main id="main" class="2xl:pt-[185px] pt-[105px]">

		<?php if ( have_posts() ) : ?>
			<section class="excerpt-section max-w-full relative lg:pt-[60px] pb-[3em] lg:pb-[160px]">
    <div class="container mx-auto">           
        <div class="w-full flex justify-center animate__animated" data-animation="fadeIn" data-duration="1.5s">     
            <div class="w-full xl:w-8/12"> 
				<h3 class="text-primary mb-[10px]">
					Read More
				</h3>                          
                <div class="w-full relative">                   
					<h2 class="text-secondary-dark mb-[20px] z-[2] relative w-fit pr-4 sm:pr-8 bg-accent">
					<?php printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="page-title">%1$s <span>%2$s</span></h1>',
					esc_html__( 'Search results for:', 'nordic-it' ),
					get_search_query() ); ?>
					</h2>
                   
                </div>               
                </div>
            </div>     
            <div class="w-full flex justify-center">
            <div class="w-full xl:w-8/12">            
                <div class="flex flex-col sm:flex-row flex-wrap -mx-3 mt-[2em] lg:mt-[40px]">   			
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile;	?>
			  </div>       
               
                
		<div id="blockMoreArchive" class="relative text-center mt-8">
				<a href="#" tabindex="0" target="_self" aria-label="Load More" title="Load More" id="seeMoreArchive" class="min-w-full sm:min-w-min btn btn_style3 relative z-[2]">
					Load More  
				</a>
			 <div class="w-full h-[4px] bg-primary absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 z-[1] visible"></div> 
		</div>
	   
	</div> 
	</div>  
</div>		

		<?php else :

			// If no content is found, get the `content-none` template part.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
