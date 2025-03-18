<?php
/**
 * The template for displaying employment application page
 * Template Name: Employment Application
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
get_template_part('template-parts/sections/section-employment-app'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>