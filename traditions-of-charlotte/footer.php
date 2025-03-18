<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Traditions_of_Charlotte
 */

?>

<footer id="colophon" class="site-footer">
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
									<img class="logo-footer wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="337" height="77"/>
								</a>
							<?php }
						}
					} ?>
				</div>
			</div>
			<?php
			if (have_rows('footer_column_1', 'option')) {
				while (have_rows('footer_column_1', 'option')) {
					the_row(); ?>
					<div class="row">
						<div class="col-xs-12 col-footer wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">				
							<?php 				
							wp_nav_menu(array(
								'menu' => get_sub_field('menu_column_one', 'option'),
								'theme_location' => 'footer',
								'menu_id' => 'footer-menu',
							));	?> 					
						</div>
					</div>
			<?php }
			} ?>
			<?php
			if (have_rows('footer_column_2_1', 'option')) {
				while (have_rows('footer_column_2_1', 'option')) {
					the_row(); ?>
					<div class="row">
						<div class="col-xs-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">				
							<div class="footer-contact"><?php echo get_sub_field('contact_text', 'option');  ?></div>				
						</div>
					</div>
			<?php }
			} ?>
				<?php
			if (have_rows('footer_column_3_1', 'option')) {
				while (have_rows('footer_column_3_1', 'option')) {
					the_row(); ?>
					<div class="row">
						<div class="col-xs-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">				
							<div class="footer-contact"><?php echo get_sub_field('contact_text', 'option');  ?></div>				
						</div>
					</div>
			<?php }
			} ?>
			<?php
			if (have_rows('branding', 'option')) {
				while (have_rows('branding', 'option')) {
					the_row(); ?>					
					<?php
						if (have_rows('social_networks', 'option')) { ?>
								<div class="row row-social wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
									<div class="col-xs-12">
									<div class="social-icons flex flex-row middle-xs center-xs">
									<?php
									if (have_rows('social_networks', 'option')) {
										while (have_rows('social_networks', 'option')) {
											the_row(); ?>
											<?php $icon = get_sub_field('icon_svg');
											$link = get_sub_field('url');
											$title = get_sub_field('title');
											if( $link ):
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self'; ?>
												<a tabindex="0" class="social-icon flex flex-row middle-xs center-xs" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
													<?php if($icon): echo $icon; endif; ?>
												</a>
											<?php endif; ?>
									<?php }
									} ?>
								</div>
									</div>
								</div>
						<?php 
						} ?>
			<?php }
			} ?>
			<div class="row">
				<div class="col-xs-12">
				   <div class="container line-footer"></div>
				</div>		
			</div>
			<?php
		if (have_rows('footer_copyright', 'option')) {
			while (have_rows('footer_copyright', 'option')) {
				the_row(); ?>	
				<div class="row middle-xs">
					<div class="col-xs-12 text-center">
						<div class="copyright-info"><p>&#169; Copyright <?php echo date_i18n( 'Y' ).' '.get_sub_field('copyright_text', 'option');  ?></p></div>						
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
