<?php

/**
 * Lazarus general Settings Panel
 * @link https://www.advancedcustomfields.com/resources/options-page/
 * This file outputs ALL options associated with the login customizer, cleanup, and tracking code. It for the branding performs a sync with the site icon feature in the customizer.
 */

function laz_sync_favicon_with_site_icon()
{
    $branding = get_field('branding', 'option');

    if ($branding && isset($branding['favicon']['ID'])) {
        update_option('site_icon', $branding['favicon']['ID']);
    }
}
add_action('acf/save_post', 'laz_sync_favicon_with_site_icon', 20);

/** 
 * Customize WP Login Screen
 */
function custom_login_screen()
{
    // Get login options.
    $login_options = get_field('login_customizer', 'option');

    // Initialize an array to hold the various background styles.
    $background_styles = [];

    // Check if a background image is set.
    if (!empty($login_options['background_image']['url'])) {
        $background_styles[] = "url('" . esc_url($login_options['background_image']['url']) . "')";
    }

    // Check if a background color is set.
    if (!empty($login_options['background_color'])) {
        $background_styles[] = esc_attr($login_options['background_color']);
    }

    // Now, implode the array to get the final background property value.
    $background_value = implode(', ', $background_styles);

    if (!empty($background_value)) {
        echo '<style type="text/css">
            body {
                background: ' . $background_value . ' !important;
                background-size: cover !important;
                font-family: \'hanken-grotesk\', sans-serif !important;
            }
        </style>';
    }

    if ($login_options) {
        echo '<style type="text/css">
            #login h1 a,
            .login h1 a {
                background-image: url(' . esc_url($login_options['logo']['url']) . ');
                height: 65px;
                width: 320px;
                background-size: contain;
                background-repeat: no-repeat;
            }

            .login form {
                background: ' . esc_attr($login_options['form_background_color']) . ' !important;
                color: ' . esc_attr($login_options['form_text_color']) . ' !important;
            }

            .button {
                color: ' . esc_attr($login_options['button_text_color']) . ' !important;
                background: ' . esc_attr($login_options['button_background_color']) . ' !important;
            }

            .login #backtoblog a,
            .login #nav a {
                color: ' . esc_attr($login_options['button_text_color']) . ' !important;
            }
        </style>';
    }
}
add_action('login_enqueue_scripts', 'custom_login_screen');


function custom_login_url()
{
    $login_options = get_field('login_customizer', 'option');
    if ($login_options) {
        return esc_url($login_options['logo_link']);
    }
}
add_filter('login_headerurl', 'custom_login_url');

/**
 * Cloudflare Turnstile for WP-Login.php
 */

// Check if Turnstile is enabled from ACF option
function lazarus_is_turnstile_enabled()
{
    $login_options = get_field('login_customizer', 'option');
    return isset($login_options['enable_turnstile']) && $login_options['enable_turnstile'];
}

// Add CF Turnstile JavaScript on login page
function lazarus_wpp_login_script()
{
    if (lazarus_is_turnstile_enabled()) {
        wp_register_script('login-turnstile', 'https://challenges.cloudflare.com/turnstile/v0/api.js', false, NULL);
        wp_enqueue_script('login-turnstile');
    }
}
add_action('login_enqueue_scripts', 'lazarus_wpp_login_script');

// Add CF Turnstile on login page
function lazarus_add_turnstile_on_login_page()
{
    if (lazarus_is_turnstile_enabled()) {
        $login_options = get_field('login_customizer', 'option');
        $sitekey = $login_options['turnstile_site_key'];
        echo '<div class="cf-turnstile" data-sitekey="' . esc_attr($sitekey) . '"></div>';
    }
}
add_action('login_form', 'lazarus_add_turnstile_on_login_page');

// Validating CF Turnstile on login page
function lazarus_turnstile_login_check($user, $password)
{
    if (lazarus_is_turnstile_enabled()) {
        $postdata = $_POST['cf-turnstile-response'];
        $login_options = get_field('login_customizer', 'option');
        $secret = $login_options['turnstile_secret_key'];
        $headers = array(
            'body' => [
                'secret' => $secret,
                'response' => $postdata
            ]
        );
        $verify = wp_remote_post('https://challenges.cloudflare.com/turnstile/v0/siteverify', $headers);
        $verify = wp_remote_retrieve_body($verify);
        $response = json_decode($verify);
        if ($response->success) {
            $results['success'] = $response->success;
        } else {
            $results['success'] = false;
        }
        if (empty($postdata)) {
            wp_die(__("<b>ERROR: </b><b>Please click the challenge checkbox.</b><p><a href='javascript:history.back()'>« Back</a></p>"));
        } elseif (!$results['success']) {
            wp_die(__("<b>Sorry, spam detected!</b>"));
        } else {
            return $user;
        }
    } else {
        return $user; // If Turnstile is not enabled, just return the user.
    }
}
add_action('wp_authenticate_user', 'lazarus_turnstile_login_check', 10, 2);

