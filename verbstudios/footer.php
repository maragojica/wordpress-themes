<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Construction_Metal_Products
 */

?>

	<footer id="colophon" class="site-footer">
	<div class="container">			
				
				 <div class="row">
				 <div class="col-xs-12 col-lg-3 col-logo wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">		
					<?php
					$logo = get_field('branding', 'option')['footer_logo'];
					if ($logo) {
						$logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) {
							if ($logo_mime_type == 'image/svg+xml') {
								echo file_get_contents($logo_url);
							} else { ?>								
								<a class="link-logo" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
									<img class="logo-footer" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="331" height="191"/>
								</a>								
							<?php }
						}
					} ?>
				</div>
					<div class="col-xs-12 col-lg-3 col-menu wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
					<?php if (get_field('title_footer_menu', 'option')) { ?>
						<div class="title-footer cl-black text-uppercase"><?php echo the_field('title_footer_menu', 'option');?></div>
				    <?php } ?>		
						<?php
						if (get_field('footer_menu', 'option')) {	?>
								<?php 				
								wp_nav_menu(array(
									'menu' => get_sub_field('footer_menu', 'option'),
									'theme_location' => 'footer-1',
									'menu_id' => 'footer-menu',
								));	?> 
						<?php 
						} ?>
					</div>	
					<div class="col-xs-12 col-lg-3 col-menu col-contact wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
					<?php if (get_field('title_footer_contact', 'option')) { ?>
						<div class="title-footer cl-black text-uppercase"><?php echo the_field('title_footer_contact', 'option');?></div>
				    <?php } ?>		
					<?php if (get_field('footer_contact', 'option')) { ?>
						<div class="text-footer"><?php echo the_field('footer_contact', 'option');?></div>
				    <?php } ?>
						<?php
						if (have_rows('social_networks', 'option')) { 	?>
								<div class="social-icons flex gap-1 flex-row">
									<?php								
										while (have_rows('social_networks', 'option')) {
											the_row(); ?>
											<?php $icon = get_sub_field('svg_code_social');
											$link = get_sub_field('url');
											if( $link ):
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self'; ?>
												<a tabindex="0" class="social-icon" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
													<?php if($icon): echo $icon; endif; ?>
												</a>
											<?php endif; ?>
									<?php 
									} ?>
								</div>
						<?php 
						}  ?>
					</div>	
					<div class="col-xs-12 col-lg-3 col-newsletter wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.2s">
					<?php if (get_field('title_site_info', 'option')) { ?>
						<div class="title-footer cl-black text-uppercase">						    
							<?php echo the_field('title_site_info', 'option');?>
						</div>
				    <?php } ?>	
					<?php if (get_field('footer_copyright', 'option')) { ?>
						<div class="copyright-info cl-black"><p>&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p></div>	
				    <?php } ?>	
				
					</div>				
				 </div>
				</div>
					
		</div>	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
