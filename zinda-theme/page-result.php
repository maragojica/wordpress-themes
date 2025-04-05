<?php

/*
 * Template Name: 2022 Result Page
 */

remove_action('genesis_loop', 'genesis_do_loop', 10);
add_action('genesis_loop', 'custom_content', 10);
add_action('genesis_before_footer', 'result_after_content', 2);

function custom_content()
{ ?>

    <section class="section-case-result-page mb-5">
        <div class="section-case-result-page-inner">
            <?php
            $isSpanishPage = is_custom_locations('/es/');
            $args = array(
                'post_type' => 'results',
                'posts_per_page' => -1,
                'meta_key'       => 'numeric_amount',
                'orderby'        => 'meta_value_num',
                'order' => 'DESC',
            );

            if($isSpanishPage){
                $args['post_type'] = 'results-spanish';
            }

            $loop = new WP_Query($args);
            $counter = 0;
            while ($loop->have_posts()) : $loop->the_post();
                if ($counter == 1) {
                    $activeClass = ' hide';
                }
                if ($counter % 12 == 0) {
                    echo '<div class="results-box-wrapper' . $activeClass . '">';
                }
                ?>
                <div class="results-box">
                    <span class="results-price-data"><?php echo get_field('amount'); ?></span>
                    <div class="result-icon">
                        <div class="inner-result-icon">
                            <div class="inner-result-icon">
                                <img src="<?php echo get_field('result_icon'); ?>"
                                     alt="<?php echo get_field('amount'); ?>" title="<?php echo get_field('amount'); ?>" width="40"
                                     height="40"/>
                            </div>
                        </div>
                        <span><?php echo get_field('all_case_types'); ?></span>
                    </div>
                    <p><?php echo get_field('summary'); ?></p>
                </div>
                <?php
                $counter++;
                if ($counter % 12 == 0 || $counter == $loop->post_count) {
                    echo '</div>';
                }
            endwhile; ?>
            <?php if($isSpanishPage): ?>
                <button type="button" name="more" title="Ver Más Victorias" class="base-btn more-js mt-5">
                    Ver Más Victorias
                </button>
            <?php else: ?>
                <button type="button" name="more" title="View More Victories" class="base-btn more-js mt-5">View More
                    Victories
                </button>
            <?php endif; ?>
        </div>
    </section>

    <?php
}

