<?php
/**
 * The Template for displaying Archive pages.
 */

get_header(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class("bg-white"); ?>>
    <section class="banner-general d-flex align-items-center position-relative">
        <svg class="shape-banner-general hide-md" width="1112" height="411" viewBox="0 0 1112 411" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 5H33.6137C88.8422 5 133.614 49.7715 133.614 105V201.5C133.614 256.728 178.385 301.5 233.614 301.5H1007C1062.23 301.5 1107 346.272 1107 401.5V411" stroke="#24CFA3" stroke-width="10"/>
        </svg>
        <svg class="shape-banner-general show-md" width="390" height="169" viewBox="0 0 390 169" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M390 166H85.4129C52.2758 166 25.4129 139.137 25.4129 106V30.4129C25.4129 15.2732 13.1397 3 -2 3V3" stroke="#24CFA3" stroke-width="6"/>
        </svg>
        <div class="container z-index-2">
            <div class="row justify-content-center text-center">
                <div class="col-md-12">
                    <h1 class="cl-white">
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
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="section-resources bg-white pb-md-5">
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
