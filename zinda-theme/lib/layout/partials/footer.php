<?php

add_action('genesis_footer', 'custom_footer', 8);
add_action('genesis_before_footer', 'footer_form', 11);
add_action('genesis_entry_footer', 'after_content_form', 10);

function after_content_form()
{
    global $post;
    global $hc_settings;

    $location_widget_title = get_field($hc_settings['location_widget_title'], $post->ID);


    ?>
    <?php if (have_rows('information_center_city')): ?>
    <section class="seeimgsection">
        <div class="containerbox">
            <div class="practicle-areas-sec">
                <h2 class="blue-heading"><?php echo get_field('practice_area_title'); ?></h2>
                <?php echo get_field('practice_area_top_text'); ?>
                <div class="cstm-flex">
                    <?php
                    while (have_rows('information_center_city')): the_row(); ?>
                        <div class="practicle-box-design show-more-less">
                            <a href="<?php echo get_sub_field('practice_area_image_link'); ?>"
                               style="background-image:url(<?php echo get_sub_field('practice_area_image'); ?>);"
                               class="citylanding-img">
                                <span><?php echo get_sub_field('practice_title'); ?></span>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="practicle-view-more btn-design">
                <? if (is_custom_locations('/es/')) {?>
                    <a href="javascript:void(0)" id="view-more-btn" class="orange-btn">VER MÁS</a>
                    <a href="javascript:void(0)" id="view-less-btn" class="orange-btn" style="display:none;">VER MENOS</a>
                <? }
                else { ?>
                    <a href="javascript:void(0)" id="view-more-btn" class="orange-btn">VIEW MORE</a>
                    <a href="javascript:void(0)" id="view-less-btn" class="orange-btn" style="display:none;">VIEW LESS</a>
                <? } ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>


    <div class="paragraph-heading-design">
        <?= get_field('quis_nostrud_exerci_tation_title') ? '<h2>' . get_field('quis_nostrud_exerci_tation_title') . '</h2>' : '';  ?>

        <?php echo get_field('below_practice_area_content'); ?>
    </div>
    <?php

    if (!empty($location_widget_title) && strtolower($location_widget_title) != "-- none --" && !is_search()) {
        ?>

        <section class="after-content-form">
            <div class="footer-inner-form">
                <h2 class="center-line color-white">
                    <?php if (is_custom_locations('/es/')) {
                        echo 'Agende una consulta gratuita';
                    } else {
                        echo 'Get Your Free Consultation';
                    } ?>
                </h2>
                <?php
                if (is_custom_locations('/es/')) {
                    echo do_shortcode('[contact-form-7 title="SideBar Contact Spanish"]');
                } else {
                    echo do_shortcode('[contact-form-7 title="Sidebar Contact"]');
                }
                ?>
            </div>
        </section>

        <?php
    }

}

