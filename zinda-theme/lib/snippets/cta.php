<?php
// adding CTA's

if (!function_exists('hd_generate_cta')) {
    function hd_generate_cta() {
        global $post;
        global $hc_settings;

        $terms = get_the_terms($post->ID, $hc_settings['location_taxonomy']); // get page location term (city)

        $phoneNumber = $hc_settings['phone_number']; // get phone number

        $cta = [];

        //if no city, its not single blog post and its not FAQ page - then return content without CTA's

        if (!$terms && !is_singular('post') && !has_term('', $hc_settings['faqs_category_taxonomy'])) {
            return [];
        }

        if (is_custom_locations('/es/')) {
            $cta[0] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-first.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>John (Jack) Zinda</p><p>Fundador / CEO</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">Más de 100 años de experiencia combinada representando a víctimas lesionadas en todo el país.</p>
                                <a href="' . site_url('/es/evaluacion-de-caso/') . '" class="btn-rounded"><span style="font-weight: 200;">Disponible 24 / 7</span><span>|</span><span>Consulta gratis</span></a>
                            </div>
                        </div>';

            $cta[1] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-second.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>Neil Solomon</p><p>Socio</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">Los resultados reales importan. No nos paga a menos que ganemos su caso.</p>
                                <a href="' . site_url('/es/evaluacion-de-caso/') . '" class="btn-rounded"><span style="font-weight: 200;">Disponible 24 / 7</span><span>|</span><span>Consulta gratis</span></a>
                            </div>
                        </div>';

            $cta[2] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-fifth.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>Jason Aldridge</p><p>Abogada</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">Estamos disponibles las 24 horas del día, los 7 días de la semana, listos para responder cuando usted lo necesite.</p>
                                <a href="' . site_url('/es/evaluacion-de-caso/') . '" class="btn-rounded"><span style="font-weight: 200;">Disponible 24 / 7</span><span>|</span><span>Consulta gratis</span></a>
                            </div>
                        </div>';

            $cta[3] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-forth.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>Cole Gumm</p><p>Abogado</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">Estamos aquí para asegurarnos de que usted no enfrente este momento difícil solo.</p>
                                <a href="' . site_url('/es/evaluacion-de-caso/') . '" class="btn-rounded"><span style="font-weight: 200;">Disponible 24 / 7</span><span>|</span><span>Consulta gratis</span></a>
                            </div>
                        </div>';

            $cta[4] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-fifth.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>Jason Aldridge</p><p>Abogado</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">Hemos representado exitosamente a clientes en una amplia variedad de casos en todo el país.</p>
                                <a href="' . site_url('/es/evaluacion-de-caso/') . '" class="btn-rounded"><span style="font-weight: 200;">Disponible 24 / 7</span><span>|</span><span>Consulta gratis</span></a>
                            </div>
                        </div>';
        } else {
            $cta[0] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-first.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>John (Jack) Zinda</p><p>Founder / CEO</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">Over 100 years of combined experience representing injured victims across the country.</p>
                                <a href="' . site_url('/case-evaluation/') . '" class="btn-rounded"><span style="font-weight: 200;">Available 24 / 7</span><span>|</span><span>Free Consultation</span></a>
                            </div>
                        </div>';

            $cta[1] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-second.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>Neil Solomon</p><p>Partner</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">Real results matter. We do not get paid unless we win your case.</p>
                                <a href="' . site_url('/case-evaluation/') . '" class="btn-rounded"><span style="font-weight: 200;">Available 24 / 7</span><span>|</span><span>Free Consultation</span></a>
                            </div>
                        </div>';

            $cta[2] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-fifth.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>Jason Aldridge</p><p>Attorney</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">Standing by 24 hours a day, 7 days a week ready to answer in your time of need.</p>
                                <a href="' . site_url('/case-evaluation/') . '" class="btn-rounded"><span style="font-weight: 200;">Available 24 / 7</span><span>|</span><span>Free Consultation</span></a>
                            </div>
                        </div>';

            $cta[3] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-forth.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>Cole Gumm</p><p>Attorney</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">We are here to ensure you won’t have to face this difficult time alone.</p>
                                <a href="' . site_url('/case-evaluation/') . '" class="btn-rounded"><span style="font-weight: 200;">Available 24 / 7</span><span>|</span><span>Free Consultation</span></a>
                            </div>
                        </div>';

            $cta[4] = '<div class="new-ctas">
                            <div class="cta-top">
                                <img src="' . CHILD_URL . '/assets/app/img/images/new-ctas-fifth.png" width="100%" height="433" alt="Available 24 / 7 Free Consultation">
                                <div class="top-text"><p>Jason Aldridge</p><p>Attorney</p></div>
                            </div>
                            <div class="container-fluid flex-center">
                                <p class="white">We have successfully represented clients in a wide variety of cases across the country.</p>
                                <a href="' . site_url('/case-evaluation/') . '" class="btn-rounded"><span style="font-weight: 200;">Available 24 / 7</span><span>|</span><span>Free Consultation</span></a>
                            </div>
                        </div>';
        }
        return $cta;
    }
}

add_filter('the_content', function ($content) {
    $cta_array = hd_generate_cta();

    if (!$cta_array) {
        return $content;
    }

    //list($cta_first, $cta_second, $cta_third, $cta_fourth, $cta_last) = $cta_array;
    list($cta_first, $cta_second) = $cta_array;
/*
    // matching all h2 in post_content, getting its offset
    preg_match_all('/<h2.*?>/', $content, $h2_matches, PREG_OFFSET_CAPTURE);

    // if no h2 in content - matching other headers
    if (count($h2_matches[0]) <= 2) {
        preg_match_all('/<h(2|3|4)(.*)>/', $content, $h2_matches, PREG_OFFSET_CAPTURE);
    }
    // if no other headers in article - matching <p> tags with 300+ symbols between <p> and </p>
    if (count($h2_matches[0]) <= 1) {
        preg_match_all('/<p>.{300,}<\/p>/', $content, $h2_matches, PREG_OFFSET_CAPTURE);

        // if more than two <p> matched - exclude first match
        if (count($h2_matches[0]) > 2) {
            array_shift($h2_matches[0]);
        }
    }

    // including CTA's just before matched headers or <p>'s
    if (count($h2_matches[0]) > 1) {
        foreach (array_reverse($h2_matches[0]) as $k => $h2_match) {

            $k = count($h2_matches[0]) - $k - 1;

            if ($h2_match[1] && $k == 1) {
                $content = substr_replace($content, $cta_first, $h2_match[1], 0);
            }

            if ($h2_match[1] && $k == 2 && $cta_second) {
                $content = substr_replace($content, $cta_second, $h2_match[1], 0);
            }

            if ($h2_match[1] && $k == 3) {
                $content = substr_replace($content, $cta_third, $h2_match[1], 0);
            }

            if ($h2_match[1] && $k == 4) {
                $content = substr_replace($content, $cta_fourth, $h2_match[1], 0);
            }
        }
    }
*/
    $content .= $cta_first;
    $content .= $cta_second;

    return $content;
});