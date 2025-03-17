<?php
/**
 * The template for displaying the contact page
 * Template Name: Contact
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Concrete_Supply_Co
 */

get_header();
?>
<main id="primary" class="site-main">
    <?php get_template_part('template-parts/section-internal-banner'); 
     get_template_part('template-parts/section-info-contact');
     get_template_part('template-parts/section-flexible-accordeon');  ?>
</main><!-- #main -->
<?php
get_footer();
?>
