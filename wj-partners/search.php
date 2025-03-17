<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WJ_Partners
 */

get_header();
?>

<main id="primary" class="site-main">
		<?php if ( have_posts() ) { ?>

		<section class="page-internal-hero flex p-t0 p-b0 bg-navy" > 
		<div class="overlay flex align-items-center"> 
			<div class="container">
				<div class="row middle-xs justify-center">
					<div class="col-xs-12 col-lg-9 col-xl-7">
					<div class="w-100 text-center wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s">                                
							<h2 class="cl-white mt-0 mb-10px text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Search Results for: %s', 'construction-metal-products' ), '<span>' . get_search_query() . '</span>' );
							?>
							</h2>                                                          
														
						</div>                                                              
						</div>
					</div>
				</div>                                    
			</div>
		</div>
        </section> 
		<section class="content-results">
			   <div class="container">
				<div class="blog row m-t2 blog-items">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();?> 
				
				<?php get_template_part( 'template-parts/contents/content', 'search' ); ?>		
			   
			<?php endwhile;		?>
			</div>	
			</div>
				<section>		

	    <?php }else{

			get_template_part( 'template-parts/contents/content', 'none' );

		}
		?>

	</main><!-- #main -->
<?php

get_footer();
