<?php
$integrations_show_left_menu = get_sub_field('show_left_menu');
$integrations_integration_group = get_sub_field('integration_group');
?>

<section class="empty-banner relative">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-55 right-15 top-40 z-index-0">
</section>
<section class="single-content single simple-sidebar content-wide relative d-flex align-items-center justify-content-center mb-5 pb-5 mb-mv-0 pb-mv-0">
    <div class="container">

        <div class="row align-items-start justify-content-center">

            <?php if ($integrations_show_left_menu) : ?>
            <div class="col-md-4 col-lg-3">
                <!--left sidebar area-->
                <?php get_template_part( 'template-parts/content', 'sidebar_menu'); ?>
                <!--end left sidebar area-->
            </div>
            <?php endif; ?>

            <div class="col-md col-lg">
                <?php if ( ! empty($integrations_integration_group) ): ?>
                <?php foreach ($integrations_integration_group as $integration_group): ?>
                <div class="box-three-products">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-12">
                            <h2 class="title-section cl-gray font-adrianna pb-4"><?php echo $integration_group['title']; ?></h2>
                        </div>
                    </div>

                    <div id="content-integration1" class="tabcontent">
                        <div class="row align-items-center justify-content-start">
                            <?php
                            if ( $integration_group['show_all'] ) :

                                $args = array(
                                    'post_type'   => 'integrations',
                                    'post_status' => 'publish'
                                );

                                $integrations = new WP_Query( $args );

                                if ( $integrations->have_posts() ): ?>
                                    <?php while ($integrations->have_posts()) : $integrations->the_post(); ?>
                                        <div class="col-md-6 col-lg-4 pb-4">
                                            <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                                <div class="copy-text font-adrianna cl-gray-ligth">
                                                    <p><?php the_title(); ?></p>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                <?php endif; ?>
                            <?php
                            else:
	                            if (!empty($integration_group['selected_integrations'])):
		                            foreach ($integration_group['selected_integrations'] as $integration): ?>
                                        <div class="col-md-6 col-lg-4 pb-4">
                                            <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                                <div class="copy-text font-adrianna cl-gray-ligth">
                                                    <p><?php echo $integration->post_title; ?></p>
                                                </div>
                                                <a href="<?php echo get_permalink($integration->ID); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                            </div>
                                        </div>
		                            <?php endforeach;
	                            endif;
                            ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>
