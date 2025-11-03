<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sphinx
 */

?>

<footer id="colophon" class="site-footer lg:pt-[38px] lg:pb-[46px] pt-[3em] pb-[3em] border-t-[1px] border-t-[#F1F1F1] relative z-[1]" role="contentinfo">
	<div class="w-full flex justify-end items-center">
		<?php $footer_cta = get_field('footer_cta', 'option');
			if ($footer_cta) :
				$url = $footer_cta['url'];
				$title = $footer_cta['title'];
				$target = $footer_cta['target'] ? $footer_cta['target'] : '_self'; ?>
				<div class="flex justify-end items-center">
				<a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>"  class="btn btn_large w-full btn_fill_action flex items-center justify-center  rounded-tr-none rounded-br-none"
					aria-label="<?php echo esc_attr($title); ?>"
					title="<?php echo esc_attr($title); ?>">
				<?php echo esc_html( $title ); ?>					
				</a>
			</div>
			<?php endif; ?> 
    </div>
</footer><!-- #colophon -->