function footer_form()
{
    global $post;
    global $hc_settings;
    $location_widget_title = get_field($hc_settings['location_widget_title'], $post->ID);

    if (!empty($location_widget_title) && strtolower($location_widget_title) != "-- none --") {
        ?>

        <section class="our-team-city">
            <h2 class="bottom-line centered">
                <?php if (is_custom_locations('/es/')) {
                    echo 'Nuestro equipo';
                } else {
                    echo 'Our Team';
                } ?>
            </h2>
            <div class="container">
                <?php if (is_custom_locations('/es/')) {
                    echo do_shortcode('[attorneys-list-es]');
                } else {
                    echo do_shortcode('[attorneys-list]');
                } ?>
            </div>
            <p class="appointment-note text-center">
                <?php if (is_custom_locations('/es/')) {
                    echo '* Reuniones con abogados solo con cita previa *';
                } else {
                    echo '* Meetings with attorneys by appointment only *';
                } ?>
            </p>
        </section>

        <?php
        if (is_custom_locations('/es/')) {
            get_template_part('include/awards-and-recognition', 'es');
        } else {
            get_template_part('include/awards-and-recognition', 'en');
            get_template_part('include/testimonials');
        }
    }

    if (is_page_template('Attorney-Profile.php')) {
        ?>
        <section id="map-contact-attorney" class="mb-5 white-form">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 mb-md-0 mb-5 ps-md-0">
                        <img class="fluid-img" src="<?= CHILD_URL ?>/assets/app/img/images/newzinda-team-footer.jpg" alt="Zinda"
                             title="Zinda" width="774" height="695">
                    </div>
                    <div class="col-md">
                        <div id="map-contact-form-attorney">
                            <h2 class="title-map-contact-attorney">Get Your Free Consultation</h2>
                            <?php echo do_shortcode('[contact-form-7 title="Sidebar Contact"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }

    if (is_page(1185)) {
        ?>
        <div class="container">
        <div id="map-contact-form" class="new-referral">
                <div class="new-bottom-form-box">
                    <div class="new-bottom-form-img">
                        <img alt="Jack Zinda" title="Jack zinda"
                             src="<?= CHILD_URL ?>/assets/app/img/images/jack-transparent-new.png"/>
                    </div>
                    <div class="new-bottom-form-data">
                        <h2 class="bottom-line centered">YOU Deserve the Best<br/> GET YOUR FREE CONSULTATION</h2>
                        <?php echo do_shortcode('[contact-form-7 title="Referral Bottom Contact"]'); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    if (!is_page_template('Attorney-Profile.php') && !is_page(33189) && !is_page(1185)) {
        ?>

        <section class="section-footer-form" id="footer-form">
            <div class="container">
                <div class="footer-inner-form">
                    <h2 class="center-line color-white">
                        <?php if (is_custom_locations('/es/')) {
                            echo 'Agende una consulta gratuita';
                        } else {
                            echo 'Get Your Free Consultation';
                        } ?>
                    </h2>
                    <?php
                    if (is_custom_locations('/es/')) {
                        echo do_shortcode('[contact-form-7 title="Footer Form Es"]');
                    } else {
                        echo do_shortcode('[contact-form-7 title="Footer Form En"]');
                    }
                    ?>
                </div>
            </div>
        </section>

        <?php
    }

    if (is_custom_locations('/es/')) { ?>
        <section class="section-offices">
            <div class="container">
                <div class="office-list">
                    <div class="office principal has-bottom">
                        <span class="principal-label">Oficina principal</span>
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/austin/') ?>"
                                                  title="North Austin">Oficinas de North
                                Austin</a></p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@30.38887,-97.7606432,17z/data=!3m1!4b1!4m6!3m5!1s0x8644cb602c7044ab:0xcffa6f519daaa3fe!8m2!3d30.38887!4d-97.7606432!16s%2Fg%2F124ydzhs_?entry=ttu"
                                              title="address">8834
                                N. Capital
                                of Texas
                                Highway<br>
                                Suite 304<br>
                                Austin, TX 78759</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 512-877-5658"
                                                      title="512-877-5658<">512-877-5658</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/austin/') ?>"
                                                  title="Downtown Austin">Oficinas de
                                Downtown
                                Austin</a></p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@30.2800684,-97.7454473,17z/data=!3m1!4b1!4m6!3m5!1s0x8644cb05ba0712f5:0xba047577849d9486!8m2!3d30.2800684!4d-97.7454473!16s%2Fg%2F1tj73_7j?entry=ttu" title="823 Congress Ave, Suite 300,
                            Austin TX 78701">823 Congress Ave, Suite 300,
                                Austin TX 78701</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 512-706-9542"
                                                      title="512-706-9542">512-706-9542</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/round-rock/') ?>"
                                                  title="Round Rock">Oficinas de
                                Round Rock</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@30.5171931,-97.6769397,17z/data=!3m1!4b1!4m6!3m5!1s0x8644d1962eabfc6f:0x629eec76d08e1b3!8m2!3d30.5171931!4d-97.6769397!16s%2Fg%2F11yh3gm03?entry=ttu" title="1000 Heritage Center Circle
                            Round Rock, TX 78664">1000 Heritage Center Circle<br>
                                Round Rock, TX 78664</a><br>
                            <br>
                        </p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 512-706-9404"
                                                      title="512-706-9404">512-706-9404</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/san-antonio/') ?>"
                                                  title="San Antonio">Oficinas de
                                San
                                Antonio</a></p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@29.6113707,-98.4911923,17z/data=!3m1!4b1!4m6!3m5!1s0x865c6202f3dce985:0x6fd90e6aee7db2f!8m2!3d29.6113707!4d-98.4911923!16s%2Fg%2F1hm2ck1x9?entry=ttu" title="18756 Stone Oak Parkway
                            Suite 200 San Antonio, TX 78258">18756 Stone Oak Parkway<br>
                                Suite 200<br>
                                San Antonio, TX 78258</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 210-405-6279"
                                                      title="210-405-6279">210-405-6279</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/waco/') ?>"
                                                  title="Waco">Oficinas de Waco</a></p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@31.5242461,-97.2112885,17z/data=!3m1!4b1!4m6!3m5!1s0x864f8425880c9cd3:0xfce96e77dec21e63!8m2!3d31.5242461!4d-97.2112885!16s%2Fg%2F11b5vn6hkc?entry=ttu"
                                              title="7215 Bosque Blvd. Suite 107 Waco, TX 76710">7215 Bosque Blvd.<br>
                                Suite 107<br>
                                Waco, TX 76710</a><br>
                        </p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 254-655-6306"
                                                      title="254-655-6306">254-655-6306</a>
                        </p>
                    </div>
                    <div class="office has-bottom">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/dallas/') ?>"
                                                  title="Dallas">Oficinas de Dallas</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.8000101,-96.8038181,18z/data=!3m1!4b1!4m6!3m5!1s0x8644b5062945a483:0xe5419554ed0f987f!8m2!3d32.8000101!4d-96.8038181!16s%2Fg%2F1vg6v3rb?entry=ttu"
                                              title="2626 Cole Avenue">2626
                                Cole Avenue<br>
                                Suite 367<br>
                                Dallas, TX 75204</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 214-915-2930"
                                                      title="214-915-2930">214-915-2930</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/fort-worth/') ?>"
                                                  title="Fort Worth">Oficinas de Fort
                                Worth</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.761684,-97.2359313,17z/data=!3m1!4b1!4m6!3m5!1s0x864e710eba5c257d:0xb38cc7df857330fe!8m2!3d32.761684!4d-97.2359313!16s%2Fg%2F11fjw0_07r?entry=ttu"
                                              title="address">5601 Bridge
                                Street<br>
                                Suite 300 <br>
                                Fort Worth TX 76112</a><br>
                        </p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 817-857-8575"
                                                      title="817-857-8575">817-857-8575</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/') ?>" title="Plano">Oficinas
                                de Plano</a></p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@33.0639381,-96.830494,17z/data=!3m1!4b1!4m6!3m5!1s0x864c234d41484a3d:0xdf8e0673ebb9f87c!8m2!3d33.0639381!4d-96.830494!16s%2Fg%2F1q627x4fn?entry=ttu"
                                              title="address">6010
                                W. Spring
                                Creek Pkwy<br>
                                Suite 112<br>
                                Plano, TX 75024</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 972-764-8788"
                                                      title="972-764-8788">972-764-8788</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/arlington/') ?>"
                                                  title="Arlington">Oficinas de
                                Arlington</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.6813142,-97.1097663,17z/data=!3m1!4b1!4m6!3m5!1s0x864e62beacd324e9:0xd4d25e4f2d4a43da!8m2!3d32.6813142!4d-97.1097663!16s%2Fg%2F12hzs8819?entry=ttu"
                                              title="3901 Arlington Highlands Blvd.">3901 Arlington Highlands Blvd.<br>
                                Suite 200<br>
                                Arlington, TX 76018</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 214-949-4761"
                                                      title="214-949-4761">214-949-4761</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/carrollton/') ?>"
                                                  title="Carrollton">Oficinas de
                                Carrollton</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.9845794,-96.8736653,17z/data=!3m1!4b1!4m6!3m5!1s0x864c2f9e14b28623:0x74717e235bed1cfe!8m2!3d32.9845794!4d-96.8736653!16s%2Fg%2F1hg4wk852?entry=ttu"
                                              title="address">2340
                                E. Trinity
                                Mills<br>
                                Suite 300<br>
                                Carrollton, TX 75006</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 469-606-3122"
                                                      title="469-606-3122">469-606-3122</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/houston/') ?>"
                                                  title="Houston">Oficinas de
                                Houston</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Cabello+Hall+Zinda,+PLLC/@29.8025594,-95.5322396,11z/data=!3m1!5s0x8640bf3bdbd81c57:0xf789cc26b95b6318!4m6!3m5!1s0x8640bfbf97344cef:0x51083a1072a146bf!8m2!3d29.7585187!4d-95.3645547!16s%2Fg%2F11fn2yzxp2?entry=ttu"
                                              title="address">1700
                                Post Oak
                                Boulevard 2 BLVD
                                Place<br>
                                Suite 600<br>
                                Houston, TX 77056</a><br>
                            <br>
                        </p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 832-753-6578"
                                                      title="832-753-6578">832-753-6578</a>
                        </p>
                    </div>
                    <div class="office has-bottom">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/texas/corpus-christi/') ?>"
                                    title="Corpus Christi">Oficinas
                                de Corpus
                                Christi</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@27.666716,-97.3592587,17z/data=!3m1!4b1!4m6!3m5!1s0x86685e5fd459bfe9:0x734a22d0042ebbfb!8m2!3d27.666716!4d-97.3592587!16s%2Fg%2F1pp2tw4lg?entry=ttu"
                                              title="address">3205 Rodd
                                Field Rd<br>
                                Corpus Christi, TX 78414</a></p>
                        <p class="phone">Teléfono: <a class="number" title="361-287-7610"
                                                      href="tel: 361-287-7610">361-287-7610</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/midland/') ?>"
                                                  title="Midland">Oficinas de
                                Midland</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@31.9971801,-102.0765269,17z/data=!3m1!4b1!4m6!3m5!1s0x86fbd9a310162179:0x5321f230011d8844!8m2!3d31.9971801!4d-102.0765269!16s%2Fg%2F12qfg4nr5?entry=ttu" title="address">223
                                West Wall St<br>
                                Suite 200<br>
                                Midland, TX 79701</a><br>
                            <br>
                        </p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 432-289-5211"
                                                      title="432-289-5211">432-289-5211</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/el-paso/') ?>"
                                                  title="El Paso">Oficinas de El
                                Paso</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@31.7760375,-106.303313,17z/data=!3m1!4b1!4m6!3m5!1s0x86ddf85c18db35a7:0xf898d0da4df44078!8m2!3d31.7760375!4d-106.303313!16s%2Fg%2F1pp2vlrrv?entry=ttu"
                                              title="address">2300
                                George
                                Dieter Drive<br>
                                El Paso, TX 79936</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 915-223-2293"
                                                      title="915-223-2293">915-223-2293</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/temple/') ?>"
                                                  title="Temple">Oficinas de Temple</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@31.0931361,-97.3432644,17z/data=!3m1!4b1!4m6!3m5!1s0x86456c85d2c630b5:0xe2bee986f306a33f!8m2!3d31.0931361!4d-97.3432644!16s%2Fg%2F1jmcj8d8c?entry=ttu"
                                              title="address">319
                                South
                                First<br>
                                Temple, TX 76504</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 254-274-0370"
                                                      title="254-274-0370">254-274-0370</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/new-mexico/albuquerque/') ?>"
                                    title="Albuquerque">Oficinas de Albuquerque</a></p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@35.084728,-106.6440976,17z/data=!3m1!4b1!4m6!3m5!1s0x87220ddbb7644553:0x382743749ffdb0c9!8m2!3d35.084728!4d-106.6440976!16s%2Fg%2F11m_zhwf2s?entry=ttu" title="address">200
                                Broadway Blvd NE
                                <br>
                                Suite A-3 <br>
                                Albuquerque, NM 87102</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 505-358-7343"
                                                      title="505-358-7343">505-358-7343</a>
                        </p>
                    </div>
                    <div class="office has-bottom">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/colorado/denver/') ?>"
                                                  title="Denver">Oficinas de Denver</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@39.7453651,-104.9906385,17z/data=!3m1!4b1!4m6!3m5!1s0x876c78c4e8724b7b:0x5db4a69718d62ddf!8m2!3d39.7453651!4d-104.9906385!16s%2Fg%2F11bccjcyz9?entry=ttu"
                                              title="address">600
                                17th
                                Street<br>
                                Suite 2625S<br>
                                Denver, CO 80202</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 720-310-1897"
                                                      title="720-310-1897">720-310-1897</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/colorado/fort-collins/') ?>"
                                    title="Fort Collins">Oficinas de
                                Fort
                                Collins</a></p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@40.532283,-105.0764141,17z/data=!3m1!4b1!4m6!3m5!1s0x87694b7f2a68016b:0x620c22289b475041!8m2!3d40.532283!4d-105.0764141!16s%2Fg%2F11btx097my?entry=ttu"
                                              title="address">155 E.
                                Boardwalk Drive<br>
                                Suite 400<br>
                                Fort Collins, CO 80525</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 970-609-9891"
                                                      title="970-609-9891">970-609-9891</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/colorado/aurora/') ?>"
                                                  title="Aurora">Oficinas de Aurora</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@39.6584931,-104.8368431,17z/data=!3m1!4b1!4m6!3m5!1s0x876c880ce0192c31:0x5b211075a6925684!8m2!3d39.6584931!4d-104.8368431!16s%2Fg%2F11btwvs9j0?entry=ttu"
                                              title="address">3190
                                S. Vaughn
                                Way<br>
                                Suite 550<br>
                                Aurora, CO 80014</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 720-780-0289"
                                                      title="720-780-0289">720-780-0289</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/colorado/boulder/') ?>"
                                                  title="Boulder">Oficinas de
                                Boulder</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@40.0193884,-105.2767305,17z/data=!3m1!4b1!4m6!3m5!1s0x876bec2867012693:0x42903234aae4cad4!8m2!3d40.0193884!4d-105.2767305!16s%2Fg%2F11b7ybt1rq?entry=ttu"
                                              title="address">1434
                                Spruce
                                Street<br>
                                Suite 100<br>
                                Boulder, CO 80302</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 720-780-1154"
                                                      title="720-780-1154">720-780-1154</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/colorado/colorado-springs/') ?>"
                                    title="Colorado Springs">Oficinas
                                de Colorado
                                Springs</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@38.8321079,-104.8240298,17z/data=!3m1!4b1!4m6!3m5!1s0x871345224454c29b:0x931c69293b457602!8m2!3d38.8321079!4d-104.8240298!16s%2Fg%2F11b87m4zpv?entry=ttu"
                                              title="address">102 S. Tejon
                                Street<br>
                                Suite 1100<br>
                                Colorado Springs, CO 80903</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 719-431-6623"
                                                      title="719-431-6623">719-431-6623</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/arizona/tucson/') ?>"
                                                  title="Tucson">Oficinas de Tucson</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.221391,-110.971948,17z/data=!3m1!4b1!4m6!3m5!1s0x86d670e1c983e887:0xf30f3213d50f77b5!8m2!3d32.221391!4d-110.971948!16s%2Fg%2F1hm3b1ypd?entry=ttu"
                                              title="address">One
                                South Church
                                Avenue<br>
                                Suite 1200<br>
                                Tucson, 85701</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 520-783-7570"
                                                      title="520-783-7570">520-783-7570</a>
                        </p>
                    </div>
                    <div class="office">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/arizona/phoenix/') ?>"
                                                  title="Phoenix">Oficinas de
                                Phoenix</a>
                        </p>
                        <p class="address"><a
                                    href="https://www.google.com/maps/place/Zinda+Law+Group/@33.5866104,-111.9830491,17z/data=!4m6!3m5!1s0x872b0d6e6f2e07a7:0x2017bbe76384e98a!8m2!3d33.5866101!4d-111.9782855!16s%2Fg%2F11f5dgzt91?entry=ttu"
                                    target="_blank" class="no-lightbox" title="address">11201 North Tatum Boulevard<br>
                                Suite 300<br>
                                Phoenix, AZ 85028</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 480-442-6990"
                                                      title="480-442-6990">480-442-6990</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/new-mexico/las-cruces/') ?>"
                                    title="Las Cruces">Oficinas de Las
                                Cruces</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.3105132,-106.7565351,17z/data=!3m1!4b1!4m6!3m5!1s0x86de3d637d23ffff:0xd56538bae525bd4b!8m2!3d32.3105132!4d-106.7565351!16s%2Fg%2F11h06myjms?entry=ttu"
                                              title="address">1990
                                E. Lohman
                                Avenue<br>
                                Las Cruces, NM 88001</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 575-376-6413"
                                                      title="575-376-6413">575-376-6413</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/texas/college-station/') ?>"
                                    title="Bryan College-Station">Oficinas
                                de Bryan
                                College-Station</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@30.6527904,-96.3381445,17z/data=!3m1!4b1!4m6!3m5!1s0x8646812593253c73:0x21a22a9e50ecf686!8m2!3d30.6527904!4d-96.3381445!16s%2Fg%2F11h5vkpjsn?entry=ttu"
                                              title="address">1716
                                Briarcrest
                                Drive<br>
                                Suite 300<br>
                                Bryan, TX 77802</a><br>
                        </p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 979-243-2210"
                                                      title="979-243-2210">979-243-2210</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/new-mexico/santa-fe/') ?>"
                                                  title="Santa Fe">Oficinas de Santa
                                Fe</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@35.6864106,-105.9453378,17z/data=!3m1!4b1!4m6!3m5!1s0x8718515ab0e1382f:0xc9c1dea426dedd70!8m2!3d35.6864106!4d-105.9453378!16s%2Fg%2F11qql5250l?entry=ttu" title="address">314
                                S. Guadalupe
                                Street<br>
                                Suite 112<br>
                                Santa Fe, NM 87501</a></p>
                        <p class="phone">Teléfono: <a class="number" href="tel: 505-557-1828"
                                                      title="505-557-1828">505-557-1828</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/florida/miami/') ?>"
                                                  title="Miami">Oficinas de
                                Miami</a>
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@25.7498385,-80.2401452,17z/data=!3m1!4b1!4m6!3m5!1s0x88d9b7068e144175:0x62529d91bf5c5339!8m2!3d25.7498385!4d-80.2401452!16s%2Fg%2F11mwrspj10?entry=ttu" title="address">2828
                                Coral Way<br>
                                Suite 303<br>
                                Miami, FL 33145</a></p>
                        <p class="phone">Teléfono: <a class="number" title="786-789-2523"
                                                      href="tel: 786-789-2523">786-789-2523</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <section class="section-offices">
            <div class="container">
                <div class="office-list">
                    <div class="office principal has-bottom">
                        <span class="principal-label">Principal Office</span>
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/austin/') ?>"
                                                  title="North Austin">North Austin</a>
                            Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@30.38887,-97.7606432,17z/data=!3m1!4b1!4m6!3m5!1s0x8644cb602c7044ab:0xcffa6f519daaa3fe!8m2!3d30.38887!4d-97.7606432!16s%2Fg%2F124ydzhs_?entry=ttu"
                                              title="address">8834
                                N. Capital
                                of Texas
                                Highway<br>
                                Suite 304<br>
                                Austin, TX 78759</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 512-877-5658"
                                                   title="512-877-5658<">512-877-5658</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/austin/') ?>"
                                                  title="Downtown Austin">Downtown
                                Austin</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@30.2800684,-97.7454473,17z/data=!3m1!4b1!4m6!3m5!1s0x8644cb05ba0712f5:0xba047577849d9486!8m2!3d30.2800684!4d-97.7454473!16s%2Fg%2F1tj73_7j?entry=ttu" title="823 Congress Ave, Suite 300,
                            Austin TX 78701">823 Congress Ave, Suite 300,
                                Austin TX 78701</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 512-706-9542"
                                                   title="512-706-9542">512-706-9542</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/round-rock/') ?>"
                                                  title="Round Rock">Round Rock</a>
                            Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@30.5171931,-97.6769397,17z/data=!3m1!4b1!4m6!3m5!1s0x8644d1962eabfc6f:0x629eec76d08e1b3!8m2!3d30.5171931!4d-97.6769397!16s%2Fg%2F11yh3gm03?entry=ttu" title="1000 Heritage Center Circle
                            Round Rock, TX 78664">1000 Heritage Center Circle<br>
                                Round Rock, TX 78664</a><br>
                            <br>
                        </p>
                        <p class="phone">Phone: <a class="number" href="tel: 512-706-9404"
                                                   title="512-706-9404">512-706-9404</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/san-antonio/') ?>"
                                                  title="San Antonio">San
                                Antonio</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@29.6113707,-98.4911923,17z/data=!3m1!4b1!4m6!3m5!1s0x865c6202f3dce985:0x6fd90e6aee7db2f!8m2!3d29.6113707!4d-98.4911923!16s%2Fg%2F1hm2ck1x9?entry=ttu" title="18756 Stone Oak Parkway
                            Suite 200 San Antonio, TX 78258">18756 Stone Oak Parkway<br>
                                Suite 200<br>
                                San Antonio, TX 78258</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 210-405-6279"
                                                   title="210-405-6279">210-405-6279</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/waco/') ?>"
                                                  title="Waco">Waco</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@31.5242461,-97.2112885,17z/data=!3m1!4b1!4m6!3m5!1s0x864f8425880c9cd3:0xfce96e77dec21e63!8m2!3d31.5242461!4d-97.2112885!16s%2Fg%2F11b5vn6hkc?entry=ttu"
                                              title="7215 Bosque Blvd. Suite 107 Waco, TX 76710">7215 Bosque Blvd.<br>
                                Suite 107<br>
                                Waco, TX 76710</a><br>
                        </p>
                        <p class="phone">Phone: <a class="number" href="tel: 254-655-6306"
                                                   title="254-655-6306">254-655-6306</a>
                        </p>
                    </div>
                    <div class="office has-bottom">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/dallas/') ?>"
                                                  title="Dallas">Dallas</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.8000101,-96.8038181,18z/data=!3m1!4b1!4m6!3m5!1s0x8644b5062945a483:0xe5419554ed0f987f!8m2!3d32.8000101!4d-96.8038181!16s%2Fg%2F1vg6v3rb?entry=ttu"
                                              title="2626 Cole Avenue">2626
                                Cole Avenue<br>
                                Suite 367<br>
                                Dallas, TX 75204</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 214-915-2930"
                                                   title="214-915-2930">214-915-2930</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/fort-worth/') ?>"
                                                  title="Fort Worth">Fort Worth</a>
                            Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.761684,-97.2359313,17z/data=!3m1!4b1!4m6!3m5!1s0x864e710eba5c257d:0xb38cc7df857330fe!8m2!3d32.761684!4d-97.2359313!16s%2Fg%2F11fjw0_07r?entry=ttu"
                                              title="address">5601 Bridge
                                Street<br>
                                Suite 300 <br>
                                Fort Worth TX 76112</a><br>
                        </p>
                        <p class="phone">Phone: <a class="number" href="tel: 817-857-8575"
                                                   title="817-857-8575">817-857-8575</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/') ?>"
                                                  title="Plano">Plano</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@33.0639381,-96.830494,17z/data=!3m1!4b1!4m6!3m5!1s0x864c234d41484a3d:0xdf8e0673ebb9f87c!8m2!3d33.0639381!4d-96.830494!16s%2Fg%2F1q627x4fn?entry=ttu"
                                              title="address">6010
                                W. Spring
                                Creek Pkwy<br>
                                Suite 112<br>
                                Plano, TX 75024</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 972-764-8788"
                                                   title="972-764-8788">972-764-8788</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/arlington/') ?>"
                                                  title="Arlington">Arlington</a>
                            Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.6813142,-97.1097663,17z/data=!3m1!4b1!4m6!3m5!1s0x864e62beacd324e9:0xd4d25e4f2d4a43da!8m2!3d32.6813142!4d-97.1097663!16s%2Fg%2F12hzs8819?entry=ttu"
                                              title="3901 Arlington Highlands Blvd.">3901 Arlington Highlands Blvd.<br>
                                Suite 200<br>
                                Arlington, TX 76018</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 214-949-4761"
                                                   title="214-949-4761">214-949-4761</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/carrollton/') ?>"
                                                  title="Carrollton">Carrollton</a>
                            Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.9845794,-96.8736653,17z/data=!3m1!4b1!4m6!3m5!1s0x864c2f9e14b28623:0x74717e235bed1cfe!8m2!3d32.9845794!4d-96.8736653!16s%2Fg%2F1hg4wk852?entry=ttu"
                                              title="address">2340
                                E. Trinity
                                Mills<br>
                                Suite 300<br>
                                Carrollton, TX 75006</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 469-606-3122"
                                                   title="469-606-3122">469-606-3122</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/houston/') ?>"
                                                  title="Houston">Houston</a> Office:
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Cabello+Hall+Zinda,+PLLC/@29.8025594,-95.5322396,11z/data=!3m1!5s0x8640bf3bdbd81c57:0xf789cc26b95b6318!4m6!3m5!1s0x8640bfbf97344cef:0x51083a1072a146bf!8m2!3d29.7585187!4d-95.3645547!16s%2Fg%2F11fn2yzxp2?entry=ttu"
                                              title="address">1700
                                Post Oak
                                Boulevard 2 BLVD
                                Place<br>
                                Suite 600<br>
                                Houston, TX 77056</a><br>
                            <br>
                        </p>
                        <p class="phone">Phone: <a class="number" href="tel: 832-753-6578"
                                                   title="832-753-6578">832-753-6578</a>
                        </p>
                    </div>
                    <div class="office has-bottom">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/texas/corpus-christi/') ?>"
                                    title="Corpus Christi">Corpus
                                Christi</a> Office:
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@27.666716,-97.3592587,17z/data=!3m1!4b1!4m6!3m5!1s0x86685e5fd459bfe9:0x734a22d0042ebbfb!8m2!3d27.666716!4d-97.3592587!16s%2Fg%2F1pp2tw4lg?entry=ttu"
                                              title="address">3205 Rodd
                                Field Rd<br>
                                Corpus Christi, TX 78414</a></p>
                        <p class="phone">Phone: <a class="number" title="361-287-7610"
                                                   href="tel: 361-287-7610">361-287-7610</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/midland/') ?>"
                                                  title="Midland">Midland</a> Office:
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@31.9971801,-102.0765269,17z/data=!3m1!4b1!4m6!3m5!1s0x86fbd9a310162179:0x5321f230011d8844!8m2!3d31.9971801!4d-102.0765269!16s%2Fg%2F12qfg4nr5?entry=ttu" title="address">223
                                West Wall St<br>
                                Suite 200<br>
                                Midland, TX 79701</a><br>
                            <br>
                        </p>
                        <p class="phone">Phone: <a class="number" href="tel: 432-289-5211"
                                                   title="432-289-5211">432-289-5211</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/el-paso/') ?>"
                                                  title="El Paso">El Paso</a> Office:
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@31.7760375,-106.303313,17z/data=!3m1!4b1!4m6!3m5!1s0x86ddf85c18db35a7:0xf898d0da4df44078!8m2!3d31.7760375!4d-106.303313!16s%2Fg%2F1pp2vlrrv?entry=ttu"
                                              title="address">2300
                                George
                                Dieter Drive<br>
                                El Paso, TX 79936</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 915-223-2293"
                                                   title="915-223-2293">915-223-2293</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/texas/temple/') ?>"
                                                  title="Temple">Temple</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@31.0931361,-97.3432644,17z/data=!3m1!4b1!4m6!3m5!1s0x86456c85d2c630b5:0xe2bee986f306a33f!8m2!3d31.0931361!4d-97.3432644!16s%2Fg%2F1jmcj8d8c?entry=ttu"
                                              title="address">319
                                South
                                First<br>
                                Temple, TX 76504</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 254-274-0370"
                                                   title="254-274-0370">254-274-0370</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/new-mexico/albuquerque/') ?>"
                                    title="Albuquerque">Albuquerque</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@35.084728,-106.6440976,17z/data=!3m1!4b1!4m6!3m5!1s0x87220ddbb7644553:0x382743749ffdb0c9!8m2!3d35.084728!4d-106.6440976!16s%2Fg%2F11m_zhwf2s?entry=ttu" title="address">200
                                Broadway Blvd NE
                                <br>
                                Suite A-3 <br>
                                Albuquerque, NM 87102</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 505-358-7343"
                                                   title="505-358-7343">505-358-7343</a>
                        </p>
                    </div>
                    <div class="office has-bottom">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/colorado/denver/') ?>"
                                                  title="Denver">Denver</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@39.7453651,-104.9906385,17z/data=!3m1!4b1!4m6!3m5!1s0x876c78c4e8724b7b:0x5db4a69718d62ddf!8m2!3d39.7453651!4d-104.9906385!16s%2Fg%2F11bccjcyz9?entry=ttu"
                                              title="address">600
                                17th
                                Street<br>
                                Suite 2625S<br>
                                Denver, CO 80202</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 720-310-1897"
                                                   title="720-310-1897">720-310-1897</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/colorado/fort-collins/') ?>"
                                    title="Fort Collins">Fort
                                Collins</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@40.532283,-105.0764141,17z/data=!3m1!4b1!4m6!3m5!1s0x87694b7f2a68016b:0x620c22289b475041!8m2!3d40.532283!4d-105.0764141!16s%2Fg%2F11btx097my?entry=ttu"
                                              title="address">155 E.
                                Boardwalk Drive<br>
                                Suite 400<br>
                                Fort Collins, CO 80525</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 970-609-9891"
                                                   title="970-609-9891">970-609-9891</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/colorado/aurora/') ?>"
                                                  title="Aurora">Aurora</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@39.6584931,-104.8368431,17z/data=!3m1!4b1!4m6!3m5!1s0x876c880ce0192c31:0x5b211075a6925684!8m2!3d39.6584931!4d-104.8368431!16s%2Fg%2F11btwvs9j0?entry=ttu"
                                              title="address">3190
                                S. Vaughn
                                Way<br>
                                Suite 550<br>
                                Aurora, CO 80014</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 720-780-0289"
                                                   title="720-780-0289">720-780-0289</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/colorado/boulder/') ?>"
                                                  title="Boulder">Boulder</a> Office:
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@40.0193884,-105.2767305,17z/data=!3m1!4b1!4m6!3m5!1s0x876bec2867012693:0x42903234aae4cad4!8m2!3d40.0193884!4d-105.2767305!16s%2Fg%2F11b7ybt1rq?entry=ttu"
                                              title="address">1434
                                Spruce
                                Street<br>
                                Suite 100<br>
                                Boulder, CO 80302</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 720-780-1154"
                                                   title="720-780-1154">720-780-1154</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/colorado/colorado-springs/') ?>"
                                    title="Colorado Springs">Colorado
                                Springs</a>
                            Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@38.8321079,-104.8240298,17z/data=!3m1!4b1!4m6!3m5!1s0x871345224454c29b:0x931c69293b457602!8m2!3d38.8321079!4d-104.8240298!16s%2Fg%2F11b87m4zpv?entry=ttu"
                                              title="address">102 S. Tejon
                                Street<br>
                                Suite 1100<br>
                                Colorado Springs, CO 80903</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 719-431-6623"
                                                   title="719-431-6623">719-431-6623</a>
                        </p>
                    </div>
                    <div class="office has-bottom has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/arizona/tucson/') ?>"
                                                  title="Tucson">Tucson</a> Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.221391,-110.971948,17z/data=!3m1!4b1!4m6!3m5!1s0x86d670e1c983e887:0xf30f3213d50f77b5!8m2!3d32.221391!4d-110.971948!16s%2Fg%2F1hm3b1ypd?entry=ttu"
                                              title="address">One
                                South Church
                                Avenue<br>
                                Suite 1200<br>
                                Tucson, 85701</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 520-783-7570"
                                                   title="520-783-7570">520-783-7570</a>
                        </p>
                    </div>
                    <div class="office">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/arizona/phoenix/') ?>"
                                                  title="Phoenix">Phoenix</a> Office:
                        </p>
                        <p class="address"><a
                                    href="https://www.google.com/maps/place/Zinda+Law+Group/@33.5866104,-111.9830491,17z/data=!4m6!3m5!1s0x872b0d6e6f2e07a7:0x2017bbe76384e98a!8m2!3d33.5866101!4d-111.9782855!16s%2Fg%2F11f5dgzt91?entry=ttu"
                                    target="_blank" class="no-lightbox" title="address">11201 North Tatum Boulevard<br>
                                Suite 300<br>
                                Phoenix, AZ 85028</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 480-442-6990"
                                                   title="480-442-6990">480-442-6990</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/new-mexico/las-cruces/') ?>"
                                    title="Las Cruces">Las Cruces</a>
                            Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@32.3105132,-106.7565351,17z/data=!3m1!4b1!4m6!3m5!1s0x86de3d637d23ffff:0xd56538bae525bd4b!8m2!3d32.3105132!4d-106.7565351!16s%2Fg%2F11h06myjms?entry=ttu"
                                              title="address">1990
                                E. Lohman
                                Avenue<br>
                                Las Cruces, NM 88001</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 575-376-6413"
                                                   title="575-376-6413">575-376-6413</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a
                                    href="<?= site_url('/personal-injury-lawyer/texas/college-station/') ?>"
                                    title="Bryan College-Station">Bryan
                                College-Station</a>
                            Office:</p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@30.6527904,-96.3381445,17z/data=!3m1!4b1!4m6!3m5!1s0x8646812593253c73:0x21a22a9e50ecf686!8m2!3d30.6527904!4d-96.3381445!16s%2Fg%2F11h5vkpjsn?entry=ttu"
                                              title="address">1716
                                Briarcrest
                                Drive<br>
                                Suite 300<br>
                                Bryan, TX 77802</a><br>
                        </p>
                        <p class="phone">Phone: <a class="number" href="tel: 979-243-2210"
                                                   title="979-243-2210">979-243-2210</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/new-mexico/santa-fe/') ?>"
                                                  title="Santa Fe">Santa Fe</a> Office:
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@35.6864106,-105.9453378,17z/data=!3m1!4b1!4m6!3m5!1s0x8718515ab0e1382f:0xc9c1dea426dedd70!8m2!3d35.6864106!4d-105.9453378!16s%2Fg%2F11qql5250l?entry=ttu" title="address">314
                                S. Guadalupe
                                Street<br>
                                Suite 112<br>
                                Santa Fe, NM 87501</a></p>
                        <p class="phone">Phone: <a class="number" href="tel: 505-557-1828"
                                                   title="505-557-1828">505-557-1828</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/florida/miami/') ?>"
                                                  title="Miami">Miami</a> Office:
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/place/Zinda+Law+Group/@25.7498385,-80.2401452,17z/data=!3m1!4b1!4m6!3m5!1s0x88d9b7068e144175:0x62529d91bf5c5339!8m2!3d25.7498385!4d-80.2401452!16s%2Fg%2F11mwrspj10?entry=ttu" title="address">2828
                                Coral Way<br>
                                Suite 303<br>
                                Miami, FL 33145</a></p>
                        <p class="phone">Phone: <a class="number" title="786-789-2523"
                                                   href="tel: 786-789-2523">786-789-2523</a>
                        </p>
                    </div>
                    <div class="office has-left">
                        <p class="office-name"><a href="<?= site_url('/personal-injury-lawyer/florida/naples/') ?>"
                                                  title="Naples">Naples</a> Office:
                        </p>
                        <p class="address"><a target="_blank" href="https://www.google.com/maps/search/3201+Tamiami+Trail+North+First+Floor+Suite+116,+Naples,+FL+34103/@26.1853588,-81.8029472,17z/data=!3m1!4b1?entry=ttu" title="address">3201
                                Tamiami Trail North First Floor<br>
                                Suite 116<br>
                                Naples, FL 34103</a></p>
                        <p class="phone">Phone: <a class="number" title="786-789-2523"
                                                   href="tel: 239-241-7063">239-241-7063</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>

    <section class="section-city-list">
        <?php
        if( is_custom_locations('/es/') ){
            $title = 'Oficinas En';
            $texas_url = '/es/abogado-de-lesiones-personales/texas/';
            $colorado_url = '/es/abogado-de-lesiones-personales/colorado/';
            $new_mexico_url = '/es/abogado-de-lesiones-personales/nuevo-mexico/';
            $arizona_url = '/es/abogado-de-lesiones-personales/accidente-de-apagon/texas/';
            $florida_url = '/es/abogado-de-lesiones-personales/florida/';
        }
        else{
            $title = 'Offices in';
            $texas_url = '/personal-injury-lawyer/texas/';
            $colorado_url = '/personal-injury-lawyer/colorado/';
            $new_mexico_url = '/personal-injury-lawyer/new-mexico/';
            $arizona_url = '/personal-injury-lawyer/arizona/';
            $florida_url = '/personal-injury-lawyer/florida/';
        }
        ?>
        <div class="row mx-0">
            <div class="col-md-6 p-0">
                <a href="<?= site_url($texas_url) ?>" title="Offices in Texas">
                    <img src="<?= site_url('/wp-content/uploads/2022/02/texas-bl.webp') ?>" alt="Offices in Texas"
                         title="Offices in Texas" width="1920" height="480">
                    <p><span><?=$title?></span><br>Texas</p>
                </a>
            </div>
            <div class="col-md-6 p-0">
                <a href="<?= site_url($colorado_url) ?>" title="Offices in Colorado">
                    <img src="<?= site_url('/wp-content/uploads/2022/02/colorado-bl.webp') ?>" alt="Offices in Colorado"
                         title="Offices in Colorado" width="1920" height="480">
                    <p><span><?=$title?></span><br>Colorado</p>
                </a>
            </div>
            <div class="col-md-4 p-0">
                <a href="<?= site_url($new_mexico_url) ?>" title="Offices in New Mexico">
                    <img src="<?= site_url('/wp-content/uploads/2022/02/newmexico-bl.webp') ?>"
                         alt="Offices in New Mexico" title="Offices in New Mexico" width="1286" height="480">
                    <p><span><?=$title?></span><br>New Mexico</p>
                </a>
            </div>
            <div class="col-md-4 p-0">
                <a href="<?= site_url($arizona_url) ?>" title="Offices in Arizona">
                    <img src="<?= site_url('/wp-content/uploads/2022/02/Arizona-bl.webp') ?>" alt="Offices in Arizona"
                         title="Offices in Arizona" width="1286" height="480">
                    <p><span><?=$title?></span><br>Arizona</p>
                </a>
            </div>
            <div class="col-md-4 p-0">
                <a href="<?= site_url($florida_url) ?>" alt="Offices in florida"
                   title="Offices in florida">
                    <img src="<?= site_url('/wp-content/uploads/2022/02/florida-bl.webp') ?>" alt="Offices in florida"
                         title="Offices in florida" width="1286" height="480">
                    <p><span><?=$title?></span><br>Florida</p>
                </a>
            </div>
        </div>
    </section>
    <?php
}

function custom_footer()
{
    remove_action('genesis_footer', 'genesis_do_footer', 10);
    global $hc_settings; ?>

    <div class="footer">
        <div class="container">
            <div class="footer-columns">
                <div class="column">
                    <img src="<?= CHILD_URL ?>/assets/app/img/logo/footer-logo.png" alt="Zinda Law Group"
                         title="Zinda Law Group" width="274" height="57">
                    <h2 class="left-line">
                        <?php if (is_custom_locations('/es/')) { ?>
                            Abogados de lesiones personales a nivel nacional
                            <?php
                        } else {
                            ?>
                            Nationwide Personal Injury Lawyers
                            <?php
                        } ?>
                    </h2>
                    <p>
                        <?php if (is_custom_locations('/es/')) { ?>
                            Zinda Law Group es un bufete de abogados de lesiones personales reconocido a nivel nacional por ayudar a quienes sufrieron lesiones en algún accidente a buscar la compensación que merecen.
                            <?php
                        } else {
                            ?>
                            Zinda Law Group is a nationally recognized personal injury law firm that helps people who have been injured in an accident seek the compensation they deserve.
                            <?php
                        } ?>
                    </p>
                    <p class="copyright">
                        <span>© Zinda Law Group</span>
                        <a href="<?= site_url('/site-map/') ?>">
                            <?php if (is_custom_locations('/es/')) { ?>
                                Mapa del sitio
                                <?php
                            } else {
                                ?>
                                Site Map
                                <?php
                            } ?>
                        </a> <a
                                href="<?= site_url('/privacy-notice/') ?>">
                            <?php if (is_custom_locations('/es/')) { ?>
                                Políticas de privacidad
                                <?php
                            } else {
                                ?>
                                Privacy
                                <?php
                            } ?></a>
                    </p>
                    <p class="copyright" style="justify-content: space-around;">
                        <a href="<?= site_url('/terms-of-service/') ?>">
                            <?php if (is_custom_locations('/es/')) { ?>
                                Términos de servicio
                                <?php
                            } else {
                                ?>
                                Terms of Service
                                <?php
                            } ?>
                        </a>
                        <a href="<?= site_url('/disclaimer/') ?>">
                            <?php if (is_custom_locations('/es/')) { ?>
                                Declaratoria de responsabilidad
                                <?php
                            } else {
                                ?>
                                Disclaimer
                                <?php
                            } ?>
                        </a>
                    </p>
                </div>
                <div class="column">
                    <h3 class="left-line">
                        <?php if (is_custom_locations('/es/')) { ?>
                            Menú
                            <?php
                        } else {
                            ?>
                            Menu
                            <?php
                        } ?>
                    </h3>
                    <?php if (is_custom_locations('/es/')) {
                        wp_nav_menu([
                            'menu' => 'Footer Menu Es',
                        ]);
                    } else {
                        wp_nav_menu([
                            'menu' => 'Footer Menu',
                        ]);
                    } ?>
                    <?php ?>
                </div>
                <div class="column">
                    <h3 class="left-line">
                        <?php if (is_custom_locations('/es/')) { ?>
                            Páginas populares
                            <?php
                        } else {
                            ?>
                            Popular Pages
                            <?php
                        } ?>
                    </h3>
                    <?php if (is_custom_locations('/es/')) {
                        wp_nav_menu([
                            'menu' => 'Footer Popular Menu Es',
                        ]);
                    } else {
                        wp_nav_menu([
                            'menu' => 'Footer Popular Menu',
                        ]);
                    } ?>
                    <?php ?>
                </div>
                <div class=" column">
                    <h3 class="left-line">
                        <?php if (is_custom_locations('/es/')) { ?>
                            Síganos
                            <?php
                        } else {
                            ?>
                            Follow Us
                            <?php
                        } ?>
                    </h3>
                    <div class="footer-social">
                        <a title="Facebook" target="_blank" href="https://www.facebook.com/ZindaLawGroup/">
                            <?= do_shortcode('[icon name="facebook"]'); ?>
                        </a>

                        <a title="Twitter" aria-label="Twitter" target="_blank"
                           href="https://twitter.com/ZindaLawGroup">
                            <?= do_shortcode('[icon name="twitter"]'); ?>
                        </a>

                        <a title="LinkedIn" aria-label="LinkedIn" target="_blank"
                           href="https://www.linkedin.com/company/zinda-law-group">
                            <?= do_shortcode('[icon name="linkedin"]'); ?>
                        </a>

                        <a title="Instagram" aria-label="Instagram" target="_blank"
                           href="https://www.instagram.com/zindalawgroup/">
                            <?= do_shortcode('[icon name="instagram"]'); ?>
                        </a>
                    </div>
                    <a href="#" onclick="ccliface.openManual(); return false;" title="Client Chat Live"
                       class="d-none-mobile">
                        <img src="<?= CHILD_URL ?>/assets/app/img/logo/ccl-logo.png" alt="Client Chat Live"
                             title="Client Chat Live" width="200" height="74">
                    </a>
                </div>
            </div>
            <div class="footer-plugin" style="width: 100%;padding: 5px 0px;">
                <?php echo do_shortcode("[autopilot_shortcode]"); ?>
            </div>            
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-3">
                        <a href="https://www.bbb.org/us/tx/austin/profile/lawyers/zinda-law-group-pllc-0825-90094646#bbbonlineclick"
                           title="Zinda Law Group, PLLC BBB Business Review">
                            <img src="<?= CHILD_URL ?>/assets/app/img/images/blue-seal.png"
                                 alt="Zinda Law Group, PLLC BBB Business Review"
                                 title="Zinda Law Group, PLLC BBB Business Review" width="239" height="50">
                        </a>
                    </div>
                    <div class="col-lg-6"><p>
                            <?php if (is_custom_locations('/es/')) { ?>
                                La información en este sitio web es solo para fines de información general. Nada en este sitio debe tomarse como consejo legal para ningún caso o situación individual. Esta información no tiene la intención de crear, y su recepción o visualización no constituye una relación abogado-cliente. Si no ganamos, usted no será responsable de los honorarios de abogados, costos judiciales o gastos de litigio. Si gana, estos gastos y facturas médicas se descontarán de una parte de su compensación.
                                <?php
                            } else {
                                ?>
                                The information on this website is for general information purposes only. Nothing on this site should be taken as legal advice for any individual case or situation. This information is not intended to create, and receipt or viewing does not constitute, an attorney-client relationship. If we do not win, you will not be responsible for attorney's fees, court costs, or litigation expenses. If you do win, these expenses and unpaid medical bills will be taken from your share of the recovery.
                                <?php
                            } ?></p>
                    </div>
                    <div class="col-lg-3 d-none-mobile">
                        <a href="#" onclick="ccliface.openManual(); return false;">
                            <img src="<?= CHILD_URL ?>/assets/app/img/images/live-chat-button.png"
                                 alt="Zinda Law Group, Live Chat Button" title="Zinda Law Group, Live Chat Button"
                                 width="257" height="105"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" name="scroll-to-up" aria-label="scroll to up" id="scrollToTop"
            class="btn-up"><?php echo do_shortcode('[icon name="arrow-down"]'); ?></button>

    <div id="hd-modal-container">
    </div>
    <script src="https://cdn.plyr.io/3.7.3/plyr.js"></script>
    <script src="https://cdn.plyr.io/3.7.3/plyr.polyfilled.js"></script>

    <script data-powa-ignore=true type="text/javascript" src="//cdn.callrail.com/companies/227240705/49927420b0a1c2e6f318/12/swap.js"></script>

    <script type="text/javascript">
        const players = Array.from(document.querySelectorAll('.player')).map((p) => new Plyr(p));

        const player = new Plyr('#player', {
            title: 'Zinda videos',
        });

        // Expose player so it can be used from the console
        window.player = player;
    </script>
    <script>(function (d) {
            var s = d.createElement("script");
            s.setAttribute("data-account", "E2V52Bhc3M");
            s.setAttribute("src", "https://cdn.userway.org/widget.js");
            (d.body || d.head).appendChild(s);
        })(document)</script>
    <noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website
            accessibility</a></noscript>
    <?php
}