function custom_header_tracking_code()
{
    $tracking_options = get_field('tracking_code', 'option');
    if (isset($tracking_options['header'])) {
        echo $tracking_options['header'];  // Output the header tracking code
    }
}
add_action('wp_head', 'custom_header_tracking_code');

function custom_footer_tracking_code()
{
    $tracking_options = get_field('tracking_code', 'option');
    if (isset($tracking_options['footer'])) {
        echo $tracking_options['footer'];  // Output the footer tracking code
    }
}
add_action('wp_footer', 'custom_footer_tracking_code');


function laz_disable_comments_admin()
{
    $cleanup_options = get_field('cleanup', 'option');

    if (!empty($cleanup_options['disable_comments'])) {
        global $pagenow;

        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }

        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');

        foreach (get_post_types() as $post_type) {
            if (post_type_supports($post_type, 'comments')) {
                remove_post_type_support($post_type, 'comments');
                remove_post_type_support($post_type, 'trackbacks');
            }
        }
    }
}
add_action('admin_init', 'laz_disable_comments_admin');

function laz_close_comments()
{
    $cleanup_options = get_field('cleanup', 'option');

    if (!empty($cleanup_options['disable_comments'])) {
        return false;
    }
    return true;
}
add_filter('comments_open', 'laz_close_comments', 20, 2);
add_filter('pings_open', 'laz_close_comments', 20, 2);

function laz_hide_existing_comments($comments)
{
    $cleanup_options = get_field('cleanup', 'option');

    if (!empty($cleanup_options['disable_comments'])) {
        return array();
    }
    return $comments;
}
add_filter('comments_array', 'laz_hide_existing_comments', 10, 2);

function laz_remove_comments_menu()
{
    $cleanup_options = get_field('cleanup', 'option');

    if (!empty($cleanup_options['disable_comments'])) {
        remove_menu_page('edit-comments.php');
    }
}
add_action('admin_menu', 'laz_remove_comments_menu');

function laz_remove_comments_admin_bar()
{
    if (is_admin_bar_showing()) {
        $cleanup_options = get_field('cleanup', 'option');

        if (!empty($cleanup_options['disable_comments'])) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    }
}
add_action('init', 'laz_remove_comments_admin_bar', PHP_INT_MAX);

function laz_disable_wp_emoji()
{
    // Disables WordPress Emoji's this is almost always safe to do on 90% of our sites.   
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');

    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    add_filter('emoji_svg_url', '__return_false');
}

if (function_exists('get_field')) {
    $cleanup_options = get_field('cleanup', 'option');
    if (!empty($cleanup_options['disable_emojis'])) {
        add_action('init', 'laz_disable_wp_emoji', 10);
    }
}


function laz_allowed_block_types($block_types, $post)
{
    $default_blocks = array(
        'core/paragraph',
        'core/image',
        'core/gallery',
        'core/heading',
        'core/list',
        'core/quote',
        'core/spacer',
        'core/separator',
        'core/table',
        'core/verse',
        'core/freeform',
        'core/pullquote',
        'core/embed',
        'core/video',
        'core/audio',
        'core/menu',
        'core/shortcode'
    );
    $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

    $acf_blocks = array_filter($registered_blocks, function ($block) {
        return strpos($block->name, 'acf/') === 0;
    });

    $acf_block_names = array_keys($acf_blocks);

    $all_blocks = array_merge($default_blocks, $acf_block_names);

    if ($block_types === true) {
        return $all_blocks;
    }

    return array_merge($all_blocks, $block_types);
}


/**
 * Cleanup actions based on ACF settings.
 */
function laz_cleanup_actions()
{
    if (function_exists('get_field')) {
        $cleanup_options = get_field('cleanup', 'option');

        // Disable Unsupported Blocks
        if (!empty($cleanup_options['disable_unsupported_blocks'])) {
            add_filter('allowed_block_types_all', 'laz_allowed_block_types', 10, 2);
        }

        // Individual Cleanup WP Header Actions
        if (!empty($cleanup_options['disable_wordpress_generator_tag'])) {
            remove_action('wp_head', 'wp_generator');
        }
        if (!empty($cleanup_options['disable_windows_live_writer_support'])) {
            remove_action('wp_head', 'wlwmanifest_link');
        }
        if (!empty($cleanup_options['disable_really_simple_discovery'])) {
            remove_action('wp_head', 'rsd_link');
        }
        if (!empty($cleanup_options['disable_shortlink'])) {
            remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
        }
        if (!empty($cleanup_options['disable_rest_api_link'])) {
            remove_action('wp_head', 'rest_output_link_wp_head');
        }
        if (!empty($cleanup_options['disable_oembed_discovery'])) {
            remove_action('wp_head', 'wp_oembed_add_discovery_links');
        }
        if (!empty($cleanup_options['disable_adjacent_post_links'])) {
            remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        }

        // Disable Feed URLs
        if (!empty($cleanup_options['disable_feed_links'])) {
            remove_action('wp_head', 'feed_links', 2);
            remove_action('wp_head', 'feed_links_extra', 3);
        }
    }
}
add_action('init', 'laz_cleanup_actions', PHP_INT_MAX);
