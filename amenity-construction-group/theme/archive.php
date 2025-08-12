<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Construction_Group
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php if ( have_posts() ) : ?>
			<section class="hero-section max-w-full h-[9em] sm:h-[25em] lg:h-[451px] relative border-b-[12px] border-b-secondary bg-cover bg-center bg-no-repeat" >
  				<div class="overlay text-center flex flex-col items-center h-full w-full justify-center absolute z-[2] top-0 left-0 px-0 bg-primary">
				<div class="container mx-auto"> 
						<h1 class="text-white mb-0 capitalize text-center" data-aos="fade-up">
							<?php echo the_archive_title(); ?>
						</h1>
					</div>
			</div>
			</section>
			<section class="content-info-section overflow-hidden max-w-full relative padding-small" >
   
			<div class="container mx-auto">     
				<div class="lg:flex flex-col sm:flex-row flex-wrap justify-center -mx-3 mt-[0.2em]">
					<?php while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/content', 'excerpt' );

					// End the loop.
					endwhile;   ?>        
				</div>  
			</div>
			</section>

			<?php		

		else : 

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
