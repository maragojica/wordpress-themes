<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Construction_Group
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="hero-section max-w-full h-[9em] sm:h-[25em] lg:h-[451px] relative border-b-[12px] border-b-secondary" >
  
    <div class="overlay text-center flex flex-col items-center h-full w-full justify-center absolute z-[2] top-0 left-0 px-0 bg-primary">
     <div class="container mx-auto">
			<h1 class="text-white mb-0 capitalize" data-aos="fade-up">
				<?php echo the_title(); ?>
			</h1>
         </div>
   </div>
</section>
<section class="content-info-section overflow-hidden max-w-full relative padding-small" >
   
   <div class="container mx-auto">     
	  <div class="flex flex-col items-center justify-center">
		 <div class="w-full lg:w-3/4">
			   <div class="flex flex-col justify-center" data-aos="fade-in">	
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="featured-image-box w-full h-[20em] md:h-[30em] lg:h-[700px] overflow-hidden mx-auto">
						<?php the_post_thumbnail('full', ['class' => 'w-full h-full object-cover object-center']); ?>
					</div>
				<?php endif; ?>
				   <div class="text-accent  mt-8 style-disc" >                 
					   <?php echo the_content(); ?>                   
				   </div> 
			   </div>
		   </div>           
	   </div>  
   </div>
</section>
</article><!-- #post-${ID} -->
