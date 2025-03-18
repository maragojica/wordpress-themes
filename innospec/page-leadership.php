<?php
//Template name: Leadership Home

get_header();
?>
<div class="investors">
    <section id="hero" style="background:url(/wp-content/uploads/2022/05/hero-investors.jpg) no-repeat !important;background-size: cover!important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="headline-hero"><?php the_title(); ?></div>
                </div>
            </div>
        </div>
    </section>
    <section id="company-officers" class="container officers company-officers">
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
        <div class="row row-intro">
            <div class="col-lg-12">
                <h2 style="margin-bottom: 0px;">Company Officers</h2>
            </div>
            <!--<div class="col-md-12 board-line-separator"><hr></div>-->
        </div>
        <div class="row align-items-start wrap-board-feature" id="ajax_container">
            <?php            
            $post_type = get_field('investors_first_row');
            $arg = array(
                'post_type' => $post_type,
                'order' => 'ASC',
                'orderby' => 'menu_order',
                'posts_per_page' => 1,
            );
            $the_query = new WP_Query($arg);


            while( $the_query->have_posts() ) : $the_query->the_post();?>
                <div class="col-md-3">
                    <img src="<?php echo get_field('photo'); ?>" alt="<?php the_field('title'); ?>" style="max-width: 250px;">
                </div>
                <div class="col-md-9">
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
<!--
        <div class="row">
            <div class="col-md-12 board-line-separator"><hr></div>
        </div>
-->
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
                    <div class='col-md-3 col-board' id="col-board-<?php echo $post->ID; ?>" <?php if($i==1): ?> style="display:none" <?php endif; ?>>
                        <a
                            class='d-flex link-board align-items-center ancla'
                            href="#company-officers"
                            data-postid="<?php echo $post->ID; ?>"
                        >
                            <div>
                                <img src='<?php echo get_field('photo'); ?>' alt="<?php echo get_field('title'); ?>">
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
    </section>


<!-- Section 2 -->
<section id="board-of-directors" style="width: 100%;background-color: #f5f5f7;padding: 6px 0px 35px 0px;" class="board-of-directors">
    <div class="container investors_second_row" style="">
        <div class="row row-intro">
            <div class="col-lg-12">
                <h2 style="margin-bottom: 0px;">Board of Directors</h2>
            </div>
            <div class="col-md-12 board-line-separator"><hr></div>
        </div>
        <div class="row align-items-start wrap-board-feature" id="ajax_container2">
            <?php
            $post_typesc = get_field('investors_second_row');

            $arg = array(
                'post_type' => 'board_directors',
                'order' => 'ASC',
                'orderby' => 'menu_order',
                'posts_per_page' => 1,
            );
            $the_query = new WP_Query($arg);


            while( $the_query->have_posts() ) : $the_query->the_post();?>
                <div class="col-md-3">
                    <img src="<?php echo get_field('photo'); ?>" alt="<?php the_field('title'); ?>">
                </div>
                <div class="col-md-9">
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
<!--
        <div class="row">
            <div class="col-md-12 board-line-separator"><hr></div>
        </div>
