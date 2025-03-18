<?php
$sponsors_show_all = get_sub_field('show_all');

if ( $sponsors_show_all ) :
    $args = array(
        'post_type'   => 'sponsors',
        'post_status' => 'publish'
    );

    $sponsors = new WP_Query( $args );
    if( $sponsors->have_posts() ) :
        ?>
        <section id="slider-sponsor">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="carousel-sponsor">
                            <div class="owl-carousel owl-theme owl-fourcol-sponsor">
                                <?php while( $sponsors->have_posts() ) : $sponsors->the_post(); ?>
                                    <div class="item">
                                        <img alt="<?php the_title() ?>" src="<?php the_post_thumbnail_url(); ?>" />
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
    <?php endif;

else :

    $sponsors_selected = get_sub_field('selected_sponsors');
    if( ! empty($sponsors_selected) ) :
    ?>
    <section id="slider-sponsor">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-sponsor">
                        <div class="owl-carousel owl-theme owl-fourcol-sponsor">
                        <?php foreach ($sponsors_selected as $sponsor) : ?>
                            <div class="item">
                                <img alt="<?php echo $sponsor->post_title ?>" src="<?php echo get_the_post_thumbnail_url( $sponsor->ID ); ?>" />
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
<?php endif; ?>
