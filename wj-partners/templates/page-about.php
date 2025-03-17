<?php
/**
 * The template for displaying about page
 * Template Name: About
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WJ_Partners
 */


 ?>
  <?php 
 if ( post_password_required(  get_post()->ID ) ){
    get_header("inner");
}else { get_header(); } ?>
 <main id="primary" class="site-main">
 <?php 
 if ( post_password_required(  get_post()->ID ) ){  ?>
    
    <?php echo get_the_password_form(); ?>
                
<?php }else { 
 get_template_part('template-parts/sections/section-internal-banner'); 
 if(get_field('add_full_slider_back_&_forth')) :
 get_template_part('template-parts/sections/section-slider-back-forth-full'); 
 endif;
 get_template_part('template-parts/sections/section-image-slider-text'); 
 get_template_part('template-parts/sections/section-info-accordeon');
 get_template_part('template-parts/sections/section-testimonial'); 
 get_template_part('template-parts/sections/section-info-columns-boxes');
 get_template_part('template-parts/sections/section-banner-media');
}  ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>