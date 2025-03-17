<?php
/**
 * The template for displaying news page
 * Template Name: News
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WJ_Partners
 */

 if ( post_password_required(  get_post()->ID ) ){
    get_header("inner");
}else { get_header(); }
 ?>
 <main id="primary" class="site-main">
 <?php 
   if ( post_password_required(  get_post()->ID ) ){  ?>
    
    <?php echo get_the_password_form(); ?>
                
<?php }else {
 get_template_part('template-parts/sections/section-internal-banner'); 
 get_template_part('template-parts/sections/section-news'); 
 get_template_part('template-parts/sections/section-banner-media');
 } ?>     
 </main><!-- #main -->
 <?php
 get_footer();
 ?>