<?php

add_action('genesis_header', 'custom_do_header', 1);

function custom_do_header()
{
    remove_action('genesis_header', 'genesis_header_markup_open', 5);
    remove_action('genesis_header', 'genesis_do_header', 10);
    remove_action('genesis_header', 'custom_remove_nav', 12);
    remove_action('genesis_header', 'genesis_header_markup_close', 15);
    remove_action('genesis_after_header', 'genesis_do_nav', 10);
    remove_action('genesis_after_header', 'genesis_do_subnav', 10);
    global $hc_settings, $post;
    if(is_custom_locations('/es/')) {
        if( is_singular() ){
            $altUrl = get_post_meta($post->ID, 'hd-translate-english-post-id', true) ? get_permalink(get_post_meta($post->ID, 'hd-translate-english-post-id', true)) : site_url('/');
        }
        else{
            $altUrl = site_url('/');
        }

    } else {
        if( is_singular() ){
            $altUrl = get_post_meta($post->ID, 'hd-translate-spanish-post-id', true) ? get_permalink(get_post_meta($post->ID, 'hd-translate-spanish-post-id', true)) : site_url('/es/');
        }
        else{
            $altUrl = site_url('/');
        }
    } ?>

    <header class="header<?php if (wp_is_mobile()) {
        echo ' header-mobile';
    } ?>">
        <div class="header-main-wrap">
            <div class="container">
                <div class="header-main">
                    <button type="button" name="Menu" aria-label="Menu" title="Menu" class="burger">
                                <svg class="burger-svg" width="50" height="50" viewBox="0 0 50 50" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path class="burger-icon" d="M10 15L40 15M10 25L40 25M10 35L40 35" stroke="black"
                                        stroke-linecap="round" stroke-linejoin="round"/>
                                    <path class="burger-close" d="M15 15L35 35M35 15L15 35" stroke="transparent"
                                        stroke-width="0" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                    </button>
                    <?php if (is_custom_locations('/es/')): ?>
                    <a href="<?= site_url('/es/'); ?>" class="header-logo" title="<?= get_bloginfo('name'); ?>">
                        <?php else: ?>
                        <a href="<?= site_url(); ?>" class="header-logo" title="<?= get_bloginfo('name'); ?>">
                            <?php endif; ?>
                            <picture>
                                <img src="<?= CHILD_URL ?>/assets/app/img/logo/logo.png"
                                     alt="<?= get_bloginfo('name'); ?>"
                                     title="<?= get_bloginfo('name'); ?>" width="272" height="57">
                            </picture>
                        </a>
                        <a href="tel:+1<?= preg_replace("/[^0-9]/", "", $hc_settings['phone_number']); ?>"
                       title="Call to <?= get_bloginfo('name'); ?>" class="mobile-call">
                       <?php if (is_custom_locations('/es/')) { ?>
                            <?= do_shortcode('[icon name="phone"]') ?> Llame</a>
                         <?php } else { ?>
                             <?= do_shortcode('[icon name="phone"]') ?> Call</a>
                            <?php } ?>
                        <?php if (!wp_is_mobile()) { ?>
                            <div class="header-cta">
                                <p>
                                    <?php if (is_custom_locations('/es/')) { ?>
                                        Consultas gratuitas 24/7
                                        <?php
                                    } else {
                                        ?>
                                        FREE CONSULTATION 24/7 | HABLAMOS ESPAÑOL
                                        <?php
                                    } ?>
                                </p>
                                <a href="tel:+1<?= preg_replace("/[^0-9]/", "", $hc_settings['phone_number']); ?>"
                                   title="Call to <?= get_bloginfo('name'); ?>"
                                   class="phone"><?= $hc_settings['phone_number']; ?></a>
                            </div>
                            <?php
                        } ?>
                </div>
                <div data-powa-ignore="true" class="mobile-header-case">
                <?php if (is_custom_locations('/es/')) { ?>
                    <span class="left-header-text" ><picture>
                            <img src="<?= CHILD_URL ?>/assets/app/img/images/clock-24.png" alt="<?= get_bloginfo('name'); ?>" title="<?= get_bloginfo('name'); ?>" width="15" height="15">
                        </picture>Consultas gratis 24/7</span>
                        <span><picture>
                                <img src="<?= CHILD_URL ?>/assets/app/img/images/case-24.png" alt="<?= get_bloginfo('name'); ?>" title="<?= get_bloginfo('name'); ?>" width="15" height="15">
                            </picture> $300M+ Recuperados</span>
                    <?php } else { ?>
                        <span class="left-header-text" ><picture>
                            <img src="<?= CHILD_URL ?>/assets/app/img/images/clock-24.png" alt="<?= get_bloginfo('name'); ?>" title="<?= get_bloginfo('name'); ?>" width="15" height="15">
                        </picture> Free Case Review 24/7</span>
                        <span><picture>
                                <img src="<?= CHILD_URL ?>/assets/app/img/images/case-24.png" alt="<?= get_bloginfo('name'); ?>" title="<?= get_bloginfo('name'); ?>" width="15" height="15">
                            </picture> $300M+ Recovered</span>
                    <?php } ?>
                    </div>
                </div>
            </div>
        <div class="header-nav">
            <div class="container">
                <div class="header-menu">
                    <?php if (is_custom_locations('/es/')) {
                        wp_nav_menu([
                            'menu' => 'Primary Menu Es',
                            'container_class' => 'genesis-nav-menu'
                        ]);
                        ?>  <ul class="menu en-es"><li><a href="<?=$altUrl?>" data-wpel-link="internal" target="_self">English</a></li></ul>
                   <?php   } else {
                        wp_nav_menu([
                            'menu' => 'Primary Menu',
                            'container_class' => 'genesis-nav-menu'
                        ]);
                        ?>  <ul class="menu en-es"><li><a href="<?=$altUrl?>" data-wpel-link="internal" target="_self">Español</a></li></ul>
                  <?php  }
                    if (is_custom_locations('/es/')) { ?>
                    <button class="open-hd-modal search-header"
                            data-hd-modal-title="Por favor, ingresa un término de búsqueda a continuación:"
                            data-hd-modal-content-type="html"
                            data-hd-modal-content='<form class="header-form" role="search" method="get" id="searchformheader2" action="<?php echo esc_url(home_url('/')); ?>"><input type="search" name="s" placeholder="Buscar "/></form>'>
                        <?php echo do_shortcode('[icon name="search"]');
                        echo '</button>';
                        } else { ?>
                        <button class="open-hd-modal search-header" data-hd-modal-title="Enter a search term below:"
                                data-hd-modal-content-type="html"
                                data-hd-modal-content='<form class="header-form" role="search" method="get" id="searchformheader2" action="<?php echo esc_url(home_url('/')); ?>"><input type="search" name="s" placeholder="Search "/></form>'>
                            <?php echo do_shortcode('[icon name="search"]');
                            echo '</button>';
                            } ?>
                </div>
            </div>
        </div>
    </header>
    <div class="advBanner"><a href="https://www.zdfirm.com/blog/15-4m-verdict-veteran-truck-accident-zinda-law-group/">Recent $15.4M Verdict in Major Trucking Case</a></div>
                                                                                                                       
    <style>
    .advBanner {
        text-align: center;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #FF7800;
        color: #fff;
        font-weight: 600;
        font-family: Montserrat, sans-serif;
        text-shadow: 1px 1px 4px rgba(0, 0, 0, .8);
        font-size: 20px;
        position: fixed;
        width: 100%;
        z-index: 99;        
    }
    .page-template-default .advBanner, .page-template-page-result .advBanner, .blog .advBanner, .page-template-page-faqs .advBanner, .page-template-community-page .advBanner, .page-template-news-page .advBanner, .single-post .advBanner, .single-release .advBanner, .page-template-podcast-page .advBanner{
        /*top: 153px;*/
        top: 123px;
    }
    .page-template-default .internal-hero-image,.page-template-page-result  .internal-hero-image, .blog .internal-hero-image, .page-template-page-faqs .internal-hero-image, .page-template-community-page .internal-hero-image, .page-template-news-page .internal-hero-image, .single-post .internal-hero-image, .single-release .internal-hero-image {
        margin-top: 50px;
        height: 397px;
    }
    .page-template-podcast-page section.podcast-hero {
        margin-top: 50px;
    }
    .advBanner a { color: #fff }
    .advBanner:hover a { color: #0D2E3E }
    @media (max-width: 565px) {
       .advBanner {
        position: relative;
       } 
    }
</style>
    <?php
}