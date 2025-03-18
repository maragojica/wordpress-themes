<?php
/**
 * The template for displaying about page
 * Template Name: About
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
get_template_part('template-parts/sections/section-back-and-forth');
get_template_part('template-parts/sections/section-reviews');
get_template_part('template-parts/sections/section-banner'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>