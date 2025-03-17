<?php
/**
 * The template for displaying the about page
 * Template Name: About
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */
get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/section-internal-banner'); 
     get_template_part('template-parts/section-info-text-image');
     get_template_part('template-parts/section-values'); 
     get_template_part('template-parts/section-slider-history'); 
    get_template_part('template-parts/section-info-slider-image-video');    
    get_template_part('template-parts/section-logo-slider'); 
    get_template_part('template-parts/section-info-text-image-container');
    get_template_part('template-parts/section-contact'); ?>
</main><!-- #main -->
<?php
get_footer();
?>
