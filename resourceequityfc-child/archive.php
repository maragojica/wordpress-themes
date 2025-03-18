<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header("inner");
?>
<section class="banner-inner-page">
	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-md-12">
				<?php
				the_archive_title( '<h3 class="headline-section cl-dark">', '</h1>' );
				the_archive_description( '<div class="copy-text cl-dark mb-5 pb-2 pb-md-5">', '</div>' );
				?>
			</div>
		</div>
	</div>
</section>
	<div class="info-inner-page">
		<div class="container wrap-news">

					<?php if ( have_posts() ) : ?>

						<?php
						// Start the Loop.
						while ( have_posts() ) :
							the_post();

							/*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
							get_template_part( 'template-parts/content', 'articles' );

							// End the loop.
						endwhile;

						// Previous/next page navigation.
						the_posts_pagination(
								array(
										'prev_text'          => __( 'Previous page', 'twentysixteen' ),
										'next_text'          => __( 'Next page', 'twentysixteen' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
								)
						);

					// If no content, include the "No posts found" template.
					else :
						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>

		</div>
	</div>

<?php get_footer(); ?>
