<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WJ_Partners
 */

?>

<footer id="colophon" class="site-footer bg-navy wow fadeIn" data-wow-duration="0.8s" data-wow-delay="0.3s">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 text-center col-logo" >		
					<a class="link-logo"  tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
					<?php
					$logo = get_field('branding', 'option')['footer_logo'];
					if ($logo) {
						$logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) {
							if ($logo_mime_type == 'image/svg+xml') {
								echo file_get_contents($logo_url);
							} else { ?>								
								
									<img class="logo-footer" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="280" height="81"/>
								
							<?php }
						}
					} ?>
						</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-footer">
					<?php
					if (have_rows('footer_menu', 'option')) {
						while (have_rows('footer_menu', 'option')) {
							the_row(); ?>
							<?php 				
							wp_nav_menu(array(
								'menu' => get_sub_field('menu_column_footer', 'option'),
								'theme_location' => 'footer',
								'menu_id' => 'footer-menu',
							));	?> 
					<?php }
					} ?>
				</div>
			</div>
			<?php
			if (have_rows('social_networks', 'option')) { 	?>
			    <div class="row">
					<div class="col-xs-12 social-icons flex gap-1 flex-row text-center">
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
				</div>	
			<?php 
			}  ?>
			
			<?php
		if (have_rows('footer_copyright', 'option')) {
			while (have_rows('footer_copyright', 'option')) {
				the_row(); ?>	
				<div class="row middle-xs">
					<div class="col-xs-12 text-center">
						<div class="copyright-info"><p>&#169; <?php echo date_i18n( 'Y' ).' '.get_sub_field('made_with_love', 'option'); ?></p></div>						
					</div>	
				</div>
				
		<?php }
		} ?>
		</div>		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
