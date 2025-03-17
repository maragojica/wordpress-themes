<?php
/**
 * The template for displaying trade accounts page
 * Template Name: Trade Accounts
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celedore_Fine_Wallpaper
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-trade');
 get_template_part('template-parts/sections/section-contact');  
  ?> 
 </main><!-- #main -->
 <?php
 get_footer();
 ?>