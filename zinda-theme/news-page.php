<?php

/*
Template Name: New Press Template
*/

remove_action('genesis_loop', 'genesis_do_loop', 10);
add_action('genesis_loop', 'custom_content', 10);

function custom_content()
{
    global $post;

    ?>
    <div class="press">
        <p>At Zinda Law Group, we are proud of our reputation and results. Here are some of the firm’s recent highlights in the news.</p>
        <?php
        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
        $args = array(
            'post_type' => 'release',
            'posts_per_page' => 12,
            'orderby' => 'ASC',
            'paged' => $paged,
        );

        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <article
                    class="post type-post status-publish format-standard category-attorneys category-injury-lawyers entry">
                <header class="entry-header"><h2 class="entry-title"><a class="entry-title-link"
                                                                        href="<?= the_permalink() ?>"><?= the_title() ?></a>
                    </h2>
                    <p class="entry-meta">
                        <span>Austin American-Stateman News</span>
                        <time class="entry-time"><?php the_date(); ?></time>
                    </p>
                </header>
            </article>
        <?php endwhile; ?>
        <div class="col-lg-12 col-md-12 col-12">
            <?php
            global $wp_query;
            $wp_query = new WP_Query($args);

            if (have_posts()) :
                do_action('genesis_after_endwhile');
            endif;

            wp_reset_query();
            ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>
    <div>
        <img class="wp-image-28266" src="/wp-content/uploads/2022/04/Media-Logos.png" alt="zinda law group media logos">
    </div>
    <div class="press">
        <h2>In The News</h2>
        <?php
        $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
        $args = array(
            'post_type' => 'news',
            'posts_per_page' => 12,
            'orderby' => 'ASC',
            'paged' => $paged,
        );

        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();
            ?>
            <article
                    class="post type-post status-publish format-standard category-attorneys category-injury-lawyers entry">
                <header class="entry-header"><h2 class="entry-title"><a class="entry-title-link"
                                                                        href="<?= the_permalink() ?>"><?= the_title() ?></a>
                    </h2>
                    <p class="entry-meta category-news">
                        <span>Press Release</span>
                        <time class="entry-time"><?php the_date(); ?></time>
                    </p>
                </header>
            </article>
        <?php endwhile; ?>
        <div class="col-lg-12 col-md-12 col-12">
            <?php
            global $wp_query;
            $wp_query = new WP_Query($args);

            if (have_posts()) :
                do_action('genesis_after_endwhile');
            endif;

            wp_reset_query();
            ?>
        </div>
        <?php wp_reset_postdata(); ?>
    </div>
    <?php
}

genesis();