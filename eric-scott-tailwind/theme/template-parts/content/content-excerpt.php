<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Eric_Scott
 */

?>
<?php $title = get_the_title(); 
		$id = get_the_id();  ?>            
		<article  id="post-<?php the_ID(); ?>" <?php post_class("px-3 mb-4 w-full md:w-1/2 lg:w-1/3 blog-item content-post"); ?> >
		<div class="flex flex-col h-full justify-between w-full p-[20px] lg:p-[40px] rounded-[6px] shadow-[0px_4px_14px_2px_rgba(12,35,64,0.09)]" >
			<div class="flex-wrap mb-[20px]">
				<div class="text-primary subtext mb-[5px]"><?php the_time('F j, Y'); ?></div>
				<?php if($title): ?>
					<h3 class="text-secondary mb-[20px]"><?php echo $title; ?></h3>
				<?php endif; ?>   
				<?php  if ( has_excerpt() ) {
						$excerpt = get_the_excerpt(); 
						$excerpt_length = 15;
						$excerpt = get_the_excerpt();
						$trimmed_excerpt = wp_trim_words($excerpt, $excerpt_length); ?>
					<div class="text-secondary style-disc">
						<?php echo wp_kses_post($trimmed_excerpt); ?>
					</div>
				<?php } ?>  
			</div>
		
			<a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="max-w-max sm btn btn_primary_navy">
				Read more
			</a>                                                  
		
		</div>

</article><!-- #post-${ID} -->
