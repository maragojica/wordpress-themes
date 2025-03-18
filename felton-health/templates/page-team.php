<?php
/**
 * The template for displaying team page
 * Template Name: Team
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Felton_Health
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-internal-banner');  
get_template_part('template-parts/sections/section-team');  
get_template_part('template-parts/sections/section-info-text-reverse'); 
get_template_part('template-parts/sections/section-info-boxes-two-col'); ?>      
</main><!-- #main -->

<?php

get_footer();
