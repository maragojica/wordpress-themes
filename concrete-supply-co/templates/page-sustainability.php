<?php
/**
 * The template for displaying the sustainability page
 * Template Name: Sustainability
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */
get_header();
?>
<main id="primary" class="site-main">
<?php global $post;

if ( ! post_password_required( $post ) ) {
    get_template_part('template-parts/section-internal-banner'); 
    get_template_part('template-parts/section-info-text-image');    
   get_template_part('template-parts/section-back-and-forth'); 
   get_template_part('template-parts/section-info-code'); 
   get_template_part('template-parts/section-contact');
  

}else{ ?>
   <section>
    <div class="container p-t4 p-b4">
        <div class="row justify-center p-t4 p-b4">
            <div class="col-xs-12 col-md-6">
            <?php // we will show password form here
                 echo get_the_password_form(); ?>
            </div>
        </div>
    </div>
   </section>
   
<?php } ?>
</main><!-- #main -->
<?php
get_footer();
?>
