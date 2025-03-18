<?php
/**
 * The template for displaying the companies pages
 * Template Name: Company
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum_Security_&_Innovations
 */

get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/sections/section-internal-banner');      
    get_template_part('template-parts/sections/section-info-text-company');  
    get_template_part('template-parts/sections/section-info-image');      
    get_template_part('template-parts/sections/section-services'); 
    get_template_part('template-parts/sections/section-featured-project'); 
    get_template_part('template-parts/sections/section-gallery'); 
    get_template_part('template-parts/sections/section-logo-slider'); 
    get_template_part('template-parts/sections/section-accordeon'); 
    get_template_part('template-parts/sections/section-contact');  ?>
</main><!-- #main -->
<?php
get_footer();
?>
