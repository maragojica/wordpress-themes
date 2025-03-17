<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nordic_IT
 */

get_header();
?>

	<section id="primary">
		<main id="main" class="2xl:pt-[185px] pt-[105px]">

		<?php if ( have_posts() ) : ?>			
           
			<?php
			get_template_part( 'template-parts/content/content', 'archive' );						

		else :

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		endif;
		?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
