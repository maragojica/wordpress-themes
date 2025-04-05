<?php

/*
 * generate favicon here: https://realfavicongenerator.net/
 * place files in /assets/favicon/ folder
 *
 * */

function custom_add_favicon() {
    /** Remove default favicon */
    remove_action('wp_head', 'genesis_load_favicon', 10); 
    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?=CHILD_URL?>/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="48x48" href="<?=CHILD_URL?>/assets/favicon/favicon-48x48.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?=CHILD_URL?>/assets/favicon/favicon-192x192.png">
    <link rel="manifest" href="<?=CHILD_URL?>/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?=CHILD_URL?>/assets/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="<?=CHILD_URL?>/assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <?php
}

add_action('wp_head', 'custom_add_favicon', 9);