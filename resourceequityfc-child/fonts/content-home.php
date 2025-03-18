<?php
/**
 * Displays the content when the home template is used.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>

<?php
$image = get_field('image_main');
$addpromo = get_field('add_promo_home');
if( !empty($image) ): ?>
	<div class="section-main-hero main-hero-home banner-shadow position-relative">
		<img class="banner-main-img w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php $image = get_field('image_mv');
		if( !empty($image) ): ?>
			<img class="banner-img-mv w-100" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?>
		<?php if( $addpromo ): ?>
		<?php if( have_rows('promo_banner_home') ): ?>
			<?php while( have_rows('promo_banner_home') ): the_row();
			// Get sub field values.
				$bgcolorpromo = get_sub_field('bg_color_promo_home');
				$icon = get_sub_field('icon_promo_home');
				$title = get_sub_field('title_promo_home');
				$subtitle = get_sub_field('subtitle_promo_home');
				$text = get_sub_field('text_promo_home');
				$cta = get_sub_field('cta_promo_home');
			?>
				<div class="overlay-promo-home overlay-bg-promo d-flex justify-content-center align-items-center">
					<div class="container">
						<div class="col-md-12">
							<?php if( !empty($icon) ): ?>
								<img class="banner-promo-icon m-auto d-block pb-4" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
							<?php endif; ?>
							<?php if( $subtitle ): ?>
									<h3 class="subtitle-promo cl-gold text-center"><?php echo $subtitle;?></h3>
							<?php endif; ?>
							<?php if( $title ): ?>
								<h1 class="headline-banner cl-white text-center mb-xl-3 mb-md-1 mb-4"><?php echo $title;?></h1>
							<?php endif; ?>
							<?php if( $text ): ?>
							<div class="copy-text-lg text-center cl-white pb-xl-3 pb-1">
								<?php echo $text;?>
							</div>
							<?php endif; ?>
							<?php  if($cta) {
								$link_url = $cta['url'];
								$link_title = $cta['title'];
								$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
								<div class="mt-xl-4 mt-2 text-center pb-3 box-cta-link">
									<a class="cta-link-inverse cta-sm cl-white cl-white-h bg-white-h cl-blue-3-h border-white nounder-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" uk-toggle><?php echo $link_title; ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
					<?php if( $bgcolorpromo ):  ?>
						<style type="text/css">
							.overlay-bg-promo {
								background-color: <?php the_sub_field('bg_color_promo_home'); ?> !important;
							}
						</style>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
<div class="section-finder d-flex align-items-center" id="section-finder">
	<div class="container">
		<?php
		$titlefind = get_field('title_finder_home');
		if( $titlefind ): ?>
		<div class="row justify-content-center">
			<div class="col-lg-9 pb-4 pt-4">
				<p class="text-title-finder cl-black text-center"><?php echo $titlefind;?></p>
			</div>
            <div class="col-lg-12">
                <form id="solution-finder" action="<?php echo esc_url( home_url( '/solutions-results' )); ?>" method="post">
                    <div class="form-row flex-column flex-md-row justify-content-center">
                        <div class="col-auto pr-2 pl-2 mb-md-0 mb-4">
                            <select class="custom-select" id="role-solution" name="role-solution">
                                <option selected>I am...</option>
                                <option value="1">Executive</option>
                                <option value="2">IT</option>
                                <option value="3">Operations</option>
                                <option value="4">Partner / Potential Partner</option>
                                <option value="5">Job Candidate</option>
                                <option value="6">Other</option>
                            </select>
                        </div>
                        <div class="col-auto pr-2 pl-2 mb-md-0 mb-4">
                            <select class="custom-select" id="industry-solution" name="industry-solution">
                                <option selected>I work in...</option>
                                <option value="1">Aerospace and defense</option>
                                <option value="2">Medical Device Industry</option>
                                <option value="3">Ship Building Industry</option>
                                <option value="4">Government</option>
                                <option value="5">Other Industry</option>
                            </select>
                        </div>
                        <div class="col-auto pr-2 pl-2 mb-md-0">
                            <select class="custom-select" id="customer-solution" name="customer-solution">
                                <option selected>I am looking for...</option>
                                <option value="1">Customer challenge #1</option>
                                <option value="2">Customer challenge #2</option>
                                <option value="3">Customer challenge #3</option>
                                <option value="4">Customer challenge #4</option>
                                <option value="5">Customer challenge #5</option>
                                <option value="6">Customer challenge #6</option>
                            </select>
                        </div>
                        <div class="col-auto col-submit">
                            <button type="submit" class="btn btn-send-solution bg-gold cl-gold-h bg-black-h nounder-h ml-2" id="btn-send-solution">FIND MY SOLUTION</button>
                        </div>
                    </div>
                </form>
            </div>
		</div>
		<?php endif; ?>
		<?php
		/*$cta = get_field('cta_finder_home');
		if($cta) {
			$link_url = $cta['url'];
			$link_title = $cta['title'];
			$link_target = $cta['target'] ? $cta['target'] : '_self';*/ ?>
        <!--<<div class="row justify-content-center">
			<div class="col-md-9 pb-4 pt-2">
			div class="text-center box-cta-link">
				<a class="cta-link cta-sm cl-black bg-gold cl-gold-h bg-black-h nounder-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" uk-toggle><?php echo $link_title; ?></a>
			</div>
			</div>

		</div>-->
		<?php /*} */?>
	</div>
