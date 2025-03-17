<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celedore_Fine_Wallpaper
 */

get_header("inner");
?>
<main id="primary" class="site-main">
<?php 
get_template_part('template-parts/sections/section-main-slider'); 
get_template_part('template-parts/sections/section-info-text'); 
get_template_part('template-parts/sections/section-services'); 
get_template_part('template-parts/sections/section-back-forth-gallery'); 
get_template_part('template-parts/sections/section-social'); 
get_template_part('template-parts/sections/section-subscribe'); 
get_template_part('template-parts/sections/section-contact'); 
 ?>     
</main><!-- #main -->
<?php
get_footer();
?>
