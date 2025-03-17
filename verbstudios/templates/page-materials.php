<?php
/**
 * The template for displaying materials page
 * Template Name: Materials
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

get_header();
?>

<main id="primary" class="site-main">
<?php get_template_part('template-parts/sections/section-internal-banner');
get_template_part('template-parts/sections/section-info-text');
get_template_part('template-parts/sections/section-filter-materials'); 
get_template_part('template-parts/sections/section-back-forth-slider');
get_template_part('template-parts/sections/section-contact');
get_template_part('template-parts/sections/section-cta-contact');?>      
</main><!-- #main -->

<?php

get_footer();
