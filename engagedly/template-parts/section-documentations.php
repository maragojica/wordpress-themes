<?php
global $post;
$post_slug = $post->post_name;

$documentations_show_left_menu = get_sub_field('show_left_menu');
$documentations_title = get_sub_field('title');
$documentations_show_all = get_sub_field('show_all');
?>

<section class="<?php echo $post_slug; ?> single-content single simple-sidebar content-wide relative d-flex align-items-center justify-content-center mb-5 pb-5 pt-4 mt-5 mb-mv-0 pb-mv-0">
    <div class="container">

        <div class="row align-items-start justify-content-center">

            <div class="col-md-4 col-lg-3">
            <?php if ($documentations_show_left_menu) : ?>
                <!--left sidebar area-->
                <?php get_template_part( 'template-parts/content', 'sidebar_menu'); ?>
                <!--end left sidebar area-->

            <?php endif; ?>
            </div>

            <div class="col-md col-lg">
                <div class="box-three-products">

                    <div id="content-integration1" class="tabcontent">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-12">
                                <h3 class="sub-title-section-side cl-gray font-adrianna pb-4 text-uppercase"><?php echo $documentations_title; ?></h3>
                            </div>
                        </div>

                        <div class="row align-items-center justify-content-start">

                            <?php
                            if ( $documentations_show_all ) :

                                $args = array(
                                    'post_type'   => 'documentations',
                                    'post_status' => 'publish'
                                );

                                $documentations = new WP_Query( $args );

                                if ( $documentations->have_posts() ): ?>
                                    <?php while ($documentations->have_posts()) : $documentations->the_post(); ?>
                                        <div class="col-md-6 col-lg-4 pb-4">
                                            <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                                <div class="copy-text font-adrianna cl-gray-ligth">
                                                    <p><?php echo wp_trim_words(get_the_title(), 13, ' [...]'); ?></p>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                <?php endif;

                            else:
                                $documentations_selected = get_sub_field('selected_documentations');
                                if (!empty($documentations_selected)):
                                    foreach ($documentations_selected as $documentation):?>
                                        <div class="col-md-6 col-lg-4 pb-4">
                                            <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                                <div class="copy-text font-adrianna cl-gray-ligth">
                                                    <p><?php echo wp_trim_words($documentation->post_title, 13, ' [...]'); ?></p>
                                                </div>
                                                <a href="<?php echo get_permalink($documentation->ID); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>