<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spangler_Restoration
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php if ( have_posts() ) : ?>
			<section class="default-content-section max-w-full h-[20em] lg:h-[25em] xl:h-[600px] relative bg-cover bg-fixed bg-center bg-no-repeat">
				<div class="overlay flex flex-col h-full w-full justify-end items-start bg-[#00194C] text-left absolute z-[2] top-0 left-0 padding-small  lg:pt-0 pt-0-important">
					<div class="container mx-auto"> 
							<div class="relative">		
							<h1 class="text-white uppercase" data-aos="fade-up" data-aos-offset="200" data-aos-delay="40">			
								<?php the_archive_title();?> 
								</h1>
							</div> 
						</div>
					</div>
			</section>
			<section class="news-section padding-medium">
				<div class="container mx-auto">
					<div class="flex flex-col md:flex-row flex-wrap mx-auto md:mx-[-15px]">   
						<?php
						// Start the Loop.
						while ( have_posts() ) :
							the_post(); ?>
							
							<?php get_template_part( 'template-parts/content/content', 'excerpt' ); ?>

						<?php	// End the loop.
						endwhile; ?>	 
					</div>
					<div id="blockMoreBlogs" class="relative text-center mt-12">
						<a href="#" tabindex="0" target="_self" aria-label="Load More" title="Load More" id="seeMoreBlogs" class="btn btn_secondary max-w-fit mx-auto">
							Load More
						</a>                      
					</div>
			</div>
		</section>
		<?php	else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

			endif;
			?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
