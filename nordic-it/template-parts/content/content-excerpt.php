<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nordic_IT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("w-full px-3 mb-4 lg:w-1/3 content-archive block hidden animate__animated"); ?> data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">        
                      
		<div class="flex flex-col h-full relative justify-between p-[28px] rounded-[12px] border-4 border-solid" style="border-color: #8B9589">                            
			<div class="flex-wrap">
			<h3 class="text-primary mb-[10px]"><?php the_time('M j, Y'); ?></h3>
				<?php if($title): ?>
					<div class="text-heading font-secondary-font uppercase mb-3 text-secondary-dark"><?php echo $title; ?></div>
				<?php endif; ?>  
			<?php  if ( has_excerpt() ) {
					$excerpt = get_the_excerpt(); 
					$excerpt_length = 17;
					$excerpt = get_the_excerpt();
					$trimmed_excerpt = wp_trim_words($excerpt, $excerpt_length); ?>
					<div class="font-text-font bodysmall text-primary"><?php echo wp_kses_post($trimmed_excerpt); ?></div>
				<?php } ?>
			</div>                     
			<a href="<?php the_permalink(); ?>" tabindex="0" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="mt-[32px] group flex items-center justify-start gap-[12px] text-subheading font-secondary-font uppercase text-secondary-dark hover:text-secondary-dark">
				Read More
				<div class="relative">
					<svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-[1] origin-left scale-100 group-hover:opacity-0 group-hover:scale-0" xmlns="http://www.w3.org/2000/svg" width="27" height="16" viewBox="0 0 27 16" fill="none">
						<path d="M0 8H24" stroke="#324249" stroke-width="3"/>
						<path d="M18 2L24 8L18 14" stroke="#324249" stroke-width="3"/>
					</svg>
					<svg class="absolute top-1/2 left-0 transform -translate-x-0 -translate-y-1/2 transition-all duration-300 opacity-0 origin-left scale-0 group-hover:opacity-[1] group-hover:scale-100" xmlns="http://www.w3.org/2000/svg" width="39" height="16" viewBox="0 0 39 16" fill="none">
					<path d="M0 8H36" stroke="#324249" stroke-width="3"/>
					<path d="M30 2L36 8L30 14" stroke="#324249" stroke-width="3"/>
					</svg>
				</div>
			</a>  
		</div>
</article><!-- #post-${ID} -->
