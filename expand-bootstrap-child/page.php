<?php
/**
 * Template Name: Page (Default)
 * Description: Page template with Sidebar on the left side.
 *
 */

get_header();

the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="section-inside bg-accent-grey-1 pb-md-5">
		<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
			<div class="row">
				<div class="col-md-12">
					<h2 class="big-h2-mv cl-green mb-54"><?php the_title(); ?></h2>
					<div class="dp-1 dp-2 cl-dark"><?php the_content();?></div>
			</div><!-- /.row -->
		</div>
	</section>
</article><!-- /#post-<?php the_ID(); ?> -->
<?php
get_footer();
