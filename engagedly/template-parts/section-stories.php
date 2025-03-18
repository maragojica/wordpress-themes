<?php
$stories_show_all = get_sub_field('show_all');

$stories_title = get_sub_field('title');

if ( $stories_show_all ) :

    $args = array(
        'post_type'   => 'stories',
        'post_status' => 'publish'
    );

    $stories = new WP_Query( $args );
    ?>
    <?php if ($stories->have_posts()): ?>
    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns stories-slider relative">
        <div class="container">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/shapes/our-mission-stars.png" class="bg-elipse width-15 right5 bottom2 z-index-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 col-title-case-studie">
                    <h2 class="title-offer font-adrianna cl-gray text-uppercase text-center pb-4 pt-100 pt-tb-0"><?php echo $stories_title; ?></h2>
                </div>
                <div class="col-md-12">
                    <div class="carousel-three-casestudies">
                        <div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
                            <?php while ( $stories->have_posts() ) :$stories->the_post(); ?>
                            <div class="item">
                                <a class="full-link" href="<?php the_permalink(); ?>"></a>
                                <div class="card">
                                    <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title font-adrianna cl-blue"><?php the_title(); ?></h5>
                                        <div class="card-text cl-black font-adrianna"><?php echo wp_trim_words( get_the_excerpt(), 13, '[...]' ); ; ?></div>
                                        <a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ CASE STUDY</a>
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
	$stories_selected = get_sub_field('selected_stories');
	if( ! empty($stories_selected) ) : ?>
        <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-12 col-title-case-studie">
                        <h2 class="title-offer font-adrianna cl-gray text-uppercase text-center pb-4 pt-100 pt-tb-0"><?php echo $stories_title; ?></h2>
                    </div>
                    <div class="col-md-12">
                        <div class="carousel-three-casestudies">
                            <div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
								<?php foreach ($stories_selected as $story) : ?>
                                    <div class="item">
                                        <a class="full-link" href="<?php the_permalink(); ?>"></a>
                                        <div class="card">
                                            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url($story->ID); ?>" alt="<?php echo $story->post_title; ?>">
                                            <div class="card-body">
                                                <h5 class="card-title font-adrianna cl-blue"><?php echo $story->post_title; ?></h5>
                                                <div class="card-text cl-black font-adrianna"><?php get_the_excerpt($story->ID); ?></div>
                                                <a href="<?php get_the_permalink($story->ID); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ CASE STUDY</a>
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
