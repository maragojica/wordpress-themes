<?php
/**
 * The template for displaying our work page
 * Template Name: Our Work
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CR_Jackson
 */

 get_header();
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-banner'); 
if (have_rows('flexible_content')): ?>   
    <?php while(have_rows('flexible_content')): the_row();
        get_template_part('template-parts/flexible/flex', get_row_layout());
    endwhile; ?>    
<?php endif; 
 get_template_part('template-parts/sections/section-contact'); ?>    
 </main><!-- #main -->
 <?php
 get_footer();
 ?>