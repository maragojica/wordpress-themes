<?php

function show_CallPhone_function() {
    $isSpanishPage = is_custom_locations('/es/');

    $CallString = '';

    if ($isSpanishPage) {
        $CallString .= '<p class="callphone"><strong>Llame al <a href="tel:+18008635312">(800) 863-5312</a> para hablar con nuestros abogados</strong></p>';
    }
    else {
        $CallString .= '<p class="callphone"><strong>Call <a href="tel:+18008635312">(800) 863-5312</a> to Speak with Our Attorneys</strong></p>';
    }
    return $CallString;
}

add_shortcode( 'CallPhone', 'show_CallPhone_function' );