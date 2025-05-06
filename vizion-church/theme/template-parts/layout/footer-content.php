<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vizion_Church
 */

?>
<?php $add_top_footer_space = get_field('add_top_footer_space'); ?>
<footer id="colophon" class="border-t-1 border-tertiary <?php if($add_top_footer_space): ?> lg:mt-[200px] mt-[2em] <?php endif; ?>">
	<div class="w-full px-[1.5rem] lg:px-[70px] xl:px-[75px] 2xl:px-[102px] py-[70px]">
		<div class="footer-top lg:py-[112px] flex items-center lg:items-start flex-col lg:flex-row gap-[2em] lg:gap-[2em] justify-between">
		<?php $footer_contact_text = get_field('footer_contact_text', 'option');
		if($footer_contact_text): ?>
			<div class="text-black footer-contact w-full lg:w-[45%] lg:text-left text-center" data-aos="fade-up" data-aos-offset="100" data-aos-delay="50"><?php echo $footer_contact_text; ?></div>
		<?php endif; ?>
		<div class="footer-logo w-full lg:w-2/3">
        <?php
            $logo = get_field('branding', 'option')['footer_logo'];
            if ($logo) { ?>
            <a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo" data-aos="fade-up" data-aos-offset="100" data-aos-delay="60">
            <?php	$logo_url = $logo['url'];
                $logo_mime_type = $logo['mime_type'];
                if ($logo_url) { ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="logo-footer mx-auto h-auto max-w-[200px] w-fit object-contain object-center skip-lazy"/>						
                    
            <?php } ?>
                </a>
            <?php } ?>   
          </div>
		  <?php  $social_links_footer = get_field('footer_social', 'option'); 
			if ($social_links_footer) { 	?>
					<div class="flex gap-[20px] flex-row items-center w-full lg:w-[40%] lg:justify-end justify-center" data-aos="fade-up" data-aos-offset="100" data-aos-delay="70">
					<?php foreach ($social_links_footer as $column): 
					$icon = $column['svg_code']; 
					$link = $column['link']; ?>
						<?php 
						if( $link ):
							$link_url = $link['url'];
							$link_title = $link['title'];
							$link_target = $link['target'] ? $link['target'] : '_self'; ?>
							<a tabindex="0" class="social-footer transition-all ease-in-out duration-300 translate-y-0 hover:-translate-y-3" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
							<?php if($icon): echo $icon;  endif; ?>     
							</a>
						<?php endif; ?>
						<?php endforeach; ?>  
					</div>
			<?php 
			}  ?>
		</div>
		<div class="footer-bottom w-full pb-[24px] lg:pt-0 pt-[24px]">
			<div class="container mx-auto">
		    <div class="w-full h-[1px] bg-background mb-[24px]"></div>		
			<p class="w-full text-center text-[#B4B9C9] info-text flex flex-col md:inline-block info-copyright" data-aos="fade-up" data-aos-offset="100" data-aos-delay="80">Copyright &#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' ' ?> | All Rights Reserved</p>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->
