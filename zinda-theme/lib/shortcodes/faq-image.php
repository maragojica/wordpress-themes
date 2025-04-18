<?php

function strip_unneededquotes($element){
    return str_replace("”" , "" , $element);
}

function faq_image_shortcode($atts = null) {

    global $post;
    global $hc_settings;

    $amount = 3;

    extract(shortcode_atts(array(
        'amount' => '',
    ), $atts));

    $queryAmount = strip_unneededquotes($amount);

    ob_start();
    //BEGIN OUTPUT
    ?>

    <div class="random-faq-loop faq-filter-portfolio-wrapper">
        <?php $faqTerms = get_terms( $hc_settings['faqs_category_taxonomy'] );
        // convert array of term objects to array of term IDs
        $faqTermIDs = wp_list_pluck( $faqTerms, 'term_id' );
        $faqTermIDs_temp = $faqTermIDs;

        $spanish_term_ids = get_field('faqs_spanish_category', 'option');

        if($location_widget_title = get_post_meta($post->ID, $hc_settings['location_widget_title'], true)) {
            $related_term = get_term_by('name', $location_widget_title, $hc_settings['faqs_category_taxonomy']);

            if($related_term) {
                $faqTermIDs = [$related_term->term_id];
            }
        }

        $filtered_terms = array_filter($faqTermIDs, function($term) use ($spanish_term_ids){
            if(is_custom_locations('/es/')){
                return in_array($term, $spanish_term_ids);
            }else{
                return !in_array($term, $spanish_term_ids);
            }
        });

        if(empty($filtered_terms)){
            if(is_custom_locations('/es/')){
                $filtered_terms = $spanish_term_ids;
            }else{
                $filtered_terms = array_filter($faqTermIDs, function($term) use ($spanish_term_ids){
                    return !in_array($term, $spanish_term_ids);
                });
            }
        }

        $args = array(
            'posts_per_page' => $queryAmount,
            'post_type' => 'page',
            'tax_query' => array(
                array(
                    'taxonomy' => $hc_settings['faqs_category_taxonomy'],
                    'field' => 'term_id',
                    'terms' => $filtered_terms
                ),
            ),
            'order' => 'DESC',
            'orderby' => 'publish_date',
        );

        if(is_custom_locations('/es/')){
            $args['tax_query'][0]['operator'] = 'IN';
        }

        if(!get_posts($args)) {
	        $args = array(
	            'posts_per_page' => $queryAmount,
	            'post_type' => 'page',
	            'tax_query' => array(
	                array(
	                    'taxonomy' => $hc_settings['faqs_category_taxonomy'],
	                    'field' => 'term_id',
	                    'terms' => $faqTermIDs_temp
	                ),
	            ),
                'order' => 'DESC',
                'orderby' => 'publish_date',
	        );
        }

        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) :?>
                <?php if (is_custom_locations('/es/')) { ?>
                    <h3 class="widget-title widget-title-faq">Preguntas Frecuentes</h3>
                <?php } else { ?>
                    <h3 class="widget-title widget-title-faq">FAQs</h3> 
                <?php } ?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="faq-page-listing">
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="faq-page-link">
                    <h4 class="faq-page-title"><?php the_title(); ?></h4>
                    <div class="faq-page-thumb">
                        <?php if ( get_the_post_thumbnail($post->ID) ) {
                            the_post_thumbnail('medium', ['alt' => get_the_title(), 'title' => get_the_title()]);
                        } else { ?>
                            <img src="<?=CHILD_URL?>/assets/app/img/default-thumb.jpg" alt="<?=the_title();?>" title="<?=the_title();?>" width="300" height="250">
                            <?php
                        } ?>
                    </div>
                </a>
            </div>
        <?php endwhile; else : ?>
            <!-- IF NOTHING FOUND CONTENT HERE -->
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </div>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}

add_shortcode('random-faq-image', 'faq_image_shortcode');
