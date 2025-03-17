<?php
/**
 * The template for displaying gallery page
 * Template Name: Gallery
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-internal-banner');
get_template_part('template-parts/sections/section-mansory-bulk'); 
get_template_part('template-parts/sections/section-cta-contact');?>      
</main><!-- #main -->

<?php

get_footer();
