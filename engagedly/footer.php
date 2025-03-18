<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Engagedly
 */

?>
        </main>
        <section class="back-top d-flex align-items-center justify-content-center bg-gray position-relative z-index-up-footer">
            <a href="#body-top" class="title-section cl-gray font-adrianna link-go-top cl-orange-hover">Back to top</a>
        </section>
        <footer id="footer" class="z-index-up-footer">
            <div class="footer-container container my-4">
                <div class="row py-lg-5 pb-0">
                    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) : ?>
	                    <?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
	                    <?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
	                    <?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
	                    <?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
                    <?php endif; ?>

                    <?php if ( is_active_sidebar( 'sidebar-footer-5' ) ) : ?>
	                    <?php dynamic_sidebar( 'sidebar-footer-5' ); ?>
                    <?php endif; ?>
                </div>
	            <?php if ( is_active_sidebar( 'sidebar-footer-extra' ) ) : ?>
                <div class="row col-12 col-md-6 mobile-apps">
		                <?php dynamic_sidebar( 'sidebar-footer-extra' ); ?>
                </div>
	            <?php endif; ?>
            </div>
            <div class="footer-copyright">
                <div class="footer-container container">
                        <div class="row py-4">
                            <div class="col-12 col-md-5 col-lg-4 d-flex align-items-center justify-content-lg-start justify-content-center mb-4 mb-lg-0">
                                <?php if ( is_active_sidebar( 'sidebar-copyright' ) ) : ?>
                                    <?php dynamic_sidebar( 'sidebar-copyright' ); ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 col-md-4 col-lg-5 d-flex align-items-center justify-content-center mb-4 mb-lg-0">
                                <nav id="sub-menu">
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'footer',
                                            'container'      => '',
                                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        )
                                    );
                                    ?>
                                </nav>
                            </div>
                            <div class="col-12 col-md-3 col-lg-3 d-flex align-items-center justify-content-lg-end justify-content-center mb-4 mb-lg-0">
                                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                                    <?php
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'social',
                                            'menu_class'     => 'footer-social-icons social-icons',
                                            'container'      => '',
                                            'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        )
                                    );
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                </div>
            </div>
        </footer>

        <?php wp_footer(); ?>

<link href="<?php bloginfo('template_url') ?>/assets/css/custom.css" rel="stylesheet">
<script src="<?php bloginfo('template_url') ?>/assets/js/circles.js"></script>
<script src="<?php bloginfo('template_url') ?>/assets/js/menuHold.js"></script>
<script type="text/javascript">
    new WOW().init();
    /*Nice Select*/
    /*$(document).ready(function() {
        $('select').niceSelect();
    });*/
</script>
    </body>
</html>
