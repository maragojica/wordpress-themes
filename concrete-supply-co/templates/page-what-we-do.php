<?php
/**
 * The template for displaying the what we do page
 * Template Name: What We Do
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */
get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/section-internal-banner');     
     get_template_part('template-parts/section-services');     
     get_template_part('template-parts/section-market'); 
     get_template_part('template-parts/section-portfolio-items'); 
    get_template_part('template-parts/section-contact'); ?>
</main><!-- #main -->
<?php
get_footer();
?>
