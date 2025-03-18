<?php
/**
 * The template for displaying Visit Us page *
 * Template Name: Visit Us
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-contact-map'); 
 get_template_part('template-parts/sections/section-mansory-general-work');
 get_template_part('template-parts/sections/section-social-full');
 get_template_part('template-parts/sections/section-contact-sm'); 
  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>