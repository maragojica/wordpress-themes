<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Eric_Scott
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				
			</header><!-- .page-header -->
			<section class="default-content-section max-w-full h-[20em] lg:h-[25em] xl:h-[600px] relative bg-cover bg-fixed bg-center bg-no-repeat">
	<div class="overlay flex flex-col h-full w-full justify-end items-start bg-secondary text-left absolute z-[2] top-0 left-0 padding-medium  lg:pt-0 pt-0-important">
		<div class="container mx-auto"> 
				<div class="relative">
				 				   <?php
				printf(
					/* translators: 1: search result title. 2: search term. */
					'<h1 class="text-primary">%1$s <span>%2$s</span></h1>',
					esc_html__( 'Search results for:', 'eric-scott-tailwind' ),
					get_search_query()
				);
				?>
		        </div> 
			</div>
		</div>
			<div class="w-full absolute left-0 -bottom-[3px] z-3">
			<div class="line-border"></div>
			<div class="line-divider mt-[11px]"></div>        
		</div>
</section>

<section class="content-post-section max-w-full relative padding-small">
		<div class="container mx-auto"> 
		   <div class="blog blog-items flex flex-col sm:flex-row flex-wrap -mx-3 mt-[32px]">

			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content/content', 'excerpt' );

				// End the loop.
			endwhile; ?>
			</div>
        <?php
			// Previous/next page navigation.
			eric_scott_tailwind_the_posts_navigation();

		else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		 </div>
		 </section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
