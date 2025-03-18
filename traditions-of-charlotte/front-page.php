<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Traditions_of_Charlotte
 */

get_header("inner");
?>
<main id="primary" class="site-main">
<?php 
$use_slider = get_field('use_slider'); 
if($use_slider){ 
get_template_part('template-parts/sections/section-main-slider'); 
} else{
get_template_part('template-parts/sections/section-main-banner'); 
}
get_template_part('template-parts/sections/section-back-forth-full'); 
get_template_part('template-parts/sections/section-info-text'); 
get_template_part('template-parts/sections/section-our-work'); 
get_template_part('template-parts/sections/section-social'); 
get_template_part('template-parts/sections/section-contact-sm'); 
 ?>     
</main><!-- #main -->
<?php
get_footer();
?>
