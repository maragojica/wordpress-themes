<?php
/**
 * The template for displaying services page *
 * Template Name: Brands
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celedore_Fine_Wallpaper
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-back-forth-gallery'); 
 get_template_part('template-parts/sections/section-logo-slider'); 
 get_template_part('template-parts/sections/section-text-list'); 
 get_template_part('template-parts/sections/section-contact'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>