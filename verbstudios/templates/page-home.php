<?php
/**
 * The template for displaying home page
 * Template Name: Home
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-main-banner');
get_template_part('template-parts/sections/section-back-forth-contain');
get_template_part('template-parts/sections/section-mansory-general-work'); 
get_template_part('template-parts/sections/section-testimonials');
get_template_part('template-parts/sections/section-cta-contact');?>      
</main><!-- #main -->

<?php

get_footer();
