<?php
/**
 * The template for displaying booking page
 * Template Name: Booking
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
get_template_part('template-parts/sections/section-booking'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>