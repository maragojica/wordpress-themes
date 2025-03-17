<?php
/**
 * The template for displaying contact page
 * Template Name: Contact
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-internal-banner');
get_template_part('template-parts/sections/section-info-text');
get_template_part('template-parts/sections/section-contact');
get_template_part('template-parts/sections/section-testimonials');
get_template_part('template-parts/sections/section-cta-contact');?>      
</main><!-- #main -->

<?php

get_footer();
