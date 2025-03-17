<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CR_Jackson
 */

get_header();
?>

<main id="primary" class="site-main">   
    <?php 
    get_template_part('template-parts/sections/section-main-banner'); 
    get_template_part('template-parts/sections/section-main-header'); 
    get_template_part('template-parts/sections/section-video-lightbox'); 
    get_template_part('template-parts/sections/section-info-text-two-columns'); 
    get_template_part('template-parts/sections/section-our-values');
    get_template_part('template-parts/sections/section-back-forth-full'); 
    get_template_part('template-parts/sections/section-back-forth-location'); 
    get_template_part('template-parts/sections/section-services');      
    get_template_part('template-parts/sections/section-contact'); 
    ?>  
</main><!-- #main -->
<?php
get_footer(); ?>
