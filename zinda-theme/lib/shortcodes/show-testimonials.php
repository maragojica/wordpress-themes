<?php

function show_Testimonials_function() {
    $outputTestimonials = '';

    $outputTestimonials .= '<section class="testimonials"> 

                                <h2>Testimonials</h2>
                                <div class="wrap-google-review">
                                    '.do_shortcode( '[brb_collection id="38060"]' ).'
                                </div>
                            </section>
                            <style>.wp-gr .grw-row-x .grw-slider-header, .wp-gr .grw-row-x .grw-slider-header+.grw-slider-content {flex: 0 0 100%!important; max-width: 100%!important;}
                                section.testimonials h2 {
                                    font-family: "Alegreya SC", serif !important; text-transform: uppercase; font-size: 29px; color: #1a5d7d; font-weight: 600; position: relative; padding-bottom: 15px; text-align: center;
                                    }
                                section.testimonials h2{
                                text-align: center;
                                }
                                section.testimonials h2::after {
                                    content: "";
                                    background: #ff7800;
                                    width: 52px;
                                    height: 4px;
                                    bottom: 0px;
                                    margin: 0 auto;
                                    display: block;
                                    margin-top: 12px;
                                    overflow: hidden;
                                    font-size: 4px !important;
                                    line-height: 1px !important;
                                }
                            </style>';

    return $outputTestimonials;
}

add_shortcode( 'show_Testimonials', 'show_Testimonials_function' );