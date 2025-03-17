<?php
/**
 * The template for displaying the concrete in practice page
 * Template Name: Concrete In Practice
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */
get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/section-internal-banner'); 
     get_template_part('template-parts/section-info-text');      
    get_template_part('template-parts/section-laz-library'); ?>
</main><!-- #main -->
<?php
get_footer();
?>
