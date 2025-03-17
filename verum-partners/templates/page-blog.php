<?php
/**
 * The template for displaying blog page
 * Template Name: Blog
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

 get_header();
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-blog-banner'); ?>
 <section class="content-constelations p-t0">
 <?php get_template_part('template-parts/blocks/blog/blog');
 get_template_part('template-parts/sections/section-blog-audio');
 get_template_part('template-parts/sections/section-back-forth-full');
 get_template_part('template-parts/sections/section-contact'); 
  ?>     
  </section>
 </main><!-- #main -->
 <?php
 get_footer();
 ?>