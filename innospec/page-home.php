<?php
/**
 * Template name: Home
 */
get_header();
?>
    <section class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="wrap-banner">
                    <?php echo do_shortcode("[rev_slider alias='home']");  ?>

                    <div class="main-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="box-news">
                    <div class="box-text">

                        <?php
                        $arg = array(
                            'showposts' => 3,
                            'category_name' => 'news'
                        );

                        $the_query = new WP_Query($arg);
                        if($the_query->have_posts()): ?>
                            <h3 class="asset-title">News</h3>
                            <?php
                            while($the_query->have_posts()):
                                $the_query->the_post();
                            ?>
                            <div class="box-asset">
                                <a href="<?php the_permalink(); ?>">
                                    <h4><?php the_title(); ?></h4>
                                    <p><?php echo get_excerpt(30); ?></p>
                                </a>
                            </div>
                            <?php
                            endwhile;
                            wp_reset_query();
                        endif;
                        ?>

                    </div>
                    <div class="box-img">
                        <?php dynamic_sidebar('home-news-image'); ?>
                    </div>
                </div>
                <div class="box-news">
                    <div class="box-text">
                        <?php
                        $post_id = 2338;
                        $i = 1;
                        ?>

                            <h3 class="asset-title">Press Releases</h3>
                            <?php
                            while (have_rows('years', $post_id)): the_row();
                                while (have_rows('items_repeat', $post_id)):
                                    the_row();
                                    if($i == 4) break;
                                ?>
                                <div class="box-asset">
                                    <a href="<?php the_permalink(get_sub_field('file')); ?>">
                                        <h4><?php echo get_sub_field('title'); ?></h4>
                                    </a>
                                </div>
                                <?php
                                $i++;
                                endwhile;
                            endwhile;

                        ?>
                    </div>
                    <div class="box-img">
                        <?php dynamic_sidebar('home-press-release-image'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row products-home">
            <div class="col-md-12 pb-3 line">
                <hr>
            </div>
            <?php
            if( have_rows('first_row') ):

                while( have_rows('first_row') ) : the_row(); ?>
                    <div class="col-lg-2 col-md-4 col-sm-6 pb-3">
                        <div class="icon">
                            <div><img src="<?php echo get_sub_field('icon') ?>" alt="<?php echo get_sub_field('title') ?>"></div>
                        </div>
                        <div class="title">
                            <?php echo get_sub_field('title') ?>
                        </div>
                        <div class="content">
                            <?php echo get_sub_field('content') ?>
                        </div>
                        <div class="learn-more">
                            <a href="<?php echo get_sub_field('learn_more'); ?>"><i class="fas fa-angle-right"></i> Learn More</a>
                        </div>
                    </div>
                   <?php
                endwhile;

            else :
                echo "Has not rows";
            endif;
            ?>
        </div>

        <div class="row products-home">
            <div class="col-md-12 pb-3 pt-2 line">
                <hr>
            </div>
            <?php
            if( have_rows('second_row') ):

                while( have_rows('second_row') ) : the_row(); ?>
                    <div class="col-lg-2 col-md-4 col-sm-6 pb-3">
                        <div class="icon">
                            <div><img src="<?php echo get_sub_field('icon') ?>" alt="<?php echo get_sub_field('title') ?>"></div>
                        </div>
                        <div class="title">
                            <?php echo get_sub_field('title') ?>
                        </div>
                        <div class="content">
                            <?php echo get_sub_field('content') ?>
                        </div>
                        <div class="learn-more">
                            <a href="<?php echo get_sub_field('learn_more'); ?>"><i class="fas fa-angle-right"></i> Learn More</a>
                        </div>
                    </div>
                   <?php
                endwhile;

            else :
                echo "Has not rows";
            endif;
            ?>
        </div>
    </section>
<?php
get_footer();
?>
