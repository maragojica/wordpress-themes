<?php
//Template name: Page Top Offer

get_header();
?>
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php
                while(have_posts()): the_post()
                ?>
                <div class="wrap-content">
                    <h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>

                    <div class="wrap-button-bottom">
                        <a href="<?php the_field('button_accept'); ?>" class="btn-offer-bottom">Accept</a>

                        <!--<a href="/offers/access-denied" class="btn-offer-bottom">Decline</a>-->
                        <a href="<?php the_field('button_decline'); ?>" class="btn-offer-bottom">Decline</a>
                    </div>

                </div><!-- wrap-content -->
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php

get_footer();

?>
