<?php

/*
 Template Name: Attorney Profile Single
*/

remove_action('genesis_loop', 'genesis_do_loop', 10);
add_action('genesis_loop', 'custom_content', 10);
add_action('genesis_after_header', 'custom_attr_hero');
function custom_attr_hero()
{
    $headshot_url = get_field('headshot');
    $review_text = get_field('attorney_reviews_0_review_text');
    $short_review_text = wp_trim_words($review_text, 30, '...');
    ?>
    <section class="attr-hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 header-image">
                    <img class="img-fluid" src="<?php echo esc_url($headshot_url); ?>" alt="Podcast">
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 d-flex align-items-center">
                    <div class="description">
                        <?= $review_text ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <?php
}

function custom_content()
{ ?>

    <section id="content">
        <div class="content-left">
            <div class="post-content post-content-attorneys">
                <div class="box-info-attorney">
                    <div class="info-attorney">
                        <h1><?php the_title(); ?></h1>
                        <div class="line-attorney"></div>
                        <?php if (get_field('position_attorney')): ?>
                            <h2><?php echo get_field('position_attorney'); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>

                <?php while (have_posts()) : the_post();
                    the_content(); endwhile; ?>
                    <div id="attorney-sidebar">
                        <?php if (have_rows('sidebar_badges')): ?>
                            <div id="sidebar-badges">
                                <div class="badge">
                                    <img src="https://www.zdfirm.com/wp-content/uploads/2019/07/10-best-badge@2x.png" alt="10 Best">
                                </div>
                                <?php while (have_rows('sidebar_badges')): the_row(); ?>
                                    <div class="badge">
                                        <?php 
                                        $badge_html = get_sub_field('badge_html');
                                        $badge_link = get_sub_field('badge_link');
                                        if ($badge_link): ?>
                                            <a href="<?php echo esc_url($badge_link); ?>">
                                                <img src="<?php echo esc_url($badge_html); ?>" alt="Associations and awards">
                                            </a>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($badge_html); ?>" alt="Associations and awards">
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php if (have_rows('accordeon_attorney')): ?>
                    <div class="accordeon-info-box">
                        <?php while (have_rows('accordeon_attorney')): the_row();
                            $title = get_sub_field('accordeon_title_attorney');
                            $text = get_sub_field('accordeon_text_attorney'); ?>
                            <details class="list-accordeon">
                                <?php if ($title): ?>
                                    <summary>
                                        <?php echo $title; ?>
                                    </summary>
                                <?php endif; ?>
                                <?php if ($text): ?>
                                    <div class="uk-accordion-content">
                                        <?php echo $text; ?>
                                    </div>
                                <?php endif; ?>
                            </details>
                        <?php endwhile; ?>
                        <?php if (have_rows('attorney_reviews')): ?>
                            <details class="list-accordeon">
                                <summary>
                                    <?php if (is_custom_locations('/es/')) { ?>
                                        Testimonios de Clientes
                                    <?php } else { ?>
                                        Client Testimonials
                                    <?php } ?>
                                </summary>
                                <div class="uk-accordion-content">
                                    <?php while (have_rows('attorney_reviews')): the_row(); ?>
                                        <div class="box-review">
                                            <p>
                                                <span class="testimonailheader"><?php echo get_sub_field('review_headline'); ?></span>
                                            </p>
                                            <div class="review-test"><p><?php echo get_sub_field('review_text'); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </details>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php
}

genesis();


