<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Quantum_Security_&_Innovations
 */
get_header();
?>
<main id="primary" class="site-main">
<?php 
get_template_part('template-parts/sections/section-main-banner'); 
get_template_part('template-parts/sections/section-info-text');
if (have_rows('flexible_elements')):    
   while(have_rows('flexible_elements')): the_row();
        get_template_part('template-parts/flexible/content', get_row_layout());
    endwhile;   
 endif; 
 get_template_part('template-parts/sections/section-featured-project'); 
 get_template_part('template-parts/sections/section-testimonials'); 
 get_template_part('template-parts/sections/section-contact'); 
 ?>     
</main><!-- #main -->
<?php
get_footer();
?>
