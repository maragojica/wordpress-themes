<?php
/**
 * The template for displaying the resources page
 * Template Name: Resources
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum_Security_&_Innovations
 */

get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/sections/section-internal-banner'); 
    get_template_part('template-parts/sections/section-internal-menu');
    if (have_rows('flexible_elements')):    
        while(have_rows('flexible_elements')): the_row();
             get_template_part('template-parts/flexible/content', get_row_layout());
         endwhile;   
      endif;  
    get_template_part('template-parts/sections/section-accordeon'); 
    get_template_part('template-parts/sections/section-contact');  ?>
</main><!-- #main -->
<?php
get_footer();
?>
