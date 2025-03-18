<?php
/**
 * Template name: Home2021
 */
get_header();
?>
    <section class="revslider revslider-home" style="height: 550px;">
        <div class="wrap-banner">
            <?php echo do_shortcode("[rev_slider alias='home2']");  ?>
        </div>
    </section>
    <section class="container" style="height: 360px;">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-content banner justify-content-md-center" style="height: 201px;">
            	   <!-- <section><?php //the_content(); ?></section>-->
                   <div style="padding: 0 50px;height: 110px"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
        <div class="row row-last-news">
            <div class="col-md-6" style="height: 188px">
                <div class="box-news">
                    <div class="box-text">

                        <?php
                        $arg = array(
                            'showposts' => 3,
                            'category_name' => 'news'
                        );

                        $the_query = new WP_Query($arg);
                        if($the_query->have_posts()): ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="asset-title">Latest News</h3>
                            <!--<a href="/about-us/news/"><i class="fas fa-angle-right"></i> News Archives</a>-->
                        </div>
                        <div class="row">
                            <?php
                            while($the_query->have_posts()):
                                $the_query->the_post();
                                ?>

                                <div class="box-asset col-md-4 copy-text-asset">
                                    <a href="<?php the_permalink(); ?>">
                                        <h6><?php the_title(); ?></h6>
                                        <p class="p-more"><i class="fas fa-angle-right"></i> More</p>
                                    </a>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_query();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="height: 188px">
                <div class="box-news">
                    <div class="box-text">
                        <?php
                        $post_id = 2338;
                        $i = 1;
                        ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="asset-title">Press Releases</h3>
                            <a href="/investors/press-releases/#press-release"><i class="fas fa-angle-right"></i> Press Release Archives</a> 
                        </div>
                        <div class="row">
                            <?php
                            while (have_rows('years', $post_id)): the_row();
                                while (have_rows('items_repeat', $post_id)):
                                    the_row();
                                    if($i == 4) break;
                                    ?>
                                    <div class="box-asset col-md-4 copy-text-asset">
                                        <a href="<?php the_permalink(get_sub_field('file')); ?>" target="_blank">
                                            <h6><?php echo get_sub_field('title'); ?></h6>
                                            <p class="p-more"><i class="fas fa-angle-right"></i> More</p>
                                        </a>
                                    </div>
                                    <?php
                                    $i++;
                                endwhile;
                            endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="products section-products-page" style="background-color:#f5f5f7;">
        <h1 class="title-section-page">Market Segments</h1>
        <div class="container products-home">
            <div class="row pb-3 line">
                <?php
                if( have_rows('first_row') ):

                    while( have_rows('first_row') ) : the_row(); ?>
                        <div class="col-sm-6 col-md-3 pb-3">
                            <div class="card">
                                <div class="icon">
                                    <div><img src="<?php echo get_sub_field('icon') ?>" alt="<?php echo get_sub_field('title') ?>" style="width: 100%"></div>
                                </div>
                                <div class="title">
                                    <?php echo get_sub_field('title') ?>
                                </div>
                                <div class="content" style="padding: 0 19px;">
                                    <?php echo substr(get_sub_field('content'),0,153).'...' ?>
                                </div>
                                <div class="learn-more" style="padding: 0 19px;">
                                    <a href="<?php echo get_sub_field('learn_more'); ?>"><i class="fas fa-angle-right"></i> More</a>
                                </div>
                            </div>
                        </div>
                       <?php
                    endwhile;
                else :
                    echo "Has not rows";
                endif;
                ?>
                <?php
                if( have_rows('second_row') ):

                    while( have_rows('second_row') ) : the_row(); ?>
                        <div class="col-sm-6 col-md-3 pb-3">
                            <div class="card">
                                <div class="icon">
                                    <div><img src="<?php echo get_sub_field('icon') ?>" alt="<?php echo get_sub_field('title') ?>" style="width: 100%"></div>
                                </div>
                                <div class="title">
                                    <?php echo get_sub_field('title') ?>
                                </div>
                                <div class="content" style="padding: 0 19px;">
                                    <?php echo substr(get_sub_field('content'),0,153).'...' ?>
                                </div>
                                <div class="learn-more" style="padding: 0 19px;">
                                    <a href="<?php echo get_sub_field('learn_more'); ?>"><i class="fas fa-angle-right"></i> Learn More</a>
                                </div>
                            </div>
                        </div>
                       <?php
                    endwhile;

                else :
                    echo "Has not rows";
                endif;
                ?>
            </div>
        </div>
    </section>
    <section class="callbanner" style="background-color:#fff ">
        <div class="container">
            <div class="row">
                <div id="wrap-banner-bottom">
                    <a target="_blank" href="<?php echo get_field('homebannerurl'); ?>">
                        <img class="img-fluid" src="<?php echo get_field('homebanner'); ?>" style="width:100% !important;">
                    </a>
                </div>
            </div>
        </div>
        <h1 class="title-section-page">Primary Locations</h1>
        <div class="container businessunit section-businessunit">
            <div class="row justity-content-center">
            	<div class="col-sm-3 mb-3" style="text-align: center;">
                    <div class="title"><?php echo get_field('name_location_1home'); ?></div>
                    <div class="address"><?php echo get_field('address_line_1home');?></div>
                    <div class="address"><?php echo get_field('address_line_2home');?></div>
                </div>
            </div>
            <div class="row justity-content-center">
                <div class="col-sm-3 mb-3" style="text-align: center;">
                    <div class="title"><?php echo get_field('second_location_name'); ?></div>
                    <div class="address"><?php echo get_field('second_location_address_line_1'); ?></div>
                    <div class="address"><?php echo get_field('second_location_address_line_2'); ?></div>
                </div>
                <div class="col-sm-3 mb-3" style="text-align: center;">
                    <div class="title"><?php echo get_field('third_location_name'); ?></div>
                    <div class="address"><?php echo get_field('third_location_address_line_1'); ?></div>
                    <div class="address"><?php echo get_field('third_location_address_line_2'); ?></div>
                </div>
                <div class="col-sm-3" style="text-align: center;">
                    <div class="title"><?php echo get_field('fourth_location_name'); ?></div>
                    <div class="address"><?php echo get_field('fourth_location_1'); ?></div>
                    <div class="address"><?php echo get_field('fourth_location_2'); ?></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                     <a href="<?php echo get_bloginfo('url') ?>/contact-us/" class="link-more-locations"><i class="fas fa-angle-right"></i> See All Worldwide Locations</a>
                </div>
            </div>
        </div>

    </section>
<?php
get_footer();
?>
