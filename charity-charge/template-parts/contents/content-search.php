<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Charity_Charge
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("col-md-6 col-lg-4 three-columns post-item mb-4"); ?>>
	<div class="d-flex">
	<div class="np-card w-100">
		<div class="np-card-body">
			<div class="np-card-title color-gray-off color-orange-h mt-2"><?php the_title(); ?></div>
			<div class="np-card-desc mb-0 color-gray">
		<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		</div>
		
		<div class="np-card-footer">
			<div class="d-flex flex-column flex-wrap gap-3 mt-3">  
					<div class="relative group">
					<a href="<?php esc_url( get_permalink() );?>" tabindex="0" aria-label="Read More" class="simple-link color-dark color-orange-h">
						Read more
					</a>
				</div>  
			</div>
		</div>	
	</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
