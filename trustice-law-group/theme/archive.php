<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Trustice_Law_Group
 */

get_header();
?>

	
	<section id="primary" class="pt-[121px] xl:pt-[158px]">
		<main id="main">

		<?php if ( have_posts() ) : ?>
			
			<section class="internal-hero-section max-w-full relative  overflow-y-visible bg-accent-light padding-large ">  
            
			
				<div class="container mx-auto relative z-2  lg:pb-0 lg:pb-[36px] ">        
				<div class=" flex flex-col lg:flex-row items-center  lg:gap-y-0 gap-y-[3em]">               
					<div class="w-full lg:px-[2rem] text-center">                                        
						<h1 class="text-foreground heading-shape mb-0">
							<span><?php echo the_archive_title();?></span>
						</h1> 
						</div> 
			     </div> 
			</div>
			</section>
<section class="news-section max-w-full relative overflow-hidden padding-large ">
					<div class="container mx-auto relative z-[2]">
				<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 md:gap-x-10 lg:gap-x-12 gap-y-8 lg:gap-y-[80px]" data-aos="fade-up">
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post(); ?>
				
				<?php get_template_part( 'template-parts/content/content', 'excerpt' ); ?>
				
				<?php // End the loop.
			endwhile; ?>
			</div>
				</div>
			</section>

			
		<?php else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
