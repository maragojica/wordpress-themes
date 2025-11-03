<?php
/**
 * Template part for displaying post archives and search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sphinx
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("w-full flex flex-col lg:flex-row items-stretch mb-[60px] group bg-white news-item"); ?>>
		<?php
		// Get current post data
		$post_id = get_the_ID();
		$title = get_the_title($post_id);
		$permalink = get_permalink($post_id);
		$featured_image = get_the_post_thumbnail_url($post_id, 'large');
		$bg_content = get_field('bg_content', $post_id);
		?>

		<?php if ($featured_image): ?>
			<div class="w-full lg:w-[55%]">
				<a href="<?php echo esc_url($permalink); ?>" aria-label="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" tabindex="0" class="block w-full lg:h-full md:h-[30em] h-[20em] bg-cover bg-no-repeat bg-center transition-opacity hover:opacity-90" style="background-image: url('<?php echo esc_url($featured_image); ?>');"></a>
			</div>
		<?php endif; ?>

		<div class="w-full h-full lg:w-[45%] p-[2.5rem] lg:pl-[77px] lg:py-[52px] lg:pr-[46px] flex flex-col justify-center items-start text-left" data-aos="fade-up" <?php if ($bg_content): ?> style="background-color: <?php echo esc_attr($bg_content); ?>;" <?php endif; ?>>
			<h3 class="text-foreground mb-[18px]" data-aos="fade-up">
				<a href="<?php echo esc_url($permalink); ?>" class="text-foreground group-hover:text-primary" aria-label="<?php echo esc_attr($title); ?>" title="<?php echo esc_attr($title); ?>" tabindex="0">
					<?php echo esc_html($title); ?>
				</a>
			</h3>
			
			<?php 
			// Get excerpt if available
			$excerpt = get_the_excerpt($post_id);
			if (!$excerpt) {
				$excerpt = get_field('excerpt_content', $post_id);
			}
			if (!$excerpt) {
				$content = get_post_field('post_content', $post_id);
				$excerpt = wp_trim_words(strip_shortcodes(wp_strip_all_tags($content)), 40, '...');
			}
			if ($excerpt): 
			?>
				<div class="text-foreground style-disc mb-[23px]" data-aos="fade-up">                 
			<?php echo wp_kses_post($excerpt); ?>                   
		</div>
	<?php endif; ?>
	
	<a href="<?php echo esc_url($permalink); ?>" class="btn w-fit btn_fill_action" aria-label="View full update" title="View full update" tabindex="0">
		View full update
	</a>
</div>
</article>
