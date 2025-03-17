<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Construction_Metal_Products
 */

get_header();
?>

<main id="primary" class="site-main">   
    <?php 
    get_template_part('template-parts/sections/section-main-banner');     
    get_template_part('template-parts/sections/section-products-list'); 
    get_template_part('template-parts/sections/section-banner-youtube'); 
    get_template_part('template-parts/sections/section-info-text'); 
    get_template_part('template-parts/sections/section-featured');
    get_template_part('template-parts/sections/section-testimonials');  
    get_template_part('template-parts/sections/section-resources');       
    get_template_part('template-parts/sections/section-contact');  
    $show_social = get_field('show_social'); 
    if($show_social):
    get_template_part('template-parts/sections/section-social'); 
    endif;
    ?>  
</main><!-- #main -->
<?php
get_footer(); ?>
