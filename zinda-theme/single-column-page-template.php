<?php

/*
    * Template Name: Single Column Page Template
 */

add_action('genesis_after_content_sidebar_wrap', 'single_after_content');

function single_after_content()
{
    global $hc_settings; 
    $isSpanishPage = is_custom_locations('/es/');?>

    <section id="our-team" class="ourteamcity">
        <h2 class="bottom-line centered">
        <? if ($isSpanishPage) { ?>
                Nuestro equipo
                <?php
            } else {
                ?>
                Our Team
                <?php
            } ?>
        </h2>
        <?= do_shortcode('[attorneys-list]') ?>
        <p class="appointment-note">
            <?php if ($isSpanishPage) { ?>
                * Reuniones con abogados solo con cita previa *<?php
            } else {
                ?>
                * Meetings with attorneys by appointment only *
                <?php
            } ?>
        </p>
    </section>


    <section class="award section">
        <div class="container-fluid flex-center">
            <div class="mobile">
                <?php include(__DIR__.'/include/newawards-and-recognition-en.php'); ?>
            </div>
        </div>
    </section>

    <?php include(__DIR__.'/include/testimonials.php'); ?>


    <?php
}

genesis();