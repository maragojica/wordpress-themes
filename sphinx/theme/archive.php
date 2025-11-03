<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sphinx
 */

get_header();
$bg_image_overlay = get_field('news_press_bg_image', 'option');
?>

	<section id="primary">
		<main id="main">
		<?php if ( have_posts() ) : ?>
		  <section class="entry-content-single max-w-full relative bg-foreground overflow-hidden relative z-[1]">		 
			  <div class="w-full h-full padding-large  lg:pt-0 pt-0-important">			
				<?php if(!empty($bg_image_overlay)): ?>
					<div class="top-background bg-cover bg-no-repeat bg-top w-full pt-[4em] lg:pt-[100px] lg:pb-[100px] pb-[4em] relative z-[1]" style="background-image: url('<?php echo esc_url($bg_image_overlay['url']); ?>');" >
					</div>
					<?php endif; ?>	
					<div class="bottom-gradient bg-gradient-custom-reverse w-full pb-[30px] lg:mt-[-100px] mt-[-4em] relative z-[2] relative overflow-hidden">
						<div class="container mx-auto relative z-[2]" data-aos="fade-in"> 
							<h1 class="text-white text-center mb-0 mt-[20px]">
								<?php the_archive_title(); ?>
							</h1> 
						</div>
					</div>	
					 <div class="container mx-auto" data-aos="fade-in">
					 <div class="w-full lg:mt-[76px] mt-[3em] lg:max-w-[90%] mx-auto">
						<?php
						// Start the Loop.
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/content/content', 'excerpt' );

							// End the loop.
						endwhile;

						// Previous/next page navigation.
						sphinx_the_posts_navigation();

					else :

						// If no content, include the "No posts found" template.
						get_template_part( 'template-parts/content/content', 'none' );

					endif;
					?>
				     </div>	
					 <div class="lg:max-w-[90%] mx-auto">
                    <div class="flex items-center gap-4 lg:gap-8 gap-2 lg:gap-8 mt-[60px] justify-end" data-aos="fade-up">
                         <!-- Horizontal Line -->
                        <div class="flex-1 h-[1px] bg-primary h-line"></div>
                        <div class="relative group flex-shrink-0">
                                <a href="" tabindex="0" target="_self" aria-label="Load More" title="Load More" class="load-more-news btn w-fit btn_outline_action">
                                    Load More                           
                                </a> 
                        </div>            
                    </div>
                    </div>	
					  </div>	
		     </div>
    	   </section>			
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer(); ?>
