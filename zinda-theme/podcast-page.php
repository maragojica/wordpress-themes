<?php

/*
    Template Name: Podcast Template
*/

remove_action('genesis_loop', 'genesis_do_loop', 10);
add_action('genesis_loop', 'custom_content', 10);
//add_filter('genesis_pre_get_option_site_layout', '__genesis_return_full_width_content');
add_action('genesis_after_header', 'custom_attr_hero');
function custom_attr_hero()
{
    ?>
    <section class="podcast-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 header-image">
                    <div class="img-wrapper">
                        <img class="img-fluid" width="500px" height="500px" src="<?php echo get_field('podcast_page_header_image'); ?>"
                             alt="Podcast"/>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="header-content">
                        <img class="img-fluid"
                            width="300px"
                            height="200px"
                             src="<?php echo CHILD_URL ?>/assets/app/img/images/effective_lawyer_logo.png"
                             alt="Effective Lawyer"/>
                        <div class="description">
                            <?php echo get_field('podcast_page_header_text'); ?>
                        </div>
                        <div class="firm">
                            <div class="name">
                                <?php echo get_field('podcast_page_header_author'); ?>
                            </div>
                            <div class="position">
                                <?php echo get_field('podcast_page_header_position'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}

function custom_content()
{ ?>
    <?php

    $args = array(
        'post_type' => 'podcast_episode',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
            ?>

            <section class="podcast-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div class="video">
                                <?php echo get_field('podcast_episode_youtube_embed_code'); ?>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="text-content">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                            <span class="episode-number">Episode <?php echo get_field('podcast_episode_number'); ?></span>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                                            <div class="time">
                                                <img class="img-fluid"
                                                    width="15px" 
                                                    height="16px"
                                                     src="<?php echo CHILD_URL ?>/assets/app/img/images/timer.png"
                                                     alt="Timer"/>
                                                <span class="text"><?php echo get_field('podcast_episode_duration'); ?></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <h1 class="title">
                                    <?php the_title(); ?>
                                </h1>
                                <div class="description">
                                    <?php echo get_the_content(); ?>
                                </div>
                                <a href="<?php echo get_field('podcast_episode_page_url'); ?>" class="episode-link">
                                    <span>Episode page</span>
                                    <img class="img-fluid"
                                        width="31px"
                                        height="16px"
                                         src="<?php echo CHILD_URL ?>/assets/app/img/images/episode_page_arrow.png"
                                         alt="arrow"/>
                                </a>
                                <div class="podcast-player">
                                    <?php echo get_field('podcast_episode_embed_code'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php endwhile;
        wp_reset_postdata(); endif; ?>

    <?php

    $args = array(
        'post_type' => 'podcast_source',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'ASC',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) :
        ?>
        <section class="follow-us">
            <div class="title">
                Follow us on
            </div>
            <div class="services">
                <div class="container">
                    <div class="row">

                        <?php while ($loop->have_posts()) : $loop->the_post(); ?>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center">
                                <a href="<?php echo get_field('podcast_source_url'); ?>" target="__blank"
                                   aria-label="Podcast Source">
                                    <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>"
                                         alt="Podcast Source" width="210px" height="57px"/>
                                </a>
                            </div>

                        <?php endwhile;
                        wp_reset_postdata(); ?>

                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <section class="opinions">
        <div class="container">
            <div class="title">
                What our listeners saying?
            </div>
            <div class="content">
                <div class="comma-up">
                    <img class="img-fluid"
                        width="52px"
                        height="37px"
                         src="<?php echo CHILD_URL ?>/assets/app/img/images/comma-up.png"
                         alt="Comma Up"/>
                </div>
                <div class="description">
                    <?php echo get_field('podcast_page_opinion'); ?>
                </div>
                <div class="comma-down">
                    <img class="img-fluid"
                        width="52px"
                        height="37px"
                         src="<?php echo CHILD_URL ?>/assets/app/img/images/comma-down.png"
                         alt="Comma Down"/>
                </div>
            </div>
        </div>
    </section>

    <?php

    $args = array(
        'post_type' => 'podcast_episode',
        'post_status' => 'publish',
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) :
        ?>

        <section class="last-episodes">
            <div class="container">
                <div class="title">
                    Tune Into Our Latest Episodes
                </div>
                <div class="row">
                    <?php
                    // Set the arguments for the WP_Query
                    $args = array(
                        'post_type' => 'podcast_episode',
                        'posts_per_page' => 6,
                        'paged' => get_query_var('paged') // For pagination
                    );

                    // Create a new instance of WP_Query
                    $podcast_episodes_query = new WP_Query($args);

                    // Check if there are any posts to display
                    if ($podcast_episodes_query->have_posts()) :

                        // Start the loop
                        while ($podcast_episodes_query->have_posts()) : $podcast_episodes_query->the_post();

                            ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                <div class="card">
                                    <div class="video"><?= get_field('podcast_episode_youtube_embed_code') ?></div>
                                    <div class="text-content">
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                                    <span class="episode-number">Episode <?= get_field('podcast_episode_number') ?></span>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                                    <div class="time">
                                                        <img class="img-fluid"
                                                             src="<?php echo CHILD_URL ?>/assets/app/img/images/timer.png"
                                                             alt="Timer"/>
                                                        <span class="text"><?= get_field('podcast_episode_duration') ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="title"><?= the_title() ?></div>
                                        <div class="description"><?= the_content() ?></div>
                                        <a href="<?= get_field('podcast_episode_page_url') ?>" class="episode-link">
                                            <span>Episode page</span>
                                            <img class="img-fluid"
                                                width="26px"
                                                height="13px"
                                                 src="<?php echo CHILD_URL ?>/assets/app/img/images/small-arrow.png" alt="arrow"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;

                        // Display pagination links
                        $pagination = paginate_links(array(
                            'current' => max(1, get_query_var('paged')),
                            'total' => $podcast_episodes_query->max_num_pages,
                            'prev_text' => __('Previous', 'textdomain'),
                            'next_text' => __('Next', 'textdomain'),
                        ));
                        if ($pagination) {
                            echo '<div class="pagination-wrapper">';
                            echo $pagination;
                            echo '</div>';
                        }

                        // Reset the post data
                        wp_reset_postdata();

                    else :

                        // Display a message if there are no posts
                        _e('Sorry, no podcast episodes were found.', 'textdomain');

                    endif;
                    ?>
                </div>
            </div>
        </section>

    <?php endif; ?>

    <section class="form-section">
        <div class="sides">
            <div class="left-side">
                <img class="logo"
                    width="278px"
                    height="122px"
                     src="<?php echo CHILD_URL ?>/assets/app/img/images/podcast-form-logo.png"
                     alt="Podcast form Logo"/>
            </div>
            <div class="right-side">

                <div class="left-side-title">

                    <span>Want to be notified when a new episode is releases?</span>
                    <div class="title">
                        <span class="name">Subscribe to our newsletter below!</span>
                    </div>
                </div>

                <div class="form">
                    <?php echo get_field('podcast_page_hubspot_form'); ?>
                </div>
            </div>
        </div>
        <img class="magazine img-fluid"
            width="250px"
            height="442px"
             src="<?php echo CHILD_URL ?>/assets/app/img/images/iphone.png" alt="Iphone"/>
    </section>

    <section class="disclaimer">
        <div class="title">
            Disclaimer
        </div>
        <div class="content">
            <?php echo get_field('podcast_page_disclaimer_text'); ?>
        </div>
    </section>

    <?php
}

function get_podcast_episodes_data() {
    $args = array(
        'post_type' => 'podcast_episode',
        'posts_per_page' => 6,
        'paged' => get_query_var('paged') // For pagination
    );

    // Create a new instance of WP_Query
    $podcast_episodes_query = new WP_Query($args);
    $total_pages = $podcast_episodes_query->max_num_pages;

    $data = array(
        'paged' => get_query_var('paged'),
        'total_pages' => $total_pages
    );

    return $data;
}

add_filter( 'wpseo_metadesc', function($description) {
    $data = get_podcast_episodes_data();

    if ($data['paged']) {
        return $description.' - Page ' . $data['paged'] . ' of ' . $data['total_pages'];
    }
    return $description;
} );

add_filter( 'wpseo_title', function($title) {
    $data = get_podcast_episodes_data();

    if ($data['paged']) {
        return $title.' - Page ' . $data['paged'] . ' of ' . $data['total_pages'];
    }
    return $title;
} );

genesis();