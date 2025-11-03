<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Armada_Hoffler_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("post-card flex flex-col h-full justify-between align-items-center"); ?>>
  <div class="event-conten bg-white group pt-[35px] lg:pt-[68px] px-[34px] pb-[35px] lg:pb-[53px] flex flex-col flex-grow rounded-[10px]">  
	<div class="resource-title flex-grow">
		<h4 class="text-foreground mb-0 text-center">
			<?php the_title(); ?>
		</h4>
	</div>
	<div class="flex flex-wrap gap-2 lg:gap-8 mt-[24px] justify-center" data-aos="fade-up">                            
		<div class="relative group">
		<a href="<?php the_permalink(); ?>" tabindex="0"  aria-label="<?php the_title(); ?>" title="<?php the_title(); ?>" class="btn w-fit btn_fill_action">
			View More                                    
		</a> 
	</div>
	</div>                       
</div>
</article><!-- #post-${ID} -->
