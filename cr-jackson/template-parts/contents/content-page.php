<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CR_Jackson
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<div class="row middle-xs justify-center">
			<div class="col-xs-12 col-lg-10 m-t3 m-b3">
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title cl-blue">', '</h1>' ); ?>
			</header><!-- .entry-header -->			

		<div class="entry-content dp-1 cl-blue">
			<?php
			the_content(); ?>
	         </div><!-- .entry-content -->
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
