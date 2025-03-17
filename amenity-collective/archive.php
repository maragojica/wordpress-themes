<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Collective
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php if ( have_posts() ) : ?>
			<section class="hero-section max-w-full h-[9em] sm:h-[25em] lg:h-[451px] relative border-b-[12px] border-b-secondary bg-cover bg-center bg-no-repeat" >
  
				<div class="overlay text-center flex flex-col items-center h-full w-full justify-center absolute z-[2] top-0 left-0 px-0 bg-primary">
				<div class="container mx-auto"> 	
						<div class="text-center flex justify-center mb-[11px] sm:mb-[18px] mx-auto sm:max-w-fit max-w-[30px] animate__animated" data-animation="fadeIn" data-duration="1.1s">
							<svg xmlns="http://www.w3.org/2000/svg" width="50" height="24" viewBox="0 0 50 24" fill="none">
							<path d="M0.987061 0C0.987061 13.2539 11.7389 24 25 24C38.2611 24 49.0129 13.2539 49.0129 0" fill="white"/>
							</svg>
						</div>
						<h1 class="text-white mb-0 capitalize animate__animated" data-animation="fadeIn" data-duration="1.2s">
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
