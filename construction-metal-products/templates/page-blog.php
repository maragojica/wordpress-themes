<?php
/**
 * The template for displaying blog page
 * Template Name: Blog
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Construction_Metal_Products
 */

 get_header();
 ?>
 <main id="primary" class="site-main">
 <?php 
	 $show_internal_banner = get_field('show_internal_banner'); 
	 if($show_internal_banner):
    get_template_part('template-parts/sections/section-internal-banner');  
    endif;
     get_template_part('template-parts/blocks/blog/blog');
    get_template_part('template-parts/sections/section-contact');  
    $show_social = get_field('show_social'); 
    if($show_social):
    get_template_part('template-parts/sections/section-social'); 
    endif;
    ?>     
  </section>
 </main><!-- #main -->
 <?php
 get_footer();
 ?>