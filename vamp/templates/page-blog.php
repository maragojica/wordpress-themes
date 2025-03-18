<?php
/**
 * The template for displaying the blog page
 * Template Name: Blog
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Vamp
 */

 get_header("inner");
 ?>
 <main id="primary" class="site-main">
 <?php 
get_template_part('template-parts/sections/section-internal-hero'); 
?>  

<section class="section-blogs">
    <div class="container-fluid">
        <div class="blog-posts-grid flex row center-xs start-xs">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $posts_per_page = 12;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $posts_per_page,
                'paged' => $paged,
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="blog-post-card flex col">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="blog-post-thumbnail">
                                    <?php the_post_thumbnail('full'); ?>
                                </div>
                            </a>
                        <?php endif; ?>
                        <div class="blog-post-content text-left">
                            <?php if ( get_the_date() ) : ?>
                                <span class="mt-05 mb-05 blog-post-date cl-blue"><?php echo get_the_date('F d, Y'); ?></span>
                            <?php endif; ?>
                            <a href="<?php the_permalink(); ?>">
                                <h3 class="mt-0 blog-post-title cl-black"><?php the_title(); ?></h3>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                
            <?php else : ?>
                <p><?php esc_html_e('Sorry, there are no posts to display at this time.', 'your-theme-textdomain'); ?></p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <?php if ($query->max_num_pages > $paged) : ?>
        <div class="load-more-container text-center">
            <button id="load-more-posts" class="button cl-navy bg-white">Load More</button>
            <div id="loading-indicator" style="display:none;">Loading...</div>
        </div>
        <?php endif; ?>
    </div> 
</section>
 </main><!-- #main -->
 <?php
 get_footer();
 ?>