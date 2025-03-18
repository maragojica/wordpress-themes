<?php
/**
 * The template for displaying Schedule a Consultation page *
 * Template Name: Schedule a Consultation
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-info-two-columns-accordeon'); 
 get_template_part('template-parts/sections/section-form'); 
 get_template_part('template-parts/sections/section-contact-md'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>