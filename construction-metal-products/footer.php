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

	<footer id="colophon" class="site-footer bg-navy">
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
								<a class="link-logo wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.1s" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
									<img class="logo-footer wow fadeInUp" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="288" height="190"/>
								</a>								
							<?php }
						}
					} ?>
				</div>
				
				<div class="col-footer-r">
				 <div class="row">
					<div class="col-xs-12 col-lg-4 col-menu wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">
					<?php if (get_field('title_footer_menu1', 'option')) { ?>
						<div class="title-footer cl-white text-uppercase"><?php echo the_field('title_footer_menu1', 'option');?></div>
				    <?php } ?>		
						<?php
						if (get_field('footer_menu_1', 'option')) {	?>
								<?php 				
								wp_nav_menu(array(
									'menu' => get_sub_field('footer_menu_1', 'option'),
									'theme_location' => 'footer-1',
									'menu_id' => 'footer-menu',
								));	?> 
						<?php 
						} ?>
					</div>	
					<div class="col-xs-12 col-lg-4 col-menu wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">
					<?php if (get_field('title_footer_menu2', 'option')) { ?>
						<div class="title-footer cl-white text-uppercase"><?php echo the_field('title_footer_menu2', 'option');?></div>
				    <?php } ?>		
						<?php
						if (get_field('footer_menu_2', 'option')) {	?>
								<?php 				
								wp_nav_menu(array(
									'menu' => get_sub_field('footer_menu_2', 'option'),
									'theme_location' => 'footer-2',
									'menu_id' => 'footer-menu',
								));	?> 
						<?php 
						} ?>
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
					<div class="col-xs-12 col-lg-4 col-newsletter ps-xl-3 wow fadeInUp" data-wow-duration="0.3s" data-wow-delay="0.2s">
					<?php if (get_field('title_newsletter', 'option')) { ?>
						<div class="title-footer cl-white text-uppercase"><?php echo the_field('title_newsletter', 'option');?></div>
				    <?php } ?>	
					<?php if (get_field('shortcode_newsletter', 'option')) { ?>
						<div class="box-newsletter"><?php echo the_field('shortcode_newsletter', 'option');?></div>
				    <?php } ?>		
					<?php
					if (have_rows('footer_logos', 'option')) { ?>
					<div class="list-logos-footer first-row">
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
                                <img class="footer-logo-partners" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="81" width="145"/>    
								<?php if( $link ): ?>
								</a>
								<?php endif; ?>                        
                            <?php endif; ?> 
							<?php } ?>
						</div>		
					<?php } ?>	
					<?php
					if (have_rows('footer_logos_second_row', 'option')) { ?>
					<div class="list-logos-footer second-row">
					<?php	while (have_rows('footer_logos_second_row', 'option')) {
							the_row(); 
							$logo = get_sub_field('logo'); 
							$link = get_sub_field('link'); ?>
							 <?php if ( !empty($logo)) : ?>   
								<?php if( $link ):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self'; ?>  
								<a class="link-loo-partners" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">  <?php endif; ?>            
                                <img class="footer-logo-partners" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="59" width="202"/>    
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
			<div class="line-footer"></div>
			<?php if (have_rows('contact_list', 'option')) { $animation_delay = 0.1; ?>
				<div class="row row-footer-info">
					<?php while (have_rows('contact_list', 'option')) {
							the_row();  $duration = $animation_delay . 's';  ?>
							<div class="col-xs-12 col-lg-4 wow fadeInUp" data-wow-duration="<?php echo $duration;?>" data-wow-delay="0.2s">
								<?php $title_contact = get_sub_field('title_contact'); 
								if($title_contact): ?>
								<div class="title-footer cl-white text-uppercase"><?php echo $title_contact;?></div>
								<?php endif; ?>
								<?php $text_contact = get_sub_field('text_contact'); 
								if($text_contact): ?>
								<div class="text-contact cl-white text-uppercase"><?php echo $text_contact;?></div>
								<?php endif; ?>
							</div>
				    <?php $animation_delay += 0.10; } ?>			
			    </div>		
			<?php } ?>	
			<div class="line-footer"></div>
			<div class="row-footer-bottom text-center">
			<?php
					if (have_rows('footer_copyright', 'option')) {
						while (have_rows('footer_copyright', 'option')) {
							the_row(); ?>
								<div class="copyright-info cl-white"><p>&#169; <?php echo date_i18n( 'Y' ).' '.get_sub_field('made_with_love', 'option'); ?></p></div>		
						<?php }
					 } ?>	
			</div>
		</div>	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script defer src="https://connect.podium.com/widget.js#ORG_TOKEN=88358cce-db7c-43a3-8a5b-3477b97eb276" id="podium-widget" data-organization-api-token="88358cce-db7c-43a3-8a5b-3477b97eb276"></script>
<script src="https://cdn.userway.org/widget.js" data-account="epBMP6EOI2"></script>
</body>
</html>
