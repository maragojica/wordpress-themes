<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Charity_Charge
 */

?>

<footer class="footer-section">
    <div class="container">
        <!-- Footer Newsletter -->
        <div class="footer-newsletter position-relative" id="newsletter">
             <?php if (get_field('newsletter_left_shape', 'option')): ?>
                <img class="footer-newsletter-shape-left-img" src="<?php echo esc_url(get_field('newsletter_left_shape', 'option')['url']); ?>" alt="Newsletter Shape Left" data-aos="fade-in" data-aos-delay="50"/>
            <?php endif; ?>
            <?php if (get_field('newsletter_right_shape', 'option')): ?>           
                <img class="footer-newsletter-shape-right-img" src="<?php echo esc_url(get_field('newsletter_right_shape', 'option')['url']); ?>" alt="Newsletter Shape Right" data-aos="fade-in" data-aos-delay="50"/>
            <?php endif; ?>
              <div class="footer-newsletter-content text-center">
                <?php if(get_field('newsletter_headline', 'option')): ?>
                <h2 data-aos="fade-up"><?php echo esc_html(get_field('newsletter_headline', 'option')); ?></h2>
                <?php endif; ?>
                <?php if(get_field('newsletter_text', 'option')): ?>
                <div class="content-text mb-4" data-aos="fade-up" data-aos-delay="50"><?php echo get_field('newsletter_text', 'option'); ?></div>
                <?php endif; ?>   
                
				<script>
                function loadHubSpotForm() {
                    hbspt.forms.create({
                    portalId: "45968269",
                    formId: "295f3ebd-d87a-4866-9daa-c1f8c17351c8"
                    });
                }
                </script>
                <script charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/embed/v2.js" onload="loadHubSpotForm()"></script>

                  
            </div>                
        </div>       
        <!-- Footer Top Section - Logo, Mission, Social -->
        <div class="footer-top">
            <div class="row">
                <div class="col-12">
                <?php
                    $logo = get_field('branding', 'option')['footer_logo'];
                    if ($logo) { ?>
                    <a tabindex="0" href="<?php echo esc_url(home_url('/')); ?>" rel="home" aria-label="<?php echo get_bloginfo('name'); ?> Logo" title="<?php echo get_bloginfo('name'); ?> Logo">
                    <?php	$logo_url = $logo['url'];
                        $logo_mime_type = $logo['mime_type'];
                        if ($logo_url) { ?>
                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?> Logo" class="footer-logo d-block h-auto"/>
                            
                    <?php } ?>
                        </a>
                    <?php } ?>
                     <?php if (get_field('footer_about_text', 'option')): ?>
                    <div class="footer-mission">
                        <?php echo esc_html(get_field('footer_about_text', 'option')); ?>
                    </div>
                    <?php endif; ?>
                    <div class="social-icons">
                        <span class="color-gray-medium">Follow us on</span>
                        <?php if (have_rows('social_links', 'option')) : ?>               			
                        <?php while (have_rows('social_links', 'option')) : the_row();  
                            $icon = get_sub_field('social_svg');
                            $link = get_sub_field('social_link'); ?>
                                <?php 
                                if( $link ):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <a tabindex="0" class="social" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
                                    <?php if($icon): echo $icon; endif; ?>      
                                    </a>
                                <?php endif; ?>
                            <?php endwhile; ?>	             			          
                    <?php endif; ?>                        
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer Columns -->
        <div class="footer-columns">
            <div class="row">
                 <?php if (get_field('title_footer_menu_1', 'option')): ?>
                <!-- Footer Column Menu 1-->
                <div class="col-lg-4 col-md-6 md:mb-5 mb-3">
                    <div class="footer-column">
                        <?php if (get_field('title_footer_menu_1', 'option')): ?>
                        <h5><?php echo esc_html(get_field('title_footer_menu_1', 'option')); ?></h5>
                        <?php endif; ?>
                        <?php if (get_field('footer_menu_1', 'option')): ?>   
                            <ul id="footer-primary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_1', 'option'),
                                'theme_location' => 'menu-footer-1',
                                'container'      => false,
                            ));
                            ?>
                        </nav>	 
                        <?php endif; ?>
                    </div>
                </div>
               <?php endif; ?>  
                <?php if (get_field('title_footer_menu_2', 'option')): ?>
                <!-- Footer Column Menu 2-->
                <div class="col-lg-4 col-md-6 md:mb-5 mb-3">
                    <div class="footer-column">
                        <?php if (get_field('title_footer_menu_2', 'option')): ?>
                        <h5><?php echo esc_html(get_field('title_footer_menu_2', 'option')); ?></h5>
                        <?php endif; ?>
                       <?php if (get_field('footer_menu_2', 'option')): ?>   
                            <ul id="footer-secondary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_2', 'option'),
                                'theme_location' => 'menu-footer-2',
                                'container'      => false,
                            ));
                            ?>
                        </nav>	 
                        <?php endif; ?>
                    </div>
                </div>
               <?php endif; ?>  

                 <?php if (get_field('title_footer_menu_3', 'option')): ?>
                <!-- Footer Column Menu 3-->
                <div class="col-lg-4 col-md-6 md:mb-5 mb-3">
                    <div class="footer-column">
                        <?php if (get_field('title_footer_menu_3', 'option')): ?>
                        <h5><?php echo esc_html(get_field('title_footer_menu_3', 'option')); ?></h5>
                        <?php endif; ?>
                       <?php if (get_field('footer_menu_3', 'option')): ?>   
                            <ul id="footer-tertiary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_3', 'option'),
                                'theme_location' => 'menu-footer-3',
                                'container'      => false,
                            ));
                            ?>
                        </nav>	 
                        <?php endif; ?>
                    </div>
                </div>
               <?php endif; ?>  
                 <?php if (get_field('title_footer_menu_4', 'option')): ?>
                <!-- Footer Column Menu 4-->
                <div class="col-lg-4 col-md-6 md:mb-5 mb-3">
                    <div class="footer-column">
                        <?php if (get_field('title_footer_menu_4', 'option')): ?>
                        <h5><?php echo esc_html(get_field('title_footer_menu_4', 'option')); ?></h5>
                        <?php endif; ?>
                        <?php if (get_field('footer_menu_4', 'option')): ?>   
                            <ul id="footer-quaternary" class="footer-nav footer-navigation w-full">	
                            <?php
                            wp_nav_menu(array(
                                'menu' => get_field('footer_menu_4', 'option'),
                                'theme_location' => 'menu-footer-4',
                                'container'      => false,
                            ));
                            ?>
                        </nav>	 
                        <?php endif; ?>
                    </div>
                </div>
               <?php endif; ?>  
            </div>
        </div>
        
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="footer-bottom-content">
                <?php if (get_field('footer_copyright', 'option')): ?>
                <p class="copyright">&#169; <?php echo date_i18n( 'Y' ).' '.get_field('footer_copyright', 'option'); ?></p>
                <?php endif; ?>
                <?php if(get_field('footer_accessibility', 'option')): ?>
                <div class="footer-links">
                   <?php while (have_rows('footer_accessibility', 'option')) : the_row();  
							$link = get_sub_field('page_link'); ?>
								<?php 
								if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self'; ?>
									<a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>" target="<?php echo esc_attr( $link_target ); ?>" rel="noopener noreferrer">
									<?php echo esc_html( $link_title ); ?>  
									</a>
								<?php endif; ?>
							<?php endwhile; ?>	
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
