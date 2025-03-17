<?php
/**
 * The template for displaying client profiles with flip boxes page
 * Template Name: Client Profiles Flip Boxes
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

 get_header();
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-clients-profiles-flip-boxes'); 
 get_template_part('template-parts/sections/section-contact'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>