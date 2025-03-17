<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CR_Jackson
 */

?>

	<footer id="colophon" class="site-footer">
	    <div class="container">
			<div class="row-footer">
				<div class="col-footer-l">		
					<?php
					$logo = get_field('branding', 'option')['footer_logo'];
					if ($logo) {
						$logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) {
							if ($logo_mime_type == 'image/svg+xml') {
								echo file_get_contents($logo_url);
							} else { ?>								
								<a class="link-logo wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
									<img class="logo-footer wow fadeInUp" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="172" height="115"/>
								</a>								
							<?php }
						}
					} ?>
				</div>
				<div class="line-logo"></div>
				<div class="col-footer-r">
				 <div class="row">
					<div class="col-xs-12 col-menu wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s">
						<?php
						if (get_field('footer_menu', 'option')) {	?>
								<?php 				
								wp_nav_menu(array(
									'menu' => get_sub_field('footer_menu', 'option'),
									'theme_location' => 'footer',
									'menu_id' => 'footer-menu',
								));	?> 
						<?php 
						} ?>
					</div>					
					<div class="col-xs-12 col-bottom-r text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
					<?php
						if (get_field('title_logos_footer', 'option')) { ?>
						<div class="title-logos-footer text-uppercase"><?php echo the_field('title_logos_footer', 'option');?></div>
				    <?php } ?>		
					<?php
					if (have_rows('footer_logos', 'option')) { ?>
					<div class="list-logos-footer">
					<?php	while (have_rows('footer_logos', 'option')) {
							the_row(); 
							$logo = get_sub_field('logo'); 
							$link = get_sub_field('link'); ?>
							 <?php if ( !empty($logo)) : ?>   
								<?php if( $link ):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self'; ?>  
								<a class="link-loo-partners" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">  <?php endif; ?>            
                                <img class="footer-logo-partners" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="37" width="51"/>    
								<?php if( $link ): ?>
								</a>
								<?php endif; ?>                        
                            <?php endif; ?> 
							<?php } ?>
						</div>		
					<?php } ?>								
					</div>						
				 </div>
				</div>
			</div>
			<div class="row-footer-bottom text-center">
			<?php
					if (have_rows('footer_copyright', 'option')) {
						while (have_rows('footer_copyright', 'option')) {
							the_row(); ?>
								<div class="copyright-info"><p>&#169; <?php echo date_i18n( 'Y' ).' '.get_sub_field('made_with_love', 'option'); ?></p></div>		
						<?php }
					 } ?>	
			</div>
		</div>	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
