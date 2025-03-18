<?php
//Template name: Page Board of directors
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
        <div class="row">
            <div class="col-lg-3 content-sidebar">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-lg-9 content-main">
                <div class="row">
                    <?php
                    while(have_posts()): the_post();
                    ?>

                        <div class="col-md-12">

                            <div class="wrap-product wrap-content">

                                <?php if(get_the_post_thumbnail_url(get_the_ID(),'full')): ?>
                                <div class="box-banner img-resp box-banner-margin-left">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" alt="<?php the_title(); ?>">
                                </div>
                                <?php endif; ?>

                                <h1 class="product-title" id="title-board"><?php the_title(); ?></h1>

                                <div class="row align-items-start wrap-board-feature" id="ajax_container">
                                    <?php
                                    $post_type = get_field('investors_type');
                                    $arg = array(
                                        'post_type' => $post_type,
                                        'order' => 'ASC',
                                        'orderby' => 'menu_order',
                                        'posts_per_page' => 1,
                                    );
                                    $the_query = new WP_Query($arg);


                                    while( $the_query->have_posts() ) : $the_query->the_post();?>
                                        <div class="col-md-4">
                                            <img src="<?php echo get_field('photo'); ?>" alt="<?php the_field('title'); ?>">
                                        </div>
                                        <div class="col-md-8">
                                            <h3>
                                                <?php if(get_field('link_headline')): ?>
                                                    <a href="<?php echo get_field('link_headline') ?>">
                                                <?php endif; ?>
                                                    <?php the_title(); ?></h1>
                                                <?php if(get_field('link_headline')): ?>
                                                    </a>
                                                <?php endif; ?>
                                            </h3>
                                            <h5><?php the_field('title'); ?></h5>
                                            <div class="content"><?php the_content(); ?></div>
                                        </div>
                                    <?php
                                    endwhile;
                                    ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 board-line-separator"><hr></div>

                                </div>

                                <?php
                                $arg = array(
                                    'post_type' => $post_type,
                                    'order' => 'ASC',
                                    'orderby' => 'menu_order',
                                );
                                $the_query = new WP_Query($arg);
                                if($the_query->have_posts() ): ?>
                                    <div class='row wrap-board-secondary'>
                                        <?php // Loop through rows.
                                        $i = 1;
                                        while( $the_query->have_posts() ) : $the_query->the_post();?>
                                            <div class='col-md-4 col-board' id="col-board-<?php echo $post->ID; ?>" <?php if($i==1): ?> style="display:none" <?php endif; ?>>
                                                <a
                                                    class='d-flex link-board align-items-center ancla'
                                                    href="#title-board"
                                                    data-postid="<?php echo $post->ID; ?>"
                                                >
                                                    <div>
                                                        <img src='<?php echo get_field('photo'); ?>' alt="<?php echo get_field('title'); ?>">
                                                    </div>
                                                    <div>
                                                       <h4><?php the_title(); ?></h4>
                                                       <h5><?php echo get_field('title'); ?></h5>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php
                                        // End loop.
                                        $i++;
                                        endwhile; ?>
                                    </div>
                                    <script>
                                    jQuery(document).ready(function($) {
                                        var cadena='';
                                        jQuery('.link-board').click(function(e){
                                            //e.preventDefault();
                                            jQuery.ajax({
                                                 type: 'POST',
                                                 url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                                                 data: {
                                                        action: 'single_board',
                                                        postid:  jQuery(this).data("postid"),
                                                        posttype: '<?php echo $post_type ?>'
                                                  },
                                                  success: function(response){
                                                        jQuery('#ajax_container').hide().html(response).fadeIn();
                                                  }
                                            });
                                            jQuery(".col-board").show();
                                            jQuery("#col-board-" + jQuery(this).data("postid")).hide();
                                        });

                                        // Anchor to top

                                        jQuery('.ancla').click(function(){
                                            var link = $(this);
                                            var anchor  = link.attr('href');
                                            jQuery('html, body').stop().animate({
                                                scrollTop: jQuery(anchor).offset().top - 100
                                            }, 2000);
                                            return false;
                                        });

                                    });
                                    </script>

                                <?php
                                // No value.
                                else :
                                    echo "Do something...";
                                endif;
                                ?>
                            </div><!-- wrap-product -->

                        </div>

                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php

get_footer();

?>
