<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Virginia_Interfaith
 */

get_header();
?>

	<section id="primary" class="pt-[121px] xl:pt-[158px]">
		<main id="main">

		<?php if ( have_posts() ) : ?>
			
			<section class="internal-hero-section max-w-full relative  overflow-y-visible bg-secondary  padding-large ">  
    
             <div class="absolute right-0 z-1 w-[100%] lg:block hidden wave-bottom dark-blue bottom-[-36px] aos-init aos-animate" data-aos="fade-in">
				<svg style="width: 100%; height: auto;" viewBox="0 0 1440 144" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M1109.03 503.539L1104.34 507.339C1194.09 505.772 1270.49 491.846 1332.46 469.737C1216.73 500.443 1109.03 503.539 1109.03 503.539ZM-32.8469 73.0613C-32.9652 72.9932 -33.0595 72.933 -33.1779 72.8649C-33.1804 72.9011 -33.0738 72.9616 -32.8469 73.0613ZM281.183 109.167C129.738 119.234 -24.8287 76.5379 -32.8469 73.0613C165.509 191.591 593.818 115.023 781.685 61.7008C541.725 81.0455 436.363 98.8504 281.183 109.167ZM803.506 55.287C796.65 57.3747 789.372 59.5173 781.685 61.7008C830.913 57.7328 885.796 53.6988 947.944 49.6521C1584.65 8.19179 1659.65 353.02 1332.46 469.737C1464.32 434.748 1606.62 363.903 1611.88 220.933C1617.48 68.8182 1443.86 5.62643 1234 0.547851C1073.51 -3.33596 879.058 32.2464 803.506 55.287Z" fill="#00589F"></path>
				</svg>
     		   </div>
			
				<div class="container mx-auto relative z-2  lg:pb-0 lg:pb-[36px] ">        
				<div class=" flex flex-col lg:flex-row items-center  lg:gap-y-0 gap-y-[3em]">               
					<div class="w-full lg:px-[2rem] text-center">                                        
						<h1 class="text-white heading-shape mb-0">
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
<?php include get_template_directory() . '/template-parts/global/global-get-involved.php'; ?>
<?php
get_footer();
