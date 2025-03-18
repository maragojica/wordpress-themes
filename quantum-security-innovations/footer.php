<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Quantum_Security_&_Innovations
 */
?>
<footer id="colophon" class="site-footer bg-white">	
	<div class="footer-links container">
		<div class="row">
		<div class="col-xs-12 col-xl-4 gap-1">		
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
							<img class="logo-footer animate__animated" data-animation="fadeBottom" data-duration="1s" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="304" height="156"/>
						</a>
					<?php }
				}
			} ?>
		</div>
		<div class="col-xs-12 col-xl-2 gap-1 col-footer animate__animated" data-animation="fadeBottom" data-duration="1.75s">
			<?php
			if (have_rows('footer_column_1', 'option')) {
				while (have_rows('footer_column_1', 'option')) {
					the_row(); ?>
					<div class="title-footer"><?php echo get_sub_field('heading', 'option'); ?></div>
					<?php echo get_sub_field('links', 'option'); ?>
			<?php }
			} ?>
		</div>
		<div class="col-xs-12 col-xl gap-1 col-footer animate__animated" data-animation="fadeBottom" data-duration="2s">
			<?php
			if (have_rows('footer_column_2_1', 'option')) {
				while (have_rows('footer_column_2_1', 'option')) {
					the_row(); ?>
					<div class="title-footer"><?php echo get_sub_field('heading', 'option'); ?></div>
					<?php echo get_sub_field('links', 'option'); ?>
			<?php }
			} ?>
		</div>
		<div class="col-xs-12 col-xl gap-1 col-footer animate__animated" data-animation="fadeBottom" data-duration="2.5s">
			<?php
			if (have_rows('footer_column_3', 'option')) {
				while (have_rows('footer_column_3', 'option')) {
					the_row(); ?>
					<div class="title-footer"><?php echo get_sub_field('heading', 'option'); ?></div>
					<?php echo get_sub_field('links', 'option'); ?>
			<?php }
			} ?>
		</div>
		<div class="col-xs-12 col-xl gap-1 col-footer animate__animated" data-animation="fadeBottom" data-duration="3s">
			<?php
			if (have_rows('footer_column_4', 'option')) {
				while (have_rows('footer_column_4', 'option')) {
					the_row(); ?>
					<div class="title-footer"><?php echo get_sub_field('heading', 'option'); ?></div>
					<?php echo get_sub_field('links', 'option'); ?>
			<?php }
			} ?>
		</div>
	
		</div>		
	</div><!-- .footer-links -->
	<div class="container line-footer"></div>
	<?php
	if (have_rows('footer_copyright', 'option')) {
		while (have_rows('footer_copyright', 'option')) {
			the_row(); ?>				
			<div class="container copyright-info ps-lg-0 pe-lg-0">
				<div class="row middle-xs w-100 ms-0 me-0">
					<div class="col-xs-12 col-lg-6 ps-xl-0 text-lg-start text-center animate__animated" data-animation="fadeBottom" data-duration="3.5s">
						<p>&#169; Copyright <?php echo date_i18n( 'Y' ).' '.get_sub_field('copyright_text', 'option'); ?></p>						
					</div>				
					<div class="col-xs-12 col-lg-6 pe-xl-0 text-lg-end text-center animate__animated" data-animation="fadeBottom" data-duration="4s">
						<p><?php echo get_sub_field('made_with_love', 'option'); ?></p>
					</div>
				</div>
			</div>
	<?php }
	} ?>	
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>
