<?php
/**
 * Template Name: Blog Template
 * The Case Studies page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 */?>
<?php get_header("inner"); ?>

    <section class="banner-internal-page banner-internal-page-shape bg-orange">
        <div class="overlay overlay-bg-light-1 overlay-page-shape"></div>
        <div class="container d-flex align-items-center justify-content-center container-absolute">
            <div class="box-banner-internal m-auto">
                <h1 class="title-page pb-4 mb-0 cl-white text-uppercase text-center">Search Results for: <?php echo get_search_query(); ?></h1>
                <form name="search" method="get" action="/" class="form-search">
                    <div class="input-group">
                        <span class="input-group-btn group-img-search"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ios-search.svg" border="0"> </span>
                        <input type="text" class="form-control" name="s" id="search" placeholder="Search terms, topics, or questions.">
                        <span class="input-group-btn group-btn-search"><button type="submit" class="btn btn-default btn-search">SEARCH</button></span>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <style>
        .banner-internal-page-shape::before{
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-blog.png) top center;
        }
        @media (max-width: 575.98px) {
            .banner-internal-page-shape::before{
                background: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/banner-blog-mv.png) top center;
            }
        }
    </style>
    <section id="section-blog-three-columns" class="blog-page-sections d-flex align-items-center justify-content-center">
        <div class="container">
            <?php if (have_posts()): ?>
            <div class="row justify-content-start">
                <?php while (have_posts()): the_post(); ?>
                    <div class="col-md-4">
                        <div class="card">
                            <?php
                            $the_post_thumbnail_url = get_the_post_thumbnail_url();
                            if (!empty($the_post_thumbnail_url)) :
                            ?>
                            <img class="card-img-top" alt="<?php the_title(); ?>" src="<?php echo $the_post_thumbnail_url; ?>">
                            <?php endif; ?>
                            <div class="card-body">
                                <h5 class="card-title font-adrianna cl-blue"><?php echo esc_attr( get_the_date( 'F j' ), get_the_ID() ); ?></h5>
                                <p class="card-text cl-black font-adrianna"><?php the_title(); ?></p>
                                <p class="card-subtext cl-gray-ligth font-adrianna">
                                    <?php echo wp_trim_words( get_the_excerpt(), 20, '[...]' ); ; ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="read-more"><i class="fa fa-angle-right" aria-hidden="true"></i>READ MORE</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
			            <?php
			            the_posts_pagination(
				            array(
					            'screen_reader_text' => ' ',
					            'prev_text'          => '<i class="fa fa-angle-left" aria-hidden="true"></i>' . __( 'Previous', 'engagedly' ),
					            'next_text'          => __( 'Next', 'engagedly' ) . '<i class="fa fa-angle-right" aria-hidden="true"></i>',
				            )
			            );
			            ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h2 class="title-blog font-adrianna cl-gray text-uppercase text-center pb-5">Nothing Found</h2>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>


<?php get_footer(); ?>