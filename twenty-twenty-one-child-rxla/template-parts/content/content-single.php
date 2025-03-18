<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="section-featured-image section-banner section-90 d-flex align-items-center mt-5">
		<?php twenty_twenty_one_post_thumbnail(); ?>
	</section>
	<section class="section-title-home mb-0 section-90">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="subtitle cl-red mb-2"><?php echo get_the_date(); ?></h3>
					<?php the_title( '<h1 class="headline cl-dark pb-3 pb-md-5">', '</h1>' ); ?>
					<div class="copy-text cl-body">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<div class="row mb-4 mt-5">
				<div class="col-md-12">
					<div class="line bg-line w-100"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<?php if( get_field('author_news') ): ?>
						<h3 class="subtitle cl-red mb-2"><?php the_field('author_news');?></h3>
					<?php endif; ?>
					<h4 class="title-news mb-2 cl-dark"><?php if( get_field('position_news') ): the_field('position_news'); endif; ?><?php if( get_field('company_news') ): ?>, <?php the_field('company_news'); endif; ?></h4>
				</div>
			</div>
		</div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
