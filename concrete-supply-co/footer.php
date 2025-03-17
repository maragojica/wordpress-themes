<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Concrete_Supply_Co
 */

?>
<footer id="colophon" class="site-footer bg-lightgray">	
	<div class="footer-links container">
		<div class="row">
		<div class="col-xs-12 col-xl gap-1">		
			<?php
			$logo = get_field('branding', 'option')['desktop_colored_logo'];
			if ($logo) {
				$logo_url = $logo['url'];
				$logo_mime_type = $logo['mime_type'];
				if ($logo_url) {
					if ($logo_mime_type == 'image/svg+xml') {
						echo file_get_contents($logo_url);
					} else { ?>								
						<a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
							<img class="logo-footer animate__animated" data-animation="fadeBottom" data-duration="1s" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="235" height="205"/>
						</a>
					<?php }
				}
			} ?>
		</div>
		<?php
			if (have_rows('footer_column_1', 'option')) {
				while (have_rows('footer_column_1', 'option')) {
					the_row(); $title_column1 = get_sub_field('heading', 'option');
					if( $title_column1 ): ?>
						<div class="col-xs-12 col-xl gap-1 col-footer animate__animated" data-animation="fadeBottom" data-duration="1.75s">
							
									<div class="title-footer"><?php echo get_sub_field('heading', 'option'); ?></div>
									<?php echo get_sub_field('links', 'option'); ?>
							
						</div>
					<?php endif; ?>
		<?php }
			} ?>
		<?php if (have_rows('footer_column_2_1', 'option')) { 
			while (have_rows('footer_column_2_1', 'option')) { 
				the_row(); $title_column2 = get_sub_field('heading', 'option');
				if( $title_column2 ): ?>	
					<div class="col-xs-12 col-xl gap-1 col-footer animate__animated" data-animation="fadeBottom" data-duration="2s">			
						<div class="title-footer"><?php echo get_sub_field('heading', 'option'); ?></div>
						<?php echo get_sub_field('links', 'option'); ?>			
					</div>
				<?php endif; ?>
			<?php }
		  } ?>	
		  <?php
			if (have_rows('footer_column_3', 'option')) {
				while (have_rows('footer_column_3', 'option')) {
					the_row(); ?>
		         <div class="col-xs-12 col-xl gap-1 col-footer animate__animated" data-animation="fadeBottom" data-duration="2.5s">			
					<div class="title-footer"><?php echo get_sub_field('heading', 'option'); ?></div>
					<?php
						if (have_rows('social_networks', 'option')) { ?>
								<div class="social-icons flex gap-1 flex-row">
									<?php
									if (have_rows('social_networks', 'option')) {
										while (have_rows('social_networks', 'option')) {
											the_row(); ?>
											<?php $icon = get_sub_field('icon');
											$link = get_sub_field('icon_link');
											if( $link ):
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self'; ?>
												<a tabindex="0" class="social-icon" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
													<?php if($icon): echo $icon; endif; ?>
												</a>
											<?php endif; ?>
									<?php }
									} ?>
								</div>
						<?php 
						} ?>
			
		           </div>
		<?php }
			} ?>
				<?php
			if (have_rows('footer_column_4', 'option')) { 
				while (have_rows('footer_column_4', 'option')) {
					the_row(); ?>
						<div class="col-xs-12 col-xl gap-1 col-footer animate__animated" data-animation="fadeBottom" data-duration="3s">
						
									<div class="title-footer"><?php echo get_sub_field('heading', 'option'); ?></div>
									<?php
									if (have_rows('links', 'option')) { $i = 1;
										while (have_rows('links', 'option')) {
											the_row(); ?>
											<?php $icon = get_sub_field('icon_svg');
											$contact = get_sub_field('contact'); ?>
											<div class="contact-info contact-footer-<?php echo $i;?>">
											<?php if($icon): ?>
												<div class="icon-contact"><?php echo $icon;?></div>
											<?php endif; ?>
											<?php if($contact): ?>
													<span><?php echo $contact; ?></span>
												<?php endif; ?>
											</div>
									<?php $i++; }
									} ?>
									<?php $link = get_sub_field('cta', 'option');
										if( $link ):
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self'; ?>
											<div class="button-wrapper blue animate__animated" data-animation="fadeBottom" data-duration="4.5s">
												<a tabindex="0" class="button black" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
											</div>
										<?php endif; ?>			
						</div>
				<?php  }
					} ?>
		</div>		
	</div><!-- .footer-links -->
	<div class="container line-footer"></div>
	<?php
	if (have_rows('footer_copyright', 'option')) {
		while (have_rows('footer_copyright', 'option')) {
			the_row(); ?>				
			<div class="container copyright-info">
				<div class="row middle-xs w-100">
					<div class="col-xs-12 col-lg-6 animate__animated" data-animation="fadeBottom" data-duration="3.5s">
						<p><?php echo date_i18n( 'Y' ).' '.get_sub_field('copyright_text', 'option'); ?></p>						
					</div>				
					<div class="col-xs-12 col-lg-6 text-lg-end text-center animate__animated" data-animation="fadeBottom" data-duration="4s">
						<p><?php echo get_sub_field('made_with_love', 'option'); ?></p>
					</div>
				</div>
			</div>
	<?php }
	} ?>	
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
