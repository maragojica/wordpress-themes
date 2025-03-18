<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>
<?php  $blog_home_id = get_option( 'page_for_posts' );
$url = get_the_post_thumbnail_url($blog_home_id, 'full');
$our_title = get_the_title( get_option('page_for_posts', true) );
  if($url): ?>
	<section class="section-title-home mb-0 section-90">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="headline cl-dark text-center pt-5 pb-4"><?php echo $our_title;?></h1>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<section class="section-banner-inside section-banner section-90 d-flex align-items-center mt-0 mb-0">
</section>
<style>
	.section-banner-inside{
		background-image: url("<?php echo $url;?>");
	}
</style>
<section class="section-news section-90 pt-5 pb-5 mt-0">
	<div class="container">
<?php if ( have_posts() ) {

	// Load posts loop.
	while ( have_posts() ) {
		the_post();

		get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) );
	}

	// Previous/next page navigation.
	twenty_twenty_one_the_posts_navigation();

} else {

	// If no content, include the "No posts found" template.
	get_template_part( 'template-parts/content/content-none' );

} ?>
	</div>
</section>
<?php get_footer(); ?>
