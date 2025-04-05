<?php

// breadcrumbs
function removeBreadcrumbLink($link_output, $link)
{
    $link_output = str_replace('href="' . $link['url'] . '"', "", $link_output);
    return str_replace('data-wpel-link="internal"', "", $link_output);
}

if (function_exists('yoast_breadcrumb')) {
    function custom_do_breadcrumbs()
    {

        yoast_breadcrumb('<p class="breadcrumb" id="breadcrumbs">', '</p>');
    }

    //Decomment this if you want to make specific breadcrumb links unclickable.
    //add_filter( 'wpseo_breadcrumb_single_link' ,'wpseo_remove_breadcrumb_link', 10 ,2);

    function wpseo_remove_breadcrumb_link($link_output, $link)
    {
        $breadcrumbsLinkToBeRemoved = [
            'Attorneys' //put the titles of the breadcrumbs you want to make unclickable
        ];
        if (in_array($link['text'], $breadcrumbsLinkToBeRemoved)) {
            return removeBreadcrumbLink($link_output, $link);
        }

        return $link_output;
    }

    add_action('genesis_before_loop', 'custom_do_breadcrumbs', 5);
}


add_action('genesis_before_loop', function () {

    global $post;
    global $hc_settings;

    if (is_archive()) {

        $post_cats = wp_get_post_categories($post->ID);

        if ($post_cats) {
            $category = get_category(current($post_cats));

            $p = get_posts([
                'post_type' => 'page',
                'meta_key' => $hc_settings['location_widget_title'],
                'meta_value' => $category->name,
                'tax_query' => [
                    [
                        'taxonomy' => $hc_settings['location_taxonomy'],
                        'terms' => [0] // insert tag id of your main location city of location taxonomy
                    ]
                ],
            ]);

            if ($p) {
                $p = current($p);
            } else {
                return '';
            }

            ?>
            <div class="container-fluid container-custom container-practice-link">
                <a href="<?= get_permalink($p->ID) ?>"
                   title="<?= get_the_title($p->ID) ?>"><?= get_the_title($p->ID) ?></a>
            </div>
            <?php
        }

    }

}, 10);

function filter_wpseo_breadcrumb_links($crumbs)
{
    global $post, $hc_settings;

    $original_crumbs = $crumbs;

    $terms = get_the_terms($post->ID, $hc_settings['faqs_category_taxonomy']);

    $add_home_icon = [
        [
            'text' => '<a href="'.site_url('/').'" aria-label="Home Link"><svg width="18" height="18" fill="#1a5d7d" xmlns="http://www.w3.org/2000/svg">
          <path d="M8.436 5.177l-5.547 6.106v6.59c0 .17.05.334.14.455a.43.43 0 00.341.188l3.372-.011c.127-.001.249-.07.339-.19.09-.12.14-.284.14-.454v-3.848c0-.17.05-.334.14-.455a.43.43 0 01.341-.188h1.926a.43.43 0 01.34.188c.09.12.141.284.141.455v3.845c0 .085.012.169.036.247a.69.69 0 00.104.21.5.5 0 00.157.14c.058.032.121.049.184.049l3.37.012a.43.43 0 00.341-.188.766.766 0 00.141-.455v-6.594L8.896 5.177a.315.315 0 00-.23-.108.315.315 0 00-.23.108zm8.762 4.15l-2.515-2.77V.987a.575.575 0 00-.106-.34.323.323 0 00-.255-.142h-1.685a.323.323 0 00-.255.141.575.575 0 00-.106.341v2.92L9.582.945C9.324.661 9 .505 8.665.505c-.335 0-.66.156-.918.44L.13 9.327a.481.481 0 00-.089.146.608.608 0 00-.026.368.55.55 0 00.067.166l.767 1.246c.03.05.067.09.11.12a.275.275 0 00.275.036.346.346 0 00.124-.09l7.077-7.79a.315.315 0 01.23-.109c.084 0 .165.039.23.109l7.078 7.79c.036.04.078.07.124.09a.275.275 0 00.14.018.298.298 0 00.135-.053c.042-.03.079-.07.11-.12l.766-1.246a.549.549 0 00.067-.166.636.636 0 00-.028-.37.478.478 0 00-.09-.145z" />
          </svg><span class="d-none" aria-label="Home Link">Home</span></a>',

        ]
    ];
    array_splice($crumbs, 0, 1, $add_home_icon);



    if (is_custom_locations('/es/')) {
        $add_crumbs = [
            [
                'text' => 'Inicio',
                'url' => site_url('/es/')
            ]
        ];
        array_splice($crumbs, 0, 1, $add_crumbs);
    }

    if (is_tax($hc_settings['faqs_category_taxonomy'])) {
        $add_crumbs = [
            [
                'text' => 'Frequently Asked Questions',
                'url' => site_url('/faqs/')
            ]
        ];
        array_splice($crumbs, -1, 0, $add_crumbs);
    }

    if (is_search()) {
        $add_crumbs = [
            [
                'text' => 'Search Results',
            ]
        ];
        if (is_paged()) {
            array_splice($crumbs, -2, -1, $add_crumbs);
        } else {
            array_pop($crumbs);
            array_splice($crumbs, 1, 0, $add_crumbs);
        }
    }

    return $crumbs;
}


