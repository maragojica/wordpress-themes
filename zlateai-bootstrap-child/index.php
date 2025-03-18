<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();

$page_id = get_option( 'page_for_posts' );
?>
	<section class="banner-general d-flex align-items-center">
		<div class="container z-index-2">
			<div class="row justify-content-center">
			<div class="col-md-12">
					<h1 class="cl-dark-ocean">
						Blog
					</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="section-resources bg-white pb-md-5">
		<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
			<div class="row equal loadmoreitems">
					<?php
					get_template_part( 'archive', 'loop' );
					?>
			</div><!-- /.row -->
		</div>
	</section>
<?php
get_footer();
