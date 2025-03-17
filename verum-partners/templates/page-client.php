<?php
/**
 * The template for displaying client page
 * Template Name: Client Portal
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

 get_header(); ?>

 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-info-logos'); 
 get_template_part('template-parts/sections/section-contact'); ?>     
 </main><!-- #main -->
 <?php
 get_footer(); ?>