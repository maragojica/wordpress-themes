<?php
global $post;
$post_slug = $post->post_name;
$show_elipse = ($post_slug == 'case-studies-overview') ? true : false;

$cs_title = get_sub_field('title');
$cs_show_all = get_sub_field('show_all');

if ( $cs_title ) :
    ?>
    <div class="col-md-12 col-title-case-studie">
        <h2 class="title-offer font-adrianna cl-gray text-uppercase text-center pb-4 pt-100 pt-tb-0"><?php echo $cs_title; ?></h2>
    </div>
    <?php
endif;

if ( $cs_show_all ) :
    $args = array(
        'post_type'   => 'case-studies',
        'post_status' => 'publish'
    );

    $case_studies = new WP_Query( $args );
    if( $case_studies->have_posts() ) :
    ?>
        <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns relative z-index-top">
            <?php if ($show_elipse): ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
            <?php endif; ?>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-three-casestudies">
                        <div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
                            <?php while( $case_studies->have_posts() ) : $case_studies->the_post(); ?>
                            <div class="item">
                                <a class="full-link" href="<?php the_permalink(); ?>"></a>
                                <div class="card">
                                    <?php if (get_the_post_thumbnail_url()): ?>
                                        <img class="card-img-top" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                                    <?php else: ?>
                                        <img class="card-img-top" src="<?php bloginfo('template_url'); ?>/assets/img/thumbnail-default.jpg" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
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
    $cs_selected = get_sub_field('selected_case_studies');
    if( ! empty($cs_selected) ) :
    ?>
    <section id="section-blog-three-columns" class="d-flex align-items-center justify-content-center casestudies-slider-three-columns relative">
        <?php if ($show_elipse): ?>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-30 right-10 bottom-10 z-index-0">
        <?php endif; ?>
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="carousel-three-casestudies">
                        <div class="owl-carousel owl-theme owl-casestudies-slider-three-columns">
                            <?php foreach ($cs_selected as $case_study) : ?>
                                <div class="item">
                                    <a class="full-link" href="<?php the_permalink(); ?>"></a>
                                    <div class="card">
                                        <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url( $case_study->ID ); ?>" alt="<?php echo $case_study->post_title ?>">
                                        <div class="card-body">
                                            <h5 class="card-title font-adrianna cl-blue"><?php echo $case_study->post_title ?></h5>
                                            <span class="card-text cl-black font-adrianna"><?php echo get_the_excerpt( $case_study->ID ); ?></span>
                                            <a href="<?php get_the_permalink( $case_study->ID ); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ CASE STUDY</a>
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
