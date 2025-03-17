<?php
/**
 * The template for displaying contact page
 * Template Name: Contact
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

 get_header("bg");
 ?>
 <main id="primary" class="site-main main-bg">
 <?php 
 get_template_part('template-parts/sections/section-contact-map'); 
 get_template_part('template-parts/sections/section-subscriptions'); 
 get_template_part('template-parts/sections/section-contact'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>