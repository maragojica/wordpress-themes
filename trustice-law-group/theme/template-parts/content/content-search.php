<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Virginia_Interfaith
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("post-card flex flex-col h-full justify-between align-items-center"); ?>>
  <div class="h-full flex flex-col justify-center bg-accent-light shadow-cards px-[20px] lg:px-[26px] pt-[25px] lg:pt-[37px] pb-[25px] lg:pb-[39px] items-center text-center relative">  
	<div class="resource-title flex-grow">
		<h4 class="text-foreground mb-0 text-center">
			<?php the_title(); ?>
		</h4>
	</div>
	<div class="flex flex-wrap gap-2 lg:gap-8 mt-[24px] justify-center" data-aos="fade-up">                            
		<div class="relative group">
		<a href="<?php the_permalink(); ?>" tabindex="0"  aria-label="<?php the_title(); ?>" title="<?php the_title(); ?>" class="btn w-fit btn_fill_light">
			View More                                    
		</a> 
	</div>
	</div>   
	                    
</div>
</article><!-- #post-${ID} -->
