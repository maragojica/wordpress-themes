<?php

/*
 * Template name: Thank you
 */

remove_action('genesis_loop', 'genesis_do_loop', 10);
add_action('genesis_loop', 'custom_content', 10);
add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');

function custom_content()
{
    the_content();
    $phone_no = $_GET['phone'];;

// 👇 format phone number
    $format_phone =
        substr($phone_no, -10, -7) . "-" .
        substr($phone_no, -7, -4) . "-" .
        substr($phone_no, -4);
    ?>
    <script>
        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
            'email': '<?php echo $_GET['email']; ?>',
            'phone': '<?php echo '1-'.$format_phone; ?>' //country code is required
        });
    </script>
    <?php
}


genesis();