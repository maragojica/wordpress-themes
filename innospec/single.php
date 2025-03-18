<?php
get_header();
?>
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="wrap-breadcrumb">
                    <!-- Breadcrumb NavXT 6.5.0 -->
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="/about-us/" class="post post-page"><span property="name">About Us</span></a>
                    </span>
                    <span class="breacrumb-separate">/</span>
                    <span property="itemListElement" typeof="ListItem">
                        <a property="item" typeof="WebPage" href="/news/" class="post post-page"><span property="name">News</span></a>
                    </span>
                    <span class="breacrumb-separate">/</span>
                    <span class="post post-page current-item"><?php the_title(); ?></span>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 content-sidebar">
                <?php get_sidebar('news'); ?>
            </div>
            <div class="col-lg-9">

                <div class="wrap-content wrap-articles">
                    <div class="row">
                    <?php
                    while ( have_posts() ) : the_post();
                        if(get_field("enabled_sidebar")){
                            $col1 = "col-lg-8";
                            $col2 = "col-lg-4";
                        }else{
                            $col1 = "col-lg-12";
                        }
                        ?>
                        <div class="<?php echo $col1; ?>">

                            <div class="wrap-product wrap-content">

                                <h1 class="h2 mt-3"><?php the_title(); ?></h1>

                                <?php the_content(); ?>
                                <?php if(get_field('pro_pdf')): ?>
                                    <p><a href="<?php echo get_field('pro_pdf'); ?>" class="link-pdf" target="_blank">Download Technical Data Sheet</a></p>
                                <?php endif; ?>
                                <p><a href="#" class="link-back">Back</a></p>
                            </div>
                        </div>
                        <?php if(get_field("enabled_sidebar")): ?>
                            <div class="<?php echo $col2; ?> sidebar-right">
                                <?php get_sidebar('right'); ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php

get_footer();

?>
