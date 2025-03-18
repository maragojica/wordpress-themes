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

	<section class="section-inside pb-md-5">
		<div class="container pt-md-5 pb-md-5 pt-4 pb-0">
			<div class="row">
				<div class="col-md-12">
					<h2 class="cl-dark text-center"><?php the_title(); ?></h2>
					<div class="dp-1 cl-dark"><?php the_content();?></div>
			</div><!-- /.row -->
		</div>
			<div class="section-bottom-praise pt-5 pb-5">
				<div class="container pt-md-5">
					<div class="row row-bottom-praise">
						<div class="col-6">
							<a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="/praise" aria-label="Testimonials">Testimonials
								<div class="line-cta"></div>
							</a>
						</div>
						<div class="col-6">
							<a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="/contact" aria-label="Book A Consult">Book A Consult
								<div class="line-cta"></div>
							</a>
						</div>
					</div>
				</div>
			</div>
	</section>

</article><!-- /#post-<?php the_ID(); ?> -->
<?php
get_footer();
