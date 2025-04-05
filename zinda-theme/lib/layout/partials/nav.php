<?php

function custom_remove_nav() {
    remove_action('genesis_after_header', 'genesis_do_nav', 10);
    remove_action('genesis_after_header', 'genesis_do_subnav', 10);

    genesis_do_nav();
}

function prepareMenuNameForAppendXML($name){
    return str_replace("&" , "&amp;" , $name);
}

add_action('genesis_header', 'custom_remove_nav', 12);


// DYNAMIC NAV MENU

function getElementsByClass(&$parentNode, $tagName, $className) {
    $nodes=array();

    $childNodeList = $parentNode->getElementsByTagName($tagName);
    for ($i = 0; $i < $childNodeList->length; $i++) {
        $temp = $childNodeList->item($i);
        if (stripos($temp->getAttribute('class'), $className) !== false) {
            $nodes[]=$temp;
        }
    }

    return $nodes;
}
// local menu items in header
add_filter( 'wp_nav_menu', 'filter_function_name_1676', 10, 2 );
function filter_function_name_1676( $nav_menu, $args ){
    global $hc_settings;

    if(is_object($args->menu) && $args->menu->name === $hc_settings['primary_menu'] || (is_string($args->menu) && $args->menu === $hc_settings['primary_menu'])) {
        global $post;

        $terms = get_the_terms( $post->ID, $hc_settings['location_taxonomy']);
        $taxonomyToUse = $hc_settings['location_taxonomy'];
        if(!$terms || !is_singular()) {
            return $nav_menu;
        }


        if($terms) {
            $city = current($terms)->name;
            $citySlug = current($terms)->slug;

            $args = [
                'post_type' => 'page',
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomyToUse,
                        'field' => 'slug',
                        'terms' => $citySlug
                    ),
                ),
                'meta_query' => [
                    [
                        'key'   => $hc_settings['location_widget_title'],
                        'value' => "Personal Injury",
                        'compare' => '=',
                    ]
                ],
                'orderby'    => 'meta_value',
                'order'      => 'ASC',
            ];
            
            if(is_custom_locations('/es/')){
                $url_exist['meta_query'][0]['value'] = "Lesiones Personales";
            }

            $url_exist = get_posts($args);
            if($url_exist) {
                $html = "<a class='".$url_exist[0]->ID."' href='".get_the_permalink($url_exist[0]->ID)."' title='".get_the_title($url_exist[0]->ID)."'>$city Practice Areas</a><ul class='sub-menu dynamic-sub-menu'>";

            } else {

                $html = "<a href='#'>$city Practice Areas</a><ul class='sub-menu dynamic-sub-menu'>";

            }

            $children = get_posts([
                'posts_per_page' => -1,
                'post_type' => 'page',
                'post_status' => 'publish',
                'tax_query' => [
                    [
                        'taxonomy' => $hc_settings['location_taxonomy'],
                        'terms' => [current($terms)->term_id]
                    ]
                ]
            ]);


            $main_prc = [
                "Car Accident",
                "Truck Accident",
                "Motorcycle Accident",
                "Wrongful Death",
                "Bicycle Accident",
                "Bus Accident",
                "Dog Bite",
                "Drunk Driving Accident",
                "Gas Explosion",
                "Premises Liability",
                "Rideshare Accident",
                "Shooting Accident",
                "Ski Accident",
                "Workplace Accident",
            ];

            $children = array_filter($children, function($c)use($main_prc,$hc_settings){
                return in_array(get_post_meta($c->ID, $hc_settings['location_widget_title'], true), $main_prc);
            });

            usort($children, function($a, $b){
                return $a->post_title > $b->post_title ? 1 : -1;
            });

            foreach($children as $child) {
                $html .= '<li><a class="menu-item-'.$child->ID.'" title="'.get_the_title($child->ID).'" href="'.get_permalink($child->ID).'">'.prepareMenuNameForAppendXML(get_post_meta($child->ID, $hc_settings['location_widget_title'], true)).'</a></li>';
            }


            $html .= "</ul>";

            $doc = new DOMDocument();

            $doc->loadHTML(mb_convert_encoding($nav_menu, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);


            $content_node=$doc;

            $element = getElementsByClass($content_node, 'li', $hc_settings['practice_areas_menu_item']);
            if($element) {
                $element = current($element);
                if(count($children) < 8 ){
                    $classes = $element->getAttribute("class");
                    $element->setAttribute("class" , $classes.  " one-per-row");
                }else{
                    $classes = $element->getAttribute("class");
                    $element->setAttribute("class" , $classes.  " two-per-row");
                }
            }
if(isset($element) && $element->hasChildNodes()) {
    while($element->hasChildNodes()) {
        $element->removeChild($element->firstChild);
    }

    $fragment = $doc->createDocumentFragment();
    $fragment->appendXML($html);
    $element->appendChild($fragment);
}


            $html = $doc->saveHTML();

            if($html) $nav_menu = $html;

        }
    }

    return $nav_menu;
}

// END DYNAMIC NAV MENU