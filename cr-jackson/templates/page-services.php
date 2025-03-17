<?php
/**
 * The template for displaying services page
 * Template Name: Services
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
 get_template_part('template-parts/sections/section-services'); 
 get_template_part('template-parts/sections/section-our-values'); 
 get_template_part('template-parts/sections/section-contact'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>