add_filter('wpseo_breadcrumb_links', 'filter_wpseo_breadcrumb_links', 10, 1);

function convertToSingularAndUppercase($text) {
    // List of common plural to singular mappings
    $pluralToSingular = [
        '/(s|x|z|ch|sh)es$/i' => '$1',
        '/ies$/i' => 'y',
        '/ves$/i' => 'f',
        '/men$/i' => 'man',
        '/children$/i' => 'child',
        '/teeth$/i' => 'tooth',
        '/feet$/i' => 'foot',
        '/geese$/i' => 'goose',
        '/mice$/i' => 'mouse',
        '/data$/i' => 'datum',
        '/phenomena$/i' => 'phenomenon',
        '/criteria$/i' => 'criterion',
        '/appendices$/i' => 'appendix',
        '/indices$/i' => 'index',
        '/matrices$/i' => 'matrix',
        '/oes$/i' => 'o',
        '/(quiz)zes$/i' => '$1',
        '/(octop|vir|alumn|cact|fung)i$/i' => '$1us',
        '/(nucle)i$/i' => '$1us',
        '/s$/i' => '',  // General case for words ending in 's'
    ];

    foreach ($pluralToSingular as $pattern => $replacement) {
        if (preg_match($pattern, $text)) {
            $singularText = preg_replace($pattern, $replacement, $text);
            return ucfirst($singularText);  // Convert to uppercase
        }
    }

    // If no pattern matches, assume it's already singular and convert to uppercase
    return ucfirst($text);
}

add_filter('wpseo_breadcrumb_links', 'hd_change_location_breadcrumbs');
function hd_change_location_breadcrumbs($links)
{
    global $hc_settings;
    $count = 0;

    foreach ($links as $k => $link) {
        $state = '';
        $city = '';
        $practice_areas = '';
        $practice_areas =  get_post_meta( $links[$k]['id'], $hc_settings['location_widget_title'], true );
        $city = get_the_terms($link['id'], $hc_settings['location_taxonomy']) ? current(get_the_terms($link['id'], $hc_settings['location_taxonomy'])) : false;
        $state = get_the_terms($link['id'], $hc_settings['state_taxonomy']) ? current(get_the_terms($link['id'], $hc_settings['state_taxonomy'])) : false;
        if($practice_areas && strtolower($practice_areas) != "-- none --"){
            $practice_areas = convertToSingularAndUppercase($practice_areas);
            $count++;
            if ($count > 2) {
                $links[$k] = [
                    'url' => $links[$k]['url'],
                    'text' => $practice_areas
                ];
            }else{
                $location = '';
                $practiceArea = ucwords($practice_areas);
                
                if($city){
                    $location = $city->name;
                }else if($state){
                    $location = $state->name;
                }

                if (is_custom_locations('/es/')) {
                    $breadcrumbText = 'Abogado de ' . $practiceArea;
                    if($location){
                        $breadcrumbText .= ' de ' . $location;
                    }
                }else{
                    $breadcrumbText = "$location $practiceArea Lawyer";
                }
                $links[$k] = [
                    'url' => $links[$k]['url'],
                    'text' => $breadcrumbText
                ];
            }

        }
    }

    return $links;
}