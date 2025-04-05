<?php

global $hc_settings;

$hc_settings = [
    'location_taxonomy' => 'hc_city_location',
    'state_taxonomy' => 'hc_state_location',
    'location_widget_title' => 'practice_area',
    'parent_location_widget_title' => 'parent_practice_area',
    'faqs_category_taxonomy' => 'hc_faqs',
    'state' => 'Texas',
    'stateabbr' => 'TX',
    'phone_number' => '800-863-5312',
    'primary_menu' => "Primary Menu",
    'practice_areas_menu_item' => "menu-item-1672152",
    'practice_areas_menu_item_id' => 1672152,
    'areas_we_serve_page' => '26659',
    'main_practice_area' => 'Personal Injury',
    'main_practice_area_es' => 'Lesiones Personales',
    'is_multiple_state' => true,
    'has_spanish_language' => true,
    'all_locations' => [
        "alamogordo",
        "albuquerque",
        "alburquerque",
        "allen",
        "amarillo",
        "arlington",
        "arvada",
        "aurora",
        "austin",
        "beaumont",
        "boulder",
        "breckenridge",
        "burnet",
        "caldwell-county",
        "carlsbad",
        "carrollton",
        "cedar-park	",
        "centennial",
        "chandler",
        "college-station",
        "colorado-springs",
        "copper-mountain",
        "corpus-christi",
        "dallas",
        "deming",
        "denton",
        "denver",
        "el-paso",
        "flagstaff",
        "fort-collins",
        "fort-worth",
        "frisco",
        "garland",
        "georgetown",
        "gilbert",
        "glendale",
        "grand-prairie",
        "greeley",
        "highlands-ranch",
        "houston",
        "hutto",
        "irving",
        "killeen",
        "kyle",
        "lakewood",
        "laredo",
        "las-cruces",
        "lewisville",
        "llano",
        "longmont",
        "longview",
        "los-alamos",
        "lubbock",
        "mckinney",
        "mesa",
        "mesquite",
        "miami",
        "midland",
        "new-braunfels",
        "phoenix",
        "plano",
        "pueblo",
        "richardson",
        "rio-rancho",
        "roswell",
        "round-rock",
        "san-antonio",
        "santa-fe",
        "scottsdale",
        "surprise",
        "taos",
        "tempe",
        "temple",
        "thornton",
        "tucson",
        "tyler",
        "waco",
        "waxahachie",
        "westminster",
        "yuma",
    ],
    'priority_locations' => [
        "austin",
        "phoenix",
        "dallas",
        "el-paso",
        "denver",
        "houston",
    ],
];

/*
 *
 * AUTO INCLUDE - BE CAREFUL!
 *
 * */

$autoiclude_folders = [
    '/lib/snippets/',
    '/lib/taxonomy/',
    '/lib/shortcodes/',
    '/lib/widgets/',
    '/lib/cpt/',
    '/lib/custom-http-response/',
    '/lib/helpers/',
];

foreach ($autoiclude_folders as $folder) {
    foreach (scandir(dirname(__FILE__) . $folder) as $filename) {
        $path = dirname(__FILE__) . $folder . $filename;
        if (is_file($path)) {
            require_once $path;
        }
    }
}

function is_custom_locations($value = null)
{
    $url = str_replace(['?cxssh-hooks=off', '?cxssh-hooks=show-action-hooks'], '', $_SERVER['REQUEST_URI']);
    $lang = str_replace(['/es/'], '', $url);
    $remove_all = str_replace($lang, '', $url);
    if ($value == $remove_all) {
        return true;
    } else {
        return false;
    }
    return null;
}

// include layout
require_once 'lib/layout/layout.php';

// include frontend assets
require_once 'assets/assets.php';

// Return EN on the lang
add_filter('locale', function ($default_locale) {
    if (is_custom_locations('/es/')) {
        return 'es';
    } else {
        return 'en';
    }
});

add_action('genesis_before_loop', 'custom_title');

