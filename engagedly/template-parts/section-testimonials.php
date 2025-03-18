<?php
$args = array(
	'post_type'         => 'testimonials',
	'post_status'       => 'publish',
    'posts_per_page'    =>  3,
);

$testimonials = new WP_Query( $args );
if( $testimonials->have_posts() ) :
	$testimonial_title = get_sub_field('title');
	$testimonial_content = get_sub_field('content');
	$testimonial_button_text = get_sub_field('button_text');
	$testimonial_button_link = get_sub_field('button_link');
	$testimonial_for_banner = get_sub_field('for_banner');
	$testimonial_overlay = get_sub_field('overlay');
	$testimonial_background = get_sub_field('background');
	$testimonial_columns = get_sub_field('columns');
	$testimonial_full_width = get_sub_field('full_width');
	?>
	<section id="testimonials-two-columns" class="testimonials-area relative d-flex align-items-center justify-content-center z-index-2 position-relative">
		<?php if ($testimonial_overlay): ?>
            <div class="overlay overlay-bg"></div>
        <?php endif; ?>
		<div class="container">
			<div class="row flex-md-row-reverse align-items-center justify-content-center">
                <?php if ($testimonial_for_banner): ?>
                    <div class="col-md-12">
                        <div class="carousel-onecol-testimonials of-clients w-shadow">
                            <div class="open-qote cl-orange-2">&ldquo;</div>
                            <div class="owl-carousel owl-theme owl-onecol-testimonials-clients">
                                <?php while( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
                                    <div class="item row row-testimonials align-items-center justify-content-center">
                                        <div class="col col-9">
                                            <p>“<?php echo wp_trim_words( get_the_excerpt(), 20, ' [...]'); ?>”</p>
                                            <h6 class="name-testimonials cl-gray"><?php echo get_field( "testimonial_name" ); ?></h6>
                                        </div>
                                        <div class="col col-3">
                                            <img class="rounded-50 mx-auto d-block img-testimonials" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-md-12 col-lg-6">
                        <div class="carousel-onecol-testimonials">
                            <div class="open-qote cl-orange-2">&ldquo;</div>
                            <div class="owl-carousel owl-theme owl-onecol-testimonials">
                                <?php while( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
                                    <div class="item row row-testimonials align-items-center justify-content-center">
                                        <div class="col col-9">
                                            <p>“<?php echo wp_trim_words( get_the_excerpt(), 20, ' [...]'); ?>”</p>
                                            <h6 class="name-testimonials cl-gray"><?php echo get_field( "testimonial_name" ); ?></h6>
                                        </div>
                                        <div class="col col-3">
                                            <img class="rounded-50 mx-auto d-block img-testimonials" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <h2 class="title-section cl-white font-adrianna pb-2"><?php echo wp_kses_post( $testimonial_title ); ?></h2>
                        <div class="copy-text font-adrianna cl-ligth-white"><?php echo wp_kses_post( $testimonial_content ); ?></div>
                        <?php if ($testimonial_button_text != '') : ?>
                            <a href="<?php echo wp_kses_post( $testimonial_button_link ); ?>" class="btn btn-white text-uppercase"><?php echo wp_kses_post( $testimonial_button_text ); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<style>
    <?php if (!$testimonial_for_banner): ?>
	#testimonials-two-columns{
		background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/happy-colleagues-sitting-in-office-coworking-PHYA6TG@2x.png) top center;
	}
    <?php endif; ?>
</style>