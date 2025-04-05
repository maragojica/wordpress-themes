<?php

/*
 * Template Name: Home Page Template
*/

remove_action('genesis_loop', 'genesis_do_loop', 10);
remove_action('genesis_before_loop', 'custom_do_breadcrumbs', 5);
add_action('genesis_after_header', 'custom_front_page_after_header', 10);
add_action('genesis_loop', 'custom_homepage_content', 10);

function custom_front_page_after_header()
{ ?>

    <div class="homepage-hero-wrap">
        <div class="container">
            <div class="homepage-hero">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="left-content">
                            <div class="hero-description">
                                <h1><?= get_field('hero_title') ?></h1>
                                <p><?= get_field('hero_subtitle') ?></p>
                                <?php if (is_custom_locations('/es/')) { ?>
                                    <a href="<?= site_url('/es/evaluacion-de-caso/') ?>" title="Get a Free Consultation"
                                    class="orange-btn">RECIBA UNA CONSULTA GRATIS !</a>
                                 <?php } else { ?>
                                    <a href="<?= site_url('/case-evaluation/') ?>" title="Get a Free Consultation"
                                    class="orange-btn">Get a Free Consultation !</a>
                                    <?php } ?>
                                    </div>
                            <?php if (wp_is_mobile()) { ?>
                                <img src="<?= CHILD_URL ?>/assets/app/img/images/new-zinda-attorney-hero-mobile-5.png"
                                     alt="NATIONWIDE PERSONAL INJURY LAWYERS"
                                     title="NATIONWIDE PERSONAL INJURY LAWYERS" width="930" height="300">
                            <?php } else { ?>
                                <img src="<?= CHILD_URL ?>/assets/app/img/images/new-zinda-attorney-image-7.png"
                                     alt="NATIONWIDE PERSONAL INJURY LAWYERS"
                                     title="NATIONWIDE PERSONAL INJURY LAWYERS" width="930" height="300">
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="right-content">
                            <span class="contact-subtitle">
                                 <?php if (is_custom_locations('/es/')) { ?>
                                     Contáctenos
                                 <?php } else { ?>
                                     Contact Us
                                 <?php } ?>
                            </span>
                            <h2 class="center-line">
                                <?php if (is_custom_locations('/es/')) { ?>
                                    OBTENGA SU CONSULTA <br>GRATUITA
                                <?php } else { ?>
                                    GET YOUR FREE CONSULTATION
                                <?php } ?>
                            </h2>
                            <?php
                            if (is_custom_locations('/es/')) {
                                echo do_shortcode('[contact-form-7 title="SideBar Contact Spanish"]');
                            } else {
                                echo do_shortcode('[contact-form-7 title="SideBar Contact"]');
                            }
                            ?>
                            <span class="contact-dsc">
                                  <?php if (is_custom_locations('/es/')) { ?>
                                      Al enviar esta información, acepta ser contactado por Zinda Law Group a través de teléfono, mensaje de texto o correo electrónico. Se aplicarán las tarifas de mensajería estándar.
                                  <?php } else { ?>
                                      By submitting this information you agree to be contacted by Zinda Law Group via phone, text, or email. Standard messaging rates will apply.
                                  <?php } ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img class="z-logo" src="<?= CHILD_URL ?>/assets/app/img/logo/z-logo.png"
             alt="Zinda Law Logo"
             title="Zinda Law Logo" width="68" height="60">
    </div>

    <?php
}

function custom_homepage_content()
{ ?>

    <section class="section-awards">
        <div class="container">
            <h2 class="center-line color-blue text-align-center"><?= get_field('awards_title') ?></h2>
            <div class="row">
                <?php
                if (have_rows('awards')) {
                    while (have_rows('awards')) {
                        the_row();
                        $award_img = get_sub_field('award_img');
                        $award_dsc = get_sub_field('award_dsc');
                        ?>
                        <div class="col-lg-2 col-6">
                            <img class="z-logo" src="<?= $award_img['url'] ?>"
                                 alt="<?= $award_dsc ?>" title="<?= $award_dsc ?>" width="150" height="150">
                            <p><?= $award_dsc ?></p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section-why">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <?= get_field('why_zinda_iframe') ?>
                </div>
                <div class="col-lg-6">
                    <h2 class="center-line color-blue"><?= get_field('why_zinda_title') ?></h2>
                    <?= get_field('why_zinda_dsc') ?>
                </div>
            </div>
        </div>
    </section>

    <section class="service-data-box">
        <div class="container">
            <div class="service-data-box-row">
                <?php
                if (have_rows('services')) {
                    while (have_rows('services')) {
                        the_row();
                        $service_image = get_sub_field('service_image');
                        $service_title = get_sub_field('service_title');
                        $service_dsc = get_sub_field('service_dsc');
                        ?>
                        <div class="service-data-box-item">
                            <img src="<?= $service_image['url'] ?>"
                                 alt="<?= $service_title ?>" width="121" height="104"/>
                            <h2><?= $service_title ?></h2>
                            <p><?= $service_dsc ?></p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section-case-result">
        <div class="container">
            <h2 class="center-line color-blue"><?= get_field('case_results_title') ?></h2>

            <div class="section-case-result-inner">
                <?php
                if (have_rows('case_results')) {
                    while (have_rows('case_results')) {
                        the_row();
                        $result_amount = get_sub_field('result_amount');
                        $result_title = get_sub_field('result_title');
                        $result_subtitle = get_sub_field('result_subtitle');
                        $result_icon = get_sub_field('result_icon');
                        ?>
                        <div class="results-box">
                            <span class="results-price-data"><?= $result_amount ?></span>
                            <div class="result-icon">
                                <div class="inner-result-icon">
                                    <img src="<?= $result_icon ?>"
                                         alt="<?= $result_amount ?>" title="<?= $result_amount ?>" width="40"
                                         height="40"/>
                                </div>
                                <span><?= $result_title ?></span>
                            </div>
                            <p><?= $result_subtitle ?></p>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>

    <section class="section-only-text">
        <div class="container">
            <div class="box">
                <?= get_field('only_text') ?>
            </div>
        </div>
    </section>

    <section class="section-information-center">
        <div class="container">
            <h2 class="center-line color-white"><?= get_field('practice_areas_title') ?></h2>
            <div class="section-information-center-inner">
                <?php
                if (have_rows('practice_areas')) {
                    while (have_rows('practice_areas')) {
                        the_row();
                        $pa_title = get_sub_field('pa_title');
                        $pa_image = get_sub_field('pa_image');
                        $pa_link = get_sub_field('pa_link');
                        ?>
                        <a href="<?= site_url($pa_link) ?>" title="<?= $pa_title ?>" class="info-center">
                            <img src="<?= $pa_image['url'] ?>"
                                 alt="<?= $pa_title ?>"
                                 title="<?= $pa_title ?>" width="930" height="300">
                            <span><?= $pa_title ?></span>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
            <a href="<?= get_field('practice_areas_button')['url'] ?>" class="base-btn"
               title="<?= get_field('practice_areas_button')['title'] ?>"><?= get_field('practice_areas_button')['title'] ?></a>
        </div>
    </section>

    <section class="section-our-team">
        <div class="container">
            <h2 class="center-line color-blue">
                <?php if (is_custom_locations('/es/')) { ?>
                    Nuestro equipo
                    <?php
                } else {
                    ?>
                    Our Team
                    <?php
                } ?>
            </h2>
            <?php if (is_custom_locations('/es/')) {
                echo do_shortcode('[attorneys-list-es]');
            } else {
                echo do_shortcode('[attorneys-list]');
            } ?>
        </div>
    </section>

    <section class="section-home-testimonials" id="testimonials">
        <div class="container">
            <h2 class="center-line color-white">TESTIMONIALS</h2>
            <?php echo do_shortcode('[brb_collection id="38060"]'); ?>
        </div>

    </section>


    <?php
}

genesis();