<?php 
get_header();
?>
    <section class="container">
        
        <div class="row">
            <div class="col-lg-3">
                
            </div>
            <div class="col-lg-9">

                <div class="wrap-content wrap-articles">
                    <?php

                    if(have_posts()): ?>

                    <header class="page-header">
                        <h1 class="page-title">
                            <?php _e( 'Search results for: ', 'twentynineteen' ); ?>
                            <span class="page-description"><?php echo get_search_query(); ?></span>
                        </h1>
                    </header><!-- .page-header -->

                        <?php
                        while ( have_posts() ) : the_post();
                        ?>
                        <article>
                            <div class="row">
                                <div class="col-lg-9">
                                    <h2><?php the_title(); ?></h2>
                                    
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="col-lg-3 text-right">
                                    <a href="<?php the_permalink(); ?>" class="link-learnmore">Learn more</a>
                                </div>
                            </div>
                        </article>
                        <?php endwhile; wp_reset_postdata(); ?>

                    <?php else: ?>
                        <header class="page-header">
                            <h1 class="page-title"><?php _e( 'Nothing Found', 'twentynineteen' ); ?></h1>
                        </header><!-- .page-header -->
                        <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </section>
<?php 

get_footer();

?>