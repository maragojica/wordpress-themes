<?php
/*
Template Name: Charlotte Service
Template Post Type: service

*/

get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
get_template_part('template-parts/sections/section-services-areas'); 
get_template_part('template-parts/sections/section-logo-slider');
get_template_part('template-parts/sections/section-counters');
get_template_part('template-parts/sections/section-back-and-forth');
get_template_part('template-parts/sections/section-method');
get_template_part('template-parts/sections/section-cta');
get_template_part('template-parts/sections/section-reviews');
get_template_part('template-parts/sections/section-pledge');
get_template_part('template-parts/sections/section-faqs');
get_template_part('template-parts/sections/section-banner'); ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>