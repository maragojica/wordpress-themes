<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<?php if( have_rows('banner_inside', get_option('page_for_posts')) ): ?>
	<?php while( have_rows('banner_inside', get_option('page_for_posts')) ): the_row();
		// Get sub field values.
		$title = get_sub_field('title_page_inside', get_option('page_for_posts'));
		$text = get_sub_field('text_page_inside', get_option('page_for_posts'));
		$image = get_sub_field('image_banner_inside', get_option('page_for_posts'));
		?>
		<section class="banner-inside position-relative">
			<?php if( !empty($image) ): ?>
				<img class="cover-img img-fluid m-auto w-100 h-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			<?php endif; ?>
		</section>
		<section class="section-about pt-md-5 pt-4">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-12">
						<?php if( $title ): ?>
							<h2 class="subheadline cl-blue-d text-center pb-2"><?php echo $title;?></h2>
						<?php endif; ?>
						<?php if( $text ): ?>
							<div class="copy-text cl-blue-d"><?php echo $text;?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>
	<?php
     $query = array(
			'post_type' => array('post'),     //al post no featured order by date
			'post_status' => 'publish',
			'orderby' => 'post_date',
			'order' => 'desc',
			'posts_per_page' => 9
	);
    $query['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$allpost = new WP_Query($query);
?>


<section class="section-inner section-news bg-white pt-0 d-flex align-items-center flex-column">
		<div class="container">
			<div class="row equal">
				<?php if ( $allpost->have_posts() ) : ?>
					<?php while($allpost->have_posts()) : $allpost->the_post();?>
						<div class="col-md-6 col-lg-4 pt-md-5 pt-3">
							<?php get_template_part( 'template-parts/content', 'post' );?>
						</div>
					<?php endwhile; ?>
               <?php endif; wp_reset_postdata();?>
					<div class="col-md-12 pt-5 text-center col-pagination"><?php  the_posts_pagination(
								array(
										'prev_text'          => __( '&laquo;', 'wp-bootstrap-starter' ),
										'next_text'          => __( '&raquo;', 'wp-bootstrap-starter' )
								)
						);
						?>
					</div>
			</div>
		</div>
	</section>
<?php $title = get_field('title_section_contact_pages', get_option('page_for_posts'));
$cta = get_field('cta_section_contact_pages', get_option('page_for_posts')); ?>
<?php if( $title || $cta): ?>
	<section class="section-contact-page pt-5 pb-5">
		<div class="container">
			<div class="row row-contact-page m-auto equal align-items-center">
				<?php if( $title ): ?>
					<div class="col-md-6 text-md-right text-center">
						<h2 class="title-contact-page cl-blue-d mb-md-0 mb-4 pb-0"><?php echo $title;?></h2>
					</div>
				<?php endif; ?>
				<?php if($cta) {
					$link_url = $cta['url'];
					$link_title = $cta['title'];
					$link_target = $cta['target'] ? $cta['target'] : '_self';?>
					<div class="col-md">
						<a class="cta-link d-flex align-items-center justify-content-center text-decoration-none-h bg-orange cl-white cl-white-h bg-blue-d-h text-uppercase" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
							<?php echo $link_title; ?>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<?php
get_footer();
