<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Construction_Metal_Products
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php 
	 $show_internal_banner = get_field('show_internal_banner'); 
	 if($show_internal_banner):
    get_template_part('template-parts/sections/section-default-banner');  
    endif;	
	get_template_part('template-parts/sections/section-default-content');          
    get_template_part('template-parts/sections/section-contact');  
    $show_social = get_field('show_social'); 
    if($show_social):
    get_template_part('template-parts/sections/section-social'); 
    endif;
    ?> 
</article><!-- #post-<?php the_ID(); ?> -->
