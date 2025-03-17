<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verum_Partners
 */

get_header("bg");
?>

	<main id="primary" class="site-main main-bg">
		<section class="section-post">
		<div class="container">
		<?php if ( have_posts() ) : ?>

<header class="page-header">
	<?php
	the_archive_title( '<h1 class="page-title cl-green m-b3 text-center">', '</h1>' );
	the_archive_description( '<div class="archive-description">', '</div>' );
	?>
</header><!-- .page-header -->
<div class="row m-t1"> 
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	/*
	 * Include the Post-Type-specific template for the content.
	 * If you want to override this in a child theme, then include a file
	 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
	 */
	get_template_part( 'template-parts/contents/content', "blog" );

endwhile; ?>
</div>

<?php the_posts_navigation();

else :

get_template_part( 'template-parts/contents/content', 'none' );

endif;
?>

		</div>
		</section>
	</main><!-- #main -->

<?php

get_footer();
