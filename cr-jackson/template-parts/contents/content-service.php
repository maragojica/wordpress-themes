<?php
/**
 * Template part for displaying content service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CR_Jackson
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
get_template_part('template-parts/sections/section-internal-banner'); 
if (have_rows('flexible_content')): ?>   
    <?php while(have_rows('flexible_content')): the_row();
        get_template_part('template-parts/flexible/flex', get_row_layout());
    endwhile; ?>    
<?php endif; 
 get_template_part('template-parts/sections/section-contact'); ?>
</article><!-- #post-<?php the_ID(); ?> -->
