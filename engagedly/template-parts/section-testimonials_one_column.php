<?php
$args = array(
    'post_type'         => 'testimonials',
    'post_status'       => 'publish',
    'posts_per_page'    =>  4,
);

$testimonials = new WP_Query( $args );

$testimonial_overlay = get_sub_field('overlay');
$testimonial_background = get_sub_field('background');
?>

<section id="full-container-banner" class="banner-info info-testi-clients mt-5 pt-5 pb-5 relative d-flex align-items-center justify-content-center">
    <?php if ($testimonial_overlay): ?>
        <div class="overlay overlay-bg"></div>
    <?php endif; ?>
    <div class="container-fluid pr-0 pl-0">
        <div class="row align-items-center justify-content-center mr-0 ml-0">
            <div class="col-md-12 pl-0 pr-0">
                <div class="carousel-onecol-testimonials of-clients">
                    <div class="owl-carousel owl-theme owl-three-testimonials-clients">
                        <?php while( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
                        <div class="item row row-testimonials align-items-center justify-content-center">
                            <div class="col-8 col-sm-9 pr-0">
                                <h6 class="position-testimonials cl-ligth-gray-2"><?php echo get_the_title(); ?></h6>
                                <div class="box-stars-testimonials pb-2">
                                    <?php for ($i = 0; $i < get_field('testimonial_rating'); $i++): ?>
                                        <i class="fa fa-star cl-orange-2" aria-hidden="true"></i>
                                    <?php endfor; ?>
                                </div>
                                <p>“<?php echo wp_trim_words( get_the_excerpt(), 20, ' [...]'); ?>”<p>
                                <h6 class="name-testimonials cl-gray text-left"><?php echo get_field( "testimonial_name" ); ?></h6>
                            </div>
                            <div class="col-4 col-sm-3">
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
        </div>
    </div>
</section>
<style>
    .banner-info{
        background: url(<?php echo $testimonial_background['url']; ?>) top center;
    }
    .box-stars-testimonials {
        min-height: 34px;
    }
</style>
