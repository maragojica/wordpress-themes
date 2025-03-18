<?php
/**
 * The Template for displaying Archive pages.
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class("bg-lighter"); ?>>
    <section class="banner-inside pt-md-5 pb-md-5 pt-3 pb-3 d-flex align-items-center position-relative bg-lighter">
        <div class="container z-index-2">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <h2 class="cl-dark-green">
                        <?php
                        if ( is_day() ) :
                            printf( esc_html__( 'Daily Archives: %s', 'starter-theme-bootstrap' ), get_the_date() );
                        elseif ( is_month() ) :
                            printf( esc_html__( 'Monthly Archives: %s', 'starter-theme-bootstrap' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'starter-theme-bootstrap' ) ) );
                        elseif ( is_year() ) :
                            printf( esc_html__( 'Yearly Archives: %s', 'starter-theme-bootstrap' ), get_the_date( _x( 'Y', 'yearly archives date format', 'starter-theme-bootstrap' ) ) );
                        else :
                            printf( esc_html__( 'Category Archives: %s', 'starter-theme-bootstrap' ), single_cat_title( '', false ) );
                        endif;
                        ?>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section class="section-resources bg-lighter pb-md-5">
        <div class="container pt-md-5 pb-md-5 pt-4 pb-0">
            <div class="row equal">
                <?php
                if ( have_posts() ) :
                    get_template_part( 'archive', 'loop' );
                else :
                    // 404.
                    get_template_part( 'content', 'none' );
                endif; ?>
            </div><!-- /.row -->
        </div>
    </section>
</article><!-- /#post-<?php the_ID(); ?> -->
<?php wp_reset_postdata(); // End of the loop. ?>
<?php get_footer();
