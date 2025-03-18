<?php get_header(); ?>

<section class="empty-banner relative">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-55 right-15 top-35 z-index-0">
</section>

<section class="single-content single simple-sidebar content-wide relative d-flex align-items-center justify-content-center mb-5 pb-5 pt-4 mb-mv-0 pb-mv-0">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse width-30 right-15 bottom-15 z-index-0">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/elipse-main.svg" class="bg-elipse bg-tablet-none width-35 left-20 top10-percent z-index-0">
    <div class="container">
        <div class="row align-items-start justify-content-center">
            <div class="col-md-4 col-lg-3">
                <!--left sidebar area-->
                <?php //get_template_part( 'template-parts/content', 'sidebar_menu'); ?>
                <div id="side-list-menu" class="card-list-accordeon side-menu fadeInLeft bg-gray mb-5">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span uk-icon="close"></span></a>
                    <div class="nav nav-tabs" id="nav-tab-1" role="tablist">
			            <?php if ( has_nav_menu( 'documentation' ) ) : ?>
				            <?php
				            wp_nav_menu(
					            array(
						            'theme_location' => 'documentation',
					            )
				            );
				            ?>
			            <?php else : ?>
				            <?php dynamic_sidebar( 'sidebar-2' ); ?>
			            <?php endif; ?>
                    </div>
                </div>
                <div class="open-list-menu d-flex align-items-center justify-content-center" onclick="openNav()"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                <!--end left sidebar area-->
            </div>

            <div class="col-md col-lg">
                <div class="box-three-products">
                    <div id="content-integration1" class="tabcontent">
                        <?php if (have_posts()): the_post(); ?>
                        <div class="row row-title align-items-center justify-content-center">
                            <div class="col-md-12">
                                <h2 class="title-section cl-gray font-adrianna text-left mb-2 pb-0"><?php the_title(); ?></h2>
                                <?php
                                $subtitle = get_field('subtitle');
                                if (!empty($subtitle)) :
                                ?>
                                <div class="box-breadcrumbs font-adrianna"><p><?php echo $subtitle; ?></p></div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="row align-items-center justify-content-start pb-4">
                            <div class="col-md-12">
                                <div class="copy-text font-adrianna cl-gray-ligth"><?php the_content(); ?></div>
                            </div>
                        </div>

                        <?php
                            if (get_field('show_all')):

                                $args = array(
                                    'post_type'         =>  'documentations',
                                    'post_status'       =>  'publish',
                                    'posts_per_page'    =>  6,
                                    'post__not_in'      =>  array(get_the_ID()),
                                );

                                $posts = new WP_Query( $args );

                                if ($posts->have_posts()): ?>
                                <div class="row align-items-center justify-content-start pb-4">
                                    <div class="col-md-12">
                                        <h3 class="sub-title-section-side cl-gray font-adrianna text-left pb-4 text-uppercase">Related Topics</h3>
                                    </div>

                                    <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                                        <div class="col-md-6 col-lg-4 pb-4">
                                            <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                                <div class="copy-text font-adrianna cl-gray-ligth">
                                                    <p><?php echo wp_trim_words(get_the_title(), 13, ' [...]'); ?></p>
                                                </div>
                                                <a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                            </div>
                                        </div>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </div>

                                <?php endif; ?>

                            <?php else: ?>
                                <?php $selected_posts = get_field('selected_posts');
                                if( $selected_posts ): ?>
                            <div class="row align-items-center justify-content-start pb-4">
                                <div class="col-md-12">
                                    <h3 class="sub-title-section-side cl-gray font-adrianna text-left pb-4 text-uppercase">Related Topics</h3>
                                </div>

                                <?php foreach ($selected_posts as $post): ?>
                                    <div class="col-md-6 col-lg-4 pb-4">
                                        <div class="bg-ligth-gray-2 m-auto card-featured text-center d-flex align-items-center justify-content-center flex-column">
                                            <div class="copy-text font-adrianna cl-gray-ligth">
                                                <p><?php echo wp_trim_words($post->post_title, 13, ' [...]'); ?></p>
                                            </div>
                                            <a href="<?php echo get_the_permalink( $post->ID ); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>LEARN MORE</a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                                <?php endif; ?>
                            <?php endif; ?>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
