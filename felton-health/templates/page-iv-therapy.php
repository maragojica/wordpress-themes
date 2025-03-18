<?php
/**
 * The template for displaying IV Therapy page
 * Template Name: IV Therapy
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Felton_Health
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-internal-banner');  
get_template_part('template-parts/sections/section-back-forth-contain'); 
get_template_part('template-parts/sections/section-testimonials-slider');
get_template_part('template-parts/sections/section-resources');
get_template_part('template-parts/sections/section-info-text'); ?>      
</main><!-- #main -->

<?php

get_footer();
