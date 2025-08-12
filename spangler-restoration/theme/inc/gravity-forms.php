<?php
/**
 * Lazarus Gravity Forms Modifications
 */

 /*
 * Nicer Spinner
 */
add_filter('gform_ajax_spinner_url', function ($image_src, $form) {
    return 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}, 10, 2);

/**
 * Disable Gravity Forms Legend (little star that says required)
 */
add_filter( 'gform_required_legend', '__return_empty_string' );