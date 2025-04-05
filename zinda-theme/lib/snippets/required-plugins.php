<?php

if (is_admin()):
// setup plugins
    require_once dirname(__DIR__).'/../plugin-activator/class-tgm-plugin-activation.php';
    add_action('tgmpa_register', 'my_theme_register_required_plugins');
    add_action('tgmpa_register', 'my_theme_register_required_plugins');

    /**
     * Register the required plugins for this theme.
     *
     *  <snip />
     *
     * This function is hooked into tgmpa_init, which is fired within the
     * TGM_Plugin_Activation class constructor.
     */
    function my_theme_register_required_plugins()
    {

        $plugins = array(

/*
            array(
                'name' => 'WP Activity Log',
                'slug' => 'wp-security-audit-log',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),
*/

            array(
                'name' => 'Custom Permalinks',
                'slug' => 'custom-permalinks',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'Yoast SEO',
                'slug' => 'wordpress-seo',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'Redirection',
                'slug' => 'redirection',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'Contact Form 7',
                'slug' => 'contact-form-7',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'reSmush.it',
                'slug' => 'resmushit-image-optimizer',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'Classic Editor',
                'slug' => 'classic-editor',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'Accessibility by UserWay',
                'slug' => 'userway-accessibility-widget',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'CallTrackingMetrics',
                'slug' => 'call-tracking-metrics',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'WP External Links',
                'slug' => 'wp-external-links',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'Advanced Contact Form 7 DB',
                'slug' => 'advanced-cf7-db',
                'required' => true,
                'force_activation' => true,
                'force_deactivation' => true
            ),

            array(
                'name' => 'WebP Express',
                'slug' => 'webp-express',
                'required' => false,
                'force_activation' => false,
                'force_deactivation' => false
            ),

        );

        $config = array(
            'id' => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
            'default_path' => '',                      // Default absolute path to bundled plugins.
            'menu' => 'tgmpa-install-plugins', // Menu slug.
            'parent_slug' => 'themes.php',            // Parent menu slug.
            'capability' => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
            'has_notices' => true,                    // Show admin notices or not.
            'dismissable' => true,                    // If false, a user cannot dismiss the nag message.
            'dismiss_msg' => '',                      // If 'dismissable' is false, this message will be output at top of nag.
            'is_automatic' => true,                   // Automatically activate plugins after installation or not.
            'message' => '',                      // Message to output right before the plugins table.
            /*
            'strings'      => array(
                'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
                'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
                // <snip>...</snip>
                'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
            )
            */
        );

        tgmpa($plugins, $config);

    }
endif;