-->
        <?php
        $arg = array(
            'post_type' => 'board_directors',
            'order' => 'ASC',
            'orderby' => 'menu_order',
        );
        $the_query = new WP_Query($arg);
        if($the_query->have_posts() ): ?>
            <div class='row wrap-board-secondary'>
                <?php // Loop through rows.
                $i = 1;
                while( $the_query->have_posts() ) : $the_query->the_post();?>
                    <div class='col-md-3 col-board' id="col-board-<?php echo $post->ID; ?>" <?php if($i==1): ?> style="display:none" <?php endif; ?>>
                        <a
                            class='d-flex link-board2 align-items-center scdancla'
                            href="#board-of-directors"
                            data-postid="<?php echo $post->ID; ?>"
                        >
                            <div>
                                <img src='<?php echo get_field('photo'); ?>' alt="<?php echo get_field('title'); ?>">
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
                jQuery('.link-board2').click(function(e){
                    //e.preventDefault();
                    jQuery.ajax({
                         type: 'POST',
                         url: '<?php bloginfo("url") ?>/wp-admin/admin-ajax.php',
                         data: {
                                action: 'single_board',
                                postid:  jQuery(this).data("postid"),
                                posttype: 'board_directors'
                          },
                          success: function(response){
                                jQuery('#ajax_container2').hide().html(response).fadeIn();
                          }
                    });
                    jQuery(".col-board").show();
                    jQuery("#col-board-" + jQuery(this).data("postid")).hide();
                });

                // Anchor to top

                jQuery('.scdancla').click(function(){
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
    </div>
</section>
<!-- end Section 2 -->

<section class="container articles" style="padding: 58px 0px;">
    <div class="row">
        <div class="col-md-12">            
            <div class="col-lg-12">
                <h3 style="margin-bottom: 0px;">Related Information</h3>
            </div>
            <div class="col-md-12 board-line-separator" style="padding-bottom: 0px;"><hr style="margin-top:10px!important;margin-bottom: 20px!important;"></div>
            <div class="col-md-12 clickhere" style="color: #626262; font-weight: 500; font-size: 16px;margin-bottom: 30px;">Click any documents to view/download</div>
            <div class="col-md-12 docsdownload">
                <div class="slidesdown">
                    <?php 
                    $rows = get_field('board_commdown',7341);
                    if( $rows ) {
                        foreach( $rows as $row ) { ?>
                            <div class="icon-down"><a href="<?php echo $row['file'] ?>" style="color: inherit; margin-right: 15px;"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-download.png"> <?php echo $row['title'] ?></a></div>
                        <?php }
                    }
                    ?>
                </div>
            </div>
        </div>
        <!--<div class="col-md-6">
            <div class="col-lg-12">
                <h2 style="margin-bottom: 0px;">Code of Business Conduct</h2>
            </div>
            <div class="col-md-12 board-line-separator" style="padding-bottom: 0px;"><hr></div> 
            <div class="col-md-12 clickhere" style="">Click any documents to view/download</div>
            <div class="col-md-12 docsdownload">
                <div class="row slidesdown">
                    <?php 
                    $rows = get_field('code_business',7341);
                    if( $rows ) {
                        foreach( $rows as $row ) {
                            echo '<div class="col-md-1 icon"><a href="'.$row['file'].'"><img src="/wp-content/uploads/2022/06/icondown_black.png"></a></div>';
                            echo '<div class="col-md-11 icon"><h4>'.$row['title'].'</h4></div>'; 
                        }
                    }
                    ?>
                    <div id="accordion" class="col-md-12 wrap-press-release-accordion">
                        <div class="card">
                            <div class="card-header" id="heading-1" style="padding-top: 0px;">
                                <h3 class="mb-0">
                                    <button class="btn btn-link w-100  collapsed" data-toggle="collapse" data-target="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                        <div class="d-flex">
                                            <div class="icon-arrow"><span></span></div>
                                            <div class="year" style="font-size: 19px;padding-left: 25px;">
                                                Anti-Corruption Policy
                                            </div>
                                        </div>
                                    </button>
                                </h3>
                            </div>
                            <div id="collapse-1" class="collapse" aria-labelledby="heading-1" data-parent="#accordion" style="">
                                <div class="card-body">
                                    <div class="col-md-12 docsdownload">
                                        <div class="row slidesdown">                                                                        
                                            <?php 
                                            $rows = get_field('anti-corruption',7341);
                                            if( $rows ) {

                                                foreach( $rows as $row ) {
                                                    echo '<div class="col-md-1 icon"><a href="'.$row['file'].'"><img src="/wp-content/uploads/2022/06/icondown_black.png"></a></div>';
                                                    echo '<div class="col-md-11 icon"><h4>'.$row['title'].'</h4></div>';
                                                }
                                            }
                                            ?>    
                                        </div>
                                    </div>                                                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    

        </div>-->
    </div>
</section>

    <?php get_template_part( 'footer-investors' ); ?>

<!--</div>-->
    
<?php
get_footer();
?>
