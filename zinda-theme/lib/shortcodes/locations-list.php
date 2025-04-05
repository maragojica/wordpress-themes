<?php

add_shortcode('locations-list', function(){
    global $post;
    global $hc_settings;

    ob_start();


    $args = [
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_key' => $hc_settings['location_widget_title'],
        'meta_value' => $hc_settings['main_practice_area']
    ];

    $locations = get_posts($args);

    $locations_out = [];

    foreach($locations as $p) {
        $tax = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
        if($tax) {
            $tax_single = current($tax);
            $abc = $tax_single->name[0];

            $p->meta_city_name = $tax_single->name;
        } else {
            $abc = "-";

            $p->meta_city_name = "";
        }

        $locations_out[$abc][] = $p;
    }

    ksort($locations_out);

    foreach($locations_out as $k => $loc_arr) {
        echo "<h2>$k</h2><ul>";

        foreach ($loc_arr as $loc) {
            if(property_exists($loc, 'meta_city_name')) {
                // this is how it should looks but now we have on TX So we removed
                //  echo "<li><a href=\"".get_permalink($loc->ID)."\">{$loc->meta_city_name}, {$hc_settings['stateabbr']}</a></li>";
                echo "<li><a href=\"".get_permalink($loc->ID)."\">{$loc->meta_city_name}</a></li>";
            }
        }

        echo "</ul>";
    }

    $content = ob_get_contents();
    ob_clean();

    return $content;
});

add_shortcode('areas-we-serve-list', function () {
    global $post;
    global $hc_settings;
    ob_start();
    $states = get_terms( [
        'taxonomy' => $hc_settings['state_taxonomy'],
        'hide_empty' => true,
        'orderby'       => 'title',
	    'order'         => 'ASC',
    ] );
    if( $states && ! is_wp_error( $states ) ){
        echo '<ul class="aws__listing">';
            foreach ($states as $state){
                
                $args = [
                    'post_type'      => 'page',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array(
                            'taxonomy' => $hc_settings['state_taxonomy'],
                            'field'    => 'slug',
                            'terms'    => $state->slug
                        )
                    ),
                    'meta_key'       => $hc_settings['location_widget_title'],
                    'meta_value'     => $hc_settings['main_practice_area'],
                ];
                $locations = get_posts($args);
                $locations_out = [];
                if (count($locations) > 0) {
                    echo '<li>';
                    $query = new WP_Query(array(
                        'post_type' => 'page',
                        'name' => $state->slug,
                        'post_status' => 'publish',
                    ));
                    if ($query->have_posts()) {
                        echo '<a href=" ' . site_url('/personal-injury-lawyer/' . $state->slug ) . '"><b>' . $state->name . '</b></a>';
                    } else {
                        echo '<b>' . $state->name . '</b>';
                    }
                        foreach ($locations as $p) {
                            $tax = get_the_terms($p->ID, $hc_settings['location_taxonomy']);
                            if ($tax) {
                                $tax_single = current($tax);
                                $abc = $tax_single->name[0];
                                $p->meta_city_name = $tax_single->name;
                                // Retrieve and set the 'state' custom field from the taxonomy term
                                $state_field = get_term_meta($tax_single->term_id, 'state', true);
                                $p->meta_state = !empty($state_field) ? $state_field : "";
                                $locations_out[] = $p;
                            }
                        }
                        // Define a custom sorting function based on 'meta_city_name'
                        usort($locations_out, function ($a, $b) {
                            return strcmp($a->meta_city_name, $b->meta_city_name);
                        });
                        echo '<ul>';
                        foreach ($locations_out as $p) {
                            echo "<li><a href=\"" . get_permalink($p->ID) . "\">{$p->meta_city_name}, {$p->meta_state}</a></li>";
                        }
                        echo '</ul>';
                    echo '</li>';
                }
            }
        echo '</ul>';
    }
    $content = ob_get_contents();
    ob_clean();
    return $content;
});