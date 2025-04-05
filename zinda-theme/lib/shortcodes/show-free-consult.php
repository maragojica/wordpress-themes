<?php

function show_freeConsult_function($atts) {
    // Check if current page is the Spanish version
    $isSpanishPage = is_custom_locations('/es/');

    // Attributes
    $atts = shortcode_atts(
        array(
            'link' => $isSpanishPage ? 'https://www.zdfirm.com/es/evaluacion-de-caso/' : 'https://www.zdfirm.com/case-evaluation/', 
            'subtitle' => '',
        ),
        $atts
    );

    $freeConsultOutput = '';
    $freeConsultOutput .= '
        <section class="free_consult short">
            <div class="container-fluid flex-center">
            <p class="white">'.($isSpanishPage ? '<span class="free">Consulta</span> Gratuita' : '<span class="free">Free</span> Consults').'<span class="backWhite"><span class="backWhite-inner">24/7</span></span></p>';

    if ( $atts['subtitle'] != '' ) {
        $freeConsultOutput .= '<p class="white">'.$atts['subtitle'].'</p>';
    } 

    $freeConsultOutput .= '     <a href="'.$atts['link'].'" class="btn btn-rounded" style="color: #fff;background-color:#ff7800">'.($isSpanishPage ? 'Enviar la solicitud ahora' : 'Send Request Now').'</a>
            </div>
        </section>';

    $freeConsultOutput .= '<style>
        .free_consult.short .white {
            line-height: 59px;
        }
        .free_consult.short p.white {
            font-size: 2.441rem !important;
            font-family: alegreya sc,serif !important;
            font-weight: 500;
            display: block !important;
            text-transform: initial;									
            max-width: 650px;
            text-align: center;
            margin-top: 8px !important;
            margin-bottom: 16px;		
            line-height: 1.3 !important;
        }
    </style>';			    
    return $freeConsultOutput;
}
add_shortcode( 'show_freeConsult', 'show_freeConsult_function' );