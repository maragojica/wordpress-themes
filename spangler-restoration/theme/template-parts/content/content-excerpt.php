<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Spangler_Restoration
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("w-full md:w-1/3 lg:w-1/3 md:px-[15px] group md:mt-[60px] mt-[2em] content-blogs block hidden"); ?> data-aos="fade-up" data-aos-offset="200" data-aos-delay="30">
<?php $title = get_the_title(); 
$id = get_the_id(); 
if (has_excerpt()) {
	$excerpt = get_the_excerpt();
} else {
	$content = get_the_content();
	$excerpt = get_custom_excerpt($content, 20);
}  ?>  	
		<div class="flex flex-col h-full">			
			<?php if (has_post_thumbnail()) : ?>		
				<a class="relative overflow-hidden" href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" >						  
				<?php the_post_thumbnail('full', array('class' => 'w-full h-[15em] md:h-[22em] lg:h-[300px] w-full object-cover object-center hover:scale-110 group-hover:scale-110 transition-transform duration-300')); ?>	
				</a>			
			<?php endif; ?>
			<div class="flex justify-start flex-grow flex-wrap flex-col transition-all ease-in-out duration-300 bg-[#F7F7F7] pt-[25px] pb-[35px] px-[30px]">
				<div class="flex-grow">
				<div class="text-[#0066CA] text-sub mb-[10px] uppercase"><?php the_time('F j, Y'); ?></div>
				<?php if($title): ?>
					<h3 class="text-primary title-case w-full"><a class="text-primary hover:text-secondary group-hover:text-secondary" href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo $title; ?>" title="<?php echo $title; ?>" ><?php echo $title; ?></a></h3>
				<?php endif; ?>
				<?php if($excerpt ): ?>
					<div class="text-[#00194C] style-disc" >                 
						<?php echo $excerpt ; ?>                   
					</div>
					<?php endif; ?> 
				</div>                               
				<div class="flex flex-wrap gap-4 mt-[30px]">                               
				<div class="relative group">
				<a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="simple-link">
						Read More
				</a> 
				</div>  
			</div> 
			</div>  
		</div>
</article><!-- #post-${ID} -->
