<?php
/**
 * The template for displaying client profiles page
 * Template Name: Client Profiles
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

 get_header();
 ?>
 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-main-services'); 
 get_template_part('template-parts/sections/section-info-list-bg');
get_template_part('template-parts/sections/section-general-services');
 get_template_part('template-parts/sections/section-contact'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>