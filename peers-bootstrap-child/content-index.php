<?php
/**
 * The template for displaying content in the index.php template.
 */
?>
<div class="col-lg-4 mb-5">
	<div class="card card-post w-100 h-100">
	<?php if ( has_post_thumbnail() ) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
		$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
		<a href="<?php the_permalink(); ?>" aria-label="<?php the_title();?>">
			<div class="card-img position-relative">
				<img class="card-img-top w-100 h-100 fluid-img fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
			</div>
		</a>
	<?php } ?>
	<div class="card-body">
		<?php
		$id = get_the_ID(); $permalink = get_permalink($id);
		$publiname = get_field('publication_name');
		if( !isinternal($permalink) ){ ?>
			<?php if($publiname): ?>
				<p class="label-1 pb-md-2 cl-dark-green text-uppercase"><?php echo $publiname;?></p>
			<?php endif; ?>
		<?php }else{ ?>
			<?php if(!empty(get_the_category())){ ?>
				<div class="d-flex">
					<p class="label-1 pb-2">
						<?php $i=1;
						foreach((get_the_category()) as $category) {
							$catename = $category->cat_name;

							if($i>1){
								echo  ', '. $catename;
							}else{echo  $catename;  }
							$i++;
						}
						?></p>
				</div>
			<?php }?>
		<?php } ?>
		<h5 class="card-title title-post cl-dark cl-dark-h pb-2 mb-0"><a href="<?php the_permalink(); ?>" class="cl-dark cl-dark-h"><?php the_title();?></a></h5>
		<div class="d-flex align-items-start flex-column">
			<span class="date-post pb-4"><?php the_time('F') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span>
			<a class="link-external" href="<?php the_permalink(); ?>" aria-label="<?php the_title();?>">
				<?php  if( !isinternal($permalink) ){
					echo "Read on ".$publiname;
				}else{ echo "Read more"; } ?>
			</a>
		</div>
	</div>
</div>
</div>

