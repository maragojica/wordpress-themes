<?php
/**
 * The template for displaying home page
 * Template Name: Home
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Felton_Health
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-main-banner');  
get_template_part('template-parts/sections/section-back-forth-contain');
get_template_part('template-parts/sections/section-info-text-two-col'); 
get_template_part('template-parts/sections/section-info-boxes'); 
get_template_part('template-parts/sections/section-testimonials-slider');
get_template_part('template-parts/sections/section-info-boxes-two-col');
get_template_part('template-parts/sections/section-resources'); ?>      
</main><!-- #main -->

<?php

get_footer();
