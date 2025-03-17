<?php
/**
 * The template for displaying client profiles page
 * Template Name: Client Profiles QA
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
 get_template_part('template-parts/sections/section-info-list-bg'); ?>
 <div class="content-circle">
 <?php
        $circle_shape = get_field('circle_shape', 'option');
        if (!empty($circle_shape)) {
            $url = $circle_shape['url'];
            $alt = $circle_shape['alt']; ?>
            <img class="circle-shape" src="<?php echo esc_url($url); ?>" alt="<?php echo $alt; ?>" width="2250" height="2250"/>			
        <?php } ?>   
<?php get_template_part('template-parts/sections/section-client-description'); ?>
</div>
 <?php get_template_part('template-parts/sections/section-contact'); ?>  
 </main><!-- #main -->
 <?php
 get_footer();
 ?>