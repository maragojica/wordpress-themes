<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Amenity_Construction_Group
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("w-full px-3 mt-6 lg:mb-0 lg:w-1/3 group"); ?>>
	<?php  $title = get_the_title(); 
		$id = get_the_id(); 
		$publication_name = get_field('publication_name', $id); ?>
		<div class="flex flex-col h-full p-[15px] border-[3px] border-tertiary"> 
				<?php if (has_post_thumbnail()) : ?>			
					<a class="relative overflow-hidden" href="<?php the_permalink(); ?>" tabindex="0"  >						  
					<?php the_post_thumbnail('full', array('class' => 'w-full h-[11em] md:h-[400px] lg:h-[305px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300')); ?>	
					</a>
				<?php endif; ?>
			<div class="flex flex-grow justify-start flex-wrap flex-col py-[35px] px-[15px]  transition-all ease-in-out duration-300">
				<?php if($publication_name): ?>
					<div class="text-quaternary eyebrow mb-[5px] transition-all ease-in-out duration-300"><?php echo $publication_name;?></div>
					<?php endif; ?>   
				<?php if($title): ?>
					<h4 class="text-primary mb-0"><a class="text-primary hover:text-tertiary group-hover:text-tertiary" href="<?php the_permalink($post->ID); ?>" tabindex="0"  aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>"  ><?php echo $title; ?></a></h4>
				<?php endif; ?>  
			</div> 
		</div>
</article><!-- #post-${ID} -->
