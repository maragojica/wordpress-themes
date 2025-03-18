<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Advanced_Bonded
 */

?>
<footer class="site-footer" id="colophon" >
    <div class="container">
        <div class="row footer-row">
            <!-- Column 1: Logo -->
            <div class="col-xs-12 text-center">
                    <?php
                        $logo = get_field('footer_column_1', 'option')['footer_logo'];
                        $logo_url = $logo['url'];
						$logo_mime_type = $logo['mime_type'];
						if ($logo_url) {
							if ($logo_mime_type == 'image/svg+xml') {
								echo file_get_contents($logo_url);
							} else { ?>								
								<a class="link-logo" tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
									<img class="logo-footer animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1s" src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" width="144" height="96"/>
								</a>
							<?php }
						}
                        ?>
				<?php
					if (have_rows('logos_business', 'option')) { ?>
					<div class="list-logos-footer">
					<?php	while (have_rows('logos_business', 'option')) {
							the_row(); 
							$logo = get_sub_field('logo'); 
							$link = get_sub_field('link'); 
						      $srcset = wp_get_attachment_image_srcset($logo['ID']);
                              $sizes = wp_get_attachment_image_sizes($logo['ID'], 'full'); ?>
							 <?php if ( !empty($logo)) : ?>   
								<?php if( $link ):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self'; ?>  
								<a class="link-loo-partners" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">  <?php endif; ?>            
                                <img class="footer-logo-partners" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" height="47" srcset="<?php echo esc_attr($srcset); ?>"/>    
								<?php if( $link ): ?>
								</a>
								<?php endif; ?>                        
                            <?php endif; ?> 
							<?php } ?>
						</div>		
					<?php } ?>	
                  
						<div class="footer-menu m-t1">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-footer',
                            'menu_id'        => 'footer-menu',                            
                            'depth'          => 2, 
                        ));
					      ?>
                        </div>
                	
                    <?php
                    $copyright = get_field('footer_column_3', 'option')['copyright'];
                    if ($copyright) : ?>
						<div class="footer-copy-r m-t2">&#169; Copyright <?php echo date_i18n( 'Y' ). $copyright; ?></div>
                	<?php endif; ?>   
            </div>         
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