</div>
<?php
$query = array(
		'post_type' => 'solutions',
		'post_status' => 'publish',
		'orderby' => 'menu_order',
		'order' => 'desc',
		'posts_per_page' => 3
);
$solutions = new WP_Query($query);?>
<?php if ( $solutions->have_posts() ) : ?>
<div class="section-solutions">
	<div class="container">
		<h2 class="title-section pb-3 cl-dark text-center">The iBASEt Digital Operations Suite</h2>
		<div class="row equal">
		<?php while($solutions->have_posts()) : $solutions->the_post();?>
			<div class="col-md-4 col-sol">
				<a href="<?php the_permalink(); ?>">
					<div class="box-solution h-100 w-100">
						<div class="inner-box-solution h-100 w-100">
							<?php if( get_field('subtitle_sol') ): ?>
								<h3 class="title-sol"><?php echo the_field('subtitle_sol');?></h3>
							<?php endif; ?>
							<h6 class="subtitle-sol"><?php the_title();?></h6>
							<?php if( get_field('short_description_sol') ): ?>
							<p><?php echo the_field('short_description_sol');?></p>
							<?php endif; ?>
						</div>
					</div>
				</a>
			</div>
		<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; wp_reset_postdata();?>
<?php
$query = array(
		'post_type' => 'industries',
		'post_status' => 'publish',
		'orderby' => 'menu_order',
		'order' => 'desc',
		'posts_per_page' => -1
);
$industries = new WP_Query($query);?>
<?php if ( $industries->have_posts() ) : ?>
<div class="section-industry">
	<div class="container-fluid pr-0 pl-0">
		<h2 class="title-section pb-3 cl-dark text-center">Our Industries</h2>
		<div class="row mr-0 ml-0 equal">
			<?php while($industries->have_posts()) : $industries->the_post();?>
					<div class="col-6 col-md-4 col-lg-3 pr-0 pl-0">
						<div class="ih-item item-industry square effect6 from_top_and_bottom">
							<a href="<?php the_permalink(); ?>">
								<?php if ( has_post_thumbnail() ) {
									$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
									$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
									$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
									<div class="img"><img src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>"></div>
								<?php } ?>
								<div class="info d-flex justify-content-center align-items-center">
									<h3><?php the_title();?></h3>
								</div>
							</a>
						</div>
					</div>
			<?php endwhile; ?>
			<div class="col-12 col-lg-3 pr-0 pl-0">
				<div class="ih-item item-industry item-industry-contact square effect6 from_top_and_bottom">
					<a href="/contact">
						<div class="img d-flex justify-content-center align-items-center">
							<h3>Don’t see your industry?
								Contact us for more.</h3>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; wp_reset_postdata();?>
<?php if( have_rows('banner_innovation') ): ?>
	<?php while( have_rows('banner_innovation') ): the_row();
// Get sub field values.
		$title = get_sub_field('title_inn');
		$subtitle = get_sub_field('subtitle_inn');
		$text = get_sub_field('text_inn');
		$img = get_sub_field('image_inn');
		$imgmv = get_sub_field('image_mv_inn');
		$cta = get_sub_field('cta_inn');
		?>
		<div class="section-innovation bg-blue-3 position-relative">
			<img class="banner-md-img w-100" src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>" />
			<div class="overlay d-flex justify-content-center align-items-center">
				<div class="container">
					<div class="row justify-content-end">
						<div class="col-lg-5 col-xl-4">
							<h2 class="title-section cl-white"><?php echo $title;?></h2>
							<?php if( !empty($imgmv) ): ?>
								<img class="banner-img-sm w-100" src="<?php echo esc_url($imgmv['url']); ?>" alt="<?php echo esc_attr($imgmv['alt']); ?>" />
							<?php endif; ?>
							<h3 class="subtitle-section pb-2 cl-white"><?php echo $subtitle;?></h3>
							<div class="copy-text-lg cl-white pb-2">
								<?php echo $text;?>
							</div>
							<?php  if($cta) {
								$link_url = $cta['url'];
								$link_title = $cta['title'];
								$link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
								<div class="mt-4 pb-3 text-center text-lg-left">
									<a class="cta-link-inverse cl-white cl-white-h bg-white-h cl-blue-3-h border-white nounder-h" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php echo $link_title; ?></a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
<?php
$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'orderby'=>'post_date',
		'order'=>'desc'
);
$wp_query = new WP_Query($args); ?>
<div class="section-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12"><h2 class="title-section pb-4 cl-dark text-center">In The News<span class="link-view-all"><a href="#" class="cl-gold-h">View All</a></span></h2></div>
		</div>
		<div class="row">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post();
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				$id = get_the_ID();
				$post_categories = get_post_primary_category($id, 'category');
				$primary_category = $post_categories['primary_category'];
				$nameprimary = $primary_category->name;
				$slugprimary = $primary_category->slug;?>
				<div class="col-md-4 mb-5">
					<div class="box-post-img">
						<a href="<?php the_permalink(); ?>">
							<img src="<?php echo $featured_img_url;?>" alt="<?php the_title();?>">
						</a>
					</div>
					<a class="cat-post" href="/category/<?php echo $slugprimary;?>"><?php echo $nameprimary;?></a>
					<h3 class="title-item-post"><a href="<?php the_permalink(); ?>"><?php echo get_small_title(70,0);?></a></h3>
					<div class="copy-text cl-black pt-3 pb-3">
						<?php echo strip_tags(get_the_excerpt()); ?>
					</div>
					<div class="post-date cl-black"><?php the_time('d') ?> <?php the_time('F') ?>, <?php the_time('Y') ?></div>
				</div>
			<?php endwhile;  wp_reset_query(); ?>
		</div>
	</div>
</div>
