<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Verb_Studios
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("col-xs-12 col-md-6 col-lg-4 col-xl-3 m-b2 col-archive"); ?>>
    <?php $post_thumbnail_id = get_post_meta( get_the_id(), '_thumbnail_id', true );
                        $srcset = wp_get_attachment_image_srcset($post_thumbnail_id);
                        $sizes = wp_get_attachment_image_sizes($post_thumbnail_id, 'full'); ?>
	<div class="box-card h-100">
		<div class="card-media">
			<a class="w-100 h-100" tab-index="0" href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>" title="<?php the_title(); ?>">
				<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" height="241" srcset="<?php echo esc_attr($srcset); ?>" sizes="<?php echo esc_attr($sizes); ?>">
			</a>
		</div>
		<div class="card-footer text-center bg-black">			
			<h4 class="cl-white"><?php the_title(); ?></h4>
		</div>                               
		</div>	
</article><!-- #post-<?php the_ID(); ?> -->
