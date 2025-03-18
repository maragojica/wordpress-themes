<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();

$page_id = get_option( 'page_for_posts' );
?>
	<section class="section-blog pt-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 text-center">
					<?php $subtitle_index = get_post_meta( $page_id, 'subtitle_index', true );
					if($subtitle_index): ?>
					<h3 class="subtitle cl-dark text-uppercase"><?php echo $subtitle_index;?></h3>
					<?php endif; ?>
					<?php $title_index = get_post_meta( $page_id, 'title_index', true );
					if($title_index): ?>
					<div class="headline text-center cl-dark pb-5"><?php echo $title_index;?></div>
					<?php endif; ?>
				</div>
			</div>
			<div class="row equal loadmoreitems" data-masonry='{"percentPosition": true }'>
				<?php
				get_template_part( 'archive', 'loop' );
				?>
			</div><!-- /.row -->
		</div>
	</section>
<?php  $cta_bottom = get_post_meta( $page_id, 'cta_1_index', true ); $info_bottom = get_post_meta( $page_id, 'cta_2_index', true ); /*$cta_bottom = get_field('cta_bottom', 'option');  $info_bottom = get_field('info_bottom', 'option');*/ ?>
	<div class="section-bottom-blog pt-5 pb-5">
		<div class="container pt-5 pb-5">
			<div class="row row-bottom-praise">
				<div class="col-6">
					<?php if($cta_bottom) {
						$link_url = $cta_bottom['url'];
						$link_title = $cta_bottom['title'];
						$link_target = $cta_bottom['target'] ? $cta_bottom['target'] : '_self';?>
						<a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?>
							<div class="line-cta"></div>
						</a>
					<?php } ?>
				</div>
				<div class="col-6">
					<?php if($info_bottom) {
						$link_url = $info_bottom['url'];
						$link_title = $info_bottom['title'];
						$link_target = $info_bottom['target'] ? $info_bottom['target'] : '_self';?>
						<a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?>
							<div class="line-cta"></div>
						</a>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
