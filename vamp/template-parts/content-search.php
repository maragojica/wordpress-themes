<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
	</header><!-- .entry-header -->

	<?php vamp_post_thumbnail(); ?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<div class="button-list m-t2 start-xs">                                                                                          
		<a tabindex="0" href="<?php the_permalink(); ?>" target="_self" aria-label="<?php echo the_title();?>" title="<?php echo the_title();?>">
			<button class="button cta-btn mt-08 bg-black cl-white bg-blue-h animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">Read More</button> 
		</a>    
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
