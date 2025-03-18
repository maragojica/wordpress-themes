<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="page-post-banner p-t0 p-b0 bg-sage">   
			<div class="container">
				<div class="row middle-xs justify-center">
					<div class="col-xs-12 col-lg-7 col-xl-6">
					<div class="w-100 text-lg-center wow fadeIn" data-wow-duration="0.3s" data-wow-delay="0.1s"> 
							<h1 class="cl-white mt-0 mb-10px wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s"><?php the_archive_title( );?></h1>  
						</div>
					</div>
				</div>                                    
				</div>           
		</section> 
			<?php if ( have_posts() ) : ?>
		<section class="section-blog p-b0">
			<div class="container"> 
			<div class="row row-news">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					
					get_template_part( 'template-parts/contents/content', 'blog' );

				endwhile;	
			?>
			</div>
			</div>
	   </section>
	   <?php else :

		get_template_part( 'template-parts/contents/content', 'none' );

		endif; ?>

	</main><!-- #main -->

<?php
get_footer();
