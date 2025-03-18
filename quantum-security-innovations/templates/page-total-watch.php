<?php
/**
 * The template for displaying the total watch pages
 * Template Name: Total Watch
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum_Security_&_Innovations
 */

get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/sections/section-internal-banner');  
    get_template_part('template-parts/sections/section-info-text-company');      
    get_template_part('template-parts/sections/section-back-and-forth');     
    get_template_part('template-parts/sections/section-contact'); 
    get_template_part('template-parts/sections/section-info-contact'); ?>
</main><!-- #main -->
<?php
get_footer();
?>
