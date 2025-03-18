<?php
/**
 * The template for displaying content in the index.php template.
 */
?>
<div class="col-lg-4 mb-5 col-post-items">
 <div class="card card-resources w-100 d-flex flex-column">
	<?php if ( has_post_thumbnail() ) {
		$featured_img_url = get_the_post_thumbnail_url($id,'full');
		$thumbnail_id = get_post_thumbnail_id( $id );
		$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
		$id = get_the_ID(); $permalink = get_permalink($id);?>
		<div  class="link-img-resource">
			<a href="<?php the_permalink(); ?>" class="w-100 h-100">
				<img class="img-resources img-fluid m-auto h-100 w-100 d-block fit-cover-center" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
			</a>
		</div>
	<?php } ?>
	<div class="card-body w-100 h-100 d-flex flex-column">
		<div class="d-flex align-items-center box-category">
		<?php $i=1;
		foreach((get_the_category()) as $category) {
			$catename = $category->cat_name;
			$cateslug = $category->slug;?>
			<a href="<?php echo $site_url."/category/".$cateslug; ?>" class="link-content-cat cl-green" aria-label="<?php echo $catename;?>">
				<?php if($i>1){
					echo  ' // '. $catename;
				}else{echo  $catename;  } ?>
			</a>
			<?php $i++;
		}
		?>
		<span class="date-post ms-4"><?php the_time('F') ?> <?php the_time('j') ?>, <?php the_time('Y') ?></span>
		</div>
		<a class="d-flex align-items-center cl-dark cl-dark-h link-title-resource" href="<?php the_permalink(); ?>">
			<h6 class="head-7"><?php the_title();?></h6>
		</a>
		<div class="dp-1 dp-3 cl-grey-3 pt-2">
			<?php echo get_the_excerpt()."..."; ?>
		</div>
		<?php  if( !isinternal($permalink) ): ?>
		<div class="d-flex align-items-center justify-content-between mt-3">
			<div class="d-flex align-items-center">
					<span class="date-post me-2">Read On </span>
					<a class="link-external" href="<?php the_permalink(); ?>">
						<svg width="24" height="23" viewBox="0 0 24 23" fill="none" xmlns="http://www.w3.org/2000/svg">
							<circle cx="11.75" cy="11.5" r="11.5" fill="#F2F6F7"/>
							<path d="M10.2986 8.02441H7.87925C7.54521 8.02441 7.27441 8.29521 7.27441 8.62925V15.8873C7.27441 16.2214 7.54521 16.4922 7.87925 16.4922H15.1373C15.4714 16.4922 15.7422 16.2214 15.7422 15.8873V13.468" stroke="#89A5B4" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M15.8469 10.4436C15.8469 10.7198 16.0708 10.9436 16.3469 10.9436C16.6231 10.9436 16.8469 10.7198 16.8469 10.4436L15.8469 10.4436ZM16.3469 7.41943L16.8469 7.41943C16.8469 7.28683 16.7943 7.15965 16.7005 7.06588C16.6067 6.97211 16.4796 6.91943 16.3469 6.91943V7.41943ZM13.3228 6.91943C13.0466 6.91943 12.8228 7.14329 12.8228 7.41943C12.8228 7.69558 13.0466 7.91943 13.3228 7.91943V6.91943ZM16.8469 10.4436L16.8469 7.41943L15.8469 7.41943L15.8469 10.4436L16.8469 10.4436ZM16.3469 6.91943H13.3228V7.91943H16.3469V6.91943Z" fill="#89A5B4"/>
							<path d="M11.7592 11.2998C11.564 11.495 11.564 11.8116 11.7592 12.0069C11.9545 12.2021 12.2711 12.2021 12.4663 12.0069L11.7592 11.2998ZM16.7002 7.77299C16.8955 7.57772 16.8955 7.26114 16.7002 7.06588C16.505 6.87062 16.1884 6.87062 15.9931 7.06588L16.7002 7.77299ZM12.4663 12.0069L16.7002 7.77299L15.9931 7.06588L11.7592 11.2998L12.4663 12.0069Z" fill="#89A5B4"/>
						</svg>
					</a>

			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
</div>

