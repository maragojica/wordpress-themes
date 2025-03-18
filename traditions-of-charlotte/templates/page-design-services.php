<?php
/**
 * The template for displaying Design Services page *
 * Template Name: Design Services
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-info-text-two-columns'); 
 get_template_part('template-parts/sections/section-info-two-columns-accordeon'); 
 get_template_part('template-parts/sections/section-info-text'); 
 get_template_part('template-parts/sections/section-back-forth-full-md'); 
 get_template_part('template-parts/sections/section-back-forth-gallery'); 
 get_template_part('template-parts/sections/section-contact-md'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>