<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Construction_Metal_Products
 */

get_header();
$img = get_field('search_bg_image', 'option');
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) { ?>
			<section class="page-general-hero flex p-t0 p-b0" style="background: url(<?php echo esc_url($img['url']); ?>)"> 
				<div class="overlay flex align-items-center"> 
					<div class="container">
						<div class="row middle-xs justify-center">
							<div class="col-xs-12 col-lg-9 col-xl-7">
							<div class="w-100 text-center wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s">  
									<?php
									the_archive_title( '<h2 class="cl-white mt-0 mb-10px text-uppercase">', '</h2>' );
									the_archive_description( '<div class="dp-1 cl-white">', '</div>' );
									?>                                                      
																
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
