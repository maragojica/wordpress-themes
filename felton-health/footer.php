<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Felton_Health
 */

?>

	<footer id="colophon" class="site-footer bg-navy">
	<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center">		
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
									<img class="logo-footer wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="280" height="21"/>
								</a>
							<?php }
						}
					} ?>
				</div>
			</div>			
			<div class="row">
				<div class="col-xs-12 col-footer wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">				
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
			</div>		
			
			<div class="row">
				<div class="col-xs-12 wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s">				
					<div class="footer-contact flex gap-1 flex-row center-xs middle-xs text-center">
						<?php if(get_field('footer_email', 'option')): ?>
							<?php $link = get_field('footer_email', 'option');
								if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self'; ?>
									<a tabindex="0" class="contact-link text-uppercase" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
									    <?php echo esc_html( $link_title ); ?>
									</a>
								<?php endif; ?>
						<?php endif; ?>	
						<?php if(get_field('footer_phone', 'option')): ?>
							<span class="v-divider cl-white hide-lg">|</span>
							<?php $link = get_field('footer_phone', 'option');
								if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self'; ?>
									<a tabindex="0" class="contact-link" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
									    <?php echo esc_html( $link_title ); ?>
									</a>
								<?php endif; ?>
								<span class="v-divider cl-white hide-lg">|</span>
						<?php endif; ?>	
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
				</div>
			</div>	
			<?php if (get_field('footer_copyright', 'option')) { ?>
				<div class="row middle-xs">
					<div class="col-xs-12 text-center">
						<div class="copyright-info cl-black wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.5s"><p>&#169; <?php echo date_i18n( 'Y' ).' '.get_bloginfo( 'name' ).' '.get_field('footer_copyright', 'option'); ?></p></div>	
					</div>	
				</div>	
			<?php } ?>					
				
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
