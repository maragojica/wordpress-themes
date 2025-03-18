<?php
/**
 * The template for displaying all single locations
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vamp
 */

 get_header("inner");
 ?>
 
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
get_template_part('template-parts/sections/section-info-text');
get_template_part('template-parts/sections/section-cta');
get_template_part('template-parts/sections/section-services'); 
get_template_part('template-parts/sections/section-map-locations');
get_template_part('template-parts/sections/section-reviews');
get_template_part('template-parts/sections/section-banner'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>
