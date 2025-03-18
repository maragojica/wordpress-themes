<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();

$page_id = get_option( 'page_for_posts' );
?>
	<section class="banner-inside pt-md-5 pb-md-5 pt-3 pb-3 d-flex align-items-center position-relative bg-lighter">
		<div class="container z-index-2">
			<div class="row justify-content-center text-center">
			<div class="col-md-12">
					<h1 class="cl-dark-green">
						Blog
					</h1>
				</div>
			</div>
		</div>
	</section>
	<section class="section-resources bg-lighter pb-md-5">
		<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
			<div class="row equal">
					<?php
					get_template_part( 'archive', 'loop' );
					?>
			</div><!-- /.row -->
		</div>
	</section>
<?php
get_footer();
