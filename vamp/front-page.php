<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

get_header();
?>
<main id="primary" class="site-main">
<?php 
get_template_part('template-parts/sections/section-home-hero'); 
get_template_part('template-parts/sections/section-form-box'); 
get_template_part('template-parts/sections/section-info-text');
get_template_part('template-parts/sections/section-cta');
get_template_part('template-parts/sections/section-services'); 
get_template_part('template-parts/sections/section-journey-slider'); 
get_template_part('template-parts/sections/section-reviews');
get_template_part('template-parts/sections/section-banner'); 
 ?>     
</main><!-- #main -->
<?php
get_footer();
?>