function custom_title()
{
    global $post;
    global $hc_settings;
    $location_widget_title = get_field($hc_settings['location_widget_title'], $post->ID);
    $heading = 'Search results';

    if (!is_page_template('front-page.php') && !is_page_template('Attorney-Profile.php') && !is_page_template('podcast-page.php') && !is_archive() && !is_404() && !is_home() && !is_search()) {
        $title = get_the_title();
        echo '<h1 class="page-title">' . $title . '</h1>';
    } else if (is_archive()) {
        echo '<h1 class="page-title">' . get_the_archive_title() . '</h1>';
    } else if (is_404()) {
        echo '<h1 class="page-title">Page Not Found</h1>';
    } else if (is_home()) {
        echo '<h1 class="page-title">Blog</h1>';
    } else if (is_search()) {
        echo '<h1 class="page-title">' . $heading . '</h1>';
    }

    if (!empty($location_widget_title) && strtolower($location_widget_title) != "-- none --") {
        ?>
        <div class="review-section-flex">
            <div class="review-stars">
                <img src="<?= CHILD_URL ?>/assets/app/img/icons/stars-icon.png"
                     alt="Reviews Icon"
                     title="Reviews Icon" width="160" height="35">
            </div>
            <div class="review-stars-count">
                <p><span class="review-number"> <?php echo get_field('att_number_reviews', 'option'); ?></span> Reviews</p>
            </div>
        </div>
        <?php
    }
}

add_filter('wpseo_title', function ($title) {
    if (is_search()) {
        $text = 'Search results';
        $title = str_replace(get_search_query(), $text, $title);
    }
    add_filter('wpseo_head', function () use ($title) {
        global $wpseo_og;

        // Check if $wpseo_og is not null before accessing its properties
        if ($wpseo_og !== null) {
            $wpseo_og->title = $title;
        }
    });
    return $title;
});


function paginated_canonical( $canonical ) {
    if ( is_paged() ) {
      $canonical = site_url('/') . $_SERVER['REQUEST_URI'];
    }
  
    return $canonical;
}

add_filter( 'wpseo_canonical', 'paginated_canonical' );

// This successfully disabled the spam check of CF7. 
//add_filter('wpcf7_skip_spam_check', '__return_true');



add_action('wpcf7_before_send_mail', 'send_to_externalAPI' );

function send_to_externalAPI($contact_form) {
    // Get the FORM ID
    $form_id = $contact_form->id();
    
    // Forms to use
    $formularios_permitidos = array(9);

    // Verificar se o formulário atual está na lista de permitidos
    //if (in_array($form_id, $formularios_permitidos)) {
        $submission = WPCF7_Submission::get_instance();
        
        if ($submission) {
            $data = $submission->get_posted_data();
            $cok_callrefer = '';
            $cok_callland = '';
            $client_ips ='';
            $client_ip = '';
            if (isset($_COOKIE['variable'])){
                $cok_callrefer = $_COOKIE['calltrk_referrer'];
            }
            if (isset($_COOKIE['calltrk_landing'])){
                $cok_callland = $_COOKIE['calltrk_landing'];
            }

            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $client_ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $client_ip = trim($client_ips[0]); // Taking the first IP from the list
            } else if (isset($_SERVER['REMOTE_ADDR'])) {
                $client_ip = $_SERVER['REMOTE_ADDR'];
            } else {
                $client_ip = 'IP not found';
            }
            // Preparar os dados para enviar à API externa.
            $api_data = array(
                'name' => $data['fullname'],
                'firstName' => $data['f-name'],
                'lastName' => $data['l-name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'case_description' => $data['case_description'],
                'comments' => $data['comments'],
                'how_did_you_hear_about_this_book' => $data['how_did_you_hear_about_this_book'],
                'why_are_you_requesting_this_book' => $data['why_are_you_requesting_this_book'],
                'which_guide_are_you_interested_in' => $data['which_guide_are_you_interested_in'],
                'location' => $data['address'].' '.$data['city'].' '.$data['state'].' '.$data['zip'],
                'injuries' => $data['injuries'],
                'best_call_time' => $data['best_call_time'],
                'evening_phone' => $data['evening_phone'],
                'taken_xarelto' => $data['taken_xarelto'],
                'injured_after_7_1_2011' => $data['injured_after_7_1_2011'],
                'require_treatment' => $data['require_treatment'],
                'page_url' => $data['conversion_url'],
                'referrer' => $cok_callrefer,
                'landing_page' => $cok_callland,
                'client_ip' => $client_ip,
                'api_key' => '74f0e2a994398ea3007048300ffc9891',
                'source' => 'Wordpress',                                                                                    
                'gclid' => $data['gclid'],
                'Consent to text message' => $data['acceptance-837'],  
            );

            // Definir o URL da API.
            $api_url = 'https://ext.hzfirm.com/internal_intakes/';
            
            // Usar wp_remote_post para enviar os dados.
            $response = wp_remote_post($api_url, array(
                'method'    => 'POST',
                'body'      => json_encode($api_data),
                'headers'   => array(
                    'Content-Type' => 'application/json',
                ),
            ));
                    
            if (is_wp_error($response)) {
                $error_message = $response->get_error_message();

            } else {


            }              
        }
    //}
}


