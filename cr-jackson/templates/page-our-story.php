<?php
/**
 * The template for displaying our story page
 * Template Name: Our Story
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CR_Jackson
 */

 get_header();
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-info-text-two-columns'); 
 get_template_part('template-parts/sections/section-awards'); 
 get_template_part('template-parts/sections/section-timeline'); 
 get_template_part('template-parts/sections/section-back-forth-full'); 
 get_template_part('template-parts/sections/section-contact'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>