<?php

function show_CaseResults_Home_function ($fatts) {
    // Attributes
    $fatts = shortcode_atts(
        array(
            'cat' => '',
        ),
        $fatts
    );
    $output_CR = '';

    $output_CR .='<section class="case-result short"> 
                    <div class="container-fluid flex-center cr">
                        <h2>CASE RESULTS</h2>
                    </div>
                    <div class="container-fluid flex-center shhome" style="flex-wrap: wrap;">';

            $args = array(
                    "post_type" => "results",
                    "post_status" => "publish",
                    "posts_per_page" => -1,
                    "meta_key"       => "amount",
                    "orderby"        => "meta_value",
                    "order" => "DESC",
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

                if ($val >= 2000000  ) {
                    $output_CR .='
                            <div class="results-box show-more-less">
                            <div class="phoenix">
                                <div class="award results">
                                <div class="results-price-data">'.get_field('amount', $idres).'<span></span></div>
                                <div class="award-icon title"> <img src="https://zdfirmsandbox.wpengine.com/wp-content/themes/zinda2017/images/icon.png" width="40" height="40">'.get_field('all_case_types', $idres).'</div>
                                <div class="results-content">';
                                    
                    $output_CR .= get_field('summary', $idres);
                    $output_CR .= get_field('short_description', $idres);
                    $output_CR .= "<div class='more_des' style='display:none'>".get_the_content()."</div>";

                    $output_CR .='</div>
                                </div>
                            </div>
                            </div>';
                }
                

            endwhile;
            wp_reset_postdata();

    $output_CR .=' </div>
                </section>
                <style>
                    section.case-result h2 {
                        font-family: "Alegreya SC", serif !important; text-transform: uppercase; font-size: 29px; color: #1a5d7d; font-weight: 600; position: relative; padding-bottom: 15px;
                        }
                    section.case-result h2::after {
                        content: ""; background: #ff7800; width: 52px; height: 4px; bottom: 0px;  margin: 0 auto; display: block; margin-top: 12px; overflow: hidden; font-size: 4px !important;
                        line-height: 1px !important;
                    }
                    .container-fluid.flex-center.shhome {
                        display: flex;
                        flex-direction: row;
                        flex-wrap: wrap;
                        justify-content: center;
                        align-items: center;
                        margin-bottom: 30px;

                    }						
                    .shhome .results-box.show-more-less {
                        width: 250px;
                    }						
                    .results-price-data {
                        text-transform: uppercase;
                        color: #1a5d7d;
                        line-height: normal;
                        margin: 0px 0 67px;
                        padding: 0px 0px;
                        font-size: 32px;
                        text-align: center;
                        font-weight: 700;
                        letter-spacing: 0px;
                        position: relative;							
                    }
                    .results-price-data:after {
                        background: #f9801c;
                        content: "";
                        display: block;
                        height: 5px;
                        position: absolute;
                        width: 75px;
                        left: 0;
                        bottom: -30px;
                    }
                    .award-icon {
                        display: flex;
                        align-items: center;
                        justify-content: flex-start;
                    }					
                    .award-icon.title {
                        text-transform: uppercase;
                        color: black;
                        font-size: 14px;
                        margin: 16px 0 5px;
                        font-weight: 600;
                        position: relative;
                        text-align: left;
                    }	
                    .award-icon.title img {
                        display: inline-block !important;
                        margin-right: 20px;
                    }
                    .results-box.show-more-less {
                        border: 0px solid #ccc; padding: 22px 15px 14px; margin: 10px 10px 10px!important; margin: 0%; box-shadow: 4px 4px 20px 0px rgb(0 0 0 / 12%); border-radius: 20px; max-width: 45%;							
                    }
                    @media (max-width: 464px) { 
                        .short .results-box.show-more-less { max-width: 100% !important; width: 100%; }
                    }
                </style>';

    return $output_CR;

}
add_shortcode('show_CaseResults_Home', 'show_CaseResults_Home_function');