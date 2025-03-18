<?php
/**
 * The template for displaying the team page
 * Template Name: Team
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum_Security_&_Innovations
 */

get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/sections/section-internal-banner');        
    get_template_part('template-parts/sections/section-team'); 
    get_template_part('template-parts/sections/section-team-electric');
    get_template_part('template-parts/sections/section-gallery'); 
    get_template_part('template-parts/sections/section-jobs'); 
    get_template_part('template-parts/sections/section-contact'); ?>
</main><!-- #main -->
<?php
get_footer();
?>
