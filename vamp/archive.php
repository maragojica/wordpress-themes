<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

get_header("inner");
?>

	<main id="primary" class="site-main">
		<section class="section-internal-hero bg-blue mb-0 p-0">
        <div class="container banner-container w-100">
            <div class="row flex center-xs middle-xs">               
                <div class="col-xs-12 col-lg-12 w-100 h-100 text-center">
                    <h1 class="mt-0 mb-0 cl-white animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s"><?php echo the_archive_title(); ?></h1>                 
               </div> 
            </div> 
        </div>
        </section>          
		<div class="container p-b5">
			<div class="row">
				<div class="col-xs-12 col-lg-12">
					<?php if ( have_posts() ) : ?>			

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>

					<div class="text-column-inner">
						<h2 class="mb-30 cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s"><?php echo the_title();?></h2>

						<div class="dp-1 mt-0 cl-dark animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">
							<?php echo the_excerpt(); ?>
						</div>
						
						<div class="button-list m-t2 start-xs">                                                                                          
							<a tabindex="0" href="<?php the_permalink(); ?>" target="_self" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>">
								<button class="button cta-btn mt-08 bg-black cl-white bg-blue-h animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">Read More</button> 
							</a>    
                       </div>
					</div>

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
				</div>
			</div>
		</div>

	</main><!-- #main -->

<?php

get_footer();
