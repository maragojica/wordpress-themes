<?php
/**
 * The template for displaying careers page
 * Template Name: Careers
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

 get_header();
 ?>

 <main id="primary" class="site-main">
 <?php 
 get_template_part('template-parts/sections/section-internal-banner'); ?>
 <div class="content-circle">
 <?php
        $circle_shape = get_field('circle_shape', 'option');
        if (!empty($circle_shape)) {
            $url = $circle_shape['url'];
            $alt = $circle_shape['alt']; ?>
            <img class="circle-shape" src="<?php echo esc_url($url); ?>" alt="<?php echo $alt; ?>" width="2250" height="2250"/>			
        <?php } ?>   
        <?php get_template_part('template-parts/sections/section-back-forth-full'); 
        get_template_part('template-parts/sections/section-info-list');
        get_template_part('template-parts/sections/section-accordeon-team'); ?>
 </div> 
 <?php 
 get_template_part('template-parts/sections/section-info-text-wbg');
  get_template_part('template-parts/sections/section-info-list-icons');
  get_template_part('template-parts/sections/section-accordeon');
 get_template_part('template-parts/sections/section-contact'); ?>     
 </main><!-- #main -->
 
 <?php
 get_footer();
 ?>