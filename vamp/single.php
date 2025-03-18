<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Vamp
 */

get_header();
?>

<main id="primary" class="site-main">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <section class="blog-post-content">
                    <div class="container-fluid">
						<div class="row gap-8 auto">
							<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
								<?php echo do_shortcode('[ez-toc]'); ?>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 blog-content">
										<span class="blog-post-date cl-blue bold"><?php echo get_the_date(); ?></span>

										<h2 class="main-blog-title cl-black mt-05 m-b1"><?php the_title(); ?></h2>

										<div class="blog-post-featured-img">
											<?php the_post_thumbnail('full'); ?>
										</div>

										<div class="post-content">
											<?php the_content(); ?>
										</div>
							</div>
						</div>
                    </div>
                </section>
            </article><!-- #post-<?php the_ID(); ?> -->

		<div class="container-fluid">
			<div class="row center-xs middle-xs">
				<svg xmlns="http://www.w3.org/2000/svg" width="1422" height="2" viewBox="0 0 1422 2" fill="none">
					<path d="M0 1H1421.5" stroke="#000"/>
				</svg>
			</div>
		</div>
	
		<section class="recent-posts med-pad">
			<div class="container-fluid">
				<div class="row center-xs middle-xs">
					<h2 class="cl-red mt-0 mb-1 text-center">Recent Blogs</h2>
				</div>

				<div class="row center-xs middle-xs">
				<?php 
                    // Set up a new query for blog posts
                    $blog_posts = new WP_Query(array(
                        'post_type' => 'post', 
                        'posts_per_page' => 3, 
						'orderby' => 'date',  
						'order' => 'DESC'    
                    ));

                    // Loop through posts
                    if ($blog_posts->have_posts()) : 
                        while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>

                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="blog-post-item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="blog-post-image">
                                                <?php the_post_thumbnail('full'); // Display the featured image ?>
                                            </div>
                                        <?php endif; ?>

                                        <h3 class="blog-post-title cl-navy"><?php the_title(); ?></h3>
                                    </a>
                                </div>
                            </div>

                        <?php endwhile; 
                        wp_reset_postdata(); // Reset post data to the main query

                    else : 
                        echo '<p>No blog posts found.</p>';
                    endif; ?>

				</div>
			</div>
		</section>
			<?php get_template_part ('template-parts/sections/section-faqs'); ?>

        <?php endwhile;
    else :
        get_template_part('template-parts/content', 'none');
    endif; ?>
</main><!-- #main -->

<?php
get_footer();
?>