add_action('wp', 'verify_get');

function verify_get() {
    // Verificar se a variável 'minha_variavel' está presente na URL
    if (isset($_GET['testApi'])) {
        // A variável existe, então execute sua função
        api_test();
    }
}

function api_test() {
    // Sua lógica aqui
        //$data = $submission->get_posted_data();
        
        // Preparar os dados para enviar à API externa.
        $api_data = array(
            'name' => 'Conrad Julia Test 1502',
            'firstName' => 'Conrad Test 1502',
            'lastName' => 'Julia Test 1502',
            'email' => 'conradseo17@gmail.com',
            'phone' => '3105551502',
            'case_description' => 'This is a test',
            'comments' => 'This is a test',
            'how_did_you_hear_about_this_book' => 'This is a test',
            'why_are_you_requesting_this_book' => 'This is a test',
            'which_guide_are_you_interested_in' => 'This is a test',
            'location' => 'This is a test',
            'injuries' => 'This is a test',
            'best_call_time' => 'morning',
            'evening_phone' => '',
            'taken_xarelto' => '',
            'injured_after_7_1_2011' => 'no',
            'require_treatment' => '',
            'page_url' => 'https://zdfirmSTG.com',
            'referrer' => 'calltrk_referrer',
            'landing_page' => 'calltrk_landing',
            'client_ip' => '0.0.0.0',
            'api_key' => '74f0e2a994398ea3007048300ffc9891',
            'source' => 'Wordpress',                                                                                    
            'gclid' => '',
            'Consent to text message' => 1,   
            // Adicione todos os outros campos necessários aqui, mapeando os campos do formulário para os campos da API.
        );
        
        // Definir o URL da API.
        $api_url = 'https://ext.hzfirm.com/internal_intakes/';
        
        // Usar wp_remote_post para enviar os dados.
        $response = wp_remote_post($api_url, array(
            'method'    => 'POST',
            'body'      => json_encode($api_data),
            'headers'   => array(
                'Content-Type' => 'application/json',
            ),
        ));
        
        // Verificar a resposta.
        if (is_wp_error($response)) {
            error_log($response->get_error_message());
        } else {
            error_log(print_r($response, true));
        }
        echo '<pre>';
        echo json_encode($response, JSON_PRETTY_PRINT);
        echo '</pre>';

    die();
}

function custom_rewrite_rule() {
    add_rewrite_rule(
        '^es/el-abogado-efectivo/page/([0-9]+)/?$',
        'index.php?pagename=es-el-abogado-efectivo&paged=$matches[1]',
        'top'
    );
    
    add_rewrite_rule(
        '^es/comunidad/page/([0-9]+)/?$',
        'index.php?pagename=mas-participacion-comunitaria&paged=$matches[1]',
        'top'
    );
}
add_action('init', 'custom_rewrite_rule', 10, 0);

add_filter( 'wpseo_opengraph_url', 'wpseo_change_opengraph_url' );
function wpseo_change_opengraph_url( $url ) {
    // Check if it's a paged page
    if (is_paged()) {
        // Get the permalink of the main page
        $url = site_url($_SERVER['REQUEST_URI']);
        // Update the og:url property with the current permalink
    }
    return $url;
}

function exclude_custom_permalink_pages_from_parent_dropdown($dropdown_args, $post) {
    add_filter('get_pages', function($pages) {
        foreach ($pages as $key => $page) {
            $custom_permalink = get_post_meta($page->ID, 'custom_permalink', true);
            if ($custom_permalink && strpos($custom_permalink, 'lp/') === 0) {
                unset($pages[$key]);
            }
        }
        return $pages;
    });
    return $dropdown_args;
}
add_filter('page_attributes_dropdown_pages_args', 'exclude_custom_permalink_pages_from_parent_dropdown', 10, 2);
     // Initialize Select2 on the parent_id select element
function add_admin_search_script() {?>
    <script type="text/javascript">
    (function($) {
        $(document).ready(function() {   
            var selectElement = $('#parent_id');
            if (selectElement.length) {
                selectElement.select2({
                    placeholder: 'Search parent pages...',
                    allowClear: true,
                    width: '100%' // Ensure it takes the full width
                });
            }
        });
    })(jQuery);
    </script>
    <?php
}
add_action('admin_footer', 'add_admin_search_script');

