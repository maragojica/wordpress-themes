<?php
/**
 * The template for displaying the locations page
 * Template Name: Locations
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */
get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/section-internal-banner'); 
     get_template_part('template-parts/section-info-text');      
    get_template_part('template-parts/section-laz-locator');  
    get_template_part('template-parts/section-contact'); ?>
</main><!-- #main -->
<?php
get_footer();
?>
