<?php

/**
 * The template for displaying the homepage page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

get_header();
?>
<main id="primary" class="site-main">
    <div class="content-circle">
    <?php
        $circle_shape = get_field('circle_shape', 'option');
        if (!empty($circle_shape)) {
            $url = $circle_shape['url'];
            $alt = $circle_shape['alt']; ?>
            <img class="circle-shape" src="<?php echo esc_url($url); ?>" alt="<?php echo $alt; ?>" width="2250" height="2250"/>			
        <?php } ?>    
    <?php 
    get_template_part('template-parts/sections/section-main-banner'); 
    get_template_part('template-parts/sections/section-info-text-wbg'); ?>
</div>
<?php get_template_part('template-parts/sections/section-info-list'); ?>
<div class="content-constelations">
<?php
    $constellation_shape = get_field('constellation_shape', 'option');
    if (!empty($constellation_shape)) {
        $url = $constellation_shape['url'];
        $alt = $constellation_shape['alt']; ?>
        <img class="constellation-shape wow fadeIn" src="<?php echo esc_url($url); ?>" data-wow-duration="0.8s" data-wow-delay="0.3s" alt="<?php echo $alt; ?>" width="2052" height="2248"/>			
    <?php } ?>  
<?php get_template_part('template-parts/sections/section-video-lightbox');
get_template_part('template-parts/sections/section-back-forth-full'); 
get_template_part('template-parts/sections/section-recent-blog'); ?>
</div>
<?php get_template_part('template-parts/sections/section-contact'); 
 ?>     
</main><!-- #main -->
<?php
get_footer(); ?>
