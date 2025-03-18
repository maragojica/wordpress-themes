<?php
/**
 * The template for displaying reviews page
 * Template Name: Reviews
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
get_template_part('template-parts/sections/section-featured-reviews'); 
get_template_part('template-parts/sections/section-reviews');
get_template_part('template-parts/sections/section-banner'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>