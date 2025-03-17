<?php
/**
 * The template for displaying the specifier resources page
 * Template Name: Specifier Resources
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */
get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/section-internal-banner'); 
     get_template_part('template-parts/section-info-text-buttons');     
    get_template_part('template-parts/section-back-and-forth'); 
    get_template_part('template-parts/section-contact'); ?>
</main><!-- #main -->
<?php
get_footer();
?>
