<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package connecting-elements
 */

get_header();
?>

	<section id="primary">
		<main id="main">

		<?php if ( have_posts() ) { ?>
		
		<section class="hero-default-section max-w-full h-[13em] xl:h-[344px] relative rounded-[0px_0px_50px_50px] bg-primary">    
			<div class="overlay flex flex-col h-full w-full justify-end items-start text-left absolute z-[2] top-0 left-0">
			<div class="w-full mx-auto">  
				<h1 class="text-secondary max-w-fit bg-white rounded-tr-[50px] pt-[35px] lg:pt-[40px] pl-[20px] pr-[1.5em] lg:pr-[80px] -mb-[1px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
				<?php echo get_the_archive_title(); ?>
				</h1>
				</div>
		    </div>
	  	</section>
		  <div id="main-portfolio" class="padding-small flex flex-col sm:flex-row flex-wrap justify-center mt-6 animate__animated" data-animation="fadeBottom" data-duration="1s">   
			<?php
			// Start the Loop.
			while ( have_posts() ) :
				the_post();  $title = get_the_title(); 
				$id = get_the_id(); ?>
				 <div class="sm:px-[10px] 2xl:px-[15px] mb-[20px] xl:mb-[88px] w-full sm:w-1/2 lg:w-1/2 xl:w-1/4 product-item content-product">
					<a class="w-full h-full group cursor-pointer" href="<?php the_permalink();?>">
						<div class="w-full h-[300px] 2xl:h-[372px] 4k:h-[600px] relative overflow-hidden rounded-[0px_50px_0px_50px]" >                            
							<?php if (has_post_thumbnail()) : ?>								  
								<?php the_post_thumbnail('full', array('class' => 'w-full h-full transition-all duration-500 object-cover object-center z-[1] rounded-[0px_50px_0px_50px] hover:scale-110 group-hover:scale-110')); ?>				
							<?php endif; ?> 
							<?php if($title): ?>
								<div class="bg-white text-right rounded-tl-[50px] absolute bottom-0 right-0 z-[2] w-fit -mb-[1px] pl-[30px] 2xl:pl-[43px] pr-[16px] pt-[20px] 2xl:pt-[30px]">
									<?php if($title): ?>
										<div class="text-secondary text-[26px] xl:text-[29px] font-[800] font-primary-font leading-[1]"><?php echo $title;?></div>
									<?php endif; ?>  
								</div>
								<?php endif; ?>   
						</div>
					</a> 
                </div>

			<?php	// End the loop.
			endwhile; ?>
          </div>
		<?php ?>

		<?php }else{

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
