<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WJ_Partners
 */

get_header();
?>
<main id="primary" class="site-main">   
    <?php 
    get_template_part('template-parts/sections/section-main-banner');  
    get_template_part('template-parts/sections/section-banner-bg-text'); 
    get_template_part('template-parts/sections/section-back-forth-full'); 
    get_template_part('template-parts/sections/section-services');
    get_template_part('template-parts/sections/section-services-mobile');
    get_template_part('template-parts/sections/section-testimonial');
    get_template_part('template-parts/sections/section-banner-media'); 
    ?>  
</main><!-- #main -->
<?php
get_footer(); ?>
