<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Verum_Partners
 */

get_header();
?>

	<main id="primary" class="site-main">
	<section class="section-post">
		<div class="container">
		<?php if ( have_posts() ) : ?>

<header class="page-header">
	<h1 class="page-title cl-green m-b3 text-center">
		<?php
		/* translators: %s: search query. */
		printf( esc_html__( 'Search Results for: %s', 'verum-partners' ), '<span>' . get_search_query() . '</span>' );
		?>
	</h1>
</header><!-- .page-header -->
<div class="row m-t1"> 
<?php
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	/**
	 * Run the loop for the search to output the results.
	 * If you want to overload this in a child theme then include a file
	 * called content-search.php and that will be used instead.
	 */
	get_template_part( 'template-parts/contents/content', 'search' );

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
