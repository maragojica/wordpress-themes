<?php
/**
 * The template for displaying contact page
 * Template Name: Contact
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Felton_Health
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-internal-banner');  
get_template_part('template-parts/sections/section-info-boxes-two-cols-winfo');
get_template_part('template-parts/sections/section-back-forth-contact');
get_template_part('template-parts/sections/section-map'); 
get_template_part('template-parts/sections/section-testimonials-slider'); ?>      
</main><!-- #main -->

<?php

get_footer();
