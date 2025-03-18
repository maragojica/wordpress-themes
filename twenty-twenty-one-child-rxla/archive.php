<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>



<?php if ( have_posts() ) : ?>
<section class="section-news section-90 pt-5 pb-5 mt-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php the_archive_title( '<h1 class="headline cl-dark text-center pt-4 pb-3 pt-lg-5 pb-lg-4">', '</h1>' ); ?>
			</div>
		</div>

	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
	<?php endwhile; ?>

	<?php twenty_twenty_one_the_posts_navigation(); ?>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>
	</div>
</section>
<?php get_footer(); ?>
