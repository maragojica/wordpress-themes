<?php
/**
 * The template for displaying contact page
 * Template Name: Contact
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
get_template_part('template-parts/sections/section-contact-locations'); 
get_template_part('template-parts/sections/section-request-quote'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>