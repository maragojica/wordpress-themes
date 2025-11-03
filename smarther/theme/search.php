<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package smarther
 */

get_header();
?>

<section id="primary" class="pt-[132px] lg:pt-[135px] xl:pt-[169px]">
	<?php if ( have_posts() ) : ?>
		<section class="info-text-section max-w-full relative bg-white padding-medium">
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
						<div class="flex flex-wrap justify-center gap-3 lg:gap-8 mt-[2em] lg:mt-[80px]" data-aos="fade-up">
							<div class="relative group">
								<a href="" tabindex="0" target="_self" aria-label="Load More" title="Load More" class="load-more-post btn w-fit btn_outline_action">
									Load More
								</a>
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

<?php
get_footer();
?>
