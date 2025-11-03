<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Charity_Charge
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>
			<section class="default-section position-relative bg-blue-darker">
			<div class="top-section padding-large">
				<div class="container">
					<div class="row align-items-center justify-content-center text-center g-5">
						<div class="col-12 col-md-7">	
							<h1 class="color-white subheadline" data-aos="fade-up">
								<?php
								the_archive_title();
								?>
							</h1>			
							<div class="color-white content-text mt-3">			
		                   <?php the_archive_description(); ?>
						   </div>															
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="info-section position-relative bg-accent  padding-medium ">
			<div class="container">
              <div id="posts-container" class="row justify-content-start post-content">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/contents/content', 'search' );

			endwhile;?>
			<div class="col-12">
				<div class="d-flex flex-column flex-lg-row flex-wrap gap-3 mt-lg-5 mt-4 justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="50">
					<div class="relative group">
						<a href="" tabindex="0" target="_self" aria-label="Load More" title="Load More" class="load-more-post button primary w-100 w-lg-auto medium">
							Load More
						</a>
					</div>								
				</div>					
			</div>

		<?php else :

			get_template_part( 'template-parts/contents/content', 'none' );

		endif;
		?>
			  </div>
			</div>  
		</section>
	</main><!-- #main -->

<?php

get_footer();
