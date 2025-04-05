<?php
//Test with slider
function show_CaseResultsSlider_function ($fatts) {
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
        <div class="container-fluid">
            <div class="sliderCR owl-carousel owl-theme">';

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
        <div class="container-fluid">
            <div class="sliderCR owl-carousel owl-theme">';

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
                    <div class="item results-box show-more-less">
                    <div class="phoenix">
                        <div class="award results">
                        <div class="results-price-data">'.get_field('amount', $idres).'<span></span></div>
                        <div class="award-icon title"> '.get_field('all_case_types', $idres).'</div>
                        <div class="results-content">';
                            
            $output_CR .= get_field('summary', $idres);
            $output_CR .= get_field('short_description', $idres);
            $output_CR .= "<div class='more_des' style='display:none'>".get_the_content($idres)."</div>";

            $output_CR .='</div>
                        </div>
                    </div>
                    </div>';
        }

    endwhile;
    wp_reset_postdata();
            
    $output_CR .=' </div></div>
                </section>';

    return $output_CR;

}
add_shortcode('show_CaseResultsSlider', 'show_CaseResultsSlider_function');