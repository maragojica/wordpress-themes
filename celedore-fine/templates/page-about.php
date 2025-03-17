<?php
/**
 * The template for displaying about page
 * Template Name: About
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celedore_Fine_Wallpaper
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-info-text-two-columns'); 
 get_template_part('template-parts/sections/section-back-forth-image');
 get_template_part('template-parts/sections/section-the-team'); 
 get_template_part('template-parts/sections/section-back-forth-image-reverse');
 get_template_part('template-parts/sections/section-subscribe'); 
 get_template_part('template-parts/sections/section-contact'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>