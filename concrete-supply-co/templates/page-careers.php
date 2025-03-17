<?php
/**
 * The template for displaying the careers page
 * Template Name: Careers
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */
get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/section-internal-banner'); 
    get_template_part('template-parts/section-info-careers');
    get_template_part('template-parts/section-info-text-image-video'); 
     get_template_part('template-parts/section-values');
    get_template_part('template-parts/section-back-and-forth');  ?>
</main><!-- #main -->
<?php
get_footer();
?>
