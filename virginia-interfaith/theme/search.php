<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Virginia_Interfaith
 */

get_header();
?>

	<section id="primary" class="pt-[121px] xl:pt-[158px]">
	<?php if ( have_posts() ) : ?>
		<section class="info-text-section max-w-full relative bg-accent padding-medium">
			<div class="container mx-auto">
				<div class="flex flex-col">
					<div class="w-full text-center">
						<?php
							printf(
								/* translators: 1: search result title. 2: search term. */
								'<h1 class="text-foreground mb-0 heading-shape">%1$s <span>%2$s</span></h1>',
								esc_html__( 'Search results for:', 'smarther' ),
								get_search_query()
							);
						?>
					</div>
				</div>
			</div>
		</section>
		<main id="main" class="search-results-section max-w-full relative padding-medium bg-neutral">
			<div class="container mx-auto">
				<div class="w-full">
					<div id="posts-container" class="post-content relative z-[2] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 md:gap-x-[50px] gap-y-8 lg:gap-y-[80px] grid-tools" data-aos="fade-up">
						<?php
						// Start the Loop.
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content/content', 'search' );
						endwhile;
						?>
					</div>
					<div class="w-full">						

						 <div class="flex items-center gap-4 lg:gap-8 gap-2 mt-[40px] justify-end" data-aos="fade-up">
								<div class="flex-1 h-[3px] bg-primary h-line sm:inline hidden"></div>
								<div class="button-container-wrap flex lg:flex-row flex-col gap-[20px] sm:w-fit w-full">
								<div class="relative group sm:w-fit w-full">
										<a href="" tabindex="0" target="_self" aria-label="Load More" title="Load More" class="load-more-news btn sm:w-fit w-full btn_fill_light">
											Load More                           
										</a> 
								</div>     
								</div>        
						</div>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	<?php else :
		// If no content is found, get the `content-none` template part.
		get_template_part( 'template-parts/content/content', 'none' );
	endif; ?>
</section><!-- #primary -->
<?php include get_template_directory() . '/template-parts/global/global-get-involved.php'; ?>
<?php
get_footer();
