<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

    <div class="menu-modal cover-modal header-footer-group" data-modal-target-string=".menu-modal">

        <div class="menu-modal-inner modal-inner">

            <div class="menu-wrapper section-inner">

                <div class="menu-top">
                    <div class="d-flex justify-content-between align-items-center box-search-menu">
                        <div class="uk-inline box-search-mv">
                            <button class="toggle search-toggle mobile-search-toggle" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="21px">
                                    <image  x="0px" y="0px" width="21px" height="21px"  xlink:href="data:img/png;base64,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" />
                                </svg>
                            </button><!-- .search-toggle -->
                            <div class="drop-search-mv" uk-drop="mode: click">
                                <div class="uk-card uk-card-body uk-card-default">
                                    <?php
                                    get_search_form(
                                        array(
                                            'label' => __( 'Search for:', 'twentytwenty' ),
                                        )
                                    );
                                    ?>
                                </div>
                            </div>
                        </div>

                        <button class="toggle close-nav-toggle fill-children-current-color" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
                            <i class="fas fa-times"></i>
                        </button><!-- .nav-toggle -->
                    </div>

                    <?php

                    $mobile_menu_location = '';

                    // If the mobile menu location is not set, use the primary and expanded locations as fallbacks, in that order.
                    if ( has_nav_menu( 'mobile' ) ) {
                        $mobile_menu_location = 'mobile';
                    } elseif ( has_nav_menu( 'primary' ) ) {
                        $mobile_menu_location = 'primary';
                    } elseif ( has_nav_menu( 'expanded' ) ) {
                        $mobile_menu_location = 'expanded';
                    }

                    if ( has_nav_menu( 'expanded' ) ) {

                        $expanded_nav_classes = '';

                        if ( 'expanded' === $mobile_menu_location ) {
                            $expanded_nav_classes .= ' mobile-menu';
                        }

                        ?>

                        <nav class="expanded-menu<?php echo esc_attr( $expanded_nav_classes ); ?>" aria-label="<?php esc_attr_e( 'Expanded', 'twentytwenty' ); ?>" role="navigation">

                            <ul class="modal-menu reset-list-style">
                                <?php
                                if ( has_nav_menu( 'expanded' ) ) {
                                    wp_nav_menu(
                                        array(
                                            'container'      => '',
                                            'items_wrap'     => '%3$s',
                                            'show_toggles'   => true,
                                            'theme_location' => 'expanded',
                                        )
                                    );
                                }
                                ?>
                            </ul>

                        </nav>

                        <?php
                    }

                    if ( 'expanded' !== $mobile_menu_location ) {
                        ?>

                        <nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'twentytwenty' ); ?>" role="navigation">

                            <ul class="modal-menu reset-list-style">

                                <?php
                                if ( $mobile_menu_location ) {

                                    wp_nav_menu(
                                        array(
                                            'container'      => '',
                                            'items_wrap'     => '%3$s',
                                            'show_toggles'   => true,
                                            'theme_location' => $mobile_menu_location,
                                        )
                                    );

                                } else {

                                    wp_list_pages(
                                        array(
                                            'match_menu_classes' => true,
                                            'show_toggles'       => true,
                                            'title_li'           => false,
                                            'walker'             => new TwentyTwenty_Walker_Page(),
                                        )
                                    );

                                }
                                ?>

                            </ul>

                        </nav>

                        <?php
                    }
                    ?>

                </div><!-- .menu-top -->

                <div class="menu-bottom flex-column align-items-start">
                    <div class="newsletter-box-mv mb-4">
                        <p class="title-newssletter-mv mb-4">Newsletter</p>
                        <?php echo do_shortcode('[contact-form-7 id="79" title="Contact Newsletter"]'); ?>
                    </div>

                    <?php if ( has_nav_menu( 'social' ) ) { ?>

                        <nav aria-label="<?php esc_attr_e( 'Expanded Social links', 'twentytwenty' ); ?>" role="navigation">
                            <ul class="social-menu reset-list-style social-icons fill-children-current-color">

                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'social',
                                        'container'       => '',
                                        'container_class' => '',
                                        'items_wrap'      => '%3$s',
                                        'menu_id'         => '',
                                        'menu_class'      => '',
                                        'depth'           => 1,
                                        'link_before'     => '<span class="screen-reader-text">',
                                        'link_after'      => '</span>',
                                        'fallback_cb'     => '',
                                    )
                                );
                                ?>

                            </ul>
                        </nav><!-- .social-menu -->

                    <?php } ?>

                </div><!-- .menu-bottom -->

            </div><!-- .menu-wrapper -->

        </div><!-- .menu-modal-inner -->

    </div><!-- .menu-modal -->

<?php
// Output the search modal (if it is activated in the customizer).
if ( true === $enable_header_search ) {
    get_template_part( 'template-parts/modal-search' );
}
?>