<?php
/**
 * Template Name: Default standard width template
 * The standard width page template file
 *
 * This is the template that displays all pages with standard width.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 */

$header_template = get_field( "header_template" );

switch ($header_template) {
	case 'White Menu':
		$header_template = 'inner';
		break;
	default:
		$header_template = '';
		break;
}


get_header( $header_template ); ?>

<div class="container">
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
</div>

<?php
get_footer();
