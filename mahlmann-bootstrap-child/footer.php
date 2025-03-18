<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
	</div><!-- #content -->
	<footer id="footer-site" class="site-footer bg-gray mt-5 <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
	    <div class="footer-box d-flex align-items-center">
	        <div class="container">
                <div class="row justify-content-between">
                    <?php if ( is_active_sidebar( 'footer-1' )) : ?>
                        <div class="col-md col-lg-4 col-xl-4 col-logo-footer"><?php dynamic_sidebar( 'footer-1' ); ?></div>
                    <?php endif; ?>
                     <?php if ( is_active_sidebar( 'footer-2' )) : ?>
                        <div class="col-md col-xl col-menu-footer"><?php dynamic_sidebar( 'footer-2' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-3' )) : ?>
                        <div class="col-md-5 col-lg-4 col-xl-3 col-info-footer mt-md-0 mt-4">
                        <h2>Follow Us</h2>
                        <div class="social d-flex justify-content-md-start justify-content-center mb-4">
                            <?php $face_url= get_option('mahlmann_facebook_url');
                            if($face_url){?>
                                <a href="<?php echo $face_url;?>" target="_blank" class="mr-4 cl-gray d-flex justify-content-center align-items-center">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            <?php } ?>
                               <?php $lin_url= get_option('mahlmann_linkedin_url');
                            if($lin_url){?>
                                <a href="<?php echo $lin_url;?>" target="_blank" class="cl-gray d-flex justify-content-center align-items-center">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            <?php } ?>
                          </div>
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="row pt-5">
                    <div class="col-md-12 text-copy-site text-center">
                         Copyright  &copy; <?php echo date('Y'); ?> SkiesAboveMedia
                    </div>
                </div>
		</div>
        </div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--Owl-carrousel JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.20/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.20/dist/js/uikit-icons.min.js"></script>
<!--Wow JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>
<!-- SimpleLoadMore -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.simpleLoadMore.js" type="text/javascript"></script>
<!-- Main JS-->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/main.js" type="text/javascript"></script>
<!-- Plyr JS video and audio library-->
<script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
<!-- Iconify Icons -->
<script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
<script>
    new WOW().init();
</script>

<script>
    const players = Array.from(document.querySelectorAll('.player')).map(p => new Plyr(p));
</script>

</body>
</html>