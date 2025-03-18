<?php
$wp_title = get_sub_field('title');
$wp_show_all = get_sub_field('show_all');

if ( $wp_show_all ) :
    $args = array(
        'post_type'   => 'white-papers',
        'post_status' => 'publish'
    );
    
    $white_papers = new WP_Query( $args );
    if( $white_papers->have_posts() ) :
    ?>
    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns relative">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-three-casestudies">
                        <div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
                            <?php while( $white_papers->have_posts() ) : $white_papers->the_post(); ?>
                            <div class="item">
                                <a class="full-link" href="<?php the_permalink(); ?>"></a>
                                <div class="card">
                                    <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                    <div class="card-body">
                                        <p class="card-text cl-black font-adrianna"><?php the_title(); ?></p>
                                        <a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>GET WHITE PAPER</a>
                                    </div>
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
    <?php endif;
else :
	$wp_selected = get_sub_field('selected_white_papers');
	if( ! empty($wp_selected) ) :
    ?>
        <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns relative">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12">
                        <div class="carousel-three-casestudies">
                            <div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
								<?php foreach ($wp_selected as $case_study) : ?>
                                    <div class="item">
                                        <a class="full-link" href="<?php the_permalink(); ?>"></a>
                                        <div class="card">
                                            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url( $case_study->ID ); ?>" alt="<?php echo $case_study->post_title ?>">
                                            <div class="card-body">
                                                <p class="card-text cl-black font-adrianna"><?php echo $case_study->post_title ?></p>
                                                <a href="<?php get_the_permalink( $case_study->ID ); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>GET WHITE PAPER</a>
                                            </div>
                                        </div>
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
