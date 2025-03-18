<?php
/**
 * Template Name: Blog Index
 * Description: The template for displaying the Blog index /blog.
 *
 */

get_header();

$page_id = get_option( 'page_for_posts' );
?>
	<section class="section-inside bg-white pb-md-5">
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
