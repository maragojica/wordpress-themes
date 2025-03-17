<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */
get_header();
?>
<main id="primary" class="site-main">
<?php 
get_template_part('template-parts/section-main-banner'); 
get_template_part('template-parts/section-info-text');
get_template_part('template-parts/section-counters');
get_template_part('template-parts/section-back-and-forth');
get_template_part('template-parts/section-elements');
get_template_part('template-parts/section-testimonials-slider'); 
get_template_part('template-parts/section-contact'); 
 ?>     
</main><!-- #main -->
<?php
get_footer();
?>
