<?php
/**
 * Template part for displaying clients profiles post types
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	 <div class="content-circle">
		  <?php
        $circle_shape = get_field('circle_shape', 'option');
        if (!empty($circle_shape)) {
            $url = $circle_shape['url'];
            $alt = $circle_shape['alt']; ?>
            <img class="circle-shape" src="<?php echo esc_url($url); ?>" alt="<?php echo $alt; ?>" width="2250" height="2250"/>			
        <?php } ?> 
	<?php  get_template_part('template-parts/sections/section-profile-banner'); 
	get_template_part('template-parts/sections/section-info-profile'); 
     get_template_part('template-parts/sections/section-accordeon-services'); 
	get_template_part('template-parts/sections/section-recent-blog'); ?>
	 </div> 	 
	<?php 
	get_template_part('template-parts/sections/section-contact'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
