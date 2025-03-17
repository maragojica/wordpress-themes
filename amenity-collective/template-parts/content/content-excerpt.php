<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Collective
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("'w-full px-3 mt-6 lg:mb-0 lg:w-1/3 group"); ?>>
   <?php  $title = get_the_title(); 
                        $id = get_the_id(); 
                        $publication_name = get_field('publication_name', $id); ?>
	
	<div class="flex flex-col h-full">
                           
			<?php if (has_post_thumbnail()) : ?>		
				<a class="relative overflow-hidden" href="<?php the_permalink(); ?>" tabindex="0"  >						  
				<?php the_post_thumbnail('full', array('class' => 'w-full h-[11em] md:h-[400px] lg:h-[305px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300')); ?>	
				</a>			
			<?php endif; ?>
			<div class="flex flex-grow justify-start flex-wrap flex-col p-[30px] xl:p-[48px] bg-blueinfo-dark group-hover:bg-primary transition-all ease-in-out duration-300">
				<?php if($publication_name): ?>
					<div class="text-tertiary-dark uppercase text-[14px] sm:text-[16px] font-primary-font font-medium tracking-[1.6px] mb-[5px] transition-all ease-in-out duration-300 group-hover:text-tertiary-light"><?php echo $publication_name;?></div>
					<?php endif; ?>   
				<?php if($title): ?>
					<h4 class="text-primary mb-0"><a class="text-primary hover:text-white group-hover:text-white" href="<?php the_permalink(); ?>" tabindex="0"  ><?php echo $title; ?></a></h4>
				<?php endif; ?>  
			</div>                                       
		
	
	</div><!-- .entry-header -->

</article><!-- #post-${ID} -->
