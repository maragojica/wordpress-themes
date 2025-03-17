<?php
/**
 * The template for displaying resources page
 * Template Name: Resources
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
    get_template_part('template-parts/sections/section-anchor-links'); 
	get_template_part('template-parts/sections/section-general-services');         
    get_template_part('template-parts/sections/section-contact');  
    $show_social = get_field('show_social'); 
    if($show_social):
    get_template_part('template-parts/sections/section-social'); 
    endif;
    ?>  
</main><!-- #main -->

<?php

get_footer();
