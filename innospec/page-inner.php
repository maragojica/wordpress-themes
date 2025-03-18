<?php
//Template name: Page full width

get_header();
?>
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
            <nav class="breadcrumb">
                <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </nav>
            </div>
        </div>
        <div class="row intro">
            <div class="col-lg-12">
                <?php
                while(have_posts()): the_post()
                ?>
                <div class="wrap-product wrap-content">
                    <?php if(get_the_post_thumbnail_url(get_the_ID(),'full')): ?>
                    <div class="box-banner img-resp-100 box-banner-margin-left">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <?php endif; ?>
                    <h1 class="product-title"><?php the_title(); ?></h1>

                    <div class="content-text">
                        <?php the_content(); ?>
                    </div>
                </div><!-- wrap-article -->
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php

get_footer();

?>
