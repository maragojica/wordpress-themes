<?php
/**
 * The template for displaying Our Team page *
 * Template Name: Our Team
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-back-forth-full'); 
 get_template_part('template-parts/sections/section-team-designers'); 
 get_template_part('template-parts/sections/section-team-general'); 
 get_template_part('template-parts/sections/section-slider-history'); 
 get_template_part('template-parts/sections/section-contact-sm'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>