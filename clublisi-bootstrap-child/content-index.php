<?php
/**
 * The template for displaying content in the index.php template.
 */
?>
<div class="col-sm-6 col-lg-4 mb-4 pb-2 col-post-items">
	<div class="card card-post w-100 d-flex flex-column">
	<?php if ( has_post_thumbnail() ) {
		$featured_img_url = get_the_post_thumbnail_url($id,'full');
		$thumbnail_id = get_post_thumbnail_id( $id );
		$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
		$id = get_the_ID(); $permalink = get_permalink($id);?>
		<div  class="link-img-resource position-relative">
				<img class="img-resources img-fluid m-auto h-100 w-100 d-block fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
			<a href="<?php the_permalink(); ?>" class="overlay overlay-post">
				<h2 class="cl-white"><?php the_title();?></h2>
				<?php $author = get_field('author');
				if($author): ?>
				  <div class="author cl-white"><?php echo $author;?></div>
				<?php endif; ?>
			</a>
		</div>
	<?php } ?>
	 <div class="linkedin box-contact-team d-flex justify-content-between align-items-center w-100">
		 <?php $title_story = get_field('title_story');
		 if($title_story): ?>
		 <span class="title-contact-team"><?php echo $title_story;?></span>
		 <?php endif; ?>
		 <a class="link-contact-team" href="<?php the_permalink(); ?>">
			 View Story
		 </a>
	 </div>
	</div>
</div>

