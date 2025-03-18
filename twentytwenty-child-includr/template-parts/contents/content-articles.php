<?php
/**
 * Template part for displaying articles
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="card-post post-purple">
		<div class="row equal align-items-start">
			<div class="col-4 col-md-12 order-2 order-md-1">
				<div class="box-card-img pb-md-4">
					<?php if ( has_post_thumbnail() ) {
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
						$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
						<a href="<?php the_permalink(); ?>">
							<div class="box-card-img pb-md-4">
								<img class="img-fluid img-fit-center w-100 h-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
							</div>
						</a>
					<?php } ?>
				</div>
			</div>
			<div class="col-8 col-md-12 order-1 order-md-2">
				<h5 class="title-post cl-dark pb-md-3"><a href="<?php the_permalink(); ?>" class="cl-dark"><?php the_title();?></a></h5>
				<div class="copy-post"><?php the_excerpt(); ?></div>
			</div>
		</div>
	</div>
	<hr class="hide-tb">
</article><!-- #post-## -->