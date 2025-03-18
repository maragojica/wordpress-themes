<?php
$args = array(
    'post_type'         => 'testimonials',
    'post_status'       => 'publish',
    'posts_per_page'    =>  4,
);

$testimonials = new WP_Query( $args );
?>

<div class="carousel-onecol-testimonials of-clients w-shadow">
    <div class="open-qote cl-orange-2">&ldquo;</div>
    <div class="owl-carousel owl-theme owl-onecol-testimonials-clients">
        <?php while( $testimonials->have_posts() ) : $testimonials->the_post(); ?>
            <div class="item row row-testimonials align-items-center justify-content-center">
                <div class="col-12 col-sm-9">
                    <p>“<?php echo wp_trim_words( get_the_excerpt(), 20, ' [...]'); ?>”<p>
                    <h6 class="name-testimonials cl-gray"><?php echo get_the_title(); ?></h6>
                </div>
                <div class="col-12 col-sm-3">
                    <img class="rounded-50 mx-auto d-block img-testimonials" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </div>
        </div>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>

<style>
    .box-stars-testimonials {
        min-height: 34px;
    }
</style>
