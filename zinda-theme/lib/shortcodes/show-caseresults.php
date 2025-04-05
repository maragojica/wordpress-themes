<?php

function show_CaseResults_function ($fatts) {
        // Attributes
        $fatts = shortcode_atts(
            array(
                'cat' => '',
            ),
            $fatts
        );
        $isSpanishPage = is_custom_locations('/es/');
        $output_CR = '';

        if ($isSpanishPage) {

            $output_CR .='<section class="case-result short"> 
                            <div class="container-fluid flex-center cr">
                                <h2>RESULTADOS DEL CASO</h2>
                            </div>
                            <div class="container-fluid flex-center">';

            $args = array(
                    "post_type" => "results-spanish",
                    "post_status" => "publish",
                    "posts_per_page" => 20,
                    "orderby" => "title",
                    "order" => "ASC",
                );

            if ($fatts['cat'] != '' ) {

                $args['meta_query'] =  array(
                    'relation'    => 'AND',
                    array(
                    'key'   => 'all_case_types',
                    'value'     => $fatts['cat'],
                    'compare'   => '=',
                    )
                );

            }
            
        }
        else {

            $output_CR .='<section class="case-result short"> 
            <div class="container-fluid flex-center cr">
                <h2>CASE RESULTS</h2>
            </div>
            <div class="container-fluid flex-center">';

            $args = array(
                "post_type" => "results",
                "post_status" => "publish",
                "posts_per_page" => 20,
                "orderby" => "title",
                "order" => "ASC",
            );

            if ($fatts['cat'] != '' ) {

                $args['meta_query'] =  array(
                    'relation'    => 'AND',
                    array(
                    'key'   => 'all_case_types',
                    'value'     => $fatts['cat'],
                    'compare'   => '=',
                    )
                );

            }
            
        }

        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();

            $idres = get_the_ID();

            $initialValue = get_field('amount', $idres);

            //removing , from the text
            $vowels = array("$", ",");
            $str = str_replace($vowels, "", $initialValue);

            $val = intval($str);

            if ($val >= 1000000  ) {
                $output_CR .='
                        <div class="results-box show-more-less">
                        <div class="phoenix">
                            <div class="award results">
                            <div class="results-price-data">'.get_field('amount', $idres).'<span></span></div>
                            <div class="award-icon title"> '.get_field('all_case_types', $idres).'</div>
                            <div class="results-content">';
                                
                $output_CR .= get_field('summary', $idres);
                $output_CR .= get_field('short_description', $idres);
                $output_CR .= "<div class='more_des'>".get_the_content()."</div>";

                $output_CR .='</div>
                            </div>
                        </div>
                        </div>';
            }
            

        endwhile;
        wp_reset_postdata();

        $output_CR .=' </div>
                    </section>';

        return $output_CR;

}
add_shortcode('show_CaseResults', 'show_CaseResults_function');

// NEW SHORCODE TO SHWO CASE RESULT

function showcr_shortcode($atts) {
// extract attributes from shorcode
    $atts = shortcode_atts(
        array(
            'id' => '', // IDs predeterminados o vacío
        ), 
        $atts, 
        'showcr'
    );

    $output = '<section class="case-result short"> 
            <div class="container-fluid flex-center cr">
                <h2>CASE RESULTS</h2>
            </div>
            <div class="container-fluid flex-center showcr">';


    if (!empty($atts['id'])) {
//if we have attr
        $post_ids = explode(',', $atts['id']);
        $args = array(
                "post_type" => "results",
                "post_status" => "publish",
                "post__in" => $post_ids,
                "orderby" => "title",
                "order" => "ASC",
            );
            if ($fatts['cat'] != '' ) {

                $args['meta_query'] =  array(
                    'relation'    => 'AND',
                    array(
                    'key'   => 'all_case_types',
                    'value'     => $fatts['cat'],
                    'compare'   => '=',
                    )
                );
            } 
            $loop = new WP_Query( $args );
            if ($loop->have_posts()) {
                while ( $loop->have_posts() ) : $loop->the_post();

                $idres = get_the_ID();
                $initialValue = get_field('amount', $idres);

                //removing , from the text
                $vowels = array("$", ",");
                $str = str_replace($vowels, "", $initialValue);
                $val = intval($str);
                    $output .='
                            <div class="case-result showcrCase item">
                            <div class="phoenix">
                                <div class="award results">
                                <div class="results-price-data">'.get_field('amount', $idres).'<span></span></div>
                                <div class="award-icon title"> '.get_field('all_case_types', $idres).'</div>
                                <div class="results-content">';                                
                    $output .= get_field('summary', $idres);
                    $output .= get_field('short_description', $idres);
                    $output .= "<div class='more_des'>".get_the_content()."</div>";
                    $output .='</div>
                                </div>
                            </div>
                            </div>';
                endwhile;
            }
    } else {
//if we dont have attr
        $args = array(
                    "post_type" => "results",
                    "post_status" => "publish",
                    "posts_per_page" => 20,
                    "orderby" => "title",
                    "order" => "ASC",
                );

        if ($fatts['cat'] != '' ) {

            $args['meta_query'] =  array(
                'relation'    => 'AND',
                array(
                'key'   => 'all_case_types',
                'value'     => $fatts['cat'],
                'compare'   => '=',
                )
            );
        }
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post();

            $idres = get_the_ID();
            $initialValue = get_field('amount', $idres);

            //removing , from the text
            $vowels = array("$", ",");
            $str = str_replace($vowels, "", $initialValue);
            $val = intval($str);

            if ($val >= 1000000  ) {
                $output .='
                        <div class="case-result showcrCase item">
                        <div class="phoenix">
                            <div class="award results">
                            <div class="results-price-data">'.get_field('amount', $idres).'<span></span></div>
                            <div class="award-icon title"> '.get_field('all_case_types', $idres).'</div>
                            <div class="results-content">';                                
                $output .= get_field('summary', $idres);
                $output .= get_field('short_description', $idres);
                $output .= "<div class='more_des'>".get_the_content()."</div>";
                $output .='</div>
                            </div>
                        </div>
                        </div>';
            }
        endwhile;
    }
        wp_reset_postdata();
        $output .= '</div></section>';
        $output .= '<style>
            .showcr {
                display: flex;
                justify-content: space-around;
                align-items: stretch;
                flex-wrap: wrap;
            }
        .showcrCase {
            width: 100%;
            max-width: 45%;
            margin: 2.5%;
            padding: 22px 15px 14px;
            border: 0 solid #ccc;
            border-radius: 20px;
            box-shadow: 4px 4px 20px 0 rgba(0,0,0,.12);
            }
    </style>';
        return $output;    

}
add_shortcode('showcr', 'showcr_shortcode');