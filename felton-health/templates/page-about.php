<?php
/**
 * The template for displaying about page
 * Template Name: About
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Felton_Health
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-internal-banner');  
get_template_part('template-parts/sections/section-back-forth-contain'); 
get_template_part('template-parts/sections/section-faqs');
get_template_part('template-parts/sections/section-info-text'); 
get_template_part('template-parts/sections/section-resources'); ?>      
</main><!-- #main -->

<?php

get_footer();
