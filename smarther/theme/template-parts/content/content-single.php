<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package smarther
 */
$top_space = get_field('add_top_spacing');
?>
<div class="single-content <?php if($top_space): ?>pt-[132px] lg:pt-[135px] xl:pt-[169px]<?php endif; ?>">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="content-section max-w-full relative bg-neutral padding-medium"> 
		<div class="container mx-auto">     
		<div class="w-full  mx-auto lg:max-w-[60%]"> 
		<div class="flex flex-col ">
			<div class="w-full"> 
				<?php if( has_post_thumbnail() ) : ?>
					<div class="post-thumbnail mb-4 lg:mb-8" data-aos="fade-in">
						<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-auto object-cover object-center h-[20em] md:h-[30em] lg:h-[280px] 2xl:h-[365px] rounded-[10px]' ) ); ?>
					</div>
				<?php endif; ?>
				<div class="eyebrow text-quaternary mb-[20px]">
					<?php echo get_the_date(); ?>
				</div>
				<h2 class="text-foreground mb-0" >
					<?php the_title(); ?>
				</h2> 
				<div class="text-foreground style-disc mt-[15px]" data-aos="fade-in" >                 
					<?php the_content(); ?>                   
				</div>                
			</div>    
			</div>  
			</div> 
		</div>   
</section>
</article><!-- #post-${ID} -->
</div>