function result_after_content()
{
    global $hc_settings; 
    $isSpanishPage = is_custom_locations('/es/');
    ?>
    <section class="free_consult short">
        <div class="container-fluid flex-center">
        <?php if ($isSpanishPage) { ?>
                <p class="white"><span class="free">Consulta</span> Gratuita <span class="backWhite"><span class="backWhite-inner">24/7</span></span></p>
                <a href="<?= site_url('/case-evaluation/') ?>" class="btn btn-rounded">Obtenga una consulta gratuita</a>
            <?php
            } else { ?>
                <p class="white"><span class="free">Free</span> Consults <span class="backWhite"><span class="backWhite-inner">24/7</span></span></p>
                <a href="<?= site_url('/case-evaluation/') ?>" class="btn btn-rounded">Get A Free Consult</a>
            <?php
            } ?>
        </div>
    </section>

    <section class="our-team-city">
        <h2 class="bottom-line centered">
            <?php if ($isSpanishPage) { ?>
                Nuestro equipo
                <?php
            } else {
                ?>
                Our Team
                <?php
            } ?>
        </h2>
        <div class="container">
            <?php if ($isSpanishPage) {
                echo do_shortcode('[attorneys-list-es]');
            } else {
                echo do_shortcode('[attorneys-list]');
            } ?>
        </div>
        <p class="appointment-note text-center">
            <?php if ($isSpanishPage) { ?>
                * Reuniones con abogados solo con cita previa *<?php
            } else {
                ?>
                * Meetings with attorneys by appointment only *
                <?php
            } ?>
        </p>
    </section>

    <section class="numbers">
        <div class="container">
            <div class="numbers__inner">
                <?php if ($isSpanishPage) { ?>
                    <div class="nbox">
                        <h2 class="white">$170 millones</h2>
                        <p class="white">recuperados para nuestros clientes</p>
                    </div>
                    <div class="nbox">
                        <h2 class="white">100+</h2>
                        <p class="white">miembros del equipo trabajando para usted</p>
                    </div>
                    <div class="nbox">
                        <h2 class="white">1600+</h2>
                        <p class="white">reseñas de Google de 5 estrellas</p>
                    </div>
                    <div class="nbox">
                        <h2 class="white">6,500+</h2>
                        <p class="white">casos resueltos exitosamente</p>
                    </div>
                    <?php
                } else { ?>
                    <div class="nbox">
                        <h2 class="white">$170 million</h2>
                        <p class="white">recovered for our clients</p>
                    </div>
                    <div class="nbox">
                        <h2 class="white">100+</h2>
                        <p class="white">team members working for you</p>
                    </div>
                    <div class="nbox">
                        <h2 class="white">1600+</h2>
                        <p class="white">5-star Google reviews</p>
                    </div>
                    <div class="nbox">
                        <h2 class="white">6,500+</h2>
                        <p class="white">successfully resolved cases</p>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </section>

    <section class="what-client-say">
        <div class="container">
            <?php if ($isSpanishPage) { ?>
                <h2 class="text-center">LO QUE DICEN NUESTROS CLIENTES SOBRE NOSOTROS</h2>
                <?php
            } else { ?>
                <h2 class="text-center">WHAT OUR CLIENTS SAY ABOUT US</h2>
            <?php
            }
            echo do_shortcode('[brb_collection id="38060"]'); ?>
        </div>
    </section>

    <section class="award section">
        <div class="container flex-center">
            <?php
            if ($isSpanishPage) {
                get_template_part('include/awards-and-recognition', 'es');
            } else {
                get_template_part('include/awards-and-recognition', 'en');
            } ?>
        </div>
    </section>

    <section class="contact-methods"><?php 
        if ($isSpanishPage) { ?>
            <h2>3 MANERAS DE CONTACTARNOS</h2>
            <p><b>Llame, chatee o complete un formulario para comunicarse con nuestro equipo de abogados, en cualquier momento las 24/7.</b></p>
            <?php
        } else { ?>
            <h2>3-WAYS TO CONTACT US</h2>
            <p><b>Call, chat or submit a form to reach our team of attorneys, anytime 24/7.</b></p>
        <?php
        }?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <a href="tel:<?= $hc_settings['phone_number'] ?>">
                        <img src="<?= CHILD_URL ?>/assets/app/img/icons/phone-icon.png"
                             alt="Phone Icon" title="Phone Icon" width="54"
                             height="54"/>
                        <div>
                        <? if ($isSpanishPage) { ?>
                            <p>Número de teléfono</p>
                            <p><b>Llámenos</b></p>
                        <?php
                        } else { ?>
                            <p>Phone number</p>
                            <p><b>Call Us</b></p>
                        <?php
                        }?>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#" onclick="ccliface.openManual(); return false;">
                        <img src="<?= CHILD_URL ?>/assets/app/img/icons/chat-icon.png"
                             alt="Chat Icon" title="Chat Icon" width="54"
                             height="54"/>
                        <div>
                            <? if ($isSpanishPage) { ?>
                                <p>Chat</p>
                                <p><b>Chatee con nosotros</b></p>
                            <?php
                            } else { ?>
                                <p>Chat</p>
                                <p><b>Chat with Us</b></p>
                            <?php
                            }?>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a href="#footer-form">
                        <img src="<?= CHILD_URL ?>/assets/app/img/icons/note-icon.png"
                             alt="Submit a Web Form Icon" title="Submit a Web Form Icon" width="54"
                             height="54"/>
                        <div>
                            <? if ($isSpanishPage) { ?>
                                <p>Formulario</p>
                                <p><b>Envíe un formulario web</b></p>
                            <?php
                            } else { ?>
                                <p>Form</p>
                                <p><b>Submit a Web Form</b></p>
                            <?php
                            }?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php
}

genesis();