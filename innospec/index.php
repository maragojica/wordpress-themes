<?php
get_header();
?>
    <section class="container">

        <div class="row">
            <div class="col-lg-3">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-lg-9">

                <div class="wrap-content wrap-articles">
                    <?php

                    while ( have_posts() ) : the_post();
                    ?>
                    <article>
                        <div class="row">
                            <div class="col-lg-9">
                                <h2><?php the_title(); ?></h2>
                                <div class="meta">
                                    By: <?php the_author(); ?> | <?php echo get_the_date(); ?>
                                </div>
                                <?php the_excerpt(); ?>
                            </div>
                            <div class="col-lg-3 text-right">
                                <a href="<?php the_permalink(); ?>" class="link-learnmore">Learn more</a>
                            </div>
                        </div>
                    </article>
                    <?php endwhile; wp_reset_postdata(); ?>

                </div>

            </div>
        </div>
    </section>
<?php

get_footer();

?>
