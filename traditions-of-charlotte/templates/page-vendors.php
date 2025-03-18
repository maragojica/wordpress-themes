<?php
/**
 * The template for displaying Vendors page *
 * Template Name: Vendors
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-logo-slider'); 
 get_template_part('template-parts/sections/section-text-list'); 
 get_template_part('template-parts/sections/section-contact-sm'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>