<?php
/**
 * The Home page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 */?>
<?php get_header(); ?>

<?php
while (have_posts()) : the_post();
    // check if the flexible content field has rows of data
	if (have_rows('page_content')) :
		// loop through the rows of data
		while (have_rows('page_content')) : the_row();
			get_template_part('template-parts/section', get_row_layout());
		endwhile;
	else :
		get_template_part( 'template-parts/content' );

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
    endif;
endwhile;
?>

<?php get_footer(); ?>