function preload_custom_fonts() {
    ?>
    <link rel="preload" href="https://fonts.gstatic.com/s/montserrat/v26/JTUQjIg1_i6t8kCHKm459WxRyS7m.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.gstatic.com/s/montserrat/v26/JTUSjIg1_i6t8kCHKm459Wlhyw.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.gstatic.com/s/alegreyasc/v25/taiMGmRtCJ62-O0HhNEa-Z6q6ZIRbQ.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="https://fonts.gstatic.com/s/alegreyasc/v25/taiOGmRtCJ62-O0HhNEa-Z6v2ZA.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <?php
}
add_action('wp_head', 'preload_custom_fonts');

function check_url_status( $url ) {
    $response = wp_remote_get( $url );
/*
    if ( is_wp_error( $response ) ) {
        return 'Error: ' . $response->get_error_message();
    }
*/
    $status_code = wp_remote_retrieve_response_code( $response );

    if ( $status_code == 404 ) {
        $status_code = "error";
    } else {
        $status_code = "ok";
    }

    return $status_code;
}
//$url_to_check = 'https://example.com/algo';
//echo check_url_status( $url_to_check );

function intaker_call_script() {
    
    wp_enqueue_script(
        'intaker',
        get_stylesheet_directory_uri() . '/include/intaker.js',
        array(), 
        '1.0.1', 
        true
    );
}
add_action('wp_enqueue_scripts', 'intaker_call_script');



/*Case Studies Filtering*/

// Enqueue JavaScript for AJAX
function enqueue_case_studies_scripts() {
    wp_enqueue_script('custom-case-studies-ajax', 'https://www.zdfirm.com/wp-content/themes/zinda-theme/assets/app/js/case-study.js', array('jquery'), null, true);

    // Localize script to pass AJAX URL
    wp_localize_script('custom-case-studies-ajax', 'caseStudiesData', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ajax_filter_nonce')
    ]);
}

add_action('wp_enqueue_scripts', 'enqueue_case_studies_scripts');


function handle_case_studies_filter() {
    $category = isset($_GET['category']) ? $_GET['category'] : 'all';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'recent';

    $args = array(
        'post_type' => 'case-study',
        'posts_per_page' => -1,
    );

    if ($category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'case-study-category',
                'field'    => 'term_id',
                'terms'    => $category,
                'operator' => 'IN',
            ),
        );
    }

    if ($sort === 'settlement') {
        $args['meta_key'] = 'price';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
    } else {
        $args['meta_key'] = 'custom_date';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
    }

    $query = new WP_Query($args);
    $case_studies = array();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Get all categories for the current post
            $categories = wp_get_post_terms(get_the_ID(), 'case-study-category', array('fields' => 'names'));

            // Exclude the "All" category by checking its name or slug
            $filtered_categories = array_filter($categories, function($category) {
                return strtolower($category) !== 'all'; // Replace 'all' with the actual name or slug of the "All" category
            });
            $case_studies[] = array(
                'title' => get_the_title(),
                'link' => get_the_permalink(),
                'image' => get_the_post_thumbnail_url() ?: 'https://via.placeholder.com/150',
                'date' => get_field('custom_date'),
                'categories' => implode(', ', $filtered_categories),
                'excerpt' => get_field('short_summary_'),
            );
        }
        wp_send_json($case_studies);
    } else {
        wp_send_json([]);
    }

    wp_die();
}
add_action('wp_ajax_filter_case_studies', 'handle_case_studies_filter');
add_action('wp_ajax_nopriv_filter_case_studies', 'handle_case_studies_filter');

/* Case Studies Taxonomy */

add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy_resource_type');
function tsm_filter_post_type_by_taxonomy_resource_type() {
	global $typenow;
	$post_type = 'case-study'; // change to your post type
	$taxonomy  = 'case-study-category'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
				'show_option_all' => sprintf( __( 'Show all %s', 'textdomain' ), $info_taxonomy->label ),
				'taxonomy'        => $taxonomy,
				'name'            => $taxonomy,
				'orderby'         => 'name',
				'selected'        => $selected,
				'show_count'      => true,
				'hide_empty'      => true,
		));
	};
}

add_filter('parse_query', 'tsm_convert_id_to_term_in_query_resource_type');
function tsm_convert_id_to_term_in_query_resource_type($query) {
	global $pagenow;
	$post_type = 'case-study'; // change to your post type
	$taxonomy  = 'case-study-category'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

