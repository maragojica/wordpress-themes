<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>		
	<section class="page-general-hero flex p-t0 p-b0 bg-black"> 
			 <div class="overlay flex align-items-center" style="background-color: rgba(0, 0, 0, 0.30);"> 
				 <div class="container">
					 <div class="row middle-xs justify-center">
						 <div class="col-xs-12 col-lg-9 col-xl-7">
						 <div class="w-100 text-center wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s"> 											
								<?php the_archive_title( '<h1 class="cl-white mt-0 mb-10px text-uppercase">', '</h1>' ); 
								the_archive_description( '<div class="dp-1 cl-white">', '</div>' );?>
							</div>                                                              
							 </div>
						 </div>
					 </div>                                    
				 </div>
			 </div>
	 </section> 
	 <section class="page-content small"> 
			<div class="container">
				<div class="row row-archive">
						<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/contents/content', 'posts' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/contents/content', 'none' );

				endif;
				?>
				</div>
			</div>
     </section>
	</main><!-- #main -->

<?php
get_footer();
