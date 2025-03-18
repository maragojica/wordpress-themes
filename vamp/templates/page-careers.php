<?php
/**
 * The template for displaying careers page
 * Template Name: Careers
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
get_template_part('template-parts/sections/section-info-text');
get_template_part('template-parts/sections/section-benefits');
get_template_part('template-parts/sections/section-roles'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>